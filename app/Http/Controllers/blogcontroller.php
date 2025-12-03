<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class blogcontroller extends Controller
{
    public function index()
    {
        // Fetch all blogs from the database, newest first
        $blogs = blog::latest()->get();
        return view('posts.index', compact('blogs'));
    }
    public function publish($id){
    $blog = Blog::find($id);
    if(!$blog) return back()->with('error','Blog not found');

    $blog->is_published = 1;
    $blog->save();

    return back()->with('success','Blog Published');
}

public function unpublish($id){
    $blog = Blog::find($id);
    if(!$blog) return back()->with('error','Blog not found');

    $blog->is_published = 0;
    $blog->save();

    return back()->with('success','Blog Unpublished');
}

public function delete($id){
    $blog = Blog::find($id);
    if(!$blog) return back()->with('error','Blog not found');

    $blog->delete();

    return back()->with('success','Blog Deleted');
}


    public function showform()
    {
        return view('registration');
    }

    public function registration(Request $request)
    {
        // Validate the registration data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        // Redirect to login page with success message
        return redirect()->route('login')->with('success', 'Registration successful! Please login to continue.');
    }

    public function login(Request $request)
    {
        // Validate login credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->has('remember'))) {
            // Regenerate session to prevent fixation
            $request->session()->regenerate();
            
            // Login successful - redirect to dashboard
            return redirect()->intended(route('dashboard'))
                ->with('success', 'Welcome back, ' . Auth::user()->name . '!');
        }

        // Login failed - redirect back with error
        return back()
            ->withErrors(['email' => 'The provided credentials do not match our records.'])
            ->withInput($request->only('email'));
    }

    public function showLogin()
    {
        // Redirect to dashboard if already logged in
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        
        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log out the user
        
        // Invalidate the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login')->with('success', 'You have been logged out successfully!');
    }

    public function store(Request $request)
    {
{
    $post = new Post();
    $post->title = $request->title;
    $post->category = $request->category_id;
    $post->body = $request->body;
    $post->user_id = auth()->id();
    $post->status = 'pending';     // User submission goes to admin review
    $post->is_published = 0;       // Not visible until admin approves

    if($request->hasFile('attachment')){
        $post->attachment = $request->file('attachment')->store('attachments','public');
    }

    $post->save();

    return back()->with('success', 'Blog sent for admin review!');
}

    }

    public function show(string $id)
    {
        // Show single blog post logic here
    }

    public function edit(string $id)
    {
        // Edit blog post logic here
    }

    public function update(Request $request, string $id)
    {
        // Update blog post logic here
    }

    public function destroy(string $id)
    {
        // Delete blog post logic here
    }
}
