<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>RockyBot21 - Drei ??? Bot</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="/public/favicon.png">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: system-ui, sans-serif;
      background: radial-gradient(circle at top, #1a1a1a, #000);
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .card {
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(12px);
      border-radius: 20px;
      padding: 2em;
      max-width: 600px;
      width: 90%;
      box-shadow: 0 0 30px rgba(0,0,0,0.4);
    }
    h1 {
      font-size: 1.6em;
      margin-bottom: 0.5em;
      text-align: center;
    }
    .logo {
      display: inline-block;
      vertical-align: middle;
      height: 1.2em;
    }
    p, ul {
      font-size: 0.95em;
      line-height: 1.6;
      margin-bottom: 1em;
    }
    ul {
      padding-left: 1.2em;
    }
    a {
      color: #1DB954;
      text-decoration: underline;
    }
    .footer {
      margin-top: 2em;
      font-size: 0.8em;
      color: #aaa;
      text-align: center;
    }
    @media (max-width: 600px) {
      .card {
        padding: 1.2em;
      }
      h1 {
        font-size: 1.3em;
      }
    }
  </style>
</head>
<body>
  <div class="card">
    <h1>
      RockyBot21 - Der drei <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 119.24 59.599"><text xml:space="preserve" x="104.119" y="76.886" fill="#2a7fff" fill-opacity=".917" stroke="#000" font-family="'DejaVu Math TeX Gyre'" font-size="81.64" text-anchor="middle" transform="translate(-43.924 -18.384)"><tspan x="104.119" y="76.886" fill-opacity=".918" font-family="'SF Pro Display'" style="font-variant-caps:normal;font-variant-east-asian:normal;font-variant-ligatures:normal;font-variant-numeric:normal"><tspan fill="#e2001a">?</tspan><tspan fill="#009ee0">?</tspan><tspan fill="#fff">?</tspan></tspan></text></svg> Bot
    </h1>

    <p>
      Willkommen auf der Projektseite des <strong>Drei ??? Bots</strong>!<br>
      Dieser kleine Bot postet regelmäßig eine zufällige Folge der <em>drei ???</em> auf <a rel="me" href="https://mastodon.social/@RockyBot21">Mastodon</a> - inklusive Cover, Titel, Anbieter-Links und einem passenden Text von Justus, Peter oder Bob.
    </p>

    <h2>🔍 Was macht der Bot?</h2>
    <ul>
      <li>Wählt täglich eine zufällige Folge aus allen regulären, Spezial- und Kurzgeschichten</li>
      <li>Vermeidet Wiederholungen (mindestens 100 Tage Abstand)</li>
      <li>Postet einen liebevoll formulierten Toot mit Cover und Streaming-Links</li>
      <li>Erstellt eine <a href="folge123">Zusatzseite mit allen Anbietern</a> zur Folge</li>
    </ul>

    <h2>🛠️ Wie funktioniert das?</h2>
    <p>
      Der Bot nutzt die JSON-Daten von <a href="https://dreimetadaten.de" target="_blank">dreimetadaten.de</a>, kombiniert sie mit eigenen Textbausteinen und postet über die Mastodon-API. Das Ganze läuft automatisiert per Cronjob.
    </p>

    <h2>📦 Open Source</h2>
    <p>
      Der Code ist offen und modular aufgebaut - ideal für eigene Bots oder Projekte rund um Hörspiele. Du findest alles auf GitHub & Co:
      <br>
      <a href="https://commitcloud.net/RonDevHub/RockyBot21" target="_blank">➡️ CommitCloud</a><br>
      <a href="https://codeberg.org/RonDevHub/RockyBot21" target="_blank">➡️ Codeberg</a><br>
      <a href="https://github.com/RonDevHub/RockyBot21" target="_blank">➡️ GitHub</a><br>
      <a href="https://gitlab.com/RonDevHub/RockyBot21" target="_blank">➡️ GitLab</a>
    </p>

    <h2>⚙️ Verwendung</h2>
    <p>
      Bei Verwendung genügt als Namensnennung "RockyBot21" und "dreimetadaten.de".<br>
      <code>&lt;a href="https://rockybot21.rondev.de/"&gt;RockyBot21&lt;/a&gt;</code>
    </p>

    <div class="footer">
      <p>Made with ❤️ and ☕️ - powered by <a href="https://mastodon.social/@herrstoeckchen" target="_blank">@herrstoeckchen</a>, PHP und den drei ???</p>
    </div>
  </div>
</body>
</html>
