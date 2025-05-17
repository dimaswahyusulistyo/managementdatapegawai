@extends('dimas-app.master')

@section('title', 'AdminLTE 3 | General Form')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Tambah Data Pegawai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
              <li class="breadcrumb-item active">Form Tambah Data Pegawai</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" novalidate="novalidate" method="POST" action="{{ route('dimas-app.storepegawai') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Masukkan Nama" required>
                    @error('nama_pegawai')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="exampleInputEmail1">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" required>
                    @error('nik')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="jenispegawai">Jenis Pegawai</label>
                    <select class="form-control" id="jenispegawai" name="jenispegawai" required>
                        <option value="">Pilih opsi</option>
                        @foreach($jenispegawais as $jenispegawai)
                            <option value="{{ $jenispegawai->id }}">{{ $jenispegawai->jenispegawai }}</option>
                        @endforeach
                    </select>
                    @error('jenispegawai')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="exampleInputEmail1">Status Pegawai</label>
                    <select class="form-control" id="statuspegawai" name="statuspegawai" required>
                        <option value="">Pilih opsi</option>
                        @foreach($statuspegawais as $statuspegawai)
                            <option value="{{ $statuspegawai->id }}">{{ $statuspegawai->statuspegawai }}</option>
                        @endforeach
                    </select>
                    @error('statuspegawai')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="exampleInputEmail1">Unit</label>
                    <input type="text" class="form-control" id="unit" name="unit" placeholder="Masukkan Unit" required>
                    @error('unit')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="exampleInputEmail1">Sub Unit</label>
                    <input type="text" class="form-control" id="subunit" name="subunit" placeholder="Masukkan Sub Unit" required>
                    @error('subunit')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="exampleInputEmail1">Pendidikan</label>
                    <select class="form-control" id="pendidikan" name="pendidikan" required>
                        <option value="">Pilih opsi</option>
                        @foreach($pendidikans as $pendidikan)
                            <option value="{{ $pendidikan->id }}">{{ $pendidikan->pendidikan }}</option>
                        @endforeach
                    </select>
                    @error('pendidikan')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" placeholder="" required>
                    @error('tanggallahir')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="exampleInputEmail1">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" placeholder="Masukkan Tempat Lahir" required>
                    @error('tempatlahir')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                    <select class="form-control" id="jeniskelamin" name="jeniskelamin" required>
                        <option value="">Pilih opsi</option>
                        @foreach($jeniskelamins as $jeniskelamin)
                            <option value="{{ $jeniskelamin->id }}">{{ $jeniskelamin->jeniskelamin }}</option>
                        @endforeach
                    </select>
                    @error('jeniskelamin')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="exampleInputEmail1">Agama</label>
                    <select class="form-control" id="agama" name="agama" placeholder="" required>
                        <option value="">Pilih opsi</option>        
                        @foreach($agamas as $agama)
                        <option value="{{ $agama->id }}">{{ $agama->nama }}</option>
                        @endforeach
                    </select>
                    @error('agama')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <!-- <label for="exampleInputEmail1">Foto Pegawai</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/"> -->
                    <div class="form-group">
                      <label for="gambar">Upload KTP</label>
                      <input type="file" class="form-control" id="gambar" name="gambar">
                      @error('gambar')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@push('aditional-css')
    <link rel="stylesheet" href="path-to-aditional-css.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
@endpush

@push('aditional-js')
    <script src="path-to-aditional-script.js"></script>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
    $(function () {
    bsCustomFileInput.init();
    });
    </script>
@endpush