<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sucursalCliente extends model {
    protected $fillable=['nombre_suc_txt','codigo_suc_txt',
                        'encargado_suc_txt', 'region_cat_suc', 'comuna_cat_suc',
                        'direcc_suc_txt'];
}
