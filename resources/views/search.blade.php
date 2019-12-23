@extends('layouts.blank')

@section('content')
    <div class="flex flex-col m-auto justify-center items-center w-3/4">
        <h1 class="mb-24 font-hairline text-5xl tracking-widest">Sessions</h1>
        
        <div class="pt-4 pb-24">
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="flex px-8 py-4 items-center font-mono text-lg text-red-100 bg-red-700 shadow-lg">
                        <span class="flex h-8 w-8 mr-4 justify-center font-bold text-red-700 text-2xl bg-red-100 rounded-full shadow">
                            <span class="mr-px">!</span>
                        </span>
                        <div>{!! $error !!}</div>
                    </div>
                @endforeach
            
            @endif
        </div>
        
        <div class="flex w-full">
            <form class="flex flex-grow" action="{{ route('sessions.search') }}">
                <input class="trans-fast flex-grow
                    h-16 px-8 py-4
                    font-mono text-lg
                    text-grey-600 focus:text-grey-700 placeholder-grey-600 focus:placeholder-grey-700 bg-grey-800 focus:bg-grey-400
                    outline-none shadow focus:shadow-lg" autocomplete="off" name="id" placeholder="Digite sua SteamID (ex: STEAM_0:1:36509127, [U:1:73018255], 76561198033283983)" type="text">
                <button class="trans-fast
                    h-16 w-16
                    font-mono text-lg
                    text-blue-100 hover:text-white
                    bg-green-800 hover:bg-green-700 hover:shadow" type="submit">Go
                </button>
            </form>
            <a href="{{ route('sessions.random') }}" class="trans-fast flex items-center justify-center
                    h-16 w-32
                    font-mono text-lg
                    text-blue-100 hover:text-white
                    no-underline
                    bg-blue-800 hover:bg-blue-700 hover:shadow">Random</a>
        </div>
    </div>
@endsection