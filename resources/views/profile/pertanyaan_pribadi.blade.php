@extends('adminlte/master')

@section('title', 'Profile')
@section('judul', 'Profile')

@section('content')  

    @if (session('status_udah'))
        <div class="alert alert-success">
            {{ session('status_udah') }}
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-warning">
            {{ session('status') }}
        </div>
    @endif
    <div>
      <ul class="list-group">
        	@foreach($pertanyaans as $pertanyaan)
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span>
                <h4 class="font-weight-bold">{{ $pertanyaan->judul }}</h5>
                <h5>{{ $pertanyaan->isi }}</h6>
                <h6 class="text-muted">{{ $pertanyaan->created_at }}</h6>
                <h6 class="text-muted">{{ $pertanyaan->updated_at }}</h6>
              </span>
              <span class="badge badge-primary badge-pill">jml vote</span>
            </li>
          @endforeach
      </ul>
    </div>
@endsection