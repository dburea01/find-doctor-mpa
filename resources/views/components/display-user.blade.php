<div class="row mb-3 border">
    {{ $user->id }}<br>
    {{ $user->full_name }}<br />
    {{ $user->jobs[0]->name }}<br />


    @foreach ($user->locations as $location)
    {{ $location->city->name }} ({{ $location->city->zip_code }}) -
    @endforeach
    <br>
    @foreach ($user->languages as $language)
    {{ $language->name}}
    @endforeach
</div>