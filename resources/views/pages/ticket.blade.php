<div class="container">
    <div class="ticket mx-auto">
        <div class="check">
            <div class="big">
                {{ $event->id }}
            </div>
            <div class="number">#1</div>
            <div class="info">
                <section>
                    <div class="title">Date</div>
                    <div>{{ $event->date }}</div>
                </section>
                <section>
                    <div class="title">Category</div>
                    <div>{{ $event->category }}</div>
                </section>
                <section>
                    <div class="title">Location</div>
                    <div>{{ $event->location }}</div>
                </section>
            </div>
        </div>

        @foreach ($reservations as $reservation)
            <div class="stub">
                <div class="top">
                    <span class="admit">{{ $reservation->client->name }}</span>
                    <span class="line"></span>
                    <span class="num flex">
                    Created By
                    <span>{{ $event->organizer->name }}</span>
                </span>
                </div>
                <div class="number">{{ $reservation->id }}</div>
                <div class="invite">
                    Invite for you
                </div>
            </div>
        @endforeach
    </div>
</div>
