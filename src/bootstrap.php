<?php

require __DIR__ . '/../vendor/autoload.php';

$phpdotenv = new Dotenv\Dotenv(__DIR__ . '/..');
$phpdotenv->load();

$settings = require __DIR__ . '/../src/settings.php';

$app = new Slim\App($settings);

require __DIR__ . '/../src/container.php';

require __DIR__ . '/../src/routes.php';