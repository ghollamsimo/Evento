<!-- CSS Ticket inspired by -->
<!-- https://dribbble.com/shots/2677752-Dribbble-invite-competition -->

<link rel="stylesheet" href="style/ticket.less">
@foreach($reservations as $re)
    <input type="hidden" value="{{$re->client->user->id}}">
<div class="ticket">
    <div class="stub">
        <div class="top">
            <span class="admit">{{$re->client->user->name}}</span>
            <span class="line"></span>
            <span class="num">
        Invitation
        <span>31415926</span>
      </span>
        </div>
        <div class="number">1</div>
        <div class="invite">
            Invite for you
        </div>
    </div>
    <div class="check">
        <div class="big ">
            {{$re->event->name}}
        </div>
        <div class="number">#1</div>
        <div class="info">
            <section>
                <div class="title">Date</div>
                <div>{{$re->event->date}}</div>
            </section>
            <section>
                <div class="title">Ctaegorie</div>
                <div>{{$re->event->categorie->name}}</div>
            </section>
            <section>
                <div class="title">Organizer Name</div>
                <div>{{$re->event->organizer->user->name}}</div>
            </section>
        </div>
    </div>
</div>
@endforeach
