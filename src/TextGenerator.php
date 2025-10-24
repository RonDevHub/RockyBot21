// Platzhalter ersetzen
<?php
namespace DreiBot;

require_once __DIR__ . '/Logger.php';

class TextGenerator {
    private array $texts;

    public function __construct(array $config) {
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
            '{titel}' => $folge['titel'] ?? '',
            '{nummer}' => $folge['nummer'] ?? '',
            '{typ}' => $folge['typ'] ?? '',
            '{reihe}' => $folge['reihe'] ?? '',
            '{sprecher}' => implode(', ', $folge['sprecher'] ?? []),
            '{autor}' => implode(', ', $folge['autor'] ?? []),
            '{id}' => $folge['ids']['dreimetadaten'] ?? '',
        ];

        return str_replace(array_keys($platzhalter), array_values($platzhalter), $template);
    }
}
