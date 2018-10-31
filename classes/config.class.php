<?php

class Config
{
    private static $instance;
    private $config;

    public function __construct()
    {
        if (!file_exists(dirname(__FILE__, 2) . '/config.ini')) {
            throw new \Exception("Config file not found");
        }

        $this->config = parse_ini_file(dirname(__FILE__, 2) . '/config.ini', true);

        if (!$this->config) {
            throw new \Exception("Failed to parse config file");
        }
    }

    /**
     * @return Config
     * @throws \Exception
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __get($config)
    {
        if (array_key_exists($config, $this->config)) {
            return $this->config[$config];
        } else {
            foreach ($this->config as $section) {
                if (is_array($section) && array_key_exists($config, $section)) {
                    return $section[$config];
                }
            }
        }
    }
}