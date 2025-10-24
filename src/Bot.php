// Hauptklasse für Toot-Erstellung
<?php
namespace DreiBot;

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/Logger.php';
require_once __DIR__ . '/EpisodeSelector.php';
require_once __DIR__ . '/TextGenerator.php';
require_once __DIR__ . '/MastodonClient.php';

class Bot {
    private $config;
    private $selector;
    private $textGen;
    private $mastodon;

    public function __construct() {
        $this->config = require __DIR__ . '/../config/config.php';
        $this->selector = new EpisodeSelector($this->config);
        $this->textGen = new TextGenerator($this->config);
        $this->mastodon = new MastodonClient($this->config);
    }

    public function run() {
        try {
            $folge = $this->selector->getRandomEpisode();
            if (!$folge) {
                Logger::log("Keine gültige Folge gefunden.");
                return;
            }

            $text = $this->textGen->generateText($folge);
            $cover = $folge['links']['cover'] ?? null;

            if ($this->config['testmode']) {
                Logger::log("TESTMODUS: Toot würde gesendet mit Text:\n$text");
                if ($cover) Logger::log("Cover: $cover");
            } else {
                $this->mastodon->postToot($text, $cover);
                Logger::log("Toot gesendet: {$folge['ids']['dreimetadaten']} – {$folge['titel']}");
                $this->selector->logEpisode($folge['ids']['dreimetadaten']);
            }
        } catch (\Exception $e) {
            Logger::log("Fehler in Bot.php: " . $e->getMessage());
        }
    }
}
