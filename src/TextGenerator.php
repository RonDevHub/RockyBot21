<?php
namespace DreiBot;

require_once __DIR__ . '/Logger.php';

class TextGenerator {
    private array $texts;
    private array $config;

    public function __construct(array $config) {
        $this->config = $config;
        $path = $config['templates_path'] . 'texts.json';
        if (!file_exists($path)) {
            Logger::error("Textbaustein-Datei fehlt: texts.json");
            $this->texts = [];
            return;
        }

        $json = json_decode(file_get_contents($path), true);
        if (!is_array($json)) {
            Logger::error("Fehler beim Parsen von texts.json");
            $this->texts = [];
            return;
        }

        $this->texts = $json;
    }

    public function generateText(array $folge): string {
        if (empty($this->texts)) {
            return "Heute gibt es Folge: " . ($folge['titel'] ?? 'Unbekannt');
        }

        $template = $this->texts[array_rand($this->texts)];

        $platzhalter = [
            '{titel}'     => $folge['titel'] ?? '',
            '{nummer}'    => $folge['nummer'] ?? '',
            '{typ}'       => $folge['typ'] ?? '',
            '{reihe}'     => $folge['reihe'] ?? '',
            '{sprecher}'  => is_array($folge['sprecher'] ?? null) ? implode(', ', $folge['sprecher']) : ($folge['sprecher'] ?? ''),
            '{autor}'     => is_array($folge['autor'] ?? null) ? implode(', ', $folge['autor']) : ($folge['autor'] ?? ''),
            '{id}'        => $folge['ids']['dreimetadaten'] ?? '',
        ];

        $text = str_replace(array_keys($platzhalter), array_values($platzhalter), $template);
        $link = $this->config['base_url'] . 'folge' . ($folge['ids']['dreimetadaten'] ?? '');
        $hashtags = implode(' ', $this->config['hashtags'] ?? []);

        return $text . "\n\n🔗 " . $link . "\n\n" . $hashtags;
    }
}
