@extends('layouts.app')

@section('content_header')
    <h1>Task Management</h1>
@stop

{{-- Content body: main page content --}}

@section('content_body')
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <form action='{{ route('employee.index') }}' method="GET">
                    @csrf
                    <h5>Search</h5>
                    <div class='d-flex flex-row' style='gap: 8px'>
                        <input name='search' class="form-control" type='text' placeholder="Search by employee name">
                        <button class='btn btn-success btn-sm'>Search</button>
                    </div>
                </form>

            </div>

        </div>
    </div>

     <div class='card'>
       <div class='card-body'>
            <a href='{{ route('employee.create') }}' class='mb-2 btn btn-primary'>Add Task</a>
            <div class='table-responsive'>
                
            <table class="table table-hover table-striped">
                <thead >
                    <th style='font-weight: normal !important;'>Task Title</th>
                    <th style='font-weight: normal !important;'>Task Description</th>
                    <th style='font-weight: normal !important;'>Assigned</th>
                    <th style='font-weight: normal !important;'>Start Date</th>
                    <th style='font-weight: normal !important;'>Deadline</th>
                    <th style='font-weight: normal !important;'>Progress</th>
                    <th style='font-weight: normal !important;'>Action</th>
                </thead>    

                <tbody>
                   {{--  @foreach ($employees as  $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->user->name }}</td>
                            <td>{{ $employee->address }}</td>
                            <td>{{ $employee->age }}</td>
                            <td>{{ $employee->hired_date }}</td>
                            <td>{{ $employee->department }}</td>
                            <td>{{ $employee->job_title }}</td>
                            <td><img src='https://placehold.co/100'/></td>
                            <td>{{ $employee->user->email }}</td>
                            <td>
                                <button class='btn btn-sm btn-primary'>View</button>
                                <button class='btn btn-sm btn-success'>Edit</button>
                                <button class='btn btn-sm btn-danger'>Delete</button>
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
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
@endpush