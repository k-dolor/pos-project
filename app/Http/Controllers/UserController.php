<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list()
    {
        // Fetch all users from the users table in the database
        $users = User::join('genders', 'users.gender_id', '=', 'genders.gender_id')
            ->orderBy('users.first_name', 'asc')
            ->paginate(10);

        $users = User::with('gender')->orderBy('user_id')->paginate();

        // Return to the user list module with the users value
        return view('user.list', compact('users'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $gender = $request->input('gender');

        $users = User::query()
            ->when($query, function ($q) use ($query) {
                return $q->where('first_name', 'LIKE', "%{$query}%")
                    ->orWhere('last_name', 'LIKE', "%{$query}%")
                    ->orWhere('username', 'LIKE', "%{$query}%")
                    ->orWhere('email_address', 'LIKE', "%{$query}%");
            })
            ->when($gender, function ($q) use ($gender) {
                return $q->whereHas('gender', function ($q) use ($gender) {
                    $q->where('gender', $gender);
                });
            })
            ->paginate(25);

        return view('user.list', compact('users'));
    }

    public function login()
    {
        return view('login.login');
    }

    public function processLogin(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'max:12'],
            'password' => ['required', 'max:15']
        ]);

        $user = User::where('username', $validated['username'])->first();

        if ($user && Hash::check($validated['password'], $user->password)) {
            auth()->login($user);
            $request->session()->regenerate();

            return redirect('/home');
        } else {
            return back()->with('message_success', 'Username or Password Invalid.');
        }
    }

    public function create()
    {
        $genders = Gender::all();
        $roles = Role::all();

        return view('user.create', ['genders' => $genders, 'roles' => $roles]);
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'first_name' => ['required'],
                'middle_name' => ['nullable'],
                'last_name' => ['required'],
                'suffix_name' => ['nullable'],
                'birth_date' => ['required', 'date'],
                'gender_id' => ['required'],
                'address' => ['required'],
                'contact_number' => ['required'],
                'email_address' => ['required', 'email', 'unique:users,email_address'],
                'role_id' => ['required'],
                'username' => ['required', 'unique:users,username'],
                'password' => ['required', 'min:8'],
                'confirm_password' => ['required_with:password', 'same:password'],
                'user_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ]);

            $validated['password'] = Hash::make($validated['password']);

            if ($request->hasFile('user_image')) {
                $fileNameWithExtension = $request->file('user_image')->getClientOriginalName();
                $filename = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
                $extension = $request->file('user_image')->getClientOriginalExtension();
                $filenameToStore = $filename . '_' . time() . '.' . $extension;
                $request->file('user_image')->storeAs('public/img/user', $filenameToStore);
                $validated['user_image'] = $filenameToStore; // Only store the file name
            } else {
                $validated['user_image'] = null; // Handle default in the view
            }

            User::create($validated);

            return redirect('/users')->with('message_success', 'User Successfully Saved!');
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);  // Ensure we get a valid user or fail
        $genders = Gender::all();
        $roles = Role::all();
        return view('user.edit', compact('user', 'genders', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'user_image' => 'nullable|mimes:jpeg,png,bmp,gif|max:4096',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'suffix_name' => 'nullable',
            'birth_date' => 'required|date',
            'gender_id' => 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'email_address' => 'required|email|unique:users,email_address,' . $user->user_id . ',user_id',
            'role_id' => 'required',
            'username' => 'required|unique:users,username,' . $user->user_id . ',user_id',
            'old_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|confirmed'
        ]);

        if (!empty($validated['old_password'])) {
            if (!Hash::check($validated['old_password'], $user->password)) {
                return back()->withErrors(['old_password' => 'The provided password does not match your current password.']);
            }

            $validated['password'] = Hash::make($validated['new_password']);
        }

        if ($request->hasFile('user_image')) {
            $fileNameWithExtension = $request->file('user_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('user_image')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            $request->file('user_image')->storeAs('public/img/user', $filenameToStore);
            $validated['user_image'] = $filenameToStore;
        }

        $user->update($validated);

        return redirect('/users')->with('message_success', 'User Successfully Updated.');
    }

    public function delete($id)
    {
        $user = User::find($id);
        return view('user.delete', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/users')->with('message_success', 'User Successfully deleted.');
    }

    public function show($id)
    {
        $user = User::find($id); //Select * FROM users WHERE user_id = id;

        return view('user.show', compact('user'));
    }

    public function logout()
    {
        return view('logout.logout');
    }

    public function processLogout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
