# RockyBot21 - Der drei ![Fragezeichen-Logo](https://sig.rondev.de/logos/dreifragezeichen.svg) Bot

🎙️ Ein liebevoll gebauter Mastodon-Bot, der täglich eine zufällige Folge der drei ??? postet – inklusive Cover, Textbaustein und Streaming-Links.

---

## 🔍 Was macht RockyBot21?

- Wählt täglich eine zufällige Folge aus allen regulären, Spezial- und Kurzgeschichten
- Vermeidet Wiederholungen (mindestens 100 Tage Abstand)
- Postet einen Toot mit Cover, Titel, Anbieter-Links und einem passenden Text von Justus, Peter oder Bob
- Erstellt eine Zusatzseite mit allen Streaming-Anbietern zur Folge (`folge.php?id=123`)

---

## 🛠️ Wie funktioniert das?

RockyBot21 basiert auf PHP und nutzt die JSON-Daten von [dreimetadaten.de](https://dreimetadaten.de). Die Architektur ist modular aufgebaut:
```
RockyBot21/ 
├── config/ # Konfiguration inkl. API-Token und Testmodus
├── data/ # JSON-Daten, Logs, Debug-Ausgaben 
├── templates/ # Textbausteine mit Platzhaltern 
├── src/ # Bot-Logik, API-Anbindung, Helferklassen 
├── public/ # Weboberfläche (index.php, folge.php) 
├── cron.php # Einstiegspunkt für den Botlauf 
└── README.md # Diese Datei
```

---

## 🧪 Features

- ✅ Testmodus für sichere Entwicklung
- 🐞 Debug-Log für Fehleranalyse
- 🧩 Platzhaltertexte für individuelle Toots
- 🔐 Cronjob-Schutz via Secret-Token
- 🧵 Erweiterbar mit eigenen Texten, Regeln, Linkseiten oder Statistiken

---

## 📦 Installation

1. Repository klonen
2. `config/config.php` anpassen (Token, Secret, Testmodus)
3. JSON-Dateien in `data/` ablegen oder regelmäßig aktualisieren
4. Cronjob einrichten:
   ```bash
   curl "https://deinserver.de/dreibot/cron.php?secret=DEIN_SECRET"
   ```

---

## 💡 Credits
- Metadaten: [dreimetadaten.de](https://dreimetadaten.de)
- Idee & Umsetzung: RonDevHub


## 📣 Kontakt
Fragen, Ideen oder Nerdliebe? Melde dich auf Mastodon: @rockybot21@mastodon.social

> „Die drei ??? übernehmen jeden Fall – und RockyBot21 übernimmt die tägliche Empfehlung.“
