<?php

namespace Database\Seeders;

use App\Models\Chat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Chat::create([
            'sender_id' => 2,
            'receiver_id' => 1,
            'message' => 'Halo, Dimas!',
        ]);

        Chat::create([
            'sender_id' => 1,
            'receiver_id' => 2,
            'message' => 'Halo, Rafif!',
        ]);

        Chat::create([
            'sender_id' => 2,
            'receiver_id' => 1,
            'message' => 'Apa kabar?',
        ]);

        Chat::create([
            'sender_id' => 1,
            'receiver_id' => 2,
            'message' => 'Baik, kamu?',
        ]);

        Chat::create([
            'sender_id' => 2,
            'receiver_id' => 1,
            'message' => 'Baik juga.',
        ]);

        Chat::create([
            'sender_id' => 1,
            'receiver_id' => 2,
            'message' => 'Ada apa?',
        ]);

        Chat::create([
            'sender_id' => 2,
            'receiver_id' => 1,
            'message' => 'Tidak ada apa-apa.',
        ]);

        Chat::create([
            'sender_id' => 1,
            'receiver_id' => 2,
            'message' => 'Oke.',
        ]);

        Chat::create([
            'sender_id' => 2,
            'receiver_id' => 1,
            'message' => 'Oke.',
        ]);


        

        Chat::create([
            'sender_id' => 3,
            'receiver_id' => 1,
            'message' => 'Halo, Dimas!',
        ]);

        Chat::create([
            'sender_id' => 1,
            'receiver_id' => 3,
            'message' => 'Halo, Rafif!',
        ]);

        Chat::create([
            'sender_id' => 3,
            'receiver_id' => 1,
            'message' => 'Apa kabar?',
        ]);

        Chat::create([
            'sender_id' => 1,
            'receiver_id' => 3,
            'message' => 'Baik, kamu?',
        ]);

        Chat::create([
            'sender_id' => 3,
            'receiver_id' => 1,
            'message' => 'Baik juga.',
        ]);

        Chat::create([
            'sender_id' => 3,
            'receiver_id' => 2,
            'message' => 'Ada apa?',
        ]);

        Chat::create([
            'sender_id' => 3,
            'receiver_id' => 1,
            'message' => 'Tidak ada apa-apa.',
        ]);

        Chat::create([
            'sender_id' => 3,
            'receiver_id' => 2,
            'message' => 'Oke.',
        ]);

        Chat::create([
            'sender_id' => 3,
            'receiver_id' => 1,
            'message' => 'Oke.',
        ]);
    }
}
