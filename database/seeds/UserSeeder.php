<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::table('users')->insert([
                [
                    'email'         => "admin@meulucro.com.br",
                    'password'      => Hash::make("MeuLucro@2020!"),
                    'name'          => "Meu Lucro",
                    'super_user'    => true,
                    'empresa_id'    => 1
                ],
                [
                    'email'         => "ricardo@meulucro.com.br",
                    'password'      => Hash::make("meulucro"),
                    'name'          => "Luiz Ricardo Perovano",
                    'super_user'    => true,
                    'empresa_id'    => 1
                ],
                [
                    'email'         => "espedito@meulucro.com.br",
                    'password'      => Hash::make("meulucro"),
                    'name'          => "Espedito",
                    'super_user'    => true,
                    'empresa_id'    => 1
                ]
            ]);
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
        }
    }
}
