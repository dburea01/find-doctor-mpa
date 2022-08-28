<ul class="nav nav-pills mb-3">

    @foreach ($locations as $location)
    <li class="nav-item">
        <a class="nav-link @if($location->id == $currentLocationId) active @endif" aria-current="page" @if($location->id
            !== $currentLocationId)
            href= "/users/{{$user->id}}?currentLocationId={{$location->id}}"
            @endif
            >

            {{ $location->name }} ({{ $location->city->name }} - {{ $location->city->zip_code }})




        </a>
    </li>
    @endforeach
</ul>