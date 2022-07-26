@extends('layouts.app', ['title' => 'Modifier un témoignage'])

@section('header')
    @auth
        <header class="header">
            <div class="container">
                <ul class="header-content">
                    @component('partials.link-prev', ['link' => '/admin'])
                        Retour aux témoignages
                    @endcomponent
                    
                    @include('partials.logout')
                </ul>
            </div>
            
        </header>
    @endauth
@endsection

@section('content')
    @include('partials.msg-errors')

    @component('partials.form', [ 'testmonial' => $testmonial,  'form_type' => 'update', 'route' => 'admin.testmonial.update'])
        Edit Testmonial
    @endcomponent

@endsection