<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogoutApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        // テストユーザー作成
        $this->user = factory(User::class)->create();
    }

    /**
     * 認証済みユーザーログアウト
     * @test
     */
    public function shoudLogoutUser()
    {
        $response = $this->actingAs($this->user)
                         ->json('post', route('logout'));

        $response->assertStatus(200);
        $this->assertGuest();
    }
}
