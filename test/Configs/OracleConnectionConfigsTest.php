<?php

namespace Oracle\Test\Configs;

use Oracle\Configs\OracleConnectionConfigs;
use PHPUnit\Framework\TestCase;

class OracleConnectionConfigsTest extends TestCase
{
    public function test_ShouldCreateValidDsn()
    {
        $configs = new OracleConnectionConfigs("database", "root", host: "host");
        $this->assertEquals("mysql:dbname=database;host=host", $configs->buildDsn());
    }
}
