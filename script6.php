<?php
use jdevuono\commandeApp\model\Carte;
use jdevuono\commandeApp\model\Commande;
use jdevuono\commandeApp\model\Item;

require_once "vendor/autoload.php";

$ini = parse_ini_file("conf/config.ini", true);

$db = new Illuminate\Database\Capsule\Manager();
$db->addConnection($ini["database"]);
$db->setAsGlobal();
$db->bootEloquent();

Item::find(5)->delete();