<?php
use jdevuono\commandeApp\model\Carte;

require_once "vendor/autoload.php";

$ini = parse_ini_file("conf/config.ini", true);

$db = new Illuminate\Database\Capsule\Manager();
$db->addConnection($ini["database"]);
$db->setAsGlobal();
$db->bootEloquent();

// PARTIE 1
$carte = Carte::select("nom_proprietaire","mail_proprietaire","cumul")->get();
//echo $carte;


//PARTIE 2
$carte = Carte::select("nom_proprietaire","mail_proprietaire","cumul")->orderBy("nom_proprietaire","DESC")->get();
//echo $carte;


//PARTIE 3
try{
    $carte = Carte::where("id","=",7342)->firstOrFail();
    //echo $carte;
}
catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
    //echo "La carte n'existe pas";
}


//PARTIE 4
$carte = Carte::where("nom_proprietaire","LIKE","%Ariane%")->orderBy("cumul",'ASC')->get();
//echo $carte;


//PARTIE 5
$carte = new Carte();
$carte->password = "$2y$10$9.aOWaQWdd9NaSEMQjzVpuqAisCfwKjkvPazAGvk287UzaPy9FG52";
$carte->nom_proprietaire = "test";
$carte->mail_proprietaire = "test@test.fr";
//$carte->save();