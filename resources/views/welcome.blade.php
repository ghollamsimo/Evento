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

    <div class="relative w-fit  h-80 space-y-1 bg-white bg-opacity-20 bg-cover bg-center md:max-w-screen-lg">
        @foreach($events as $event)
        <img class="absolute h-80 w-full bg-center mx-auto object-cover" src="{{ url('storage/images/' . $event->image) }}" />
        <div class="text-white lg:w-1/2">
            <div class="bg-blue-600 bg-opacity-95 p-5 opacity-90 backdrop-blur-lg lg:p-12">
                <p class="mb-4 font-serif font-light">{{$event->date}}</p>
                <h2 class="font-serif text-4xl font-bold">Leading the next generation of innovators</h2>
                <a href="reserver/{{$event->id}}" class="mt-6 inline-block rounded-xl border-2 px-10 py-3 font-semibold border-white hover:bg-white hover:text-blue-600"> Read Now </a>
            </div>
        </div>
        @endforeach
    </div>

    </body>
</html>
