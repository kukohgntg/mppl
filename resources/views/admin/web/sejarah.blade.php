@extends('layouts.master')

@section('content')

<br>
    
<div class="row">
<div class="col-lg-12">
    <div class="card-box">
    
        <div class="alert alert-primary" id="pesan-sukses" role="alert"></div>
        @if ($message = Session::get('sukses'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="table-responsive">
            <table class="table mb-0"  >
                <thead>
                    <tr>
                       <th>#</th>
                        <th>Sejarah Desa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dat as $da)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $da->sejarah}}</td>
                        <td>
                            <a href="javascript:void(0)" data-toggle="tooltip"  data-id="{{ $da->id}}" data-original-title="Edit" class="btn edit  editData"><i class="icon-pencil"></i></a>
                           
                        </td>
                    </tr>
                    @endforeach
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

                <form id="productForm" name="productForm" action="{{ route('sejarahs.store') }}" enctype="multipart/form-data" method="POST">
                   <div id="pesan-error" class="alert alert-danger"></div>
                @csrf
                   <input type="hidden" name="data_id" id="data_id" value="1">
    
                     <div class="form-group">
                        <label for="keterangan" class="col-sm-2 control-label">Sejarah</label>
                        <div class="col-sm-12">
                             <textarea id="ckeditor" name="sejarah" class="form-control" required></textarea>
                        </div>
                    </div>
               
<br>

                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary upload-image" id="saveBtn" value="create">Save changes
                     </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<img src="" alt="" > 
@endsection

@section('script')
<script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
 $(document).ready(function() {

   $('#example').DataTable();
    });

   
    $('#pesan-error,#pesan-sukses').hide()
  $(function () {

     

      $.ajaxSetup({

          headers: {

              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

          }

    });

    

 
     


    

    $('body').on('click', '.editData', function () {

      var data_id = $(this).data('id');

      $.get("{{ route('webseting.index') }}" +'/' + data_id +'/edit', function (data) {

          $('#modelHeading').html("Ubah data");

          $('#saveBtn').val("edit-webseting");

          $('#ajaxModel').modal('show');

          $('#ckeditor').val(data.sejarah);
          
          $('#data_id').val(data.id);


      })

   });

    

        if ($("#productForm").length > 0) {
            $("#productForm").validate({

                submitHandler: function(form) {
                    $(this).parents("form").ajaxForm(options);

                }
            })
        }

        var options = { 

        complete: function(response) 

        {

            if($.isEmptyObject(response.responseJSON.error)){
                $('#ajaxModel').modal('hide');
                $('#pesan-sukses').html(data.pesan).fadeIn().delay(10000).fadeOut()
                $('#productForm').trigger("reset");
                
                table.draw();
            }

        }

    };




    $('body').on('click', '.deleteData', function () {

     

        var data_id = $(this).data("id");

        confirm("Are You sure want to delete !");

      

        $.ajax({

            type: "DELETE",

            url: "{{ route('webseting.store') }}"+'/'+data_id,

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