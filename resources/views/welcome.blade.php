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
    <body class="antialiased  bg-[#141420]">
<x-navbar/>
<x-hero/>

<form class="mt-0" action="{{ route('searchname') }}" method="get">
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



<div class="p-6">
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3">
        @foreach($events as $event)

        <div class="overflow-hidden rounded-2xl bg-gray-50">
            <div class="flex items-center h-[180px] overflow-hidden">
                <img src="{{ url('storage/images/' . $event->image) }}" alt="Hamburger" />
            </div>

            <div class="p-6">
                <div class="flex flex-col items-start justify-between sm:flex-row sm:items-center">
                    <div>
                        <p class="text-gray-400"> {{$event->localisation}}</p>
                        <h2 class="mt-2 text-lg font-semibold text-gray-800"> {{$event->name}}</h2>
                    </div>
                    <a href="reserver/{{$event->id}}" class="mt-2 inline-block rounded-full bg-green-600 p-3 text-sm font-medium text-white"> Reserver </a>
                </div>

                <hr class="mt-4 mb-4" />

                <div class="flex flex-wrap justify-between">
                    <p class="inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <span class="ml-2 text-gray-600"> {{$event->date}}</span>

                    </p>

                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="pagination-links">
        {{$events->links()}}
    </div>
</div>



    </body>
</html>
