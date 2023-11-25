<?php

namespace Database\Seeders;

use App\Models\ProductReview;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'review' => 'Makanan kucing yang bagus',
                'user_id' => 1,
                'product_id' => 1,
            ],
            [
                'review' => 'Makanan Anjing yang bagus',
                'user_id' => 1,
                'product_id' => 1,
            ],
            [
                'review' => 'Makanan Burung yang bagus',
                'user_id' => 1,
                'product_id' => 1,
            ]
        ];

        foreach ($datas as $data) {
            ProductReview::create($data);
        }
    }
}
