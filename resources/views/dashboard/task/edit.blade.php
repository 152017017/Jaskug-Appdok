@extends('dashboard.index')

@section('container')

<h1 class="h4 mb-4"><b>Info Permintaan</b></h1>
<div class="row">
  <div class="col-md-4 mx-4">
    <div class="mb-2">
      <label for="pemilik" class="form-label">Nama Aplikasi</label>
        <input type="text" style="width: auto" class="form-control" value="{{ $dokumentasi->business->deskripsi }}" readonly>
    </div> 
    <div class="mb-2">
      <label for="status" class="form-label">Status</label>
        <input type="text" style="width: auto" class="form-control" value="{{ $dokumentasi->status->deskripsi }}" readonly>
    </div>
    <div class="mb-2">
      <label for="platform" class="form-label">Platform</label>
        <input type="text" style="width: auto" class="form-control" value="{{ $dokumentasi->platform->deskripsi }}" readonly>
    </div>
    <div class="mb-2">
      <label for="group" class="form-label">Group Layanan</label>
        <input type="text" style="width: auto" class="form-control" value="{{ $dokumentasi->groupservice->deskripsi }}" readonly>
    </div>
    <div class="mb-2">
      <label for="layanan" class="form-label">Layanan</label>
        <input type="text" style="width: auto" class="form-control" value="{{ $dokumentasi->service->deskripsi }}" readonly>
    </div>
  </div> 
  <div class="col-md-4 mx-4">
    <div class="mb-3">
      <label for="nomor" class="form-label">1. Nomor NDE</label>
        <input type="text" class="form-control" value="{{ $dokumentasi->nomor }}" readonly>
    </div>
    <div class="mb-3">
      <label for="tanggal" class="form-label">2. Tanggal NDE</label>
        <input type="text" class="form-control" value="{{ $dokumentasi->tanggal->format('d M Y') }}" readonly>
    </div>
    <div class="mb-3">
      <label for="perihal" class="form-label">3. Perihal NDE</label>
        <input type="text" class="form-control" value="{{ $dokumentasi->perihal }}" readonly>
    </div>
    <div class="mb-3">
      <label for="deskripsi" class="form-label">4. Uraian NDE</label>
        <textarea type="text" style="height: 50px;" class="form-control" readonly>{{ $dokumentasi->deskripsi }}
        </textarea>
    </div>
    <label for="lampiran" class="form-label">5. Lampiran NDE</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control" value="{{ $dokumentasi->lampiran }}" readonly>
        <span class="input-group-text"><a href="/storage/{{ $dokumentasi->lampiran }}" target="_blank"><i class="fa fa-info-circle" aria-hidden="true"></i></a></span>
    </div>
  </div>
</div>

<h1 class="h4 mb-4"><b>Update Permintaan</b></h1>
<div class="row mx-auto">
  @role('admin|user-bisnis')
  {{-- <form method="post" action="{{ route('task.update', $dokumentasi->id) }}" enctype="multipart/form-data">
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
  </form> --}}
  @endrole
  
  @role('admin|operator')
  <form method="post" action="{{ route('task.update', $dokumentasi->id) }}" enctype="multipart/form-data">
    @csrf
    <div class="mt-2 mb-2">
      <div class="d-inline-block">
        <label for="tanggal_eksekusi_op" class="form-label">Tanggal eksekusi</label><span style="color: red;"> (*)</span>
          <input class="date form-control" type="datetime-local" id="dt" name="tanggal_eksekusi_op" required>
            @error('tanggal_eksekusi_op')
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
  @role('admin|user-qa')
  <form method="post" action="{{ route('task.update', $dokumentasi->id) }}" enctype="multipart/form-data">
    @csrf
    <div class="mt-2 mb-2">
      <div class="d-inline-block">
        <label for="tanggal_eksekusi_qa" class="form-label">Tanggal eksekusi</label><span style="color: red;"> (*)</span>
          <input class="date form-control" type="datetime-local" id="dt-qa" name="tanggal_eksekusi_qa" required>
            @error('tanggal_eksekusi_qa')
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

  var today = new Date();
  var today2 = new Date();
  var dd = today.getDate(); //Current day
  var mm = today.getMonth() + 1; //January is 0!
  var yyyy = today.getFullYear(); //(Year is 2022)
  var hh = today.getHours(); //Current hour
  var m = today.getMinutes(); //Current minutes

  if (dd < 10)
  {
      dd = '0' + dd;
  } 
  if (mm < 10)
  {
      mm = '0' + mm;
  }

  today_min = yyyy + '-' + mm + '-' + dd + "T01:00"; 

  today_max = yyyy + '-' + mm + '-' + dd + "T18:00";

  document.getElementById("dt").setAttribute("min", today_min);
  document.getElementById("dt").setAttribute("max", today_max);

</script>

<script type="text/javascript">

  var today = new Date();
  var today2 = new Date();
  var dd = today.getDate(); //Current day
  var mm = today.getMonth() + 1; //January is 0!
  var yyyy = today.getFullYear(); //(Year is 2022)
  var hh = today.getHours(); //Current hour
  var m = today.getMinutes(); //Current minutes

  if (dd < 10)
  {
      dd = '0' + dd;
  } 
  if (mm < 10)
  {
      mm = '0' + mm;
  }

  today_min = yyyy + '-' + mm + '-' + dd + "T08:00"; 

  today_max = yyyy + '-' + mm + '-' + dd + "T17:00";

  document.getElementById("dt-qa").setAttribute("min", today_min);
  document.getElementById("dt-qa").setAttribute("max", today_max);

</script>


@endsection