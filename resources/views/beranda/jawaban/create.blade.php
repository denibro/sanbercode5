@extends('adminlte/master')

@section('title', 'Profile')

@section('content')  
    <h2 class="mx-5">Tambah Pertanyaan</h2>
    @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif
    @if (session('status_done'))
        <div class="alert alert-success">
            {{ session('status_done') }}
        </div>
    @endif
      <form method="POST" action="/jawaban" class="mx-5">
        @csrf
        
        <div class="form-group">
          <label>Id Pertanyaan</label>
          <input type="text" class="form-control" name="id_pertanyaan" readonly value="{{$id_pertanyaan}}" />
        </div>
        <div class="form-group">
          <label for="isi">Isi</label>
          <textarea class="form-control @error('isi') is-invalid @enderror" id="isi"  name="isi" value="{{ old('isi') }}"></textarea>
        </div>
        <div class="form-group">
          <label for="tag">Tags</label>
          <input type="text" class="form-control @error('tag') is-invalid @enderror" id="tag"  name="tag" placeholder="Masukkan tag, bila lebih dari satu pisahkan dengan koma" value="{{ old('tag') }}">
        </div>
        <button type="submit" class="btn btn-danger ">Tambah</button>
        <a class="btn btn-primary float-right" href="/pertanyaan">kembali</a>
      </form>
@endsection