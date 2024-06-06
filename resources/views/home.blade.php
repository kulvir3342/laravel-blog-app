@extends('layout.main')

@section('content')

<div class="mt-5 relative">
    <h2 class="font-bold text-center text-3xl">All Blog Posts</h2>

    <div class="flex justify-center">
        @if (session('success'))
            <div class="flex flex-col items-center justify-center max-w-fit p-3 border rounded-md mt-10 h-12 bg-green-200">
                <h3 class="text-lg font-medium text-green-500">{{session('success')}}</h3>
            </div>
        @endif
    </div>

    <a href="{{route('posts.create')}}">
        <button class="absolute right-20 top-8 border-2 border-blue-800 rounded-full px-3 py-1 text-gray-50 bg-blue-600">Create Post</button>
    </a>

    <div>
        @if(Auth::check())

            <a href="{{route('user.logout')}}">
                <button class="absolute ml-10 top-4 border-2 border-blue-800 rounded-full px-3 py-1 text-gray-50 bg-blue-600">Logout</button>
            </a>
            <h3 class="absolute left-36 top-4 font-bold text-green-500 text-2xl">Welcome {{Auth::user()->name}}</h3>

        @else
            <div>
                <a href="{{route('user.registerPage')}}">
                    <button class="absolute left-20 top-4 border-2 border-blue-800 rounded-full px-3 py-1 text-gray-50 bg-blue-600">Register</button>
                </a>

                <a href="{{route('user.loginPage')}}">
                    <button class="absolute left-44 top-4 border-2 border-blue-800 rounded-full px-3 py-1 text-gray-50 bg-blue-600">Login</button>
                </a>
            </div>
        @endif
    </div>




    <div class="flex flex-col mt-10 gap-10 text-center mx-10">
        @forelse ($posts as $post)
            <div class="h-28 p-2 overflow-hidden">
                <a href="{{route('posts.show', $post->id)}}">
                <h3 class="font-bold text-2xl">{{$post->title}}</h3>
                </a>
                <p class="text-balance">{{$post->content}}</p>
            </div>
        @empty
            <h3 class="text-center mt-24 text-lg text-gray-500 italic">Currently There are no posts!!
                Click on create button to create your first blog post.
            </h3>
        @endforelse

    </div>

    <div class="my-10 mx-16">
        {{$posts->links()}}
    </div>

</div>


@endsection
