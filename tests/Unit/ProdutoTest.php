<?php

namespace Tests\Unit;

use App\Produto;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ProdutoTest extends TestCase
{
    /** @test */
    public function createProdutoTest()
    {
        $data = [
            'descricao' => 'Produto Test',
            'marca_id' => 1,
            'fabricante_id' => 1,
            'preco' => 20
        ];

        $produto = Produto::create($data);
        $produto = Produto::find($produto->id);

        $this->assertInstanceOf(Produto::class, $produto);
        $this->assertEquals($data['descricao'], $produto->descricao);
        $this->assertEquals($data['marca_id'], $produto->marca_id);
    }

    /** @test */
    public function removeProdutoTest()
    {
        $data = [
            'nome' => 'Produto Test'
        ];

        $data = [
            'descricao' => 'Produto Test',
            'marca_id' => 1,
            'fabricante_id' => 1,
            'preco' => 20
        ];

        $produto = Produto::create($data);
        $produto->delete();

        $produto = Produto::find($produto->id);

        $this->assertEquals($produto, null);
    }
}
