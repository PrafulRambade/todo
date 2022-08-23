@extends('layout.main')

@section('content')
    <h1 class="text-center main_header">Todo App</h1>
    <div class="main_form_div">
        <ul id="save_msgList"></ul>
        <form id="todoForm" name="todoForm" class="form-horizontal">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="hidden" name="todo_id" id="todo_id">
                        <input type="text" class="form-control" id="title" autofocus="" name="title" placeholder="Enter Task Name" value="">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <textarea id="detail" name="detail" placeholder="Enter Task Details" class="form-control" rows="1"></textarea>
                    </div>
                </div>
                
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" id="add_todo" value="create">Create New
                    </button>
                </div>
            </div>
        </form>
    </div>
    <hr/>
    

    <ul class="nav nav-tabs" role="tablist">
        <li class="current"><a href="#alltodostab" class="all" role="tab" data-toggle="tab">All</a></li>
        <li><a href="#completedtab" class="completed" role="tab" data-toggle="tab">Completed</a></li>
        <li><a href="#pendintab" class="pending" role="tab" data-toggle="tab">Pending</a></li>
      </ul>
      
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane active" id="alltodostab">
            <table class="table table-bordered data-table-all" id="data-table-all1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Task Name</th>
                        <th>Task Details</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="pendintab">
            <table class="table table-bordered data-table data-table-pending" id="data-table-pending1">
                <thead>
                    <tr>
                        <th>NoD</th>
                        <th>Task Name</th>
                        <th>Task Details</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="completedtab">
            <table class="table table-bordered data-table-completed" >
                <thead>
                    <tr>
                        <th>Noc</th>
                        <th>Task Name</th>
                        <th>Task Details</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
</div>
 
