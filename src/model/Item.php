<?php


namespace jdevuono\commandeApp\model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends \Illuminate\Database\Eloquent\Model
{
    use SoftDeletes;

    protected $table = "item";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function intoCommandes(){
        return $this->belongsToMany(Commande::class,"item_commande","item_id","commande_id");
    }
}