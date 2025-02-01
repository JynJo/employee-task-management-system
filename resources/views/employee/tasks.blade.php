@extends('layouts.app')

@section('content_header')
<h1>My Tasks</h1>
@stop

{{-- Content body: main page content --}}

@section('content_body')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action='{{ route('employee.tasks.update-status') }}' method='POST'>
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Progress</h5>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="task_id" id="task-id" value="">
                    <div>
                        <label>Task Title</label>
                        <input type="text" id="task-title" class='form-control' disabled>
                    </div>

                    <div>
                        <label>Task Description</label>
                        <input type="text" id="task-description" class='form-control' disabled>
                    </div>

                    <div>
                        <div>
                            <label>Start Time</label>
                            <input type="text" id="task-start-time" class='form-control' disabled>
                        </div>

                        <div>
                            <label>End Time</label>
                            <input type="text" id="task-end-time" class='form-control' disabled>
                        </div>
                    </div>

                    <div>
                        <label>Update Status</label>
                        <select class='form-control' name='status' id='task-status'>
                            <option selected disabled>Please Select</option>
                            <option value="incomplete">Incomplete</option>
                            <option value="inprogress">Inprogress</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

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
                        <span 
                            class='{{ 
                                ($task->status == 'incomplete') ? 'bg-danger rounded' 
                                : (($task->status == 'inprogress') ? 'bg-warning rounded' 
                                : 'bg-success rounded') 
                            }} 
                            mr-2 text-capitalize'
                        >{{ $task->status }}</span>
                        <button
                            data-id='{{ $task->id }}'
                            id='update-btn'
                            type="button"
                            data-bs-toggle="modal" 
                            data-bs-target="#exampleModal"
                            class='btn btn-sm btn-success'>
                            <i class='fas fa-pen'></i>
                        </button>
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

{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
@endpush

{{--  This script is for the modal to work --}}
@push('js')
    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            function fetchTask(id) {
                return new Promise(function(resolve, reject) {
                    $.ajax({
                        url: `/fetch-task/${id}`,
                        method: 'GET',
                        success: function(response) {
                            resolve(response);
                        },
                        error: function(xhr, status, error) {
                            reject(error)
                        }
                    })
                })

            }

            $("#update-btn").each(function() {
                $(this).on('click', async function() {
                    var id = $(this).data('id')

                    try {
                        const fetchedTask = await fetchTask(id);
                        $("#task-id").val(fetchedTask.id);
                        $("#task-title").val(fetchedTask.title);
                        $("#task-description").val(fetchedTask.description);
                        $("#task-start-time").val(fetchedTask.start_time);
                        $("#task-end-time").val(fetchedTask.end_time);
                        $("#task-end-time").val(fetchedTask.end_time);
                        $("#task-status").val(fetchedTask.status);
                    } catch(err) {
                        console.error(err)
                    }

                    /* Set values */



                })
            })

        })
    </script>

    
@endpush