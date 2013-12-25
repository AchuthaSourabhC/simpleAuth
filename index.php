<?php

//Config
require "config/paths.php";
require "config/database.php";

//Template Engine
require_once 'vendor/autoload.php';

//Library
require "lib/cipher.php";
require "lib/database.php";
require "lib/session.php";
require "lib/model.php";
require "lib/redirect.php";
require "lib/control.php";
require "lib/handler.php";

//Start App
$app = new Handler();
