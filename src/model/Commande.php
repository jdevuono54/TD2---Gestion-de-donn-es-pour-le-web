<?php


namespace jdevuono\commandeApp\model;


class Commande extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "commande";
    protected $primaryKey = "id";
    public $timestamps = true;
}