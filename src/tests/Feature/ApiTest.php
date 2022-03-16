<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    public function seUp(): void
    {
        parent::setUp();
        // $this->message = [
        //     'publisher_id' => 'publisher_id',
        //     'title' => 'title',
        //     'body' => 'body',
        // ];
    }

    // 異常系
    public function test_push_post_success(): void
    {
        // テスト用データ
        $message = [
            'publisher_id' => 'publisher_id',
            'title' => 'title',
            'body' => 'body',
        ];
        $response = $this->post('/api/push', $message);
        $response->assertStatus(200);
    }

    // 異常系
    public function test_push_post_fail(): void
    {
        // テスト用データ
        $message = [
            'publisher_id' => 'publisher_id',
            'title' => 'title',
            'body' => 'body',
            'unknown' => 'unknown',
        ];
        $response = $this->post('/api/hoge', $message);
        $response->assertStatus(404);
    }
}
