<?php

namespace Tests\Unit;

use App\Fabricante;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FabricanteTest extends TestCase
{
    /** @test */
    public function createFabricanteTest()
    {
        $data = [
            'nome' => 'Fabricante Test'
        ];

        $fabricante = Fabricante::create($data);
        $fabricante = Fabricante::find($fabricante->id);

        $this->assertInstanceOf(Fabricante::class, $fabricante);
        $this->assertEquals($data['nome'], $fabricante->nome);
    }

    /** @test */
    public function removeMarcaTest()
    {
        $data = [
            'nome' => 'Fabricante Test'
        ];

        $fabricante = Fabricante::create($data);
        $fabricante->delete();

        $fabricante = Fabricante::find($fabricante->id);

        $this->assertEquals($fabricante, null);
    }
}
