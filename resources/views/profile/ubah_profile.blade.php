@extends('adminlte/master')

@section('title', 'Profile')
@section('judul', 'Profile')

@section('content') 
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
      <form method="POST" action="../{{$user->id}}" class="mx-5">
        @method('put')
        @csrf
        
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  name="name" placeholder="Masukkan Name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control @error('Email') is-invalid @enderror" id="email"  name="email" placeholder="Masukkan Email" value="{{ $user->email }}">
        </div>

        <button type="submit" class="btn btn-primary">Ubah</button>
      </form>
@endsection