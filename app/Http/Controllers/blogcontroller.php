<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\blog;
use Illuminate\Http\Request;

class blogcontroller extends Controller
{
       public function index()
    {
        // Fetch all blogs from the database, newest first
        $blogs = blog::latest()->get();
        return view('posts.index', compact('blogs'));
    }

    public function showform()
    {
        return view('registration');
    }


    public function registration(Request $request)
    {
       $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:225|unique:user',
            'password'=>'required|string|min:8|confirmed',
    
        ]);

           User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect()->route('admin')->with('success', 'Registration successful! You can now log in.');
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show(string $id)
    {
        //
    }

 
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

  
    public function destroy(string $id)
    {
        //
    }
}
