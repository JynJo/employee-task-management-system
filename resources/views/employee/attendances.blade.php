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
        <button class='btn btn-success mb-4'>Check in</button>
        <table class="table table-hover table-striped">
            <thead >
                <th style='font-weight: normal !important;'>Day</th>
                <th style='font-weight: normal !important;'>Time In</th>
                <th style='font-weight: normal !important;'>Time Out</th>
                {{-- <th style='font-weight: normal !important;'>Expected Deadline</th> --}}
                {{-- <th style='font-weight: normal !important;'>Status</th> --}}
            </thead>    

            <tbody>
              {{--   @foreach ($tasks as  $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->start_time }}</td>
                    <td>{{ $task->end_time }}</td>
                    <td>
                        <span 
                            class='{{ 
                                ($task->status == 'incomplete') ? 'bg-danger rounded' 
                                : (($task->status == 'inprogress') ? 'bg-warning rounded' 
                                : 'bg-success rounded') 
                            }} 
                            mr-2 text-capitalize px-2'
                        >{{ $task->status }}</span>
                        <button
                            data-id='{{ $task->id }}'
                            type="button"
                            data-bs-toggle="modal" 
                            data-bs-target="#exampleModal"
                            class='update-btn btn btn-sm btn-success'>
                            <i class='fas fa-pen'></i>
                        </button>
                    </td>
                </tr>
                @endforeach --}}

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