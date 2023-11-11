<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'type' => 'Makanan',
            ],
            [
                'type' => 'Obat',
            ],
            [
                'type' => 'Aksesoris',
            ]
        ];

        foreach ($datas as $data) {
            Type::create($data);
        }
    }
}
