// Projektbeschreibung
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Drei ??? Bot – Projektübersicht</title>
  <style>
    body {
      font-family: system-ui, sans-serif;
      background: #f9f9f9;
      color: #222;
      max-width: 700px;
      margin: 2em auto;
      padding: 1em;
      line-height: 1.6;
    }
    h1 {
      color: #1e1e1e;
    }
    a {
      color: #0077cc;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
    .footer {
      margin-top: 3em;
      font-size: 0.9em;
      color: #666;
    }
  </style>
</head>
<body>

  <h1>🎙️ Der Drei ??? Bot</h1>

  <p>
    Willkommen auf der Projektseite des <strong>Drei ??? Bots</strong>!<br>
    Dieser kleine Bot postet regelmäßig eine zufällige Folge der <em>drei ???</em> auf <strong>Mastodon</strong> – inklusive Cover, Titel, Anbieter-Links und einem passenden Text von Justus, Peter oder Bob.
  </p>

  <h2>🔍 Was macht der Bot?</h2>
  <ul>
    <li>Wählt täglich eine zufällige Folge aus allen regulären, Spezial- und Kurzgeschichten</li>
    <li>Vermeidet Wiederholungen (mindestens 100 Tage Abstand)</li>
    <li>Postet einen liebevoll formulierten Toot mit Cover und Streaming-Links</li>
    <li>Erstellt eine <a href="folge.php?id=123">Zusatzseite mit allen Anbietern</a> zur Folge</li>
  </ul>

  <h2>🛠️ Wie funktioniert das?</h2>
  <p>
    Der Bot nutzt die JSON-Daten von <a href="https://dreimetadaten.de" target="_blank">dreimetadaten.de</a>, kombiniert sie mit eigenen Textbausteinen und postet über die Mastodon-API. Das Ganze läuft automatisiert per Cronjob.
  </p>

  <h2>📦 Open Source</h2>
  <p>
    Der Code ist offen und modular aufgebaut – ideal für eigene Bots oder Projekte rund um Hörspiele. Du findest alles auf GitHub:
    <br>
    <a href="https://github.com/deinname/dreibot" target="_blank">➡️ GitHub: deinname/dreibot</a>
  </p>

  <div class="footer">
    <p>Ein Projekt von Ronny – powered by Nerdliebe, PHP und den drei ???</p>
  </div>

</body>
</html>
