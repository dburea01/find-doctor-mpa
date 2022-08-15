@extends('layouts.uniqueLayout')


@section('content')

<x-form-search-user :search="$search" :city="$city" />

@foreach ($users as $user)
<div class="row">
    {{ $user->full_name }}
</div>

@endforeach

@if($users->hasPages())
<div class=" d-flex justify-content-center">
    {{ $users->withQueryString()->links() }}
</div>
@endif

@endsection