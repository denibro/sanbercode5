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
    <div class="container">
      <div class="row pt-5">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title font-weight-bold">Profile</h5>
              <p class="card-text"></p>
              <table>
                <tr scope="row">
                  <td>Nama :</td>
                  <td>{{ $user->name }}</td>
                </tr>
                <tr scope="row">
                  <td>Email :</td>
                  <td>{{ $user->email }}</td>
                </tr>
                <tr scope="row">
                  <td>Reputasi :</td>
                  <td>{{ $user->jml_reputasi }}</td>
                </tr>
              </table>
              <h6 class="text-muted">{{ $user->created_at }}</h6>
              <h6 class="text-muted">{{ $user->update_at }}</h6>
              <a href="" class="btn btn-primary">Ubah</a>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="ml-5 mr-5">
        <h3>Pertanyaan</h3>
        <ul class="list-group">
              @foreach($pertanyaans as $pertanyaan)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>
                    <p class="font-weight-bold">{{ $pertanyaan->judul }}</p>
                    <p>{{ $pertanyaan->isi }}</p>
                    <p class="text-muted">{{ $pertanyaan->created_at }}</p>
                    <p class="text-muted">{{ $pertanyaan->updated_at }}</p>
                  </span>
                  <span>
                    <a href=""class="badge badge-primary badge-pill">
                      <i class="far fa-thumbs-up"></i>
                      {{ $pertanyaan->upvote }}
                    </a>
                    <a href=""class="badge badge-warning badge-pill">
                      <i class="far fa-thumbs-down"></i>
                      {{ $pertanyaan->downvote }}
                    </a>
                    <a href=""class="badge badge-danger badge-pill">Hapus</a>
                  </span>
                </li>
              @endforeach
          </ul>
      </div>
    </div>
    <div>
      
    </div>
@endsection