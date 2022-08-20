@extends('layouts.uniqueLayout')


@section('content')

<x-form-search-user :search="$search" :filterByCityId="$filterByCityId" :cityName="$cityName" />

@foreach ($users as $user)
<x-display-user :user="$user" />
@endforeach

@if($users->hasPages())
<div class=" d-flex justify-content-center">
    {{ $users->withQueryString()->links() }}
</div>
@endif

@endsection