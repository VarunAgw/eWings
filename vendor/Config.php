<?php

class Config {

    protected $_config;

    public function __construct() {
        $config = require('app/config.php');

        if (
                empty($config['DB_HOST']) || !isset($config['DB_PORT']) ||
                empty($config['DB_USER']) || !isset($config['DB_PASS']) ||
                empty($config['DB_NAME'])
        ) {
            throw new \Exception('Database settings missing or incorrect');
        }

        $this->_config = $config;
    }

    public function read($key) {
        if (isset($this->_config[$key])) {
            return $this->_config[$key];
        } else {
            return null;
        }
    }

}
