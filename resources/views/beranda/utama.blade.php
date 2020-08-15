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
                        <input type="text" class="form-control" name="judulPertanyaan" id="judulPertanyaan">
                    </div>
                    <div class="form-group">
                        <label for="my-editor">Isi</label>
                        <textarea id="my-editor" name="isiPertanyaan" class="form-control"></textarea>
                    </div>

                    <input type="submit" class="btn btn-primary float-right mt-1" value="POST">
                </div>
            </div>
        </div>
    </form>
    
    <ul class="list-group mt-3">

        {{-- card --}}
        @foreach($pertanyaans as $pertanyaan)
        <div class="card text-center bg-light">
            <div class="card-header">
                {{ $pertanyaan->judul }}
            </div>
            <div class="card-body">
                <p class="card-text">{!! $pertanyaan->isi !!}</p>
                <div class="col-12">
                    <div class="d-flex justify-content-center card-columns">
                        <a href=" {{route('jawaban.create')}}" class="badge badge-pill badge-warning mr-1"><i
                                class="fa fa-comments" aria-hidden="true"><br>Answers</i></a>

                        <a href="" class="badge badge-pill badge-success"><i class="fa fa-chevron-up"
                                aria-hidden="true"><br>Upvote</i></a>

                        <a href="" class="badge badge-pill badge-danger ml-1"><i class="fa fa-chevron-down"
                                aria-hidden="true"> <br>Downvote</i></a>
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
        {{-- end of card --}}

        {{-- <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>
                <h4 class="font-weight-bold">{{ $pertanyaan->judul }}</h5>
        <h5>{!! $pertanyaan->isi !!}</h6>
            <div class="card-footer text-muted">
                <p class="text-muted">Created At {{ $pertanyaan->created_at }}</p>
                <p class="text-muted">Edited At {{ $pertanyaan->updated_at }}</p>
            </div>
            </span>
            <div class="d-flex justify-content-end">
                <a href="{{route('jawaban.create')}}" class="badge badge-primary badge-pill mr-1"><i
                        class="fa fa-comments" aria-hidden="true"><br>Answers</i></a>

                <a href="" class="badge badge-primary badge-pill"><i class="fa fa-chevron-up"
                        aria-hidden="true"></i><br>Upvote</a>

                <a href="" class="badge badge-primary badge-pill ml-1">Downvote<br><i class="fa fa-chevron-down"
                        aria-hidden="true"></i></a>
            </div>
            </li> --}}
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