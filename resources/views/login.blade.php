@extends('layout.main')

@section('content')

<a href="{{route('posts.index')}}">
    <button class="absolute left-16 top-12 border-2 border-green-500 rounded-full px-3 py-1 text-gray-50 bg-green-600">🏠 Go To HomePage</button>
</a>

<div class="flex flex-col items-center justify-center">


<h2 class="text-2xl text-gray-600 font-bold mt-16">User Login</h2>

{{-- @if($errors->any())
<ul>
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
</ul>
@endif --}}

<div class="flex justify-center">
    @if (session('failed'))
        <div class="flex flex-col items-center justify-center max-w-fit p-3 border rounded-md mt-10 h-12 bg-red-200">
            <h3 class="text-lg font-medium text-red-500">{{session('failed')}}</h3>
        </div>
    @endif
</div>

    <form action="{{route('user.login')}}" method="POST" class="w-[70%] mt-10">
        @csrf

        <div class="mt-7">
            <label for="email" class="text-xl font-medium text-gray-600">Email</label>
            <input type="email" value="{{old('email')}}" class="border-2 w-full rounded-lg mt-3 h-10 pl-3 focus:outline-blue-600" name="email" id="email">
            @error('email')
            <span class="text-red-500 mt-1">
                {{$message}}
            </span>
            @enderror
        </div>


        <div class="mt-7">
            <label for="password" class="text-xl font-medium text-gray-600">Password</label>
            <input type="password" class="border-2 w-full rounded-lg mt-3 h-10 pl-3 focus:outline-blue-600" name="password" id="password">
            @error('password')
            <span class="text-red-500 mt-1">
                {{$message}}
            </span>
            @enderror
        </div>

        <button type="submit" class="border-2 border-blue-700 mt-10 rounded-lg px-3 py-1 text-white bg-blue-500">Submit</button>

    </form>
</div>

@endsection
