<?php


namespace jdevuono\commandeApp\model;


class Carte extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "carte";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function Commandes(){
        return $this->hasMany(Commande::class,"carte_id");
    }
}