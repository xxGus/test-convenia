<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmpresaControllerTest extends TestCase
{

    public function testIndex()
    {
        $response = $this->call('GET','empresa');
        $response->assertRedirect('login');
    }

    public function testCreate(){
        $response = $this->call('GET','empresa/create');
        $response->assertRedirect('login');
    }

    public function testEdit(){
        $response = $this->call('GET','empresa/1/edit');
        $response->assertRedirect('login');
    }
}
