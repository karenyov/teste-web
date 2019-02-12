<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    protected $table = 'performances';

    protected $fillable = ['produto_id', 'preco_concorrencia'];
    protected $guarded = ['id', 'created_at', 'update_at'];

    public function produto()
    {
        return $this->belongsTo('App\Produto');
    }
}
