<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Enums\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.index',[
            'users' => User::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.form',[
            'user' => (new User()),
            'roles'=> Role::cases()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'role' => ['required', Rule::in(Role::cases())]
    ]);

        $validated['password'] = bcrypt('password');


        User::create($validated);

        return redirect()->route('user.index')->with('success', 'User successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.form',[
            'user' => $user,
            'roles'=> Role::cases()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required'
        ]);

        $user->update($validated);

        return redirect()->route('user.index')->with('success', 'User successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User successfully deleted.');
    }

    public function shop(){
        {
            // Fetch products from the 'products' table in the 'drop_me' database
            $products = DB::connection('drop_me')
                ->table('users')
                ->where('role', '=',2 )
                ->get();

            // Return view with product data
            return view('pages.shops', ['products' => $products]);
        }
    }
}
