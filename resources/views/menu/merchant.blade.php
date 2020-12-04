@extends('layouts.blank')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Merchant</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Merchant</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                
                {{-- form --}}
                <div class="col-sm-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Merchant</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                  <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <form id="merchantAdd" action="/merchant/add" method="post">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Nama Merchant</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Merchant">
                                </div>
                                </div>
                                  <div class="form-group row">
                                    <label for="s" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Alamat">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="a" class="col-sm-2 col-form-label">Hape / Telefon</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="no_telp" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomor">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="z" class="col-sm-2 col-form-label">Nama Pemilik</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="pemilik" class="form-control" id="exampleInputEmail1" placeholder="Nama Pemilik">
                                    </div>
                                  </div>
                                  
                                  
                                
                                <!-- /.card-body -->
                                <div class="form-group">
                                </div>
                                <center>
                                    <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary swalDefaultSuccess">Simpan</button>
                                    </div>
                                </center>
                              </form>
                        </div>
                    </div>
                    
                    <!-- /.card -->
                    <!-- /.card -->
                    
                </div>
                {{-- table --}}
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Merchant</h3>
                            <div class="card-tools">
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                      <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Merchant</th>
                                    <th>Alamat</th>
                                    <th>Hape</th>
                                    <th>Pemilik</th>
                                    <th>Opsi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;?>
                                        @foreach($merchant as $p)
                                    <?php $no++ ;?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $p->nama }}</td>  
                                        <td>{{ $p->alamat }}</td>  
                                        <td>{{ $p->no_telp }}</td>  
                                        <td>{{ $p->pemilik }}</td>
                                        <td>
                                            <a href="/merchant/edit/{{ $p->id_merchant }}">Edit</a>
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                                                modal
                                            </button>
                                            |
                                            <a href="/merchant/hapus/{{ $p->id_merchant }}">Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    


@endsection

