<?php


namespace jdevuono\commandeApp\model;


class Commande extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "commande";
    protected $primaryKey = "id";
    protected $keyType = 'string';
    public $timestamps = true;
    public $incrementing = false;

    public function carte(){
        return $this->belongsTo(Carte::class);
    }

    public function items(){
        return $this->belongsToMany(Item::class,"item_commande","commande_id","item_id")->withPivot("quantite");
    }
}