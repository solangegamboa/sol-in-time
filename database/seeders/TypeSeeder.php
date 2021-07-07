<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultValues = [
            ['name' => 'ENTRADA_1', 'default_time' => '07:30:00'],
            ['name' => 'SAIDA_1', 'default_time' => '12:00:00'],
            ['name' => 'ENTRADA_2', 'default_time' => '13:12:00'],
            ['name' => 'SAIDA_2', 'default_time' => '17:30:00'],
        ];
        foreach($defaultValues as $defaultValue) {
            Type::create($defaultValue);
        }
    }
}
