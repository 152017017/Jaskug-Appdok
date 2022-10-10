@extends('dashboard.index')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Layanan</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="{{ route('layanan.store') }}" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Layanan</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama') }}">
          @error('nama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Pilih Grup Layanan</label>
          <select class="form-select" name="gruplayanan_id">
            @foreach ($groupservice as $gservice)
            <option value="{{ $gservice->id }}" {{ old('gruplayanan_id') == $gservice->id ? ' selected' : ' ' }}>
              {{ $gservice->deskripsi }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" required autofocus value="{{ old('deskripsi') }}" style="height: 110px;"></textarea>
        </div>

        <button type="button" class="btn btn-outline-secondary"> <a href="/dashboard/layanan" class="text-black-50 text-decoration-none">Kembali</button></a>
        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Tambah data">
          <button class="btn btn-primary" type="submit">Tambah</button>
        </span>
    </form>
</div>
    
<script>
    
    //
    
</script>

@endsection