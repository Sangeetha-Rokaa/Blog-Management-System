<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $adminEmail = 'Sangeetharoka41@gmail.com';
        $adminPassword = '123123123'; 

        if ($email === $adminEmail && $password === $adminPassword) {
            session(['is_admin' => true]);
            return redirect()->route('admin.dashboard');
        } else {
            return back()->withErrors(['msg' => 'Unauthorized! Only admin can log in.']);
        }
    }

  
    public function logout()
    {
        session()->forget('is_admin');
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $blogs = Blog::all();
        $users = User::all();
        return view('admin.dashboard', compact('blogs', 'users'));
    }

    public function publish($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->is_published = true;
        $blog->save();
        return back();
    }


    public function unpublish($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->is_published = false;
        $blog->save();
        return back();
    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return back();
    }

    public function hideBlog(Request $request, $id)
    {
        $userId = $request->input('user_id');
        DB::table('hidden_blog_user')->insert(['blog_id' => $id, 'user_id' => $userId]);
        return back();
    }

 
    public function unhideBlog(Request $request, $id)
    {
        $userId = $request->input('user_id');
        DB::table('hidden_blog_user')
            ->where('blog_id', $id)
            ->where('user_id', $userId)
            ->delete();
        return back();
    }

  
    public function giveAccess($id)
    {
        $user = User::findOrFail($id);
        $user->can_view = true;
        $user->save();
        return back();
    }

   
    public function revokeAccess($id)
    {
        $user = User::findOrFail($id);
        $user->can_view = false;
        $user->save();
        return back();
    }
}
