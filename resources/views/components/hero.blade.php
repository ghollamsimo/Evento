<link rel="stylesheet" href="/style/hero.css">

<section class=" relative overflow-hidden  sm:pb-16 lg:pb-20 xl:pb-24">
    <div class=" px-4 mx-auto relativea sm:px-6 lg:px-8 max-w-7xl">
        <div class=" grid items-center grid-cols-1 gap-y-12 lg:grid-cols-2 gap-x-16">
            <div class="">
                <h1 class="text-4xl font-bold font-serif sm:text-5xl lg:text-6xl  xl:text-7xl"><span class="text-[#9617bd]">Evento</span> <span class="word">World,Make New <span class="text-[#fff]">Freinds</span></span></h1>
                <p class="mt-4 text-lg font-normal text-gray-400 sm:mt-8">La société "Evento" ambitionne de développer une plateforme novatrice dédiée à la gestion et à la réservation des places d'événements. </p>

                <div class="relative mt-8 rounded-full sm:mt-12">
                    <form class="mt-0" action="{{ route('searchname') }}" method="get">
                        @csrf
                        <label class="mx-auto relative bg-white min-w-sm max-w-2xl flex flex-col md:flex-row items-center justify-center py-2 px-2 rounded-2xl gap-2 shadow-2xl " for="search-bar">
                            <input id="search-bar" name="search" placeholder="your keyword here" class="px-6 py-2 w-full rounded-md flex-1 border-0 bg-white">
                            <button type="submit" class=" w-full md:w-auto px-6 py-3 bg-[#9617bd]  text-white fill-white active:scale-95 duration-100 border will-change-transform overflow-hidden relative rounded-xl transition-all disabled:opacity-70">
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

                </div>

            </div>

            <div class="relative">
                <img src="/images/hero.png" class="rounded">
            </div>

        </div>
    </div>
    <div class="border-b border-gray-600 mx-auto w-[70rem]"></div>

</section>

