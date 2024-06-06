@extends('layout.main')

@section('content')

<div class="relative flex flex-col mt-10 mx-16">

    <a href="{{route('posts.index')}}">
        <button class="absolute left-18  border-2 border-green-500 rounded-full px-3 py-1 text-gray-50 bg-green-600">🏠 Go To HomePage</button>
    </a>

    <a href="{{route('posts.edit', $post->id)}}">
        <button class="absolute right-48 top-2 border-2 border-blue-500 rounded-full px-3 py-1 text-gray-50 bg-blue-600">Edit Post</button>
    </a>


        <form action="{{route('posts.destroy', $post->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="absolute right-16 top-2 border-2 border-red-500 rounded-full px-3 py-1 text-gray-50 bg-red-600">Delete Post</button>
        </form>


    <article class="flex flex-col text-center text-wrap">
        <h2 class="font-bold text-center text-3xl">{{$post->title}}</h2>

        <p class="mt-10 text-start text-lg font-sans">{{$post->content}}</p>
    </article>


    <form action="{{route('post.comment', $post->id)}}" method="POST" class="mt-10">
@csrf
    <div>
        <h3  class="mt-3 mb-5 text-xl font-medium">Comments</h3>
        @error('comment')
        <span class="text-red-500">
            {{$message}}
        </span>
        @enderror
        <input type="text" placeholder="Add a comment..." class="w-full placeholder:italic placeholder:text-slate-500 placeholder:text-lg  text-lg outline-none border-b-2 text-gray-500" name="comment" id="comment">

        <button type="submit" class="border-2 border-blue-700 mt-3 rounded-lg px-3 py-1 text-white bg-blue-500">Add Comment</button>
    </div>

    </form>


    <div class="mt-7">
            @forelse($post->comment as $c)
                <p class="ml-5 text-lg mb-3">◌ {{$c->content}}</p>
            @empty
                <p class="text-center mt-7 mb-24 text-lg text-gray-500 italic">No Comments yet! Be the first one to comment...</p>
            @endforelse
    </div>

</div>

@endsection
