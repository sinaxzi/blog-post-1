@extends('layouts.app')

@section('content')
    <div class="flex justify-center p-6">
        <div class="w-8/12 p-6 bg-white rounded-lg">
            <form action="{{ route('posts') }}" method="POST" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 w-full rounded-lg border-2 p-4 @error('body')
                        border-red-500
                    @enderror" placeholder="post somthing!"></textarea>

                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white font-medium rounded px-4 py-2 ">Publish</button>
                </div>
            </form>

            @if($posts->count())
                @foreach ($posts as $post )
                    <x-post :post="$post"/>
                @endforeach

                {{ $posts->links() }}
            @else
            <p>there is no posts</p>
            @endif
        </div>
    </div>
@endsection