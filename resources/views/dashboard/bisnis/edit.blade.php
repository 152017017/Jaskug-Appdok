@extends('dashboard.index')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Data Bisnis</h1>
</div>

<div class="col-lg-8">
  <form method="post" action="{{ route('bisnis.update', $business->id) }}" class="mb-5" enctype="multipart/form-data">
    @csrf
      <div class="mb-3">
        <label for="deskripsi" class="form-label">Nama Bisnis</label>
          <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" required
          value="{{ old('deskripsi', $business->deskripsi) }}">
        @error('deskripsi')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="pemilik" class="form-label">Nama Platform</label>
          <input type="text" class="form-control @error('pemilik') is-invalid @enderror" id="pemilik" name="pemilik" required
          value="{{ old('pemilik', $business->pemilik) }}">
        @error('pemilik')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

    <a class="btn btn-outline-secondary text-black-50 text-decoration-none" href="/dashboard/bisnis">Kembali</a>
    <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Simpan Perubahan">
      <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
    </span>
  </form>
</div>
    
<script>
  //
</script>

@endsection