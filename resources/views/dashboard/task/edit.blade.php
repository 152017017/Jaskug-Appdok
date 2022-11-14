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
      <label for="lampiran" class="form-label">Lampiran</label>
      <div class="input-group mb-3">
          <input type="text" class="form-control @error('lampiran') is-invalid @enderror"
          value="{{ $dokumentasi->lampiran }}" readonly>
          <span class="input-group-text"><a href="/storage/{{ $dokumentasi->lampiran }}" target="_blank"><i class="fa fa-info-circle" aria-hidden="true"></i></a></span>
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
  <form method="post" action="{{ route('task.update', $dokumentasi->id) }}" enctype="multipart/form-data">
    @csrf
    <div class="mt-2 mb-2">
      <div class="d-inline-block">
        <label for="tanggal_eksekusi_op" class="form-label">Tanggal eksekusi</label>
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
  @role('user-qa')
  <form method="post" action="{{ route('task.update', $dokumentasi->id) }}" enctype="multipart/form-data">
    @csrf
    <div class="mt-2 mb-2">
      <div class="d-inline-block">
        <label for="tanggal_eksekusi_qa" class="form-label">Tanggal eksekusi</label>
          <input class="date form-control" type="datetime-local" id="dt" name="tanggal_eksekusi_qa" required>
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

{{-- <script type="text/javascript">
  $('.date').datetimepicker({  
     dateFormat: 'yy-mm-dd',
     maxDate: '0'

   });  
</script>  --}}

{{-- <script type="text/javascript">
  $('.date').datetimepicker({
      dateFormat: 'yy-mm-dd',
      showMillisec:false,
      showMicrosec:false,
      showTimezone:false,
      minTime:'08:00',
      maxTime:'17:00',
      formatTime:'i-H'
      // enabledHours: [8, 9, 10, 11, 12, 13, 14, 15, 16, 17],
      maxDate: '0'
    }  
  );
</script> --}}

<script type="text/javascript">

// let dateInput = document.getElementById("dt");
// dateInput.min = "2022-11-14T08:00";
// dateInput.max = "2022-11-14T17:00";

  // var today = new Date();
  // var dd = today.getDate();
  // var mm = today.getMonth() + 1;
  // var yyyy = today.getFullYear();
  // //
  // var hh = today.getHours();
  // var m = today.getMinutes();

  // if (dd < 10) {
  //   dd = '0' + dd;
  // }

  // if (mm < 10) {
  //   mm = '0' + mm;
  // }
      
  // today = yyyy + "-" + mm + "-" + dd + "T" + hh + ":" + m;
  // document.getElementById("dt").setAttribute("max", today);


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
  //or Year-Month-Day
  today_max = yyyy + '-' + mm + '-' + dd + "T17:00";
  //or Year-Month-Day&Todayhour:minute
  document.getElementById("dt").setAttribute("min", today_min);
  document.getElementById("dt").setAttribute("max", today_max);
  //Set "datefield" = Minimum&Maximum time to current date

</script>


@endsection