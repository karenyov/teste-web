<?php

namespace Tests\Unit;

use App\Marca;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MarcaTest extends TestCase
{
    /** @test */
    public function createMarcaTest()
    {
        $data = [
            'nome' => 'Marca Test'
        ];

       $marca = Marca::create($data);
       $marca = Marca::find($marca->id);

       $this->assertInstanceOf(Marca::class, $marca);
       $this->assertEquals($data['nome'], $marca->nome);
    }

    /** @test */
    public function removeMarcaTest()
    {
        $data = [
            'nome' => 'Marca Test'
        ];

       $marca = Marca::create($data);
       $marca->delete();

       $marca = Marca::find($marca->id);

       $this->assertEquals($marca, null);
    }
}
