@extends('layouts.master')

@section('content')



<br>
    
<div class="row">
<div class="col-lg-12">
    <div class="card-box">
        
        <button type="button" class="btn btn-outline-dark waves-effect waves-light width-md" id="createNewData">Tambah Data</button>
        <br><br>
        <div class="alert alert-primary" id="pesan-sukses" role="alert">
        
        </div>
        <div class="table-responsive">
            <table class="table mb-0 data-table" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>

    </div> 
</div>
</div>
        
<!-- modal -->
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
               
            </div>

            <div class="modal-body">

                <form id="productForm" name="productForm" class="form-horizontal">
                   <div id="pesan-error" class="alert alert-danger"></div>
                   
                   <input type="hidden" name="data_id" id="data_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control required" id="name" name="name" placeholder="Enter Name" value=""  minlength="2"  title="Nama Harus Diisi" required="">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">Role</label>
                        <div class="col-sm-12">
                            <select name="role" id="role" class="form-control">
                                <option value="admin">Administator</option>
                                <option value="pegawai">Pegawai</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                     </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script type="text/javascript">
    $('#pesan-error,#pesan-sukses').hide()
  $(function () {

     

      $.ajaxSetup({

          headers: {

              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

          }

    });

    

    var table = $('.data-table').DataTable({

        processing: true,

        serverSide: true,

        ajax: "{{ route('user.index') }}",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},

            {data: 'name', name: 'name'},
            {data: 'username', name: 'username'},
            {data: 'role', name: 'role'},
            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]

    });

     

    $('#createNewData').click(function () {

        $('#saveBtn').val("create-user");

        $('#data_id').val('');

        $('#productForm').trigger("reset");

        $('#modelHeading').html("Create New user");

        $('#ajaxModel').modal('show');

    });

    

    $('body').on('click', '.editData', function () {

      var data_id = $(this).data('id');

      $.get("{{ route('user.index') }}" +'/' + data_id +'/edit', function (data) {

          $('#modelHeading').html("Edit Product");

          $('#saveBtn').val("edit-user");

          $('#ajaxModel').modal('show');

          $('#data_id').val(data.id);

          $('#name').val(data.name);

          $('#email').val(data.email);

      })

   });

    

        if ($("#productForm").length > 0) {
            $("#productForm").validate({

                submitHandler: function(form) {

                    var actionType = $('#btn-save').val();
                    $('#btn-save').html('Sending..');

                           $.ajax({

                    data: $('#productForm').serialize(),

                    url: "{{ route('user.store') }}",

                    type: "POST",

                    dataType: 'json',

                    success: function (data) {

                


                        if(data.status == 'sukses'){
                        $('#ajaxModel').modal('hide');
                        $('#pesan-sukses').html(data.pesan).fadeIn().delay(10000).fadeOut()
                        $('#productForm').trigger("reset");
                        
                        table.draw();
                        
                        }else{
                        $('#pesan-error').html(data.pesan).show()
                        }

                    },

                    error: function (data) {

                        console.log('Error:', data);

                        $('#saveBtn').html('Save Changes');

                    }

                });


                }
            })
        }

    


    
    $('body').on('click', '.deleteData', function () {

     

        var data_id = $(this).data("id");

        confirm("Are You sure want to delete !");

      

        $.ajax({

            type: "DELETE",

            url: "{{ route('user.store') }}"+'/'+data_id,

            success: function (data) {
                $('#pesan-sukses').html(data.pesan).fadeIn().delay(10000).fadeOut()
                table.draw();

            },

            error: function (data) {

                console.log('Error:', data);

            }

        });

    });

     

  });

</script>

@endsection