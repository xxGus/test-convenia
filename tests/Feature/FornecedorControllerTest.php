<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FornecedorControllerTest extends TestCase
{

    public function testIndex()
    {
        $response = $this->call('GET','fornecedores');
        $response->assertRedirect('login');
    }

    public function testCreate(){
        $response = $this->call('GET','fornecedores/create');
        $response->assertRedirect('login');
    }

    public function testEdit(){
        $response = $this->call('GET','fornecedores/1/edit');
        $response->assertRedirect('login');
    }
}
