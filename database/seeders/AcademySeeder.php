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
                'title' => 'Beginner\'s Guide to Dog Training (For Novice Owners)',
                'description' => nl2br("Embark on a fulfilling journey into the world of dog training with our Beginner's Guide to Dog Training course, specially crafted for novice owners and those new to the joys of canine companionship. This comprehensive 4-week course is designed to empower beginners with the knowledge and skills needed to build a strong, positive relationship with their furry friends through simple and effective training techniques.\n\nIn this course, you will dive deep into the fundamentals of dog behavior, understanding how to communicate effectively with your canine companion. Led by our experienced instructor, John Doe, you will explore various training methods that focus on positive reinforcement and building trust."),
                'price' => 19.99,
                'image' => 'anjing-academy1.jpeg',
                'slug' => 'beginner\'s-guide-to-dog-training-beginner',
                'memberCount' => '143',
                'duration' => '4 weeks',
                'level' => 'intermediate',
                'instructor' => 'John Doe',
                'category' => 'training',
                'additional_materials' => 'Workbook, Video Lessons',
                'certificate' => 'yes',
                'consult' => 'yes',
                'youtubeLink' => 'https://www.youtube.com/embed/6saQVNMUW6E',
            ],
            [
                'title' => 'Feline Care Essentials for Cat Enthusiasts',
                'description' => nl2br("Embark on a rewarding exploration into the realm of cat care with our Feline Care Basics course, thoughtfully designed for cat enthusiasts and those venturing into the delightful world of feline companionship. This concise yet comprehensive course aims to equip participants with essential knowledge and practical skills, fostering a positive and nurturing relationship with their beloved feline companions.\n\nThroughout this accessible course, participants will gain insights into fundamental aspects of cat care, covering topics such as nutrition, grooming, understanding feline behavior, and creating a harmonious living environment. Led by our experienced instructors, you'll discover simple and effective care techniques that contribute to the well-being and happiness of your feline friends."),
                'price' => 9.99,
                'image' => 'kucing-academy1.jpeg',
                'slug' => 'feline-care-essentials-for-cat-enthusiasts',
                'memberCount' => '199',
                'duration' => '4 weeks',
                'level' => 'beginner',
                'instructor' => 'John Doe',
                'category' => 'training',
                'additional_materials' => 'Workbook, Video Lessons',
                'certificate' => 'yes',
                'consult' => 'yes',
                'youtubeLink' => 'https://www.youtube.com/embed/NnK0CaW6y1E',
            ],
            [
                'title' => 'Mastering Aquatic Ecosystems: A Guide to Keeping Happy Fish',
                'description' => nl2br("Embark on an exciting exploration of aquatic wonders with our Aquatic Enthusiast Workshop, thoughtfully curated for fish aficionados and those entering the fascinating world of aquariums. This workshop is tailored to provide participants with essential knowledge and hands-on skills to create a vibrant and harmonious aquatic habitat for their finned friends.\n\nJoin us for this brief yet impactful journey into aquatic care, where you\'ll acquire valuable skills and understanding to enhance your role as an aquatic enthusiast. Whether you\'re a seasoned fish keeper or new to the joys of aquariums, this workshop is designed to provide practical insights that can be immediately applied in creating a thriving aquatic haven for your aquatic companions."),
                'price' => 1.99,
                'image' => 'ikan-academy1.jpeg',
                'slug' => 'guide-to-keeping-happy-fish',
                'memberCount' => '158',
                'duration' => '4 weeks',
                'level' => 'beginner',
                'instructor' => 'John Doe',
                'category' => 'academy',
                'additional_materials' => 'Workbook, Video Lessons',
                'certificate' => 'no',
                'consult' => 'yes',
                'youtubeLink' => 'https://www.youtube.com/embed/WpQQOQ__1ok',
            ]
        ];
        Academy::insert($academies);
    }
}
