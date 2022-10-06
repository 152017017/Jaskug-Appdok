@extends('dashboard.index')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Layanan</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="{{ route('platform.store') }}" class="mb-5" enctype="multipart/form-data">
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

        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
    
<script>
    
    //
    
</script>

@endsection