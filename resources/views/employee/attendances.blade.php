@extends('layouts.app')

@section('content_header')
<h1>Attendances</h1>
@stop

{{-- Content body: main page content --}}

@section('content_body')

@if(Session::has('success'))
    <div class='card bg-success'>
        <div class='card-body'>
            <h5>{{ Session::get('success') }}</h5>
        </div>
    </div>
@endif

<div class='card'>
   <div class='card-body'>
    <div class='table-responsive'>
        @if($already_checked_in && !$attendance->check_out)
            <form action='{{ route('employee.attendances.store') }}' method="POST">
                @csrf
                <button class='btn btn-success mb-4'>Check Out</button>
            </form>
        @elseif($already_checked_in && $attendance->check_out)
            <div class='m-2 mb-4'>
                <span class='bg-success p-2 rounded'>Attendance Completed</span>
            </div>
        @else
            <form action='{{ route('employee.attendances.store') }}' method="POST">
                @csrf
                <button class='btn btn-success mb-4'>Check in</button>
            </form>
        @endif

        <table class="table table-hover table-striped">
            <thead >
                <th style='font-weight: normal !important;'>Day</th>
                <th style='font-weight: normal !important;'>Check In</th>
                <th style='font-weight: normal !important;'>Check Out</th>
                {{-- <th style='font-weight: normal !important;'>Expected Deadline</th> --}}
                {{-- <th style='font-weight: normal !important;'>Status</th> --}}
            </thead>    

            <tbody>
                @foreach ($attendances as  $attendance)
                <tr>
                    <td>{{ $attendance->day }}</td>
                    <td>{{ $attendance->check_in }}</td>
                    <td>{{ $attendance->check_out }}</td>
                </tr>
                @endforeach

            </tbody>

        </table>
    </div>

</div> 
</div>
@stop

{{-- Push extra CSS --}}

@push('css')

{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
@endpush

{{--  This script is for the modal to work --}}
@push('js')

    
@endpush