<?php

namespace Tests\Feature\auth;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $data =                 [
            'name' => 'taichi',
            'email' => 'taichi+14@asaichi.co.jp',
            'password' => 'hogehoge'
        ];

        $user = factory(User::class)->create();
        $response = $this
            ->actingAs($user)
            ->json('POST',
                '/api/v1/auth/register',
                $data
            );
//        $response = $this
//            ->actingAs($user)
//            ->get('/api/v1/works');
        unset($data['password']);
        $response->assertStatus(200)
            ->assertJson($data);
    }
}
