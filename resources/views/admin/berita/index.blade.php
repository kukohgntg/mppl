@extends('layouts.master')

@section('content')



<br>
    
<div class="row">
<div class="col-lg-12">
    <div class="card-box">
        
        <button type="button" class="btn btn-outline-dark waves-effect waves-light width-md" id="createNewData">Tambah Data</button>
        <br><br>
        <div class="alert alert-primary" id="pesan-sukses" role="alert"></div>
        @if ($message = Session::get('sukses'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="table-responsive">
            <table class="table mb-0 data-table" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Keterangan</th>
                        <th>Penulis</th>
                        <th>Views</th>
                        <th>foto</th>
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

                <form id="productForm" name="productForm" action="{{ route('brita.store') }}" enctype="multipart/form-data" method="POST">
                   <div id="pesan-error" class="alert alert-danger"></div>
                @csrf
                   <input type="hidden" name="data_id" id="data_id">
                   <input type="hidden" name="penulis" id="penulis" value="{{ Auth::user()->name }}">

                    <div class="form-group">
                        <label for="judul" class="col-sm-2 control-label">judul</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control required" id="judul" name="judul" placeholder="Enter judul"   minlength="5"  title="Field Harus Diisi" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="col-sm-2 control-label">keterangan</label>
                        <div class="col-sm-12">
                            <textarea id="keterangan" name="keterangan" required="" placeholder="Enter juduls" class="form-control"></textarea>
                           
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label">foto</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control " id="foto" name="foto">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label"></label>
                        <div class="col-sm-12">
                        <div id="photos"></div>
                        </div>
                        
                    </div>
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

        ajax: "{{ route('brita.index') }}",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},

            {data: 'judul', name: 'judul'},
            {data: 'keterangan', name: 'keterangan'},
            {data: 'penulis', name: 'penulis'},
            {data: 'views', name: 'views'},
            {data: 'foto', name: 'foto', orderable: false, searchable: false},

            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]

    });

     

    $('#createNewData').click(function () {

        $('#saveBtn').val("create-data");

        $('#data_id').val('');

        $('#productForm').trigger("reset");

        $('#modelHeading').html("Buat Data Baru");

        $('#ajaxModel').modal('show');

    });

    

    $('body').on('click', '.editData', function () {

      var data_id = $(this).data('id');

      $.get("{{ route('brita.index') }}" +'/' + data_id +'/edit', function (data) {

          $('#modelHeading').html("Ubah data");
          $('#photos').html("<img src={{ URL::to('/') }}/foto/"+data.foto+"  width='100'>")
          $('#saveBtn').val("edit-brita");

          $('#ajaxModel').modal('show');

          $('#data_id').val(data.id);

          $('#judul').val(data.judul);

          $('#keterangan').val(data.keterangan);

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

            url: "{{ route('brita.store') }}"+'/'+data_id,

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