{{-- Edit Modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit & Update TODO</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
            </div>

            <div class="modal-body">

                <ul id="update_msgList"></ul>

                <input type="hidden" id="todo_id1" />

                <div class="form-group mb-3">
                    <label for="">Task Name</label>
                    <input type="text" class="form-control" id="title1" name="title1" placeholder="Enter Title">
                </div>
                <div class="form-group mb-3">
                    <label for="">Task Details</label>
                    <textarea id="detail1" name="detail1" placeholder="Enter Details" class="form-control" rows="2"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close_modal" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="update_todo" class="btn btn-primary update_todo_new">Update</button>
            </div>

        </div>
    </div>
</div>
{{-- Edn- Edit Modal --}}

{{-- Delete Modal --}}
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete TODO Task</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
            </div>
            <div class="modal-body">
                <h5>Are you sure want to delete this task ?</h5>
                <input type="hidden" id="deleteing_todo_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close_modal" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary delete_todo">Yes Delete</button>
            </div>
        </div>
    </div>
</div>
{{-- End - Delete Modal --}}


{{-- Completed Task --}}
<div class="modal fade" id="CompletedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Complete TODO Task</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
            </div>
            <div class="modal-body">
                <h5>Are you sure want to completed this task ?</h5>
                <input type="hidden" id="completed_todo_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close_modal" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary completed_todo">Yes Complete</button>
            </div>
        </div>
    </div>
</div>
{{-- End - Completed Task --}}
@endsection
@section('scripts')
<script type="text/javascript">
$(document).ready(function(){

    $('ul li a').click(function() {
        $('ul li.current').removeClass('current');
        $(this).closest('li').addClass('current');
    });
  $(function () {
     
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    $("#title").focus();
    function autolod_page(){
        var table = $('.data-table-all').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,    
            ajax: "{{ route('ajaxtodos.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'title', name: 'title'},
                {data: 'detail', name: 'detail'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    }
    autolod_page();
    $(document).on('click', '.completed', function (e) {
            var table1 = $('.data-table-completed').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,    
            destroy: true,
            ajax: "{{ route('ajaxtodos.completed') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'title', name: 'title'},
                {data: 'detail', name: 'detail'},
                // {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        $("#title").focus();
    });
    $(document).on('click', '.all', function (e) {
        $("#title").focus();
    });
    $(document).on('click', '.pending', function (e) {
            var table2 = $('.data-table-pending').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,    
            destroy: true,
            ajax: "{{ route('ajaxtodos.pending') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'title', name: 'title'},
                {data: 'detail', name: 'detail'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        $("#title").focus();
    });

    // Add data save
    $(document).on('click', '#add_todo', function (e) {
        e.preventDefault();
        $(this).html('Sending..');

        var data = {
                'title': $('#title').val(),
                'detail': $('#detail').val(),
            }
        $.ajax({
          data: data,
          url: "{{ route('ajaxtodos.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
            if(data.status==200){
                $('#save_msgList').html("");
              $('#todoForm1').trigger("reset");
              $('#todoForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              $('#add_todo').html('Create New');
            //   table.draw();
            $('#data-table-all1').DataTable().clear().draw();
                        $('#data-table-pending1').DataTable().clear().draw();
            //   $('#data-table-all1').DataTable().ajax.reload();
            //   $('#data-table-pending1').DataTable().ajax.reload();
              $("#title").focus();
              
            }else{
                $('#save_msgList').html("");
                $('#save_msgList').addClass('alert alert-danger').show().delay(4000).fadeOut();
                $.each(data.errors, function (key, err_value) {
                    console.log(err_value);
                    $('#save_msgList').append('<li>' + err_value + '</li>');
                });
                console.log('Error:', data);
                $('#add_todo').html('Save Changes');
            //     $('#data-table-all1').DataTable().ajax.reload();
            //   $('#data-table-pending1').DataTable().ajax.reload();
            }
          }
      });
    });

    // Click On Edit Button
    $(document).on('click', '.edittodo', function (e) {
            e.preventDefault();
            var todo_id = $(this).data('id');
            $('#editModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/edit-todo/" + todo_id,
                success: function (response) {
                    console.log(response);
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').modal('hide');
                    } else {
                        $('#title1').val(response.todo.title);
                        $('#detail1').val(response.todo.detail);
                        $('#todo_id1').val(response.todo.id);
                        $('#update_todo').val("edit-user");
                    }
                }
            });
            $('.btn-close').find('input').val('');

        });

        // Update on modal
        $(document).on('click', '#update_todo', function (e) {
            e.preventDefault();
            var id = $('#todo_id1').val();
            var data = {
                'title': $('#title1').val(),
                'detail': $('#detail1').val(),
                'id': id,
            }
            $(this).text('Updating..');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "{{ route('ajaxtodos.update') }}",
                data: data,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 422) {
                        $('#update_msgList').html("");
                        $('#update_msgList').addClass('alert alert-danger').show().delay(4000).fadeOut();
                        $.each(response.errors, function (key, err_value) {
                            $('#update_msgList').append('<li>' + err_value +
                                '</li>');
                        });
                        $('.pending').trigger('click');
                        $('#update_todo').text('Update');
                        $("#title").focus();
                    } else {
                        $('#update_msgList').html("");

                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').find('input').val('');
                        $('#update_todo').text('Update');
                        $('#editModal').modal('hide');
                        $('#data-table-all1').DataTable().clear().draw();
                        $('#data-table-pending1').DataTable().clear().draw();


                        // $('#data-table-all1').DataTable().ajax.reload();
                        // $('#data-table-pending1').DataTable().ajax.reload();
                        
                        $("#title").focus();
                    }
                }
            });


        });

        // Delete modal open
        $(document).on('click', '.deletetodo', function () {
            var todo_id = $(this).data('id');
            $('#DeleteModal').modal('show');
            $('#deleteing_todo_id').val(todo_id);
        });

        // Deleting todo
        $(document).on('click', '.delete_todo', function (e) {
            e.preventDefault();

            $(this).text('Deleting..');
            var id = $('#deleteing_todo_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-todo/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.pending').trigger('click');
                        autolod_page();
                        $('.delete_todo').text('Yes Delete');
                    } else {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#data-table-all1').DataTable().clear().draw();
                        $('#data-table-pending1').DataTable().clear().draw();
                        $('.delete_todo').text('Yes Delete');
                        $('#DeleteModal').modal('hide');
                        $("#title").focus();
                        // table.draw();
                    }
                }
            });
        });
        $(document).on('click', '.close_modal , .btn-close', function (e) {
            // alert("Hii");
            $(this).closest('.modal').modal('toggle');
        });
        $(document).on('click', '.completetask_todo', function () {
            var todo_id = $(this).data('id');
            $('#CompletedModal').modal('show');
            $('#completed_todo_id').val(todo_id);
        });

        // Completed Task
        // Deleting todo
        $(document).on('click', '.completed_todo', function (e) {
            e.preventDefault();

            $(this).text('Completing..');
            var id = $('#completed_todo_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'GET',
                url: 'complete/'+id,
                dataType: 'json',
                success: function (response) {
                    if(response.status==200){
                        $('#data-table-all1').DataTable().ajax.reload();
                        // $('#data-table-pending1').DataTable().ajax.reload();
                        $('#CompletedModal').modal('hide');
                        $('.completed_todo').html('Yes Complete');
                        $('#data-table-all1').DataTable().clear().draw();
                        $('#data-table-pending1').DataTable().clear().draw();
                        $("#title").focus();
                        
                        }else{
                            $('#save_msgList').html("");
                            $('#save_msgList').addClass('alert alert-danger');
                            $('.completed_todo').html('Yes Complete');
                        }
                }
            });
        });


    });
  });
</script>
@endsection