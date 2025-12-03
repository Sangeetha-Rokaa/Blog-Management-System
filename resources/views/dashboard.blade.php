{{-- ============================================ --}}
{{-- ENHANCED DASHBOARD VIEW --}}
{{-- resources/views/posts/index.blade.php --}}
{{-- ============================================ --}}

@extends('layouts.app')

@section('content')
<div class="bg-particles">
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
</div>

<div class="container" style="max-width: 1400px; position: relative; z-index: 1;">
    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Header Card --}}
    <div class="card mb-4">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="mb-3 mb-md-0">
                    <h1 class="mb-2 fw-bold" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-size: 2.5rem;">
                        <i class="fas fa-blog me-2"></i>Blog Dashboard
                    </h1>
                
                </div>
                <div>
                   
                        <i class="fas fa-folder-open me-2"></i>My Applications
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Submit Blog Application Form --}}
    <div class="card mb-4">
        <div class="card-header">
            <h4 class="text-white mb-0">
                <i class="fas fa-paper-plane me-2"></i>Submit Blog Application
            </h4>
            <div class="subtitle">Share your story with the world - Submit for admin approval</div>
        </div>
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-heading"></i>
                        Blog Title
                    </label>
                    <div class="input-group">
                        <input type="text" name="title" placeholder="Enter an engaging title..." 
                               class="form-control @error('title') is-invalid @enderror" 
                               value="{{ old('title') }}" required>
                        <i class="input-icon fas fa-pen"></i>
                    </div>
                    @error('title')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-layer-group"></i>
                        Category
                    </label>
                    <div class="input-group">
                        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                            <option value="">Select category</option>
                            <option value="Entertainment" {{ old('category_id') == 'Entertainment' ? 'selected' : '' }}>Entertainment</option>
                            <option value="Science" {{ old('category_id') == 'Science' ? 'selected' : '' }}>Science</option>
                            <option value="Research" {{ old('category_id') == 'Research' ? 'selected' : '' }}>Research</option>
                            <option value="Food" {{ old('category_id') == 'Food' ? 'selected' : '' }}>Food</option>
                            <option value="Adventure" {{ old('category_id') == 'Adventure' ? 'selected' : '' }}>Adventure</option>
                            <option value="Educational" {{ old('category_id') == 'Educational' ? 'selected' : '' }}>Educational</option>
                        </select>
                        <i class="input-icon fas fa-list"></i>
                    </div>
                    @error('category_id')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-align-left"></i>
                        Content
                    </label>
                    <div class="input-group">
                        <textarea name="body" placeholder="Write your amazing story here..." 
                                  rows="6" class="form-control @error('body') is-invalid @enderror" 
                                  required>{{ old('body') }}</textarea>
                    </div>
                    @error('body')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-paperclip"></i>
                        Attachment (Optional)
                    </label>
                    <div class="input-group">
                        <input type="file" name="attachment" 
                               class="form-control @error('attachment') is-invalid @enderror"
                               accept="image/*,.pdf,.doc,.docx">
                    </div>
                    <small class="text-muted">
                        <i class="fas fa-info-circle me-1"></i>
                        Accepted formats: Images, PDF, DOC, DOCX (Max: 10MB)
                    </small>
                    @error('attachment')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-register text-white w-100">
                    <i class="fas fa-paper-plane me-2"></i>
                    Submit Application
                    <div class="spinner"></div>
                </button>
            </form>
        </div>
    </div>

    {{-- Filter Section --}}
    <div class="card mb-4">
        <div class="card-body p-4">
            <form method="GET" action="{{ route('posts.index') }}" id="filterForm">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text bg-white">
                                <i class="fas fa-search text-primary"></i>
                            </span>
                            <input type="text" name="search" class="form-control" 
                                   placeholder="Search blogs..." 
                                   value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select name="category" class="form-control" 
                                onchange="document.getElementById('filterForm').submit()">
                            <option value="all">All Categories</option>
                            <option value="Entertainment" {{ request('category') == 'Entertainment' ? 'selected' : '' }}>Entertainment</option>
                            <option value="Science" {{ request('category') == 'Science' ? 'selected' : '' }}>Science</option>
                            <option value="Research" {{ request('category') == 'Research' ? 'selected' : '' }}>Research</option>
                            <option value="Food" {{ request('category') == 'Food' ? 'selected' : '' }}>Food</option>
                            <option value="Adventure" {{ request('category') == 'Adventure' ? 'selected' : '' }}>Adventure</option>
                            <option value="Educational" {{ request('category') == 'Educational' ? 'selected' : '' }}>Educational</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-gradient w-100">
                            <i class="fas fa-filter me-1"></i> Filter
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- All Approved Blogs Section --}}
    <div class="card mb-4">
        <div class="card-header">
            <h4 class="text-white mb-0">
                <i class="fas fa-book-open me-2"></i>Published Blogs
            </h4>
            <div class="subtitle">Explore amazing stories from our community</div>
        </div>
    </div>
