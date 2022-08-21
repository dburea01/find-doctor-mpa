<div class="row mb-3 p-3 border">

    <div class="col-2 text-center text-primary d-none d-sm-block">
        <i class="bi bi-person-circle" style="font-size: 5rem;"></i>
    </div>

    <div class=" col-10">
        <a href="/users/{{$user->id}}">
            <h4 class="text-primary">{{ $user->full_name }}</h4>
        </a>

        <x-display-jobs :jobs="$user->jobs" />
        <br />


        @foreach ($user->locations as $location)
        {{ $location->city->name }} ({{ $location->city->zip_code }}) -
        @endforeach
        <br>
        @foreach ($user->languages as $language)
        {{ $language->name}}
        @endforeach

    </div>
</div>