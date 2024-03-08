<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>




<header id="header" class="  z-[100] w-full top-0 transition-all py-7">
    <div class="container mx-auto flex items-center justify-between px-5">
        <a href="#" class="logo"><img src="imgs/logo.svg" alt="..." /></a>
        <button onclick="classList.toggle('group'); document.querySelector('#ul').classList.toggle('max-[992px]:hidden')"
                @click="navbarOpen = !navbarOpen " id="navbarToggler" name="navbarToggler" aria-label="navbarToggler"
                class="min-[992px]:hidden order-last ml-5">
        <span
            class="w-8 h-[2px] block my-[5px] bg-white transition-all group-focus:bg-red-500 group-focus:rotate-[50deg] group-focus:translate-y-1"></span>
            <span class="w-8 h-[2px] block my-[5px] bg-white transition-all group-focus:hidden"></span>
            <span
                class="w-8 h-[2px] block my-[5px] bg-white transition-all group-focus:bg-red-500 group-focus:-rotate-[50deg] group-focus:-translate-y-[2px]"></span>
        </button>
        <nav class="">
            <ul id="ul"
                class="flex gap-7 max-[992px]:hidden max-[992px]:flex-col max-[992px]:bg-gray-800 max-[992px]:p-4 max-[992px]:rounded-md max-[992px]:w-52 max-[992px]:fixed max-[992px]:top-24 max-[992px]:right-9">
                <li class="font-bold cursor-pointer text-white transition">
                    <a href="#">Home</a>
                </li>
                <li class="text-zinc-400 font-bold cursor-pointer hover:text-white transition">
                    <a href="#">Explore</a>
                </li>
                <li class="text-zinc-400 font-bold cursor-pointer hover:text-white transition">
                    <a href="#">Community</a>
                </li>
                <li class="text-zinc-400 font-bold cursor-pointer hover:text-white transition">
                    <a href="#">Support</a>
                </li>
            </ul>
        </nav>
        <div class="flex items-center gap-4 flex-1 justify-end min-[991px]:flex-none">

            @if (Route::has('login'))
                <div class=" sm:top-0 sm:right-0 p-6 text-left z-10">
                    @auth

                        <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex text-sm rounded-full md:me-0" type="button">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="img/userprofile.jpg" alt="user photo">
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownAvatar" class="z-10 hidden divide-y divide-gray-100 bg-gray-800 rounded-lg shadow w-44 ">
                            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="font-medium truncate">{{ Auth::user()->email }}</div>
                            </div>
                            <div class="py-2">
                                <form method="post" action="{{route('logout')}}">
                                    @csrf
                                    <button class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</button>
                                </form>
                            </div>
                        </div>

                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</header>
