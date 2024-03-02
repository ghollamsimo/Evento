<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            [
                'name' => 'Parties'
            ],
            [
                'name' => 'Gatherings'
            ],
            [
                'name' => 'Celebrations '
            ],
            [
                'name' => 'Workshops'
            ],
            [
                'name' => 'Seminars'
            ],
        ];

        Categorie::insert($category);
    }
}
