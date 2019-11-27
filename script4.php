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
$commande = Commande::where("etat",">",0)->whereHas("Carte", function($query) {
    $query->where("mail_proprietaire", "like","%Aaron.McGlynn%");
})->get();
//echo $commande;

// PARTIE 2
$carte = Carte::find(28)->Commandes()->where("etat",">=",0)->where("montant",">","20")->get();
//echo $carte;

// PARTIE 3
$items = Commande::find("9f1c3241-958a-4d35-a8c9-19eef6a4fab3")->Items()->where("tarif","<",5)->get();;
//echo $items;

// PARTIE 4
$carte = Carte::has("Commandes",">",8)->get();
//echo $carte;

// PARTIE 5
$carte = Carte::whereHas("Commandes", function ($query){
    $query->has("items",">",3);
})->get();
//echo $carte;

// PARTIE 6
$commande = Commande::whereHas("items", function($query){
    $query->where("item_id","=",2);
})->get();
//echo $commande;

// PARTIE 7
$carte = Carte::whereHas("Commandes", function($query){
    $query->where("montant",">",30);
})->get();
//echo $carte;

// PARTIE 8
$commande = Commande::select()->whereNotNull("carte_id")->has("items",">",3)->get();
//echo $commande;