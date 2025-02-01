@extends('layouts.app')

@section('content_header')
<h1>Task Management</h1>
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
    <a href='{{ route('tasks.create') }}' class='mb-2 btn btn-primary'>Add Task</a>
    <div class='table-responsive'>

        <table class="table table-hover table-striped">
            <thead >
                <th style='font-weight: normal !important;'>Task Title</th>
                <th style='font-weight: normal !important;'>Task Description</th>
                <th style='font-weight: normal !important;'>Assigned</th>
                <th style='font-weight: normal !important;'>Start Date</th>
                <th style='font-weight: normal !important;'>Deadline</th>
                <th style='font-weight: normal !important;'>Status</th>
                <th style='font-weight: normal !important;'>Action</th>
            </thead>    

            <tbody>
                    @foreach ($tasks as  $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->employee->user->name }}</td>
                            <td>{{ $task->start_time }}</td>
                            <td>{{ $task->end_time }}</td>
                            <td>
                                <span class='text-danger text-capitalize'>{{ $task->status }}</span>
                            </td>
                            <td class='d-grid gap-3'>
                                <button class='btn btn-sm btn-primary'><i class='fas fa-eye'></i></button>
                                <button class='btn btn-sm btn-success'><i class='fas fa-pen'></i></button>
                                <button class='btn btn-sm btn-danger'><i class='fas fa-trash'></i></button>
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