$blogs = Blog::where('is_published',1)->get();
return view('user.index', compact('blogs'));

    {{-- Blog Posts Grid --}}
    @if($posts->count() > 0)
        <div class="row g-4 mb-5">
            @foreach($posts as $index => $post)
                <div class="col-md-4" style="animation-delay: {{ $index * 0.1 }}s">
                    <div class="post-card">
                        {{-- Post Image --}}
                        @if($post->attachment)
                            @php
                                $extension = pathinfo($post->attachment, PATHINFO_EXTENSION);
                                $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                            @endphp
                            
                            @if($isImage)
                                <div class="post-image-wrapper mb-3">
                                    <img src="{{ asset('storage/' . $post->attachment) }}" 
                                         alt="{{ $post->title }}" 
                                         class="post-image">
                                </div>
                            @else
                                <div class="post-attachment-badge mb-3">
                                    <i class="fas fa-file-alt fa-3x text-primary"></i>
                                    <p class="small text-muted mt-2 mb-0">
                                        <i class="fas fa-paperclip me-1"></i>Attachment Available
                                    </p>
                                </div>
                            @endif
                        @endif

                        {{-- Post Header --}}
                        <div class="mb-3">
                            <h5 class="fw-bold mb-2 text-dark">
                                {{ Str::limit($post->title, 60) }}
                            </h5>
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="badge bg-gradient text-white">
                                    <i class="fas fa-tag me-1"></i>{{ $post->category ?? 'Uncategorized' }}
                                </span>
                                @if($post->status)
                                    <span class="badge status-{{ $post->status }}">
                                        <i class="fas fa-{{ $post->status == 'approved' ? 'check-circle' : ($post->status == 'pending' ? 'clock' : 'times-circle') }} me-1"></i>
                                        {{ ucfirst($post->status) }}
                                    </span>
                                @endif
                            </div>
                            <p class="text-muted small mb-0">
                                <i class="fas fa-user me-1"></i>
                                @if(isset($post->user))
                                    {{ $post->user->name }}
                                @else
                                    Anonymous
                                @endif
                                <span class="mx-2">•</span>
                                <i class="fas fa-calendar me-1"></i>{{ $post->created_at->format('M d, Y') }}
                            </p>
                        </div>

                        {{-- Post Preview --}}
                        <p class="text-secondary mb-3" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.6;">
                            {{ Str::limit(strip_tags($post->body), 150) }}
                        </p>

                        {{-- Action Buttons --}}
                        <div class="d-flex gap-2">
                            <a href="{{ route('posts.show', $post) }}" 
                               class="btn btn-action btn-primary flex-fill">
                                <i class="fas fa-eye me-1"></i> View
                            </a>
                            
                            @if($post->attachment)
                                <a href="{{ route('posts.download', $post) }}" 
                                   class="btn btn-action btn-success flex-fill">
                                    <i class="fas fa-download me-1"></i> Download
                                </a>
                            @endif
                        </div>

                        {{-- Admin Actions (if admin and post is pending) --}}
                        @if(auth()->user()->is_admin && $post->status == 'pending')
                            <div class="d-flex gap-2 mt-3 pt-3 border-top">
                                <form action="{{ route('posts.updateStatus', $post) }}" method="POST" class="flex-fill">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="btn btn-success w-100 btn-action">
                                        <i class="fas fa-check me-1"></i> Approve
                                    </button>
                                </form>
                                <form action="{{ route('posts.updateStatus', $post) }}" method="POST" class="flex-fill">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="rejected">
                                    <button type="submit" class="btn btn-danger w-100 btn-action">
                                        <i class="fas fa-times me-1"></i> Reject
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="card">
            <div class="card-body text-center py-5">
                <i class="fas fa-inbox fa-4x mb-4" style="color: rgba(255, 255, 255, 0.3);"></i>
                <h3 class="text-white fw-bold mb-2">No Blogs Available Yet</h3>
                <p class="text-white-50 mb-4">Be the first to submit a blog application!</p>
                <a href="#" class="btn btn-gradient" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;">
                    <i class="fas fa-plus-circle me-2"></i>Submit Your First Blog
                </a>
            </div>
        </div>
    @endif
