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
                       <th>Nama</th>
                        <th>Fecebook</th>
                        <th> Instagram</th>
                        <th> Twiter</th>
                        <th>Email</th>
                        <th>No Telpon</th>
                        <th>Alamat</th>
                        <th>Copiy Right</th>
                        <th>Logo</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dat as $da)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $da->nama}}</td>
                        <td>{{ $da->fb}}</td>
                        <td>{{ $da->ig }}</td>
                        <td>{{ $da->twiter}}</td>
                        <td>{{ $da->email}}</td>
                        <td>{{ $da->tlp}}</td>
                        <td>{{ $da->alamat}}</td>
                        <td>{{ $da->cp}}</td>
                        <td>{{ $da->logo}}</td>
                        
                        <!-- <td><img src="{{ asset('foto/'.$da->foto) }}" width="50" height="50"></td> -->
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

                <form id="productForm" name="productForm" action="{{ route('webseting.store') }}" enctype="multipart/form-data" method="POST">
                   <div id="pesan-error" class="alert alert-danger"></div>
                @csrf
                   <input type="hidden" name="data_id" id="data_id" value="1">
                      <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label">Nama Desa</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control required" id="nama" name="nama"     required="">
                        </div>
                    </div>   
                    <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label">Fecebook</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control required" id="fb" name="fb"     required="">
                        </div>
                    </div>   
                    <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label">Instagram</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control required" id="ig" name="ig"      required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label">Twiter</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control required" id="twiter" name="twiter"      required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control required" id="email" name="email"      required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label">No Telpon</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control required" id="tlp" name="tlp"      required="">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label">Copyright</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control required" id="cp" name="cp"      required="">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="keterangan" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-12">
                            <textarea id="alamat" name="alamat" required=""  class="form-control"></textarea>
                           
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label">Logo</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control " id="foto" name="foto" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label"></label>
                        <div class="col-sm-12">
                        <div id="photos"></div>
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

          $('#keterangan').val(data.keterangan);
          $('#cp').val(data.cp);
          $('#fb').val(data.fb);
          $('#ig').val(data.ig);
          $('#twiter').val(data.twiter);
          $('#alamat').val(data.alamat);
          $('#email').val(data.email);
          $('#tlp').val(data.tlp);
          
          $('#data_id').val(data.id);
          $('#photos').html("<img src={{ URL::to('/') }}/foto/"+data.logo+"  width='100'>")
          $('#nama').val(data.nama);


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