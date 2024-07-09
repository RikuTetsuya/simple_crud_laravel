@extends('layout.layout_admin')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Department</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ url('/simpan_department') }}">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Department</label>
                  <input type="text" name="nama_department" class="form-control" id="exampleInputEmail1" placeholder="Nama Department...">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Status Department</label>
                  <select name="status_department" class="form-control select2" id="exampleInputPassword1">
                    <option value="1">Aktif</option>
                    <option value="0">Non Aktif</option>
                  </select>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-success">Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection

