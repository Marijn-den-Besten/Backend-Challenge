<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("ROOT", dirname(__DIR__) . DIRECTORY_SEPARATOR);

require(ROOT . "core/config.php");
require(ROOT . "core/route.php");
require(ROOT . "core/core.php");

route();
