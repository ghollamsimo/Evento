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
            [
              'name' => 'Tournaments'
            ],
            [
                'name' => 'Matches'
            ],
            [
                'name' => 'Races'
            ],
            [
                'name' => 'Rituals'
            ],
            [
                'name' => 'Festivals'
            ],
            [
                'name' => 'Health fairs
'
            ],
        ];

        Categorie::insert($category);
    }
}
