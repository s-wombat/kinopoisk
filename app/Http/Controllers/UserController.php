<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    CONST SUPER_EMAIL = 'superadmin@example.com';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', [
            'users' => $users,
            'superEmail' => self::SUPER_EMAIL
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->getRoles();
        return view('users.create', [
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => $validated['role']
        ]);
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('users.user', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = $this->getRoles();

        $user = User::find($id);

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'name' => ['sometimes', 'max:255'],
            'email' => ['sometimes', 'email'],
            'password' => ['sometimes',  Password::min(3)->sometimes()],
            'role' => ['required', 'integer'],
        ]);
        $user = User::find($id);
        $user->name = $validator['name'];
        $user->email = $validator['email'];
        if(isset($validator['password'])) {
            $user->password = Hash::make($validator['password']);
        }
        $user->role_id = $validator['role'];
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }

    private function getRoles(): array
    {
        $rolesCollection = Role::all()->map(function ($item, $key){
            return [$item->id => $item->name];
        })->all();
        $intermediateArr=array_merge(...$rolesCollection);
        return array_combine(range(1, count($intermediateArr)), $intermediateArr);
    }

    public function subscribeToNews(string $id)
    {
        $user = User::find($id);
        $user->subscribe = true;
        $user->save();
        return redirect()->back();
    }
    public function unSubscribeToNews(string $id)
    {
        $user = User::find($id);
        $user->subscribe = false;
        $user->save();
        return redirect()->back();
    }
}
