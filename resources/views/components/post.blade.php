@props(['post'=>$post])

<a href="{{ route('user.posts',$post->user) }}" class="font-bold mr-2">{{ $post->user->name }}</a><span class="text-gray-600 text-sm ">{{ $post->created_at->diffForHumans() }}</span>

<p><a href="{{ route('posts.show',$post) }}">{{ $post->body }}</a></p>
@can('delete',$post)
    <form action="{{ route('posts.destroy',$post) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-500">Delete</button>
    </form>
@endcan
    
<div class="flex items-center">
    @auth
        @if (!$post->likedBy(auth()->user()))
        <form action="{{ route('posts.like',$post) }}" method="POST" class="mr-1">
            @csrf
            <button type="submit" class="text-blue-500">Like</button>
        </form>
        @else
        <form action="{{ route('posts.like',$post) }}" method="POST" class="mr-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Unlike</button>
        </form>
        @endif
    @endauth
    <span>{{ $post->likes->count() }} {{ Str::plural('like',$post->likes->count()) }}</span>
</div>