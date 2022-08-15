@extends('layouts.uniqueLayout')

@section('title', 'accueil')

@section('content')



<div class="row">


    <div class="h-100 p-5 bg-light border rounded-3 mb-5 text-center">
        @auth
        <h2 class="mb-3 text-primary">@lang('home.welcome') {{ Auth::user()->name }}</h2>
        @endauth

        <p>@lang('home.p1')</p>
        <p>@lang('home.p2')</p>
        <p>@lang('home.p3')</p>

        @guest
        <div class="d-grid gap-2 col-md-6 mx-auto">
            <a href="/registration" class="btn btn-primary">@lang('home.i_create_my_account')</a>
            <a href="/login" class="btn btn-success">@lang('home.i_have_an_account')</a>
        </div>
        @endguest
    </div>

</div>

<x-form-search-user />
@endsection