@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form pertanyaan kita isi disini</div>
<<<<<<< HEAD
=======
                
>>>>>>> 1a92597d66f3467a25c3e2c8fb52ee79e069cc59
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @include('beranda.utama')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection