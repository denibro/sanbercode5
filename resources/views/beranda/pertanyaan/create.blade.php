@extends('adminlte.master')

@section('content')
      <div class="ml-2 mt-2">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Buat Pertanyaan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="/pertanyaan" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="judul">Judul Pertanyaan</label>
                    <input type="text" class="form-control" id="judul" placeholder="Enter judul" name="judul" value="{{ old('judul','') }}">
                    @error('judul')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="isi">Isi</label>
                    <input type="text" class="form-control" id="isi" placeholder="Enter isi" name="isi" value="{{ old('isi','') }}">
                    @error('isi')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </form>
    </div>    
      </div>
		
@endsection