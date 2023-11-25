<?php

namespace Database\Seeders;

use App\Models\Consultation;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsultationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dokters = User::where('role_id', 1)->get();

        foreach ($dokters as $dokter) {
            Consultation::create([
                'dokter_id' => $dokter->id,
                'harga' => 20000
            ]);
        }
    }
}
