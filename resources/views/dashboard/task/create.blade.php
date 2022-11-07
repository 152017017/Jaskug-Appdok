@extends('dashboard.index')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-3">
  @section('title')
    <h1 class="h2">Tambah Permintaan</h1>
  @endsection
</div>

<div class="row">
  <div class="col-md-4 mx-4">
    <form method="post" action="{{ route('task.store') }}" class="mb-5" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="business" class="form-label">Nama Aplikasi</label>
          <select class="form-select" name="bisnis_id" autofocus required>
            @foreach ($business as $item => $business)
              <option value="{{ $business->id }}" {{ old('bisnis_id') == $business->id ? ' selected' : ' ' }}>
                {{ $business->deskripsi }}
              </option>
            @endforeach
          </select>
      </div>
      <div class="mb-3">
        <label for="gruplayanan" class="form-label">Pilih Grup Layanan</label>
          <select class="form-select" name="gruplayanan_id" id="select_group_service" autofocus required>
            @foreach ($groupservice as $item => $groupservice)
              <option value="{{ $groupservice->id }}" {{ old('gruplayanan_id') == $groupservice->id ? ' selected' : ' ' }}>
                {{ $groupservice->deskripsi }}</option>
              @endforeach
          </select>
      </div>
      <div class="mb-3">
        <label for="status" class="form-label">Pilih Status</label>
          <select class="form-select" name="status_id" autofocus required>
            @foreach ($status as $item => $status)
              <option value="{{ $status->id }}" {{ old('status_id') == $status->id ? ' selected' : ' ' }}>
                {{ $status->deskripsi }}
              </option>
            @endforeach
          </select>
      </div>
      <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal NDE</label>
          <input class="date form-control" type="text" name="tanggal" readonly required>
      </div>
      <div class="mb-3">
        <label for="perihal" class="form-label">Perihal NDE</label>
          <textarea type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal" name="perihal" value="{{ old('perihal') }}" style="height: 110px;" required></textarea>
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
  </div>

  <div class="col-md-4 mx-auto">
      <div class="mb-3">
        <label for="layanan" class="form-label">Pilih Layanan</label>
          <select class="form-select" name="layanan_id" id="select_service" autofocus required>
            @foreach ($service as $item => $service)
              <option value="{{ $service->id }}" {{ old('layanan_id') == $service->id ? ' selected' : ' ' }}>
                {{ $service->deskripsi }}
              </option>
            @endforeach
          </select>
      </div>
      <div class="mb-3">
        <label for="platform" class="form-label">Pilih Jenis Platform</label>
          <select class="form-select" name="platform_id" autofocus required>
            @foreach ($platform as $item => $platform)
              <option value="{{ $platform->id }}" {{ old('platform_id') == $platform->id ? ' selected' : ' ' }}>
                {{ $platform->deskripsi }}
              </option>
            @endforeach
          </select>
      </div>
      <div class="mb-3">
        <label for="nomor" class="form-label">Nomor NDE</label>
          <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor" name="nomor" value="{{ old('nomor') }}" required>
            @error('nomor')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
      </div>
      <div class="mb-3">
        <label for="deskripsi" class="form-label">Uraian NDE</label>
          <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}" style="height: 110px;" required></textarea>
      </div>
      
  </div>
      <span class="d-inline-block mx-4 mb-4">
        <button class="btn btn-primary" type="submit">Tambah</button>
      </span>
    </form>
</div>

<script type="text/javascript">
  $('.date').datepicker({  
     format: 'dd-mm-yyyy',
     maxDate: new Date
   });  
</script>

@endsection