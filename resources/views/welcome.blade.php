<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->

    </head>
    <body class="antialiased">
<x-navbar/>


<form action="{{ route('searchname') }}" method="POST">
    @csrf
    <label class="mx-auto mt-40 relative bg-white min-w-sm max-w-2xl flex flex-col md:flex-row items-center justify-center border py-2 px-2 rounded-2xl gap-2 shadow-2xl focus-within:border-gray-300" for="search-bar">
        <input id="search-bar" name="search" placeholder="your keyword here" class="px-6 py-2 w-full rounded-md flex-1 outline-none bg-white">
        <button type="submit" class="w-full md:w-auto px-6 py-3 bg-black border-black text-white fill-white active:scale-95 duration-100 border will-change-transform overflow-hidden relative rounded-xl transition-all disabled:opacity-70">
            <div class="relative">
                <div class="flex items-center justify-center h-3 w-3 absolute inset-1/2 -translate-x-1/2 -translate-y-1/2 transition-all">
                    <svg class="opacity-0 animate-spin w-full h-full" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
                <div class="flex items-center transition-all opacity-1 valid:">
                    <span class="text-sm font-semibold whitespace-nowrap truncate mx-auto">Search</span>
                </div>
            </div>
        </button>
    </label>
</form>


@if(isset($eventSearchResults))
    <div class="mt-4">
        <h2 class="text-lg font-semibold mb-2">Search Results:</h2>
        @if($eventSearchResults->isEmpty())
            <p>No results found.</p>
        @else
            <ul>
                @foreach($eventSearchResults as $event)
                    <li>{{ $event->name }}</li>
                @endforeach
            </ul>
            {{ $eventSearchResults->links() }}
        @endif
    </div>
@endif


    <div class="relative w-full  h-80 space-y-1 bg-white bg-opacity-20 bg-cover bg-center md:max-w-screen-lg">
        @foreach($events as $event)
        <img class="absolute h-80 w-full bg-center mx-auto object-cover" src="{{ url('storage/images/' . $event->image) }}" />
        <div class="text-white lg:w-1/2">
            <div class="bg-blue-600 bg-opacity-95 p-5 opacity-90 backdrop-blur-lg lg:p-12">
                <p class="mb-4 font-serif font-light">{{$event->date}}</p>
                <h2 class="font-serif text-4xl font-bold">{{$event->name}}</h2>
                <a href="reserver/{{$event->id}}" class="mt-6 inline-block rounded-xl border-2 px-10 py-3 font-semibold border-white hover:bg-white hover:text-blue-600"> Read Now </a>
            </div>
        </div>

        @endforeach
    </div>
<div class="pagination-links">
    {{$events->links()}}
</div>
    </body>
</html>
