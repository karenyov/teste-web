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

    /**
     * Retorna o html para a coluna ações
     *
     * @param [type] $marca
     * @return void
     */
    public static function laratablesCustomAction($marca)
    {
        return view('marcas.includes.action', ['marca' => $marca])->render();
    }
}
