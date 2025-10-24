<?php
namespace DreiBot;

class Utils {
    /**
     * Lädt eine JSON-Datei und gibt sie als Array zurück.
     */
    public static function loadJson(string $path): array {
        if (!file_exists($path)) {
            Logger::error("Datei nicht gefunden: $path");
            return [];
        }

        $json = file_get_contents($path);
        $data = json_decode($json, true);

        if (!is_array($data)) {
            Logger::error("Fehler beim Parsen von JSON: $path");
            return [];
        }

        return $data;
    }

    /**
     * Prüft, ob eine URL gültig ist.
     */
    public static function isValidUrl(string $url): bool {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }

    /**
     * Ersetzt Platzhalter in einem Text mit Werten aus einem Array.
     */
    public static function replacePlaceholders(string $text, array $values): string {
        return str_replace(array_keys($values), array_values($values), $text);
    }

    /**
     * Gibt das MIME-Type einer Datei zurück.
     */
    public static function getMimeType(string $filePath): string {
        return mime_content_type($filePath);
    }

    /**
     * Gibt eine lesbare Datumsdifferenz zurück (z.B. „vor 3 Tagen“).
     */
    public static function humanDateDiff(string $date): string {
        $d1 = \DateTime::createFromFormat('Y-m-d', $date);
        $d2 = new \DateTime();
        if (!$d1) return 'unbekannt';

        $diff = $d2->diff($d1);
        return $diff->days . ' Tage her';
    }
}
