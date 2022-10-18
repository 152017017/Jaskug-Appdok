@extends('dashboard.index')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-3">
    @section('title')
    <h1 class="h2">Tindak Lanjuti Permintaan</h1>
    @endsection
</div>

<h1 class="h4 mb-4">Info Permintaan</h1>
<div class="row">
  <div class="col-md-4 mx-4">
      <div class="mb-2">
        <label for="status" class="form-label">Status</label>
        <input type="text" class="form-control @error('status') is-invalid @enderror"
        value="{{ old('status', $item->status->deskripsi) }}" disabled>
      </div>
      <div class="mb-2">
        <label for="group" class="form-label">Group Layanan</label>
        <input type="text" class="form-control @error('groupservice') is-invalid @enderror"
        value="{{ old('groupservice', $item->groupservice->deskripsi) }}" disabled>
      </div>
      <div class="mb-2">
        <label for="layanan" class="form-label">Layanan</label>
        <input type="text" class="form-control @error('service') is-invalid @enderror"
        value="{{ old('service', $item->service->deskripsi) }}" disabled>
      </div>
      <div class="mb-2">
        <label for="platform" class="form-label">Platform</label>
        <input type="text" class="form-control @error('platform') is-invalid @enderror"
        value="{{ old('platform', $item->platform->deskripsi) }}" disabled>
      </div>
      <div class="mb-2">
        <label for="pemilik" class="form-label">Pemilik</label>
        <input type="text" class="form-control @error('business') is-invalid @enderror"
        value="{{ old('business', $item->business->deskripsi) }}" disabled>
      </div> 
  </div> 
  <div class="col-md-4 mx-auto">
      <div class="mb-3">
        <label for="lampiran" class="form-label">Lampiran</label>
        <input type="text" class="form-control @error('lampiran') is-invalid @enderror"
        value="{{ old('lampiran', $item->lampiran) }}" disabled>
      </div> 
      <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal NDE</label>
        <input type="text" class="form-control @error('tanggal') is-invalid @enderror"
        value="{{ old('tanggal', $item->tanggal) }}" disabled>
      </div>
      <div class="mb-3">
        <label for="nomor" class="form-label">Nomor NDE</label>
        <input type="text" class="form-control @error('nomor') is-invalid @enderror"
        value="{{ old('nomor', $item->nomor) }}" disabled>
      </div>
      <div class="mb-3">
        <label for="perihal" class="form-label">Perihal NDE</label>
        <input type="text" class="form-control @error('perihal') is-invalid @enderror"
        value="{{ old('perihal', $item->perihal) }}" disabled>
      </div>
      <div class="mb-3">
        <label for="deskripsi" class="form-label">Uraian NDE</label>
        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
        value="{{ old('deskripsi', $item->deskripsi) }}" disabled>
      </div>
  </div>
</div>

<h1 class="h4 mb-4">History Tindak Lanjut</h1>
<div class="row mx-auto">
  <form method="post" action="{{ route('task.update', $item->id) }}" enctype="multipart/form-data">
    @csrf

    
  </form>
</div>

<script>
    //
</script>

@endsection