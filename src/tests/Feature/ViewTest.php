<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    // 正常系
    public function test_subscribe_get_success(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_form_get_success(): void
    {
        $response = $this->get('/form');
        $response->assertStatus(200);
    }

    public function test_messages_get_success(): void
    {
        $response = $this->get('/messages');
        $response->assertStatus(200);
    }

    public function test_subscribers_get_success(): void
    {
        $response = $this->get('/subscribers');
        $response->assertStatus(200);
    }

    // 異常系
    public function test_no_existed_path_get_fail(): void
    {
        $response = $this->post('/api/unknown');
        $response->assertStatus(404);
    }

    public function test_push_post_exceeded_length_fail(): void
    {
        $message = [
            'publisher_id' => 'not implemented',
            'title' => str_repeat('*', 256),
            'body' => str_repeat('*', 256),
        ];
        $response = $this->post('/api/push', $message);
        $response->assertStatus(500);
        // $this->assertDatabaseMissing('messages', $message);
        $this->assertEquals(
            'fail',
            $response->baseResponse->content()
        );
    }
}
