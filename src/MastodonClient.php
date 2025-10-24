<?php
namespace DreiBot;

use CURLFile;

require_once __DIR__ . '/Logger.php';

class MastodonClient {
    private string $token;
    private string $instance;
    private bool $testmode;

    public function __construct(array $config) {
        $this->token = $config['mastodon_token'];
        $this->instance = rtrim($config['mastodon_instance'], '/');
        $this->testmode = $config['testmode'] ?? true;
    }

    public function postToot(string $text, ?string $coverUrl = null): void {
        if ($this->testmode) {
            Logger::log("TESTMODUS: Toot würde gesendet:\n$text");
            if ($coverUrl) Logger::log("Cover-URL: $coverUrl");
            return;
        }

        $mediaId = null;
        if ($coverUrl) {
            $mediaId = $this->uploadMedia($coverUrl);
            if (!$mediaId) {
                Logger::warn("Cover konnte nicht hochgeladen werden.");
            }
        }

        $payload = [
            'status' => $text,
        ];

        if ($mediaId) {
            $payload['media_ids[]'] = $mediaId;
        }

        $response = $this->apiCall('/api/v1/statuses', $payload);
        if ($response['http_code'] !== 200) {
            Logger::error("Fehler beim Toot: " . $response['body']);
        } else {
            Logger::log("Toot erfolgreich gesendet.");
        }
    }

    private function uploadMedia(string $url): ?string {
        $tmp = tempnam(sys_get_temp_dir(), 'cover');
        file_put_contents($tmp, file_get_contents($url));

        $file = new CURLFile($tmp, mime_content_type($tmp), basename($url));
        $payload = ['file' => $file];

        $response = $this->apiCall('/api/v2/media', $payload, true);

        unlink($tmp);

        if ($response['http_code'] === 200) {
            $json = json_decode($response['body'], true);
            return $json['id'] ?? null;
        }

        Logger::error("Fehler beim Medienupload: " . $response['body']);
        return null;
    }

    private function apiCall(string $endpoint, array $data, bool $isMultipart = false): array {
        $ch = curl_init($this->instance . $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $this->token
        ]);

        if ($isMultipart) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        } else {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        }

        $body = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return [
            'http_code' => $httpCode,
            'body' => $body
        ];
    }
}
