<?php
use jdevuono\commandeApp\model\Carte;

require_once "vendor/autoload.php";

$ini = parse_ini_file("conf/config.ini", true);

$db = new Illuminate\Database\Capsule\Manager();
$db->addConnection($ini["database"]);
$db->setAsGlobal();
$db->bootEloquent();


//PARTIE 1
$carte = Carte::find(42);
$commande = $carte->Commandes;
//echo $commande;

//PARTIE
$carte = Carte::width("Commandes")->where("cumul",">",1000)->get();
echo $carte;

