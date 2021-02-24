@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <div class="relative flex flex-col items-top justify-center min-h-screen sm:items-center sm:pt-0 ">
        <h1 class="text-center font-semibold text-2xl text-blue-200">
            Welcome to the Contest!
        </h1>

        <p class="text-blue-200 mt-2">
            Please, enter your email address :
        </p>

        <form action="/contest" method="post" class="flex flex-col mt-4">
            @csrf
            <input class="rounded-lg" type="text" name="email">
            <button class="bg-gray-900 text-white mt-4 py-2 px-4 rounded-lg">Enter Contest</button>
        </form>
    </div>
@endsection