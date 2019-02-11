<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    protected $table = 'fabricantes';

    protected $fillable = ['nome'];
    protected $guarded = ['id', 'created_at', 'update_at'];

    public function produtos()
    {
        return $this->hasMany('App\Produto');
    }
}
