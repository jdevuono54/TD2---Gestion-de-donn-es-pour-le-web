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

// PARTIE 1
$commande = Commande::where("id","=","000b2a0b-d055-4499-9c1b-84441a254a36")->with("items")->first();
//echo $commande;

//PARTIE 2
$item = Item::with("intoCommandes")->get();
//echo $item;

//PARTIE 3
$commande = Commande::where("nom_client","=","Aaron McGlynn")->with("items")->get();
//echo $commande;

// PARTIE 4
$commande = Commande::find("aaaa");
/*
$commande->items()->attach(Item::find(2),["quantite"=>3]);
$commande->items()->attach(Item::find(6),["quantite"=>4]);
*/

//PARTIE 5
$commande->items()->updateExistingPivot(Item::find(6),["quantite"=>8]);
