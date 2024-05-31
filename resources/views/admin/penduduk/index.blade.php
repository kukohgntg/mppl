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
               <button type="button" class="btn btn-outline-success waves-effect waves-light width-md" data-toggle="modal" data-target="#importExcel">   Import Excel </button> 
            </div>
        </div>


        <br><br>
        <div class="alert alert-primary" id="pesan-sukses" role="alert">
        
        </div>
        <div class="table-responsive">
            <table class="table mb-0 data-table" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>nik</th>
                        <th>jk</th>
                        <th>tempat lahir</th>
                        <th>tnaggal lahir</th>
                        <th>agama</th>
                        <th>pendidikan</th>
                        <th>pekerjaan</th>
                        <th>no kk</th>
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
<div class="modal fade bd-example-modal-xl" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
               
            </div>

            <div class="modal-body">

                <form id="productForm" name="productForm" class="form-horizontal">
                  <div class="row">
                      <div class="col-md-6">

                   <input type="hidden" name="data_id" id="data_id">

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nama_Lengkap</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control required" id="name" name="name"  minlength="2"  required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nik</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control required" id="nik" name="nik"  minlength="8" maxlength="8"  required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jenis_klamin</label>
                        <div class="col-sm-12">
                            <select name="jk" id="jk" class="form-control">
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">tempat_lahir</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control required" id="tempat_lahir" name="tempat_lahir"   required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">tanggal_lahir</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control required" id="tanggal_lahir" name="tanggal_lahir"   required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">agama</label>
                        <div class="col-sm-12">
                            <select name="agama" id="agama" class="form-control">
                                <option value="islam">islam</option>
                                <option value="kristen">kristen</option>
                                <option value="Budha">Budha</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Hindhu">Hindhu</option>
                                <option value="Konghucu">Konghucu</option>

     
                            </select>
                        </div>
                    </div>


                      </div>
                      <div class="col-md-6">

                  <div class="form-group">
                        <label class="col-sm-2 control-label">Pendidikan</label>
                        <div class="col-sm-12">
                            <select  id="pendidikan" name="pendidikan"  class="form-control">
                                <option value="SD/MI">SD/MI</option>
                                <option value="SMP/MTS">SMP/MTS</option>
                                <option value="SMA/SMK">SMA/SMK</option>
                                <option value="Perguruan Tinggi">Perguruan Tinggi</option>

                            </select>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="col-sm-2 control-label">Pekerjaan</label>
                        <div class="col-sm-12">
                            <select id="pekerjaan" name="pekerjaan"  class="form-control">
                             
                                <option value="Petani">Petani</option>
                                <option value="Buruh Tani">Buruh Tani</option>
                                <option value="Pegawai Sipil">Pegawai Sipil</option>
                                <option value=" Peternak"> Peternak</option>
                                <option value="Dokter Swasta">Dokter Swasta</option>
                                <option value="Pedagang Keliling">Pedagang Keliling</option>
                                <option value="TKI/TKW">TKI/TKW</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">no_kk</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control required" id="no_kk" name="no_kk"  minlength="8" maxlength="8"  required="">
                        </div>
                    </div>
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

<!-- Import Excel -->
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/ependuduk/import_excel" enctype="multipart/form-data">
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

        ajax: "{{ route('penduduk.index') }}",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},

            {data: 'nama_lengkap', name: 'nama_lengkap'},
            {data: 'nik', name: 'nik'},
            {data: 'jenis_klamin', name: 'jenis_klamin'},
            {data: 'tampat_lahir', name: 'tampat_lahir'},
            {data: 'tanggal_lahir', name: 'tanggal_lahir'},
            {data: 'agama', name: 'agama'},
            {data: 'pendidikan', name: 'pendidikan'},
            {data: 'pekerjaan', name: 'pekerjaan'},

            {data: 'no_kk', name: 'no_kk'},


            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]

    });

     

    $('#createNewData').click(function () {

        $('#saveBtn').val("create-product");

        $('#data_id').val('');

        $('#productForm').trigger("reset");

        $('#modelHeading').html("Tambah Data");

        $('#ajaxModel').modal('show');

    });

    

    $('body').on('click', '.editData', function () {

      var data_id = $(this).data('id');

      $.get("{{ route('penduduk.index') }}" +'/' + data_id +'/edit', function (data) {

          $('#modelHeading').html("Edit Data");

          $('#saveBtn').val("edit-penduduk");

          $('#ajaxModel').modal('show');

          $('#data_id').val(data.id);

          
          $('#name').val(data.nama_lengkap);

          $('#nik').val(data.nik);

          $('#jk').val(data.jenis_klamin);

          $('#tempat_lahir').val(data.tampat_lahir);

          $('#tanggal_lahir').val(data.tanggal_lahir);

          $('#agama').val(data.agama);

          $('#pendidikan').val(data.pendidikan);

          $('#pekerjaan').val(data.pekerjaan);

          $('#no_kk').val(data.no_kk);

      })

   });

    

        if ($("#productForm").length > 0) {
            $("#productForm").validate({

                submitHandler: function(form) {

                    var actionType = $('#btn-save').val();
                    $('#btn-save').html('Sending..');

                           $.ajax({

                    data: $('#productForm').serialize(),

                    url: "{{ route('penduduk.store') }}",

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

            url: "{{ route('penduduk.store') }}"+'/'+data_id,

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