<?php
require_once "src".DIRECTORY_SEPARATOR."bot.php";

if(!isset($_ENV['TG_TOKEN']) && !isset($_ENV['TG_TOKEN'])){
    throw new Exception('Check Environment variables.');
}

$config = [
    "telegram" => [
        "token" => $_ENV['TG_TOKEN'],
        "chat_id" => $_ENV['TG_CHAT_ID']
    ],
    "gerrit" => [
        "url" => "https://review.statixos.com/",
        "romsideChecker" => [
            "enabled" => false,
            "blacklist" => ['kernel', 'device'],
            "whitelist" => ['qcom', 'sepolicy', 'lineage']
        ],
    ],
    "cache" => "statixos.cache" // cache filename
];

runAsLoop($config); //useful for cli
//run($config); // useful for cron
