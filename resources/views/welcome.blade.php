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

<section class="mt-0 block text-white justify-center">
    <div class="category text-center text-[#9617bd] text-7xl">
        <h1 class="caregorie">Our Categories & Events</h1>
    </div>
    <div class="flex ">
        <form class="flex flex-wrap" action="{{ route('searchname') }}" method="GET">
            <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/6 mt-16">
                <button type="submit" name="categorie" value="All" class="border border-gray-600 px-7 rounded-md shadow-2xl py-2">All</button>
            </div>

            @foreach($categories as $category)
                <div class="flex md:w-1/2 lg:w-1/3 xl:w-1/6 mt-16">
                    <button type="submit" name="categorie" value="{{ $category->id }}" class="flex-auto border border-gray-600 px-7 rounded-md shadow-2xl py-2">{{ $category->name }}</button>
                </div>
            @endforeach

        </form>
    </div>
</section>

@if(isset($eventSearchResults))
    <div class="mt-4">
        <h2 class="text-lg font-semibold mb-2">Search Results:</h2>
        @if($eventSearchResults->isEmpty())
            <p>No results found.</p>
        @else
            <ul>
                @foreach($eventSearchResults as $event)
                    <div class="p-6">
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3">

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

                    </div>
            </ul>
            {{ $eventSearchResults->links() }}
        @endif
    </div>
@endif



<div class="p-6 py-20 ">
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3">
        @foreach($events as $event)

        <div class="overflow-hidden rounded-2xl bg-transparent border border-gray-600">
            <div class="flex items-center h-[180px] overflow-hidden">
                <img src="{{ url('storage/images/' . $event->image) }}" alt="Hamburger" />
            </div>

            <div class="p-6">
                <div class="flex flex-col items-start justify-between sm:flex-row sm:items-center">
                    <div>
                        <p class="text-gray-400"> {{$event->localisation}}</p>
                        <h2 class="mt-2 text-lg font-semibold text-gray-300"> {{$event->name}}</h2>
                    </div>
                    <a href="reserver/{{$event->id}}" class="mt-2 inline-block rounded-full bg-[#9617bd] p-3 text-sm font-medium text-white"> Reserver </a>
                </div>

                <hr class="mt-4 mb-4 border-gray-700" />

                <div class="flex flex-wrap justify-between">
                    <p class="inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-[#9617bd]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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
