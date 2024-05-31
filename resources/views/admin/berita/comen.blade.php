@extends('layouts.master')

@section('content')



<br>
    
<div class="row">
<div class="col-lg-12">
    <div class="card-box">
        
        
        <div class="table-responsive">
            <table class="table mb-0 data-table" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama </th>
                        <th>Komentar</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comen as $c)
                        <tr>
                            <td>{{$loop->iteration }}</td>
                            <td>{{ $c->name }}</td>
                            <td>{{ $c->komentar }}</td>
                            <td>{{ $c->email }}</td>
                            <td><a href="hdkomentar/{{ $c->id }}" class="btn btn-sm btn-outline-danger btn-rounded waves-effect waves-light ">Hapus</a>
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
@endsection

