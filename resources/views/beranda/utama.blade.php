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

    <ul class="list-group mt-3">
        @foreach($pertanyaans as $pertanyaan)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>
                <h4 class="font-weight-bold">{{ $pertanyaan->judul }}</h5>
                    <h5>{{ $pertanyaan->isi }}</h6>
                        <h6 class="text-muted">{{ $pertanyaan->created_at }}</h6>
                        <h6 class="text-muted">{{ $pertanyaan->updated_at }}</h6>
            </span>
            <div class="d-flex justify-content-end">
                <a href="{{route('jawaban.create')}}" class="badge badge-primary badge-pill mr-1"><i
                        class="fa fa-comments" aria-hidden="true"><br>Answers</i></a>

                <a href="" class="badge badge-primary badge-pill"><i class="fa fa-chevron-up"
                        aria-hidden="true"></i><br>Upvote</a>

                <a href="" class="badge badge-primary badge-pill ml-1">Downvote<br><i class="fa fa-chevron-down"
                        aria-hidden="true"></i></a>
            </div>
        </li>
        @endforeach
    </ul>
    
@endsection