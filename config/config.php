<?php
return [
    // Mastodon API
    'mastodon_token' => 'DEIN_MASTODON_TOKEN',
    'mastodon_instance' => 'https://mastodon.social',

    // Testmodus: true = kein echter Toot, nur Log
    'testmode' => true,

    // Anzahl Tage, in denen keine Wiederholung erlaubt ist
    'log_days' => 100,

    // Pfade
    'data_path' => __DIR__ . '/../data/',
    'templates_path' => __DIR__ . '/../templates/',

    // Cronjob-Schutz
    'cronjob_secret' => 'DEIN_GEHEIMER_TOKENSTRING', // z. B. zufällig generiert
];
