<?php

//Config
require "config/paths.php";
require "config/database.php";

require "vendor/predis/predis/autoload.php";

//composer autoload
require_once 'vendor/autoload.php';

//Library
require "lib/cipher.php";
require "lib/database.php";
require('lib/redis-session.php');
require "lib/session.php";
require "lib/model.php";
require "lib/redirect.php";
require "lib/control.php";
require "lib/handler.php";


RedisSession::start();

//Start App
$app = new Handler();
