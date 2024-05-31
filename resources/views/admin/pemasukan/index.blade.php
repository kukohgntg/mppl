@extends('layouts.master')

@section('content')



<br>
    
<div class="row">
<div class="col-lg-12">
    <div class="card-box">
                <!-- notifikasi -->
        {{-- notifikasi form validasi --}}
        @if ($errors->has('file'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('file') }}</strong>
        </span>
        @endif

        {{-- notifikasi sukses --}}
        @if ($sukses = Session::get('sukses'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $sukses }}</strong>
        </div>
        @endif

        <div class="row">
            <div class="col-md-9">
               <button type="button" class="btn btn-outline-dark waves-effect waves-light width-md ml-6" id="createNewData">Tambah Data</button>
            </div>
  
            <div class="col-md">
              <button type="button" class="btn btn-outline-danger waves-effect waves-light width-md" data-toggle="modal" data-target="#date"> Print </button>
               <button type="button" class="btn btn-outline-success waves-effect waves-light width-md" data-toggle="modal" data-target="#importExcel">   Import Excel </button> 
            </div>
        </div>



        <!-- tombol -->
        <br><br>
        <div class="alert alert-primary" id="pesan-sukses" role="alert">
        
        </div>
        <div class="table-responsive">
            <table class="table mb-0 data-table" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>keterangan</th>
                        <th>Jumlah</th>
                        <th>tanggal penambahan</th>
                        <th>sumber</th>
                        <th>petugas</th>
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


<!-- Modal -->
<div class="modal fade" id="date" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Tanggal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/cepemasukan/cetak_pdf" method="post" target="_blank">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-md-6">
            <div class="form-group mb-2">
                <label for="staticEmail2" class="sr-only">Start</label>
                <input type="date" class="form-control" name="start" >
            </div>
            </div>


            <div class="col-md-6">
            <div class="form-group mb-2">
                <label for="staticEmail2" class="sr-only">End</label>
                <input type="date" class="form-control" name="end" >
            </div>
            </div>
        </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button  target="_blank" type="submit" class="btn btn-primary">Export Pdf</button>
        </form>

        </div>
        </div>
    </div>
    </div>


<!-- Import Excel -->
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/epemasukan/import_excel" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}

                    <label>Pilih file excel</label>
                    <div class="form-group">
                        <input type="file" name="file" required="required">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </div>
        </form>
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
                   <input type="hidden" name="user" id="user" value="{{ Auth::user()->name }}">
                   <input type="hidden" name="data_id" id="data_id">
                    <div class="form-group">
                        <label for="jumlah" class="col-sm-2 control-label">jumlah</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control required" id="jumlah" name="jumlah" placeholder="masukan jumlah" value=""  minlength="2" required="">
                        </div>
                    </div>
                   <div class="form-group">
                        <label for="pk" class="col-sm-2 control-label">pemasukan_Kepada</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control required" id="pk" name="pk"  value=""  minlength="2" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pk" class="col-sm-2 control-label">Tanggal</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control required" id="tanggal" name="tanggal"   minlength="2" required="">
                        </div>
                    </div>
                      <div class="form-group">
                        <label for="keterangan" class="col-sm-2 control-label">keterangan</label>
                        <div class="col-sm-12">
                            <textarea id="keterangan" name="keterangan" required="" placeholder="Enter juduls" class="form-control"></textarea>
                           
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

        ajax: "{{ route('pemasukan.index') }}",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},

            {data: 'keterangan', name: 'keterangan'},
            {data: 'many', name: 'many', orderable: false, searchable: false},
            {data: 'tanggal', name: 'tanggal'},
            {data: 'sumber', name: 'sumber'},
            {data: 'user_id', name: 'user_id'},

            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]

    });

     

    $('#createNewData').click(function () {

        $('#saveBtn').val("create-product");

        $('#data_id').val('');

        $('#productForm').trigger("reset");

        $('#modelHeading').html("Create New Product");

        $('#ajaxModel').modal('show');

    });

    

    $('body').on('click', '.editData', function () {

      var data_id = $(this).data('id');

      $.get("{{ route('pemasukan.index') }}" +'/' + data_id +'/edit', function (data) {

          $('#modelHeading').html("Edit Product");

          $('#saveBtn').val("edit-pemasukan");
          $('#tanggal').val(data.tanggal);

          $('#ajaxModel').modal('show');

          $('#data_id').val(data.id);

          $('#jumlah').val(data.jumlah);
          $('#pk').val(data.sumber);

          $('#keterangan').val(data.keterangan);

      })

   });

    

        if ($("#productForm").length > 0) {
            $("#productForm").validate({

                submitHandler: function(form) {

                    var actionType = $('#btn-save').val();
                    $('#btn-save').html('Sending..');

                           $.ajax({

                    data: $('#productForm').serialize(),

                    url: "{{ route('pemasukan.store') }}",

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

            url: "{{ route('pemasukan.store') }}"+'/'+data_id,

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