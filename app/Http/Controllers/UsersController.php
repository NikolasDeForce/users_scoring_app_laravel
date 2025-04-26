<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        $users = User::all();

        return view("users.index", compact("users"));
    }

    public function create() {
        return view('users.create');
    }

    public function store() {
        $user = request()->validate([
            'first_name'=> 'string',
            'last_name'=> 'string',
            'phone'=> 'string',
            'email'=> 'string',
            'education'=> 'string',
            'is_accept_data'=> 'string',
        ]);

        //Считаем скоринг через функцию
        $score = User::scoring($user);

        User::create([
            "first_name"=> $user["first_name"],
            "last_name"=> $user["last_name"],
            "phone"=> $user["phone"],
            "email"=> $user["email"],
            "education"=> $user["education"],
            "is_accept_data"=> $user["is_accept_data"],
            "scoring"=> $score,
        ]);

        return redirect()->route('users.index');
    }

    public function show(User $user) {
        return view('users.show', compact('user'));
    }

    public function edit(User $user) {
        return view('users.edit', compact('user'));
    }

    public function update(User $user) {
        $user_update = request()->validate([
            'first_name'=> 'string',
            'last_name'=> 'string',
            'phone'=> 'string',
            'email'=> 'string',
            'education'=> 'string',
            'is_accept_data'=> 'string',
        ]);

        //Считаем скоринг через функцию
        $score = User::scoring($user_update);

        $user->update([
            "first_name"=> $user_update["first_name"],
            "last_name"=> $user_update["last_name"],
            "phone"=> $user_update["phone"],
            "email"=> $user_update["email"],
            "education"=> $user_update["education"],
            "is_accept_data"=> $user_update["is_accept_data"],
            "scoring"=> $score,
        ]);

        return redirect()->route('users.show', $user->id);
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('users.index');
    }
}

