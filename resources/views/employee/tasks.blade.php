@extends('layouts.app')

@section('content_header')
<h1>My Tasks</h1>
@stop

{{-- Content body: main page content --}}

@section('content_body')



<div class="card">
    <div class="card-body">
        <div class="card-title">
            <form action='{{ route('tasks.index') }}' method="GET">
                @csrf
                <h5>Search</h5>
                <div class='d-flex flex-row' style='gap: 8px'>
                    <input name='search' class="form-control" type='text' placeholder="Search by task name">
                    <button class='btn btn-success btn-sm'>Search</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class='card'>
 <div class='card-body'>
    <div class='table-responsive'>

        <table class="table table-hover table-striped">
            <thead >
                <th style='font-weight: normal !important;'>Task Title</th>
                <th style='font-weight: normal !important;'>Task Description</th>
                <th style='font-weight: normal !important;'>Start Date</th>
                <th style='font-weight: normal !important;'>Expected Deadline</th>
                <th style='font-weight: normal !important;'>Status</th>
            </thead>    

            <tbody>
                    @foreach ($tasks as  $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->start_time }}</td>
                            <td>{{ $task->end_time }}</td>
                            <td>
                                <span class='text-danger mr-2'>Incomplete</span>
                                <button class='btn btn-sm btn-success'><i class='fas fa-pen'></i></button>
                            </td>
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
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    @endpush

    {{-- Push extra scripts --}}

    @push('js')
    @endpush