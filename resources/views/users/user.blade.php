@extends('layouts.uniqueLayout')


@section('content')


<h1 class="text-center text-primary">{{ $user->full_name }}</h1>
<h5 class="text-center text-primary">
    <x-display-jobs :jobs="$user->jobs" />
</h5>


@if (count($user->locations) > 1)
<x-tab-locations :user="$user" :currentLocationId="$currentLocationId" />
@endif

<div class="row">
    <div class="col">
        <x-card-location :locationId="$currentLocationId" />
    </div>
</div>





@endsection