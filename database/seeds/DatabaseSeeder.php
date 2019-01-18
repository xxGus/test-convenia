<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Usuário',
            'email' => 'user@email.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('empresas')->insert([
            'nome' => 'Empreendimentos S.A.',
            'telefone' => '11900001111',
            'endereco' => 'Rua Qualquer',
            'cep' => '00000-000',
            'cnpj' => '00.000.000/0000-00',
            'user_id' => 1
        ]);

        $faker = Faker::create();
        foreach (range(1,5) as $i){
            DB::table('fornecedores')->insert([
                'nome' => $faker->name,
                'email' => $faker->email,
                'mensalidade' => mt_rand( 0, $faker->numberBetween(100, 1000) ) / 10,
                'user_id' => 1
            ]);
        }
    }
}
