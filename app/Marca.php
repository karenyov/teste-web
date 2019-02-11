<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marcas';

    protected $fillable = ['nome'];
    protected $guarded = ['id', 'created_at', 'update_at'];

    public function produtos()
    {
        return $this->hasMany('App\Produto');
    }
}
