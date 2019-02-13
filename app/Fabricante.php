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

    /**
     * Retorna o html para a coluna ações
     *
     * @param [type] $fabricante
     * @return void
     */
    public static function laratablesCustomAction($fabricante)
    {
        return view('fabricantes.includes.action', ['fabricante' => $fabricante])->render();
    }
}
