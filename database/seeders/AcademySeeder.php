<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Academy;

class AcademySeeder extends Seeder
{
    public function run(): void
    {
        $academies = [
            [
                'title' => 'Train Your Doggie For Beginner',
                'description' => 'A beginner-friendly course to learn the basics of programming.',
                'price' => 1.99,
                'image' => 'images/orang-anjing2.png',
                'slug' => 'train-your-doggie-for-beginner',
            ],
            [
                'title' => 'Make Your Cat Comfortable',
                'description' => 'Explore the fundamentals of web development with hands-on examples.',
                'price' => 2.99,
                'image' => 'images/image-5.png',
                'slug' => 'make-your-cat-comfortable',
            ]
        ];
        Academy::insert($academies);
    }
}
