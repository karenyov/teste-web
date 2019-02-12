<?php

namespace App;

use DB;
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

    public static function getAllPerformances() 
    {
        return DB::table('produtos as p')
                            ->join('fabricantes as f', 'f.id', '=', 'p.fabricante_id')
                            ->join('marcas as m', 'm.id', '=', 'p.marca_id')
                            ->select(DB::raw('(SELECT COUNT(*)
                                                    FROM performances per
                                                    WHERE per.produto_id = p.id) as incidencia'),
                                        DB::raw('p.descricao as produto'),
                                        DB::raw('p.id as produto_id'),
                                        DB::raw('f.nome as fabricante'),
                                        DB::raw('m.nome as marca'),
                                        DB::raw('AVG(p.preco) as nossa_media'),
                                        DB::raw('(SELECT COUNT(*)
                                                    FROM performances per
                                                    WHERE per.produto_id = p.id
                                                        AND p.preco < per.preco_concorrencia) as vitoria'),
                                        DB::raw('(SELECT AVG(per.preco_concorrencia)
                                                    FROM performances per
                                                    WHERE per.produto_id = p.id) as media_concorrencia'),
                                        DB::raw('ROUND((100 - ((100 * (SELECT AVG(per.preco_concorrencia)
                                                                        FROM performances per
                                                                        WHERE per.produto_id = p.id)) / AVG(p.preco)))) as diferenca')
                                    )
                            ->having('media_concorrencia', '>=', 0)
                            ->groupBy('incidencia', 'produto', 'fabricante', 'marca', 'media_concorrencia', 'produto_id', 'vitoria')
                            ->get();   
    }

    public static function getPerformancesByProdutoId($produtoId) 
    {
        return DB::table('produtos as p')
                            ->join('fabricantes as f', 'f.id', '=', 'p.fabricante_id')
                            ->join('marcas as m', 'm.id', '=', 'p.marca_id')
                            ->select(DB::raw('(SELECT COUNT(*)
                                                    FROM performances per
                                                    WHERE per.produto_id = p.id) as incidencia'),
                                        DB::raw('p.descricao as produto'),
                                        DB::raw('p.id as produto_id'),
                                        DB::raw('p.fabricante_id'),
                                        DB::raw('p.marca_id'),
                                        DB::raw('f.nome as fabricante'),
                                        DB::raw('m.nome as marca'),
                                        DB::raw('AVG(p.preco) as nossa_media'),
                                        DB::raw('(SELECT COUNT(*)
                                                    FROM performances per
                                                    WHERE per.produto_id = p.id
                                                        AND p.preco < per.preco_concorrencia) as vitoria'),
                                        DB::raw('(SELECT AVG(per.preco_concorrencia)
                                                    FROM performances per
                                                    WHERE per.produto_id = p.id) as media_concorrencia'),
                                        DB::raw('ROUND((100 - ((100 * (SELECT AVG(per.preco_concorrencia)
                                                                        FROM performances per
                                                                        WHERE per.produto_id = p.id)) / AVG(p.preco)))) as diferenca')
                                    )
                            ->where('p.id', '=', $produtoId)
                            ->having('media_concorrencia', '>=', 0)
                            ->groupBy('incidencia', 'produto', 'p.marca_id', 'p.fabricante_id', 
                                        'fabricante', 'marca', 'media_concorrencia', 'produto_id', 'vitoria')
                            ->get()->first();   
    }
}
