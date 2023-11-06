<?php

namespace Tests\Feature;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChatApiTest extends TestCase
{
    public function test_myChat(): void 
    {
        $chat = Chat::factory()->create();

        $sender = User::find($chat->sender_id);

        $response = $this->actingAs($sender)
            ->getJson("/mychat/" . $chat->receiver_id);

        $response->assertStatus(200);

        $data = $response->json();
        dump($data);
    }

    public function test_dokter(): void 
    {
        $user = User::find(1);

        $response = $this->actingAs($user)
            ->getJson("/dokter");

        $response->assertStatus(200);

        $data = $response->json();
        dump($data);
    }

    public function test_me(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->getJson("/me");

        $response->assertStatus(200);

        $data = $response->json();
        dump($data);
    }

    public function test_post_dokter(): void
    {
        $user = User::find(1);

        $response = $this->actingAs($user)
            ->postJson("/mychat/2", [
                "message" => "Halo Dokter"
            ]);

        $response->assertStatus(200);

        $data = $response->json();
        dump($data);
    }

    public function test_send_notification(): void 
    {
        $user = User::find(1);

        $response = $this->actingAs($user)
            ->postJson("/send-notification", [
                "message" => 2,
                "pesan" => "Halo Dokter",
            ]);

        $response->assertStatus(200);

        $data = $response->json();
        dump($data);
    }

    public function test_sender_receiver(): void 
    {
        $user = User::find(1);

        $response = $this->actingAs($user)
            ->getJson("/sender-receiver");

        $response->assertStatus(200);

        $data = $response->json();
        dump($data);
    }
}
