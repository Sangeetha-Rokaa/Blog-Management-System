@extends('layouts.app')
@section('content')
<article class="bg-white p-6 rounded shadow">
  <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
  <p class="text-sm text-gray-500">Category: {{ $post->category?->name }}</p>
  <div class="mt-4">{!! nl2br(e($post->body)) !!}</div>

  @if($post->attachment)
    <a href="{{ route('post.download',$post) }}" class="mt-3 inline-block bg-gray-200 px-3 py-1 rounded">Download</a>
  @endif

  <div class="mt-4 flex space-x-3">
    <button id="likeBtn">❤️ <span id="likeCount">{{ $post->likes->count() }}</span></button>
    <button id="shareBtn">🔗 Share</button>
  </div>

  <hr class="my-4">
  <h3 class="font-semibold mb-2">Comments</h3>
  <div id="comments">
    @foreach($post->comments as $c)
      <div><strong>{{ $c->username }}</strong>: {{ $c->body }}</div>
    @endforeach
  </div>

  <div class="mt-3">
    <input type="text" id="username" placeholder="Your name" class="border p-2 mb-2 w-full">
    <textarea id="body" placeholder="Your comment..." class="border p-2 w-full"></textarea>
    <button id="commentBtn" class="bg-blue-600 text-white px-4 py-1 rounded">Comment</button>
  </div>
</article>

@push('scripts')
<script>
document.getElementById('likeBtn').addEventListener('click', async () => {
  const res = await axios.post(`/post/{{ $post->id }}/like`);
  document.getElementById('likeCount').textContent = res.data.count;
});

document.getElementById('shareBtn').addEventListener('click', async () => {
  await axios.post(`/post/{{ $post->id }}/share`, {provider:'manual'});
  alert('Shared!');
});

document.getElementById('commentBtn').addEventListener('click', async () => {
  const username = document.getElementById('username').value;
  const body = document.getElementById('body').value;
  const res = await axios.post(`/post/{{ $post->id }}/comment`, { username, body });
  const div = document.createElement('div');
  div.innerHTML = `<strong>${res.data.comment.username}</strong>: ${res.data.comment.body}`;
  document.getElementById('comments').prepend(div);
  document.getElementById('username').value = '';
  document.getElementById('body').value = '';
});
</script>
@endpush
@endsection
@extends('layouts.app')

@section('title', 'All Blogs')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Example Blog Card -->
        <div class="bg-white p-4 rounded-lg shadow">
            <h3 class="font-semibold text-lg mb-2">My First Blog</h3>
            <p class="text-gray-600 mb-3">Short description of the blog post...</p>
            <div class="flex justify-between text-sm text-gray-500">
                <button class="hover:text-blue-600">👍 Like</button>
                <button class="hover:text-blue-600">💬 Comment</button>
                <button class="hover:text-blue-600">🔗 Share</button>
                <button class="hover:text-blue-600">⬇️ Download</button>
            </div>
        </div>
    </div>
@endsection

