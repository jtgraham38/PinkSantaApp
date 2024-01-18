<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //validate user input
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', //'confirmed' checks if 'password_confirmation' matches 'password'
        ]);

        //create a user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        //log the user in
        auth()->login($user);

        //redirect to homepage
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // //validate user input
        // $this->validate($request, [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255',
        //     'role' => 'required|integer'
        // ]);

        // //attributes to fill
        // $fillable = ['name','email', 'role'];

        // //update product
        // $user = User::findOrFail($id);
        // $user->fill($request->only($fillable));

        

        // $user->save();

        // //flash message
        // session()->flash('message', 'Customer updated successfully!');

        // //redirect
        // return redirect('/admin?p=customers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }

    public function authenticate(Request $request): RedirectResponse
    {
        //validate input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        //compare input with stored creds, login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        //if failed, show errors
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        //log user out
        Auth::logout();
    
        //invalidate and regenerate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        //redirect
        return redirect('/');
    }
}
