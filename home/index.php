<?php

use app\core\App;
use app\core\Database;

if (!session_id()) session_start();
require_once "../app/init.php";
$db = new Database();
$app = new App();
