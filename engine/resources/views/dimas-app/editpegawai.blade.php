@extends('dimas-app.master')

@method('GET')

@section('title', 'AdminLTE 3 | Edit Daftar Pegawai')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
              <li class="breadcrumb-item active">Edit Data Pegawai</li>
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
                <h3 class="card-title">Edit Data Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('dimas-app.updatepegawai', $pegawai->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="{{ $pegawai->nama_pegawai }}" placeholder="" required>
                    <label for="exampleInputEmail1">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="{{ $pegawai->nik }}" placeholder="" required>
                    
                    <label for="jenispegawai">Jenis Pegawai</label>
                    <select class="form-control" id="jenispegawai" name="jenispegawai" required>
                        <option value="">Pilih opsi</option>
                        @foreach ($jenispegawais as $jenispegawai)
                            <option value="{{ $jenispegawai->id }}" {{ $jenispegawai->id == old('jenispegawai', $pegawai->jenispegawai) ? 'selected' : '' }}>
                                {{ $jenispegawai->jenispegawai }}
                            </option>
                        @endforeach
                    </select>

                    <label for="exampleInputEmail1">Status Pegawai</label>
                    <select class="form-control" id="statuspegawai" name="statuspegawai" required>
                        <option value="">Pilih opsi</option>
                        @foreach ($statuspegawais as $statuspegawai)
                            <option value="{{ $statuspegawai->id }}" {{ $statuspegawai->id == old('statuspegawai', $pegawai->statuspegawai) ? 'selected' : '' }}>
                                {{ $statuspegawai->statuspegawai }}
                            </option>
                        @endforeach
                    </select>

                    <label for="exampleInputEmail1">Unit</label>
                    <input type="text" class="form-control" id="unit" name="unit" value="{{ $pegawai->unit }}" placeholder="" required>
                    <label for="exampleInputEmail1">Sub Unit</label>
                    <input type="text" class="form-control" id="subunit" name="subunit" value="{{ $pegawai->subunit }}" placeholder="" required>
                    <label for="exampleInputEmail1">Pendidikan</label>
                    <select class="form-control" id="pendidikan" name="pendidikan" required>
                        <option value="">Pilih opsi</option>
                        @foreach ($pendidikans as $pendidikan)
                            <option value="{{ $pendidikan->id }}" {{ $pendidikan->id == old('pendidikan', $pegawai->pendidikan) ? 'selected' : '' }}>
                                {{ $pendidikan->pendidikan }}
                            </option>
                        @endforeach
                    </select>

                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" value="{{ $pegawai->tanggallahir }}" placeholder="" required>
                    <label for="exampleInputEmail1">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" value="{{ $pegawai->tempatlahir }}" placeholder="" required>
                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                    <select class="form-control" id="jeniskelamin" name="jeniskelamin" required>
                        <option value="">Pilih opsi</option>
                        @foreach ($jeniskelamins as $jeniskelamin)
                            <option value="{{ $jeniskelamin->id }}" {{ $jeniskelamin->id == old('jeniskelamin', $pegawai->jeniskelamin) ? 'selected' : '' }}>
                                {{ $jeniskelamin->jeniskelamin }}
                            </option>
                        @endforeach
                    </select>
                    <label for="agama">Agama</label>
                    <select class="form-control" id="agama" name="agama" required>
                        <option value="">Pilih opsi</option>
                        @foreach($agamas as $agama)
                            <option value="{{ $agama->id }}" {{ $agama->id == $pegawai->agama ? 'selected' : '' }}>
                                {{ $agama->nama }}
                            </option>
                        @endforeach
                    </select>
                    <!-- <label for="foto">Foto Pegawai</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/"> -->
                    <div class="form-group">
                        <label for="gambar_sebelum">Gambar Sebelum Diedit</label>
                        <img src="{{ url('upload/' . $pegawai->gambar) }}" alt="Gambar Sebelum Diedit" width="100">
                    </div>
                    <div class="form-group">
                        <label for="gambar_baru">Gambar Baru</label>
                        <input type="file" name="gambar" id="gambar" class="form-control">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                  @endif
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