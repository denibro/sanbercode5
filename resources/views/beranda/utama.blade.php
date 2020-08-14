@extends('adminlte/master')

@section('title', 'Beranda')

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
<div class="text-center font-weight-bold pt-3">
  <h3>Beranda</h3>
</div>
<ul class="list-group">
    @foreach($pertanyaans as $pertanyaan)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span>
            <h4 class="font-weight-bold">{{ $pertanyaan->judul }}</h5>
                <h5>{{ $pertanyaan->isi }}</h6>
                    <h6 class="text-muted">{{ $pertanyaan->created_at }}</h6>
                    <h6 class="text-muted">{{ $pertanyaan->updated_at }}</h6>
        </span>
        <a href="{{route('jawaban.create')}}" class="badge badge-primary badge-pill">Bantu Jawab</a>
        <a href="" class="badge badge-primary badge-pill">Upvote</a>
        <a href="" class="badge badge-primary badge-pill">Downvote</a>
    </li>
    @endforeach
</ul>

@endsection