@extends('layouts.app')

{{-- Customize layout sections --}}

{{-- @section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Welcome') --}}
@section('content_header')
    <h1>Dashboard</h1>
@stop
{{-- Content body: main page content --}}

@section('content_body')

    {{ auth()->user()->roles()->first()->name }}

@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
@endpush