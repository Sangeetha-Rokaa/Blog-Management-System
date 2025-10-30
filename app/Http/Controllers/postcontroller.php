<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('category')->latest();
        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        if ($request->category) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }
        $posts = $query->paginate(10);
        $categories = Category::all();

        return view('posts.index', compact('posts', 'categories'));
    }

    public function dashboard()
    {
        $categories = Category::all();
        $posts = Post::latest()->get();
        return view('dashboard', compact('categories', 'posts'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'attachment' => 'nullable|file|max:10240',
        ]);

        if ($request->hasFile('attachment')) {
            $data['attachment'] = $request->file('attachment')->store('attachments', 'public');
        }

        $data['slug'] = Str::slug($data['title']) . '-' . time();
        Post::create($data);

        return redirect()->route('dashboard')->with('success', 'Post created successfully!');
    }

    public function show(Post $post)
    {
        $post->increment('views');
        return view('posts.show', compact('post'));
    }
}
