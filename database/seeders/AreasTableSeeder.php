<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'apoyo_en_crisis' => 'Apoyo en Crisis',
            ],
            [
                'id'    => 2,
                'feminismos' => 'Feminismos',
            ],
            [
                'id'    => 3,
                'sapec' => 'Sapec',
            ],
            [
                'id'    => 4,
                'migraciones' => 'Migraciones general',
            ],
            [
                'id'    => 4,
                'comunitaria' => 'Comunitaria general',
            ],
            [
                'id'    => 4,
                'respira_y_calma' => 'Respira y Calma',
            ],
            [
                'id'    => 4,
                'trabajo_social' => 'Trabajo social',
            ],
            [
                'id'    => 4,
                'cooperacion' => 'Cooperación',
            ],
        ];

        Area::insert($roles);
    }
}