</div>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        min-height: 100vh;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        padding: 20px 0;
        position: relative;
        overflow-x: hidden;
    }

    .bg-particles {
        position: fixed;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 0;
        pointer-events: none;
        top: 0;
        left: 0;
    }

    .particle {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: float 15s infinite ease-in-out;
    }

    .particle:nth-child(1) { width: 80px; height: 80px; left: 10%; animation-delay: 0s; }
    .particle:nth-child(2) { width: 60px; height: 60px; left: 20%; animation-delay: 2s; }
    .particle:nth-child(3) { width: 100px; height: 100px; left: 35%; animation-delay: 4s; }
    .particle:nth-child(4) { width: 70px; height: 70px; left: 50%; animation-delay: 0s; }
    .particle:nth-child(5) { width: 90px; height: 90px; left: 65%; animation-delay: 3s; }
    .particle:nth-child(6) { width: 75px; height: 75px; left: 80%; animation-delay: 5s; }

    @keyframes float {
        0%, 100% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
        10% { opacity: 1; }
        90% { opacity: 1; }
        100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
    }

    .alert {
        animation: slideDown 0.5s ease-out;
        border: none;
        border-radius: 15px;
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.95) !important;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    @keyframes slideDown {
        from {
            transform: translateY(-100px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .card {
        border: none;
        border-radius: 25px;
        backdrop-filter: blur(20px);
        background: rgba(255, 255, 255, 0.95);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        animation: cardEntry 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
        overflow: hidden;
    }

    @keyframes cardEntry {
        from {
            transform: scale(0.8) translateY(50px);
            opacity: 0;
        }
        to {
            transform: scale(1) translateY(0);
            opacity: 1;
        }
    }

    .card-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        padding: 30px;
        position: relative;
        overflow: hidden;
    }

    .card-header::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        animation: shine 3s infinite;
    }

    @keyframes shine {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .card-header h4 {
        position: relative;
        z-index: 1;
        margin: 0;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .subtitle {
        position: relative;
        z-index: 1;
        font-size: 0.9rem;
        opacity: 0.9;
        margin-top: 5px;
        color: white;
    }

    .form-group {
        margin-bottom: 25px;
        animation: slideUp 0.6s ease-out both;
    }

    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.2s; }
    .form-group:nth-child(3) { animation-delay: 0.3s; }
    .form-group:nth-child(4) { animation-delay: 0.4s; }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-label i {
        color: #667eea;
    }

    .input-group {
        position: relative;
    }

    .form-control, .form-select {
        border: 2px solid #e0e0e0;
        border-radius: 12px;
        padding: 15px 50px 15px 20px;
        font-size: 1.05rem;
        transition: all 0.3s ease;
        background: #f8f9fa;
        width: 100%;
    }

    textarea.form-control {
        padding: 15px 20px;
        min-height: 150px;
        line-height: 1.6;
    }

    .form-control:focus, .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
        background: white;
        transform: translateY(-2px);
        outline: none;
    }

    .input-icon {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #667eea;
        pointer-events: none;
        transition: all 0.3s ease;
        z-index: 10;
        font-size: 1.1rem;
    }

    .form-control:focus ~ .input-icon {
        color: #764ba2;
        transform: translateY(-50%) scale(1.1);
    }

    .btn-register, .btn-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 12px;
        padding: 14px 30px;
        font-size: 1.1rem;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        color: white;
    }

    .btn-gradient {
        font-size: 1rem;
        padding: 10px 24px;
    }

    .btn-register::before, .btn-gradient::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s ease;
    }

    .btn-register:hover, .btn-gradient:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        color: white;
    }

    .btn-register:hover::before, .btn-gradient:hover::before {
        left: 100%;
    }

    .post-card {
        background: white;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        height: 100%;
        animation: slideUp 0.6s ease-out both;
    }

    .post-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }

    .post-image-wrapper {
        overflow: hidden;
        border-radius: 15px;
    }

    .post-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 15px;
        transition: transform 0.3s ease;
    }

    .post-card:hover .post-image {
        transform: scale(1.05);
    }

    .post-attachment-badge {
        text-align: center;
        padding: 30px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 15px;
    }

    .btn-action {
        border-radius: 10px;
        padding: 10px 20px;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
    }

    .btn-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 0.85rem;
    }

    .status-approved {
        background: #d4edda;
        color: #155724;
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 0.85rem;
    }

    .status-rejected {
        background: #f8d7da;
        color: #721c24;
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 0.85rem;
    }

    .badge.bg-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    }

    .spinner {
        display: none;
        width: 20px;
        height: 20px;
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-top-color: white;
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
        margin-left: 10px;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    .btn-register.loading .spinner {
        display: inline-block;
    }

    .input-group-text {
        border: 2px solid #e0e0e0;
        border-radius: 12px 0 0 12px;
        border-right: none;
    }

    .input-group .form-control {
        border-radius: 0 12px 12px 0;
        border-left: none;
    }

    .input-group .form-control:focus {
        border-left: 2px solid #667eea;
    }

    @media (max-width: 768px) {
        .card-body {
            padding: 30px 20px;
        }
        
        .card-header {
            padding: 25px 20px;
        }

        .post-card {
            padding: 20px;
        }
    }
</style>

<script>
    // Add loading spinner on form submit
    document.querySelector('form[action="{{ route('posts.store') }}"]')?.addEventListener('submit', function() {
        const btn = this.querySelector('.btn-register');
        btn.classList.add('loading');
        btn.disabled = true;
    });
</script>
@endsection