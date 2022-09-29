@extends('dashboard.index')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Platform</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="{{ route('platform.store') }}" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" required autofocus value="{{ old('deskripsi') }}">
          @error('deskripsi')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
    
<script>
    
    //
    
</script>

@endsection