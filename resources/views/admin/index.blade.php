@extends('layouts.app', ['title' => 'Liste des témoignages'])

@section('header')
    @auth
        <header class="header">
            <div class="container">
                <ul class="header-content">
                    @component('partials.link-prev', ['link' => '/'])
                        Home
                    @endcomponent
                    
                    @include('partials.logout')
                </ul>
            </div>
            
        </header>
    @endauth
@endsection

@section('content')
    @include('partials.notification')
    
    @include('admin.partials.listing')
@endsection