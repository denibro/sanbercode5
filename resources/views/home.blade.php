@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">Silahkan Masuk</div>

                <div class="card-body">
                    <a href="/beranda" class="btn btn-danger">Beranda</a>
                    <a href="/profile" class="btn btn-primary ml-2">Profile</a>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection