<?php

namespace trix\recon;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\Config;

final class Source extends PluginBase {
    private static ?string $ip = null;
    private static ?int $port = null;
    private static Server $server;
    private static int $transferCount;
    private static Config $config;

    protected function onEnable(): void {
        self::$server = $this->getServer();
        self::$config = $this->getConfig();

        if (self::$config->get("auto-reconnect")) {
            self::$ip = self::$server->getIp();
            self::$port = self::$server->getPort();
        }
        else {
            self::$ip = self::$config->get("query")["ip-address"] ?? self::$server->getIp();
            self::$ip = self::$config->get("query")["port"] ?? self::$server->getPort();
        }
    }

    protected function onDisable(): void {
        foreach (Server::getInstance()->getOnlinePlayers() as $p) {
            if ($p->transfer(self::$ip, self::$port) and self::$config->get("debug-messages")) {
                ++self::$transferCount;
            }
            if (self::$config->get("debug-messages")) {
                Server::getInstance()->getLogger()->notice("Successfully transferred " . self::$transferCount . " players to [" . self::$ip . ":" . self::$port . "]");
            }
        }
    }
}