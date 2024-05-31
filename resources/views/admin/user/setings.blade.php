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
