<?php

$config = require_once basePath('config/db.php');
$db = new Database($config);

$listings = $db->query('SELECT * FROM listings')->fetchAll();

loadView('listings/index', compact('listings'));
