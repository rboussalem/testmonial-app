@extends('layouts.app', ['title' => 'Page Home'])

@section('header')
    @auth
        <header class="header">
            <div class="container">
                <ul class="header-content">
                    @component('partials.link-prev', ['link' => '/admin'])
                        Dashboard
                    @endcomponent
                    
                    @include('partials.logout')
                </ul>
            </div>
        </header>
    @endauth
@endsection

@section('content')
    @include('partials.notification')
    
    @include('partials.msg-errors')
    
    @component('partials.form', ['form_type' => 'store', 'route' => 'guest.testmonial.store'])
        Add New Testmonial
    @endcomponent

    @include('guest.partials.listing')
@endsection