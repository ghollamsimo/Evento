<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<link rel="stylesheet" href="/style/organizer.css">
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" />
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<ul class="grid grid-cols-1 xl:grid-cols-3 gap-y-10 gap-x-6 items-start p-8">

    @foreach($events as $event)


        <div class="bg-white rounded-lg shadow-lg overflow-hidden max-w-lg w-full">
            <a href="/event/{{$event->id}}">
                <img src="{{ url('storage/images/' . $event->image) }}" alt="Mountain" class="w-full h-64 object-cover">
            </a>
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">{{$event->name}}</h2>
                <p class="text-gray-700 leading-tight truncate mb-4">
                    {{$event->description}}
                </p>
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">

                        <form action="{{ route('accepterReservation', $event->id) }}" method="POST" >
                            @method('put')
                            @csrf
                            <input type="hidden" name="status" value="Booked">
                            <button  type="submit"  class="text-blue-500 hover:text-blue-700 mr-4">Accepter</button>
                        </form>



                        <span class="text-gray-800 font-semibold">
                            {{$event->client->user->name}}
                        </span>
                    </div>
                    <span class="text-gray-600">{{$event->client->user->email}}</span>
                </div>
            </div>
        </div>





    @endforeach
</ul>
