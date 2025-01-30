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
            <form action='{{ route('tasks.store') }}' method="POST">
                @csrf
                <div class='d-flex flex-column' style='gap: 12px'>
                    <input class='form-control' type="text" name="title" placeholder="Task Title">
                    <input class='form-control' type="text" name="description" placeholder="Task Description">
                    <div>
                        <label>Start Date</label>
                        <input class='form-control' type="date" name="start_time">
                    </div>

                    <div>
                        <label>Expected Deadline</label>
                        <input class='form-control' type="date" name="end_time">
                    </div>

                    <div>
                        <label>Assign Employee</label>
                        <select name='user_id' class='form-control'>
                            <option disabled selected>Please select</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>

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