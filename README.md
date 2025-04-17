# **Film Tracker**

De film tracker is een interactieve website waarmee gebruikers een database van films kunnen bekijken, beheren en ermee kunnen interageren. Deze applicatie is ontwikkeld als een backend eindproject voor school en de focus ligt op de interactie met de database met behulp van PDO in PHP.

## **Installatie en Gebruik**

Volg deze stappen om de Film Tracker lokaal te installeren en te gebruiken:

1.  **Vereisten:**
    * Zorg ervoor dat je een webserver met PHP-ondersteuning hebt geïnstalleerd.
    * Je hebt ook een database nodig (bijvoorbeeld MySQL, dat vaak is inbegrepen bij de hierboven genoemde serveromgevingen).

2.  **Databaseconfiguratie:**
    * **Importeer de SQL:** Je hebt een `.sql`-bestand (`import.sql`) dat de structuur van de database bevat. Gebruik een databasebeheersysteem zoals phpMyAdmin om dit `.sql`-bestand te importeren in je lokale database. Dit zorgt ervoor dat alle tabellen die de Film Tracker nodig heeft, correct worden aangemaakt.
    * Open het bestand `db.php`.
    * Zoek naar de regels die de databaseverbinding instellen.
    * Vul hier de juiste gegevens in voor jouw lokale database.

3.  **Bestanden plaatsen:**
    * Plaats alle bestanden van je Film Tracker project in de root directory van je lokale webserver.

4.  **Website openen:**
    * Start je lokale webserver (als deze nog niet actief is).
    * Open je webbrowser en ga naar het adres van je lokale server.
    * De `index.php`-pagina zou nu moeten laden, met een overzicht van de films (als er al films in de database staan).

## **Gebruik van de Film Tracker**

* **Films bekijken:** Op de startpagina (`index.php`) zie je een overzicht van de films. Normale gebruikers zien alleen de films die ze zelf hebben toegevoegd. Beheerders kunnen alle films zien die door alle gebruikers zijn toegevoegd.
* **Film details:** Klik op de poster van een film om meer details te bekijken (`detail.php`).
* **Registreren:** Nieuwe gebruikers kunnen een account aanmaken via de registratiepagina (`login_register.php`).
* **Inloggen:** Bestaande gebruikers kunnen inloggen via de inlogpagina (`login_register.php`).
* **Uitloggen:** Ingelogde gebruikers kunnen uitloggen via de "Log Uit"-link die in de navigatiebalk staat.
* **(Gebruikersfunctionaliteiten):**
    * Normale gebruikers kunnen films bekijken en de details ervan zien.
    * Wanneer je een nieuw account aanmaakt en voor het eerst inlogt, zal je film overzichtspagina leeg zijn.
    * Om films aan je persoonlijke overzicht toe te voegen, zoek naar de "+ Film" knop in de navigatiebalk. Door hierop te klikken, kom je op een formulier waar je de details van de film kunt invullen en opslaan. Deze films verschijnen dan in jouw overzicht.
* **(Admin functies - alleen voor beheerders):**
    * **Alle films zien:** Beheerders zien op de overzichtspagina alle films, ongeacht wie ze heeft toegevoegd.
    * **Films toevoegen:** Beheerders kunnen via de "+ Film" knop in de navigatiebalk nieuwe films toevoegen.
    * **Films bewerken:** Op de detailpagina van een film (`detail.php`) zien beheerders een link "Bewerk deze film" (`edit.php`) om de informatie van elke film aan te passen.
    * **Films verwijderen:** Op de detailpagina van een film (`detail.php`) zien beheerders een link "Verwijderen" om elke film uit de database te verwijderen.

**Optionele functionaliteiten (minstens 1 is gemaakt):**

* **Sorteren:** Op de overzichtspagina kun je op "Rating" en "Datum Bekeken" klikken om de films te sorteren.
* **Liken:** Ingelogde gebruikers kunnen mogelijk films liken (er kan een knop of icoon zijn om dit te doen). Gelikete films kunnen op een aparte pagina worden bekeken.
* **Watchlist:** Ingelogde gebruikers kunnen mogelijk films aan hun watchlist toevoegen en hun watchlist bekijken en beheren.
* **Zoeken:** Er kan een zoekbalk zijn waar gebruikers op titel of releasejaar kunnen zoeken.

**Notitie:**
Om als admin in te loggen gebruik het wachtwoord: 123

Veel plezier met het verkennen van de Film Tracker!