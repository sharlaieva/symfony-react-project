# Ares aplikace


Aplikace získánva informace pro službu ARES.
Aplikace obsahuje 2 polí - pro IČO a pro jméno firmy.
Po vyplnění jedného pole bude hledat informace nejprve v databázi a pokud tam nenajde, bude hledat na serveru a následně přidá do databáze.

## Spouštěni

1. Zkopírovat repositář

``git clone https://github.com/sharlaieva/symfony-react-project.git``

2. Vytvořit Databáze

``mysql -u root -p``
``CREATE DATABASE testdb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;``
    
3. Upravit .env soubor

4. Spouštět server

``composer install``
``php bin/console doctrine:migrations:migrate``
``php -S 127.0.0.1:8000 -t public``

5. Spouštět klienta.

``composer require symfony/webpack-encore-bundle``
``yarn install``

``yarn add @babel/preset-react --dev``
``yarn add react-router-dom``
``yarn add --dev react react-dom prop-types axios``
``yarn add @babel/plugin-proposal-class-properties @babel/plugin-transform-runtime``