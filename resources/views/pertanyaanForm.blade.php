@extends('beranda.utama')

@section('ckeditor')
<textarea id="my-editor" name="content" class="form-control">{!! old('content', 'test editor content') !!}</textarea>
@endsection

@push('ck-scripts')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
</script>
<script>
  CKEDITOR.replace('my-editor', options);
</script>
@endpush