<?php

class BooksTable {

    protected $_dbc;

    public function __construct() {
        $config = new Config();

        $dbHost = $config->read('DB_HOST');
        $dbPort = $config->read('DB_PORT');
        $dbUser = $config->read('DB_USER');
        $dbPass = $config->read('DB_PASS');
        $dbName = $config->read('DB_NAME');

        $connectionString = sprintf('mysql:host=%s;port=%d;dbname=%s', $dbHost, $dbPort, $dbName);
        $this->_dbc = new PDO($connectionString, $dbUser, $dbPass);
    }

    public function search($keyword) {
        $query = $this->_dbc->prepare('SELECT * FROM `books` WHERE `title` LIKE :c0');
        $query->bindValue(':c0', '%' . $keyword . '%');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}
