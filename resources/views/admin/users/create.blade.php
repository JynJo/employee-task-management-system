@extends('layouts.app')

{{-- Customize layout sections --}}

{{-- @section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Welcome')
 --}}
@section('content_header')
    <h1>Employee Management</h1>

@stop

{{-- Content body: main page content --}}

@section('content_body')
     <div class='card'>
       <div class='card-body'>
            <form action='{{ route('employee.store') }}' method="POST">
                @csrf
                <div class='d-flex flex-column' style='gap: 12px'>
                    <input class='form-control' type="text" name="surname" placeholder="Surname Name">
                    <input class='form-control' type="text" name="middle_name" placeholder="Middle Name">
                    <input class='form-control' type="text" name="given_name" placeholder="Given Name">
                    <input class='form-control' type="email" name="email" placeholder="Email">
                    <input class='form-control' type="text" name="address" placeholder="Address">
                    <input class='form-control' type="number" name="age" placeholder="Age">

                    <div>
                        <label>Birthdate</label>
                        <input class='form-control' type="date" name="birthdate">
                    </div>

                    <div>
                        <label>Hired Date</label>
                        <input class='form-control' type="date" name="hired_date">
                    </div>

                    <input class='form-control' type="text" name="department" placeholder="Department">
                    <input class='form-control' type="text" name="job_title" placeholder="Job Title">

                    <button class='btn btn-primary'>
                        Submit
                    </button>

                </div>
            </form>

       </div> 
    </div>
@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
@endpush