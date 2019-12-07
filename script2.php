<?php
use jdevuono\commandeApp\model\Carte;
use jdevuono\commandeApp\model\Commande;

require_once "vendor/autoload.php";

$ini = parse_ini_file("conf/config.ini", true);

$db = new Illuminate\Database\Capsule\Manager();
$db->addConnection($ini["database"]);
$db->setAsGlobal();
$db->bootEloquent();


//PARTIE 1
$carte = Carte::with("Commandes")->find(42);
//echo $carte;

//PARTIE 2
$carte = Carte::with("Commandes")->where("cumul",">",1000)->get();
//echo $carte;

//PARTIE 3
$commande = Commande::with("Carte")->whereNotNull("carte_id")->get();
//echo $commande;

//PARTIE 4
$carte = Carte::find(10);

/*
$commande = new Commande();
$commande->id = "aaaa";
$commande->date_livraison = date("Y-m-d");
$commande->etat = 1;
$carte->Commandes()->save($commande);

$commande = new Commande();
$commande->id = "bbbb";
$commande->date_livraison = date("Y-m-d");
$commande->etat = 1;
$carte->Commandes()->save($commande);

$commande = new Commande();
$commande->id = "cccc";
$commande->date_livraison = date("Y-m-d");
$commande->etat = 1;
$carte->Commandes()->save($commande);
*/

// PARTIE 5
/*
$commande = Commande::find("cccc");
$commande->carte_id = 11;
$commande->save();
*/

