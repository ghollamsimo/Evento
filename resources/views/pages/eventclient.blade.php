<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

@if(session('Error'))
    <p class="text-red-600">{{session('Error')}}</p>
@endif

<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16 relative">
    <div class="bg-cover bg-center text-center overflow-hidden"
         style="min-height: 400px;"
         title="Woman holding a mug">
        <img src="{{ url('storage/images/' . $event->image) }}" class="h-[400px] w-full">
    </div>
    <div class="max-w-3xl mx-auto">
        <div
            class="mt-3 bg-white rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">
            <div class="bg-white relative top-0 -mt-32 p-5 sm:p-10">
                <h1 href="#" class="text-gray-900 font-bold text-3xl mb-2">{{$event->name}}</h1>

                <p class="text-gray-700 gap-4 text-xs flex mt-2">Categorie :  <span class="font-bold">  {{$event->categorie->name}}</span>
                    <a
                        class="text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out"> Place Available:
                        {{$event->capacity}}
                    </a>
                </p>
                <a class="font-bold text-gray-700 text-xs flex justify-end">localisation :  {{$event->localisation}}</a>
                <a class="font-bold text-gray-700 text-xs flex justify-end">Place Available :  {{$event->capacity}}</a>
                <p class="text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out text-right">
                    {{$event->date}}
                </p>

                <h3 class="text-2xl font-bold my-5"> Description</h3>


                <blockquote class="border-l-4 text-base italic leading-8 my-5 p-5">
                    {{$event->description}}
                </blockquote>

            </div>
            <div class="mx-auto h-fit px-16 py-3 border-gray-600 border w-fit">
                <form method="post" action="{{ route('createreservation', ['event' => $event->id]) }}">
                    @csrf
                    <input type="hidden" name="client_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="status" >
                    <input type="hidden" name="event_id" value="{{$event->id}}">
                    <button class="text-base" type="submit">Reserve</button>
                </form>

            </div>
        </div>
    </div>
</div>
