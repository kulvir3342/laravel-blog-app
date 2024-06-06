@extends('layout.main')


@section('content')

<a href="{{route('posts.index')}}">
    <button class="absolute left-16 top-12 border-2 border-green-500 rounded-full px-3 py-1 text-gray-50 bg-green-600">🏠 Go To HomePage</button>
</a>

<div class="flex flex-col items-center justify-center">


<h2 class="text-2xl text-gray-600 font-bold mt-16">Create New Blog Post</h2>
    <form action="{{route('posts.store')}}" method="POST" class="w-[70%] mt-10">
        @csrf
        <div class="flex flex-col">
            <label for="title" class="text-xl font-medium text-gray-600">Blog Title</label>
            <input type="text" value="{{old('title')}}" class="border-2 w-full rounded-lg mt-3 h-10 pl-3 focus:outline-blue-600" name="title" id="title">
            @error('title')
            <span class="text-red-500 mt-1">
                {{$message}}
            </span>
            @enderror
        </div>

        <div class="mt-7">
            <label for="content" class="text-xl font-medium text-gray-600">Blog Content</label>
            <textarea name="content" id="content" class="w-full p-3 focus:outline-blue-600 h-44 border-2 rounded-lg mt-3">{{old('content')}}</textarea>
            @error('content')
            <span class="text-red-500 mt-1">
                {{$message}}
            </span>
            @enderror
        </div>


        <button type="submit" class="border-2 border-blue-700 mt-10 rounded-lg px-3 py-1 text-white bg-blue-500">Submit</button>

    </form>
</div>
@endsection
