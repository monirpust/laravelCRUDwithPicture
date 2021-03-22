<?php

namespace App\Http\Controllers;
use App\User;
use App\Phone;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    //showing all users
    public function index()
    {
        $users = User::all();

        return view('profiles.index', compact('users'));
    }

//view a signle user details
    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }

//viewing edit for of a single user
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('profiles.edit', compact('user'));
    }

//showing create form for user profile
    public function create()
    {
        return view('profiles.create');
    }

//persist created user in db
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
                Rule::unique('users')->ignore($user)


            ]

        ]);

        $validatedContact = request()->validate([
            'contact' => 'required|regex:/^(01)[3-9][0-9]{8}$/',
            'contactTwo' => 'nullable|regex:/^(01)[3-9][0-9]{8}$/'
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


// save edited user in db
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
                Rule::unique('users')->ignore($user)
            ]

        ]);

        $attributes['image'] = request('image')->store('images');

        User::updateOrCreate($attributes);

        return redirect()->route('index');

    }



}
