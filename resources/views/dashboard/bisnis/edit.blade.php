@extends('dashboard.index')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Bisnis</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/bisnis/{{ $item->id }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf

        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" required autofocus
          value="{{ old('deskripsi', $item->deskripsi) }}">
          @error('deskripsi')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="pemilik" class="form-label">Pemilik</label>
          <input type="text" class="form-control @error('pemilik') is-invalid @enderror" id="pemilik" name="pemilik" required autofocus
          value="{{ old('pemilik', $item->pemilik) }}">
          @error('pemilik')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
    
<script>
  const deskripsi = document.querySelector('#deskripsi');
  const pemilik = document.querySelector('#pemilik');
</script>

@endsection