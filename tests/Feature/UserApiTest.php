<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        // テストユーザー作成
        $this->user = factory(User::class)->create();
    }

    /**
     * ログイン中のユーザー返却
     * @test
     */
    public function shouldReturnLoggedinUser()
    {
        $response = $this->actingAs($this->user)->json('GET', route('user'));
        $response
            ->assertStatus(200)
            ->assertJson([
                'name' => $this->user->name,
            ]);
    }

    /**
     * 未ログイン時、空文字返却
     * @test
     */
    public function shouldReturnEmpty()
    {
        $response = $this->json('GET', route('user'));
        $response->assertStatus(200);
        $this->assertEquals("", $response->content());
    }
}
