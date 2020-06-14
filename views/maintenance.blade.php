@extends('layouts.app')

@section('title', trans('messages.maintenance'))

@section('content')
<div class="home-background mb-4" style="background: url('{{ setting('background') ? image_url(setting('background')) : 'https://via.placeholder.com/2000x500' }}') no-repeat center / cover"></div>
    <div class="container content-parent">
        <h1 class="title-block page-title">{{ trans('messages.maintenance') }}</h1>

        <div class="content">
            <h1 style="text-align: center;">{!! setting('maintenance-message', 'The website is under maintenance') !!}</h1>
        </div>
    </div>
@endsection
