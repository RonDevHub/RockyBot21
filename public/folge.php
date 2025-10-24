// Linkseite mit Anbieter-Buttons
<?php
use DreiBot\Utils;
use DreiBot\Logger;

require_once __DIR__ . '/../src/Utils.php';
require_once __DIR__ . '/../src/Logger.php';

$config = require __DIR__ . '/../config/config.php';
Logger::init($config);

$id = $_GET['id'] ?? null;
if (!$id || !is_numeric($id)) {
    echo "<h1>Ungültige ID</h1>";
    exit;
}

// JSONs laden
$files = ['Serie.json', 'Spezial.json', 'Kurzgeschichten.json'];
$folge = null;

foreach ($files as $file) {
    $data = Utils::loadJson($config['data_path'] . $file);
    foreach ($data as $f) {
        if (($f['ids']['dreimetadaten'] ?? null) == $id) {
            $folge = $f;
            break 2;
        }
    }
}

if (!$folge) {
    echo "<h1>Folge nicht gefunden</h1>";
    exit;
}

// Infos extrahieren
$titel = htmlspecialchars($folge['titel'] ?? 'Unbekannt');
$nummer = $folge['nummer'] ?? '-';
$typ = $folge['typ'] ?? 'Unbekannt';
$cover = $folge['links']['cover'] ?? null;
$links = $folge['links'] ?? [];

function linkButton($name, $url) {
    if (!$url) return '';
    $safe = htmlspecialchars($url);
    return "<a href=\"$safe\" target=\"_blank\" class=\"btn\">$name</a>";
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?php echo $titel; ?> - Drei ???</title>
    <style>
        body { font-family: sans-serif; padding: 2em; background: #f5f5f5; }
        .cover { max-width: 300px; margin-bottom: 1em; }
        .btn { display: inline-block; margin: 0.5em; padding: 0.5em 1em; background: #333; color: #fff; text-decoration: none; border-radius: 5px; }
        .btn:hover { background: #555; }
    </style>
</head>
<body>
    <h1><?php echo $titel; ?></h1>
    <p><strong>Folge:</strong> <?php echo $nummer; ?> | <strong>Typ:</strong> <?php echo $typ; ?></p>

    <?php if ($cover): ?>
        <img src="<?php echo htmlspecialchars($cover); ?>" alt="Cover" class="cover">
    <?php endif; ?>

    <h2>Jetzt hören:</h2>
    <?php
        echo linkButton('Spotify', $links['spotify'] ?? null);
        echo linkButton('Deezer', $links['deezer'] ?? null);
        echo linkButton('Apple Music', $links['appleMusic'] ?? null);
        echo linkButton('Amazon Music', $links['amazonMusic'] ?? null);
        echo linkButton('YouTube Music', $links['youTubeMusic'] ?? null);
        echo linkButton('BookBeat', $links['bookbeat'] ?? null);
        echo linkButton('Produktseite', $links['dreifragezeichen'] ?? null);
    ?>

    <p><a href="index.php">Zurück zur Startseite</a></p>
</body>
</html>
