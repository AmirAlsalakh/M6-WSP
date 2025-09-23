<?php

/**
 * Instans av klassen skapar en koppling till databasen egytalk
 * och tillhandahåller ett antal metoder för att hämta och manipulera
 * data i databasen.
 *
 */
class DbWorld
{
    /**
     * Används i metoder genom $this->db</code>
     */
    private $db;
    /**
     * DbEgyTalk constructor.
     *
     * Skapar en koppling till databaseb egytalk
     */
    public function __construct()
    {
        // Definierar konstanter med användarinformation.
        define('DB_USER', 'world');
        define('DB_PASSWORD', '12345');
        define('DB_HOST', 'mariadb');
        define('DB_NAME', 'world');
        // Skapar en anslutning till MySql och databasen world
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
        $this->db = new PDO($dsn, DB_USER, DB_PASSWORD);
    }

    function getCountryByText($name)
    {
        $sqlkod = "SELECT Name, Population, `Code` FROM `country` Where Name LIKE :name ORDER BY Name";
        $stmt = $this->db->prepare($sqlkod);

        $stmt->bindValue(':name', $name . '%');

        $stmt->execute();

        $countries = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $countries;
    }

    function codeCountry($code)
    {
        $sqlkod = "SELECT country.name, country.Code, city.Name, city.Population FROM country JOIN city ON country.Code = city.CountryCode WHERE country.Code LIKE :code ORDER BY city.Name  ASC";
        $stmt = $this->db->prepare($sqlkod);
        $stmt->bindValue(':code', $code);
        $stmt->execute();

        $posts = [];
        if ($stmt->rowCount() > 0) {
            $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $posts;
        } else {
            return $posts;
        }
    }
}