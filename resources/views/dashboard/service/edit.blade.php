@extends('dashboard.index')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Data Layanan</h1>
</div>

<div class="col-lg-8">
  <form method="post" action="{{ route('layanan.update', $service->id) }}" class="mb-5" enctype="multipart/form-data">
    @csrf
      <div class="mb-3">
        <label for="gruplayanan_id" class="form-label">Pilih Group Layanan</label>
          <select class="form-select" name="gruplayanan_id" autofocus required>
            @foreach ($groupservice as $item => $groupservice)
              <option value="{{ $groupservice->id }}" {{ old('gruplayanan_id', $service->gruplayanan_id) == $groupservice->id ? ' selected' : ' ' }}>
                {{ $groupservice->deskripsi }}
              </option>
            @endforeach
          </select>
      </div>
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Layanan</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required
          value="{{ old('nama', $service->nama) }}">
            @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
      </div>
      <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi Layanan</label>
          <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" required
          value="{{ old('deskripsi', $service->deskripsi) }}">
            @error('deskripsi')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
      </div>

        <a class="btn btn-outline-secondary text-black-50 text-decoration-none" href="/dashboard/layanan">Kembali</a>
        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Simpan Perubahan">
          <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
      </span>
  </form>
</div>
    
<script>
  //
</script>

@endsection