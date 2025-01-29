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
            <a href='{{ route('employee.create') }}' class='btn btn-primary'>Add Employee</a>
            <div class='table-responsive'>
                
            <table class="table table-hover table-striped">
                <thead >
                    <th style='font-weight: normal !important;'>ID</th>
                    <th style='font-weight: normal !important;'>Name</th>
                    <th style='font-weight: normal !important;'>Address</th>
                    <th style='font-weight: normal !important;'>Age</th>
                    <th style='font-weight: normal !important;'>Hired Date</th>
                    <th style='font-weight: normal !important;'>Department</th>
                    <th style='font-weight: normal !important;'>Job Title</th>
                    <th style='font-weight: normal !important;'>Image</th>
                    <th style='font-weight: normal !important;'>Email</th>
                    <th style='font-weight: normal !important;'>Action</th>
                </thead>    

                <tbody>
                    @foreach ($employees as  $employee)
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