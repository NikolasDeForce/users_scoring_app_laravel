<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class PostTest extends TestCase
{

    /** @test */
    
    use RefreshDatabase;
    public function test_the_add_user_and_check(): void
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

    public function test_the_add_user_and_update() {
        $this->withoutExceptionHandling();

        $data = [
            "first_name"=> "Николай",
            "last_name"=> "Притыкин",
            "phone"=> "+79520057016",
            "email"=> "nikolay.pritykin@mail.ru",
            "education"=> "Среднее образование",
            "is_accept_data"=> "false",
            "scoring"=> "16",
        ];

        $res = $this->post(route("users.store"), $data);

        $this->assertDatabaseCount("users",1);

        $user= User::first();

        $new_data = [
            "first_name"=> "Евгений",
            "last_name"=> "Михалков",
            "phone"=> "+79833904567",
            "email"=> "evgen22@gmail.ru",
            "education"=> "Высшее образование",
            "is_accept_data"=> "true",
            "scoring"=> "28",
        ];

        $res = $this->patch(route("users.update", $user->id), $new_data);

        $user_updated = User::first();

        $this->assertNotEquals($user['first_name'], $user_updated['first_name']);
        $this->assertNotEquals($user['last_name'], $user_updated['last_name']);
        $this->assertNotEquals($user['phone'], $user_updated['phone']);
        $this->assertNotEquals($user['email'], $user_updated['email']);
        $this->assertNotEquals($user['education'], $user_updated['education']);
        $this->assertNotEquals($user['is_accept_data'], $user_updated['is_accept_data']);
        $this->assertNotEquals($user['scoring'], $user_updated['scoring']);
    }

    public function test_the_create_and_delete_user() {
        $this->withoutExceptionHandling();

        $data = [
            "id"=>1,
            "first_name"=> "Николай",
            "last_name"=> "Притыкин",
            "phone"=> "+79520057016",
            "email"=> "nikolay.pritykin@mail.ru",
            "education"=> "Среднее образование",
            "is_accept_data"=> "false",
            "scoring"=> "16",
        ];

        $res = $this->post(route("users.store"), $data);

        $this->assertDatabaseCount("users",1);

        $res = $this->delete(route("users.destroy", $data['id']), $data);

        $this->assertDatabaseCount("users",0);
    }
}
