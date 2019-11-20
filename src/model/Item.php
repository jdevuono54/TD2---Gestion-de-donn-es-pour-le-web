<?php


namespace jdevuono\commandeApp\model;


class Item extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "item";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function intoCommandes(){
        return $this->belongsToMany(Commande::class,"item_commande","item_id","commande_id");
    }
}