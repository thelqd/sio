<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Probeaufgabe Stundenverwaltung

Zum starten der App bitte folgende Schritte befolgen:

- Einen laufen MySQL Server in die .env.example eintragen.
- composoer install ausführen. Das .env sollte dabei automatisch erstellt werden.
- Die Migrations und Seed ausführen via Command php artisan migrate:fresh --seed
- Den Laravel internen Dev Webserver starten: php artisan serve
- Die App sollte dann unter http://127.0.0.1:8000/ erreichbar sein (Port may vary ;))

## Remarks

Ich habe die optinale Zusatzaufgabe B von Anfang an mitimplementiert, da ein nächträglicher Einbau umständlicher gewesen wäre. Daher sind die Projekte auch ein zentrales Element der App geworden.

Hier noch ein paar Punkte, die mir bekannt sind aber aus Zeitgründen noch unschön sind.

- Dem Formular zum speichern eines TimeLogs fehlen die Validierung der Parameter und die Logikprüfung, dass die Startzeit nicht größer sein darf als die Endzeit.
- Das "Design" ist ausbaufähig, inklusive der Ordnerstruktur der Templates.
- In den Controller gibt es einiges an Potential zur Optimierung insbesondere ein abstrakter ParentController kann hier die Code Duplications fast vollstäding beseitigen.
- Unit Tests sind leider der Zeit zum Opfer gefallen :(. 
- Im TimeLogController ist ein "Bug", der sich auf das grunsätzliche Verhalten der TimeLogs auswirkt. Ich habe ihn absichtlich da gelassen, in Hoffnung das er gefunden wird :).
