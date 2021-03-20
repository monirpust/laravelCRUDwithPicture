<?php

namespace App\Http\Controllers;
use App\User;
use App\Phone;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('profiles.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function create()
    {
        return view('profiles.create');
    }

    public function store(Request $user)
    {

        $attributes = request()->validate([
            'name' => [
                'string',
                'required', '
                max:255'
            ],
            'image' => [
                'required',
                'file'
            ],

            'email' => [
                'string',
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user)]

        ]);

        $attributes['image'] = request('image')->store('images');

        $newUser = User::create($attributes);


        Phone::create([
            'user_id' => $newUser->id,
            'contact' => $user->contact,
        ]);

        Phone::create([
            'user_id' => $newUser->id,
            'contact' => $user->contactTwo,
        ]);


        return redirect()->route('index');
    }


    public function update(Request $user)
    {

        $attributes = request()->validate([
            'name' => [
                'string',
                'required',
                'max:255'
            ],
            'image' => [
                'required',
                'file'
            ],

            'email' => [
                'string',
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user)]

        ]);

        $attributes['image'] = request('image')->store('images');

        $user->update($attributes);

        return redirect()->route('show.user');

    }



}
