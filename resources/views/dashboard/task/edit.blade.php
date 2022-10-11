@extends('dashboard.index')

@section('container')

<div class="pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tindak Lanjuti Permintaan</h1>
</div>

<h1 class="h4 mb-4">Info Permintaan</h1>
<div class="row">
    <form method="post" action="{{ route('task.update', $item->id) }}" class="mb-5" enctype="multipart/form-data">
      @csrf
    <div class="col-md-2 mx-4">
      <div class="mb-2">
        <label for="status" class="form-label">Status</label>
        <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" required autofocus
        value="{{ old('status', $item->status->deskripsi) }}" disabled>
        @error('status')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2">
        <label for="group" class="form-label">Group Layanan</label>
        <input type="text" class="form-control @error('groupservice') is-invalid @enderror" id="groupservice" name="groupservice" required autofocus
        value="{{ old('groupservice', $item->groupservice->deskripsi) }}" disabled>
        @error('groupservice')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2">
        <label for="layanan" class="form-label">Layanan</label>
        <input type="text" class="form-control @error('service') is-invalid @enderror" id="service" name="service" required autofocus
        value="{{ old('service', $item->service->deskripsi) }}" disabled>
        @error('service')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2">
        <label for="platform" class="form-label">Platform</label>
        <input type="text" class="form-control @error('platform') is-invalid @enderror" id="platform" name="platform" required autofocus
        value="{{ old('platform', $item->platform->deskripsi) }}" disabled>
        @error('platform')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2">
        <label for="pemilik" class="form-label">Pemilik</label>
        <input type="text" class="form-control @error('business') is-invalid @enderror" id="business" name="business" required autofocus
        value="{{ old('business', $item->business->deskripsi) }}" disabled>
        @error('business')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div> 
    </div> 
    <div class="col-md-4 mx-auto">
      <div class="mb-3">
        <label for="lampiran" class="form-label">Lampiran</label>
        <input type="text" class="form-control @error('lampiran') is-invalid @enderror" id="lampiran" name="lampiran" required autofocus
        value="{{ old('lampiran', $item->lampiran) }}" disabled>
        @error('lampiran')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div> 
      <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal NDE</label>
        <input type="text" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" required autofocus
        value="{{ old('tanggal', $item->tanggal) }}" disabled>
        @error('tanggal')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="nomor" class="form-label">Nomor NDE</label>
        <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor" name="nomor" required autofocus
        value="{{ old('nomor', $item->nomor) }}" disabled>
        @error('nomor')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="perihal" class="form-label">Perihal NDE</label>
        <input type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal" name="perihal" required autofocus
        value="{{ old('perihal', $item->perihal) }}" disabled>
        @error('perihal')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2">
        <label for="deskripsi" class="form-label">Uraian NDE</label>
        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" required autofocus
        value="{{ old('deskripsi', $item->deskripsi) }}" disabled>
        @error('deskripsi')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
    </div>
</div>

<h1 class="h4 mb-4">Update Permintaan</h1>
<div class="row">
  <div class="mb-3 md-4 mx-auto">
    <label for="status" class="form-label">Pilih Status Pengerjaan</label>
    <select class="form-select" name="status_id">
      @foreach ($status as $item)
      <option value="{{ $item->id }}" {{ old('status_id') == $item->id ? ' selected' : ' ' }}>
        {{ $item->deskripsi }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="lampiran" class="form-label">Upload Lampiran NDE</label>
    <input class="form-control @error('lampiran') is-invalid @enderror" type="file" id="lampiran" name="lampiran">
    @error('lampiran')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>

  </form>
</div>

<script>
    //
</script>

@endsection