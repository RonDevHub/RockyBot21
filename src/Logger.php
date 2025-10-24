<?php
namespace DreiBot;

class Logger {
    private static string $logFile;

    public static function init(array $config): void {
        self::$logFile = $config['data_path'] . 'debug.log';
    }

    public static function log(string $message): void {
        $timestamp = date('Y-m-d H:i:s');
        $entry = "[$timestamp] $message\n";
        file_put_contents(self::$logFile, $entry, FILE_APPEND);
    }

    public static function error(string $message): void {
        self::log("ERROR: $message");
    }

    public static function warn(string $message): void {
        self::log("WARN: $message");
    }

    public static function info(string $message): void {
        self::log("INFO: $message");
    }
}
