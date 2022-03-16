<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
        $this->subscription = [
            'endpoint' => 'test_endpoint',
            'token' => 'test_token',
            'pub_key' => 'test_pub_key',
        ];
        $this->message = [
            'publisher_id' => 'not implemented',
            'title' => 'test_title',
            'body' => 'test_body',
        ];
    }

    // 正常系
    public function test_subscribe_success(): void
    {
        $response = $this->post('/api/subscribe', $this->subscription);
        $response->assertStatus(200);
        $this->assertEquals(
            'success',
            $response->baseResponse->content()
        );
        $this->assertDatabaseHas('subscribers', $this->subscription);
    }

    public function test_push_success(): void
    {
        $response = $this->post('/api/push', $this->message);
        $response->assertStatus(200);
        $this->assertEquals(
            'success',
            $response->baseResponse->content()
        );
        $this->assertDatabaseHas('messages', $this->message);
    }

    // 異常系
    public function test_no_existed_path_post_fail(): void
    {
        $response = $this->post('/api/unknown');
        $response->assertStatus(404); // 404 page
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

    // public function test_push_post_null_params_fail(): void
    // {
    //     $response = $this->post('/api/unknown');
    //     $response->assertStatus(404);
    // }
}
