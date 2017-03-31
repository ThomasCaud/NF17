<?php

class Config
{
    private static $config = null;
    const CONFIG_PATH = "../config.json";

    public function getAll() {
        static::loadConfig();
        return static::$config;
    }

    public function get($name) {
        static::loadConfig();
        if(!isset(static::$config[$name]) && static::$config[$name] != null) {
            throw new LogicException('Le champ '.$name." n'existe pas dans le config.json");
        }
        return static::$config[$name];
    }

    private function loadConfig() {
        if(static::$config == null) {
            $conf = file_get_contents(self::CONFIG_PATH);
            static::$config = json_decode($conf, true);
            if (json_last_error() != JSON_ERROR_NONE) {
                throw new Exception("Json error : ".json_last_error_msg());
            }
        }
    }
}
