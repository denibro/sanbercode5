@extends('adminlte/master')

@section('title', 'Profile')

@section('content')  

    @if (session('status_ubah'))
        <div class="alert alert-success">
            {{ session('status_udah') }}
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-warning">
            {{ session('status') }}
        </div>
    @endif
     @if (session('pernah_diubah'))
        <div class="alert alert-warning">
            {{ session('pernah_diubah') }}
        </div>
    @endif
    <div class="text-center font-weight-bold pt-3">
      <h3>Profile</h3>
    </div>
    <div class="container">
      <div class="row pt-3">
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
              <a href="pertanyaan/{{$user->id}}/edit" class="btn btn-primary">Ubah</a>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div >

        <h3 class="ml-5 mr-5">Pertanyaan</h3>

        <div class="accordion" id="accordionExample">
          @foreach($pertanyaans as $pertanyaan)
            <div class="card ml-5 mr-5">
              <div class="card-header" id="headingOne">
                <span>
                    <p class="font-weight-bold">{{ $pertanyaan->judul }}</p>
                    <p>
                    <?php 
                      echo $pertanyaan->isi;
                      $collapse = "collapse".$pertanyaan->id_pertanyaan;
                    ?>
                    </p>
                    
                    <p class="text-muted">{{ $pertanyaan->created_at }}</p>
                    <p class="text-muted">{{ $pertanyaan->updated_at }}</p>
                    
                  </span>
                  <span>

                    <a href=""class="badge badge-primary badge-pill d-inline">
                      <i class="far fa-thumbs-up"></i>
                      {{ $pertanyaan->upvote }}
                    </a>
                    <a href=""class="badge badge-warning badge-pill d-inline">
                      <i class="far fa-thumbs-down"></i>
                      {{ $pertanyaan->downvote }}
                    </a>
                    <form action="/pertanyaan/{{$pertanyaan->id_pertanyaan}}" method="post" class=" mr-4 float-right">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-danger mr-1">Hapus</button>
                    </form>
                    
                    <form method="get" action="/pertanyaan/{{$pertanyaan->id_pertanyaan}}">
                      <button class="badge badge-danger badge-pill d-inline" type="submit" data-toggle="collapse" data-target="#<?php echo $collapse; ?>" aria-expanded="true" aria-controls="<?php echo $collapse; ?>">Jawaban</button>
                    </form>
                    
                  </span>
                  <p class="text-muted mr-4 float-right">{{ $pertanyaan->ket }}</p>
              </div>

              <div id="<?php echo $collapse; ?>" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  @if (session('jawabans'))
                    @foreach(session('jawabans') as $jawaban)
                      @if($pertanyaan->id_pertanyaan == $jawaban->pertanyaan_id)
                        <span>
                          <p>
                          <?php 
                            echo $jawaban->isi;
                          ?>
                          </p>
                          
                          <p class="text-muted">{{ $jawaban->created_at }}</p>
                          <p class="text-muted">{{ $jawaban->updated_at }}</p>
                        </span>
                        <form action="/ket_pertanyaan/{{$jawaban->id_jawaban}}" method="post" class="d-inline mr-4 float-right">
                          @method('put')
                          @csrf
                          <button class="btn btn-link">pilih</button>
                        </form>
                        <span>
                          <a href=""class="badge badge-primary badge-pill">
                            <i class="far fa-thumbs-up"></i>
                            {{ $jawaban->upvote }}
                          </a>
                          <a href=""class="badge badge-warning badge-pill">
                            <i class="far fa-thumbs-down"></i>
                            {{ $jawaban->downvote }}
                          </a>
                        </span>
                      @endif
                    @endforeach
                  @endif
                  
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <div>
      
    </div>
@endsection