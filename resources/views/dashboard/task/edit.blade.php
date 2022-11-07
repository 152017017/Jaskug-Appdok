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
          <input type="text" style="width: auto" class="form-control @error('status') is-invalid @enderror"
          value="{{ $dokumentasi->status->deskripsi }}" readonly>
      </div>
      <div class="mb-2">
        <label for="group" class="form-label">Group Layanan</label>
          <input type="text" style="width: auto" class="form-control @error('groupservice') is-invalid @enderror"
          value="{{ $dokumentasi->groupservice->deskripsi }}" readonly>
      </div>
      <div class="mb-2">
        <label for="layanan" class="form-label">Layanan</label>
          <input type="text" style="width: auto" class="form-control @error('service') is-invalid @enderror"
          value="{{ $dokumentasi->service->deskripsi }}" readonly>
      </div>
      <div class="mb-2">
        <label for="platform" class="form-label">Platform</label>
          <input type="text" style="width: auto" class="form-control @error('platform') is-invalid @enderror"
          value="{{ $dokumentasi->platform->deskripsi }}" readonly>
      </div>
      <div class="mb-2">
        <label for="pemilik" class="form-label">Pemilik</label>
          <input type="text" style="width: auto" class="form-control @error('business') is-invalid @enderror"
          value="{{ $dokumentasi->business->deskripsi }}" readonly>
      </div> 
  </div> 
  <div class="col-md-4 mx-4">
      <div class="mb-3">
        <label for="lampiran" class="form-label">Lampiran</label>
          <input type="text" class="form-control @error('lampiran') is-invalid @enderror"
          value="{{ $dokumentasi->lampiran }}" readonly>
      </div> 
      <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal NDE</label>
          <input type="text" class="form-control @error('tanggal') is-invalid @enderror"
          value="{{ $dokumentasi->tanggal->format('d M Y') }}" readonly>
      </div>
      <div class="mb-3">
        <label for="nomor" class="form-label">Nomor NDE</label>
          <input type="text" class="form-control @error('nomor') is-invalid @enderror"
          value="{{ $dokumentasi->nomor }}" readonly>
      </div>
      <div class="mb-3">
        <label for="perihal" class="form-label">Perihal NDE</label>
          <input type="text" class="form-control @error('perihal') is-invalid @enderror"
          value="{{ $dokumentasi->perihal }}" readonly>
      </div>
      <div class="mb-3">
        <label for="deskripsi" class="form-label">Uraian NDE</label>
          <textarea type="text" style="height: 110px;" class="form-control @error('deskripsi') is-invalid @enderror" readonly>{{ $dokumentasi->deskripsi }}
          </textarea>
      </div>
  </div>
</div>

<h1 class="h4 mb-4">Update Permintaan</h1>
<div class="row mx-auto">
  @role('user-bisnis')
  <form method="post" action="{{ route('task.update', $dokumentasi->id) }}" enctype="multipart/form-data">
    @csrf
  <div class="col-md-4">
    <div class="mb-3" style="width: 30rem">
      <label for="status" class="form-label">Pilih Status Pengerjaan</label>
        <select class="form-select" name="status_id">
          @foreach ($status as $item => $status)
            <option value="{{ $status->id }}" {{ old('status_id') == $status->id ? ' selected' : ' ' }}>
              {{ $status->deskripsi }}
            </option>
          @endforeach
        </select>
    </div>

    <div class="mb-3" style="width: 30rem">
      <label for="lampiran" class="form-label">Upload Lampiran NDE</label>
        <input class="form-control @error('lampiran') is-invalid @enderror" type="file" id="lampiran" name="lampiran">
          @error('lampiran')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
      <div class="mt-3">
        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Simpan Perubahan">
          <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
        </span>
      </div>
    </div>
  </div>
  </form>
  @endrole
  
  @role('operator')
  <form method="post" action="{{ route('task.update', $item->id) }}" enctype="multipart/form-data">
    @csrf
    <div class="mt-2 mb-2">
      <div class="d-inline-block">
        <label for="tanggal_eksekusi" class="form-label">Tanggal eksekusi</label>
          <input class="date form-control" type="text" id="tanggal_eksekusi" name="tanggal_eksekusi" required>
            @error('tanggal_eksekusi')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
      </div>
      
      <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Simpan Perubahan">
        <button class="btn btn-primary" type="submit">Tindak Lanjuti</button>
      </span>
    </div>
  </form>
  @endrole
</div>

<script type="text/javascript">
  $('.date').datepicker({  
     format: 'yyyy-mm-dd'
   });  
</script> 

@endsection