<?php
require_once __DIR__ . '/../vendor/autoload.php';

use News\Routing;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

Routing::dispatch();


