<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class PostTest extends TestCase
{

    /** @test */
    
    use RefreshDatabase;
    public function test_the_application_returns_a_successful_response(): void
    {
        $this->withoutExceptionHandling();

        $data = [
            "first_name"=> "Николай",
            "last_name"=> "Притыкин",
            "phone"=> "+79520057016",
            "email"=> "nikolay.pritykin@mail.ru",
            "education"=> "Среднее образование",
            "is_accept_data"=> "true",
            "scoring"=> "16",
        ];

        $res = $this->post(route('users.store'), $data);

        $this->assertDatabaseCount('users', 1);

        $user = User::first();

        $this->assertEquals($data['first_name'], $user->first_name);
        $this->assertEquals($data['last_name'], $user->last_name);
        $this->assertEquals($data['phone'], $user->phone);
        $this->assertEquals($data['email'], $user->email);
        $this->assertEquals($data['education'], $user->education);
        $this->assertEquals($data['is_accept_data'], $user->is_accept_data);
        $this->assertEquals($data['scoring'], $user->scoring);
    }
}
