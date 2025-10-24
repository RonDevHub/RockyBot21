<?php
// Fehleranzeige aktivieren
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Konfiguration und Klassen laden
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/src/Logger.php';
require_once __DIR__ . '/src/Bot.php';

use DreiBot\Logger;
use DreiBot\Bot;

// Konfiguration laden
$config = require __DIR__ . '/config/config.php';
Logger::init($config);

// Zugriffsschutz per Secret
$provided = $_GET['secret'] ?? '';
$expected = $config['cronjob_secret'] ?? '';

if ($provided !== $expected) {
    Logger::warn("Unberechtigter Zugriff auf cron.php mit Secret: '$provided'");
    http_response_code(403);
    echo "Zugriff verweigert.";
    exit;
}

// Bot starten
Logger::log("cron.php gestartet mit gültigem Secret.");
$bot = new Bot();
$bot->run();

echo "Botlauf abgeschlossen.";


