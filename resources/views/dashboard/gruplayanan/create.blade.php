@extends('dashboard.index')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Group Layanan</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="{{ route('gruplayanan.store') }}" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="deskripsi" class="form-label">Nama Group Layanan</label>
          <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" required autofocus value="{{ old('deskripsi') }}">
          @error('deskripsi')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <button type="button" class="btn btn-outline-secondary"> <a href="/dashboard/gruplayanan" class="text-black-50 text-decoration-none">Kembali</button></a>
        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Tambah data">
          <button class="btn btn-primary" type="submit">Tambah</button>
        </span>
    </form>
</div>
    
<script>
    
    //
    
</script>

@endsection