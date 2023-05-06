<?php

namespace Oracle;

use Oracle\Configs\OracleConnectionConfigs;

class Oracle
{
    private static ?Oracle $instance = null;
    private \PDO $db;

    private function __construct(OracleConnectionConfigs $configs) {
        $this->db = new \PDO($configs->buildDsn(), $configs->getUsername(), $configs->getPassword(), $configs->getOptions());
    }

    public static function getInstance(OracleConnectionConfigs $configs): ?Oracle
    {
        if (self::$instance === null) {
            self::$instance = new Oracle($configs);
        }

        return self::$instance;
    }

    public function select(string $query): false|array
    {
        return $this->getDB()
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getDB(): \PDO
    {
        return $this->db;
    }
}
