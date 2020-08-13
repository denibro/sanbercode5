
    <h2>Pertanyaan Umum</h2>
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
    
    <!-- <a href="" class="btn btn-primary px-5 my-3">Tambah pertanyaan</a> -->
    <ul class="list-group">
      	@foreach($pertanyaans as $pertanyaan)
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>
              <h4 class="font-weight-bold">{{ $pertanyaan->judul }}</h5>
              <h5>{{ $pertanyaan->isi }}</h6>
              <h6 class="text-muted">{{ $pertanyaan->created_at }}</h6>
              <h6 class="text-muted">{{ $pertanyaan->updated_at }}</h6>
            </span>
            <a href="/pertanyaan/{{ $pertanyaan->id_pertanyaan }}" class="badge badge-primary badge-pill">Detail</a>
          </li>
        @endforeach
    </ul>