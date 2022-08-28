<div class="row mb-3 p-3 border">

    <div class="col-2 text-center text-primary d-none d-sm-block">
        <i class="bi bi-person-circle" aria-hidden="true" style="font-size: 5rem;"></i>
    </div>

    <div class=" col-10">
        <a href="/users/{{$user->id}}?location={{ $user->locations[0]->id }}">
            <h4 class="text-primary">{{ $user->full_name }}</h4>
        </a>

        <x-display-jobs :jobs="$user->jobs" />
        <br />


        @foreach ($user->locations as $location)
        <a href="/users/{{ $user->id }}?currentLocationId={{ $location->id }}" class="me-1">
            <span class="badge text-bg-info">
                {{ $location->city->name }}
                ({{
                $location->city->zip_code
                }})</span>
        </a>
        @endforeach



        <br>
        @foreach ($user->languages as $language)
        {{ $language->name}}
        @endforeach

    </div>
</div>