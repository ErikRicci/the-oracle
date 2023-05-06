<?php

namespace Oracle\Configs;

class OracleConnectionConfigs
{
    private const DEFAULT_OPTIONS = [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
    ];

    public function __construct(
        private string $database,
        private string $username,
        private ?string $password = null,
        private string $host = 'localhost',
        private array $options = self::DEFAULT_OPTIONS,
    ) {}

    public function buildDsn(): string
    {
        return "mysql:dbname=$this->database;host=$this->host";
    }

    public function getDatabase()
    {
        return $this->database;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function getOptions()
    {
        return $this->options;
    }
}
