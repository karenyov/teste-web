<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    protected $fillable = ['descricao', 'fabricante_id', 'marca_id'];
    protected $guarded = ['id', 'created_at', 'update_at'];

    public function fabricante()
    {
        return $this->belongsTo('App\Fabricante');
    }

    public function marca()
    {
        return $this->belongsTo('App\Marca');
    }
}
