@extends('adminlte/master')

@section('title', 'Beranda')

@push('head-script')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
</script>
@endpush

@section('content')
@if (session('status_done'))
    <div class="alert alert-success">
        {{ session('status_done') }}
    </div>
@endif

<div class="container p-3">

    <form action="/pertanyaan" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <button class="btn btn-success" type="button" data-toggle="collapse" data-target=".multi-collapse"
                    aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Post Your Question
                    Here</button>
            </div>
            <div class="collapse multi-collapse" id="multiCollapseExample2">
                <div class="card-body">
                    <div class="form-group">
                        <label for="judulPertanyaan">Judul</label>
                        <input type="text" class="form-control" name="judulPertanyaan" id="judulPertanyaan"
                            placeholder="Enter Judul">
                    </div>
                    <div class="form-group">
                        <label for="my-editor">Isi</label>
                        <textarea id="my-editor" name="isiPertanyaan" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tagPertanyaan">Tag</label>
                        <input type="text" class="form-control" name="tagPertanyaan" id="tagPertanyaan"
                            placeholder="Enter Tag">
                    </div>


                    <input type="submit" class="btn btn-primary float-left mt-1" value="POST">
                </div>
            </div>
        </div>
    </form>

    <ul class="list-group mt-3">
        {{-- card --}}
        <?php $i=0; ?>
        @foreach($pertanyaans as $pertanyaan)
        <div class="card text-center bg-light">
            <div class="card-header">
                {{ $pertanyaan->judul }}
            </div>
            <div class="card-body">
                <p class="card-text">{!! $pertanyaan->isi !!}</p>
                <p>
                    oleh: <?php echo $names[$i]; $i++;  
                    $collapse = "collapse".$pertanyaan->id_pertanyaan;
                    ?>
                </p>
                <div class="col-12">
                    <div class="d-flex justify-content-center card-columns">
                        <form method="get" action="/pertanyaan_umum/{{$pertanyaan->id_pertanyaan}}">
                          <button class="badge badge-pill badge-warning mr-1" type="submit" data-toggle="collapse" data-target="#<?php echo $collapse; ?>" aria-expanded="true" aria-controls="<?php echo $collapse; ?>"><i
                                class="fa fa-comments" aria-hidden="true"><br>Answers</i></button>
                        </form>
                        

                        <a href="" class="badge badge-pill badge-success"><i class="fa fa-chevron-up"
                                aria-hidden="true"><br>Upvote</i></a>

                        <a href="" class="badge badge-pill badge-danger ml-1"><i class="fa fa-chevron-down"
                                aria-hidden="true"> <br>Downvote</i></a>
                    </div>
                </div>
                <div id="<?php echo $collapse; ?>" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  @if (session('jawabans'))
                    <h3>Jawaban</h3>
                    @foreach(session('jawabans') as $jawaban)
                      @if($pertanyaan->id_pertanyaan == $jawaban->pertanyaan_id)
                      <div class="">
                          <p class="card-text">{!! $jawaban->isi !!}</p>
                          <p class="text-muted">{{ $jawaban->created_at }}</p>
                          <p class="text-muted">{{ $jawaban->updated_at }}</p>
                          <a href=""class="badge badge-primary badge-pill">
                            <i class="far fa-thumbs-up"></i>
                            {{ $jawaban->upvote }}
                          </a>
                          <a href=""class="badge badge-warning badge-pill">
                            <i class="far fa-thumbs-down"></i>
                            {{ $jawaban->downvote }}
                          </a>
                        </div>
                      @endif
                    @endforeach
                  @endif
                  <a href="jawaban/{{$pertanyaan->id_pertanyaan}}/edit" class="badge badge-pill badge-warning mr-1">Tambah Jawaban</a>
                </div>
              </div>
            </div>
            <div class="card-footer text-muted">
                <div class="d-flex justify-content-center card-columns">
                    <p class="text-muted">Created At {{ $pertanyaan->created_at }}</p>

                    @if ($pertanyaan->updated_at == true)
                    <p class="text-muted">Edited At {{ $pertanyaan->updated_at }}</p>
                    @endif

                </div>
            </div>
        </div>
        @endforeach
    </ul>
</div>
@endsection

@push('scripts')
<script>
    CKEDITOR.replace('my-editor', options);
</script>
<script>
    $('.collapse').collapse({
        toggle: false;
    })
</script>
@endpush