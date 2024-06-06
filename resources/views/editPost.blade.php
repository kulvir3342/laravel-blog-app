@extends('layout.main')


@section('content')

<div class="flex flex-col items-center justify-center">

<h2 class="text-2xl text-gray-600 font-bold mt-16">Edit Blog Post</h2>
    <form action="{{route('posts.update', $post->id)}}" method="POST" class="w-[70%] mt-10">
        @csrf
        @method('PUT')
        <div class="flex flex-col">
            <label for="title" class="text-xl font-medium text-gray-600">Blog Title</label>
            <input type="text" value="{{$post->title}}" class="border-2 w-full rounded-lg mt-3 h-10 pl-3 focus:outline-blue-600" name="title" id="title">
            @error('title')
            <span class="text-red-500 mt-1">
                {{$message}}
            </span>
            @enderror
        </div>

        <div class="mt-7">
            <label for="content" class="text-xl font-medium text-gray-600">Blog Content</label>
            <textarea name="content" id="content" class="w-full p-3 focus:outline-blue-600 h-44 border-2 rounded-lg mt-3">{{$post->content}}</textarea>
            @error('content')
            <span class="text-red-500 mt-1">
                {{$message}}
            </span>
            @enderror
        </div>


        <button type="submit" class="border-2 border-blue-700 mt-10 rounded-lg px-3 py-1 text-white bg-blue-500">Update</button>

    </form>
</div>
@endsection
