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
          <select class="form-select" name="gruplayanan_id" id="gruplayanan_id" autofocus required>
            @foreach ($groupservice as $item => $groupservice)
              <option value="{{ $groupservice->id }}">{{ $groupservice->deskripsi }}</option>
            @endforeach
          </select>
      </div>
      <div class="mb-3">
        <label for="status" class="form-label">Pilih Status</label>
          <select class="form-select" name="status_id" autofocus required>
            @foreach ($status as $item => $status)
              <option value="{{ $status->id }}">
                {{ $status->deskripsi }}
              </option>
            @endforeach
          </select>
      </div>
      <div class="mb-3">
        <label for="tanggal" class="form">2. Tanggal NDE </label>
          <input 
          id="dt"
          type="date"
          name="tanggal"
          class="date form-control"
          onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'"
          required>
      </div>
      <div class="mb-3">
        <label for="perihal" class="form-label">3. Perihal NDE</label>
          <textarea type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal" name="perihal" value="{{ old('perihal') }}" style="height: 110px;" required></textarea>
      </div>
      <div class="mb-3">
        <label for="lampiran" class="form-label">5. Upload Lampiran NDE</label>
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
          <select class="form-select" name="layanan_id" id="layanan_id" autofocus required>
            {{-- @foreach ($service as $item => $service)
              <option value="{{ $service->id }}">{{ $service->nama }}</option>
            @endforeach --}}
          </select>
      </div>
      <div class="mb-3">
        <label for="platform" class="form-label">Pilih Jenis Platform</label>
          <select class="form-select" name="platform_id" autofocus required>
            @foreach ($platform as $item => $platform)
              <option value="{{ $platform->id }}">
                {{ $platform->deskripsi }}
              </option>
            @endforeach
          </select>
      </div>
      <div class="mb-3">
        <label for="nomor" class="form-label">1. Nomor NDE</label>
          <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor" name="nomor" required>
            @error('nomor')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
      </div>
      <div class="mb-3">
        <label for="deskripsi" class="form-label">4. Uraian Singkat NDE</label>
          <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}" style="height: 110px;" required></textarea>
      </div>
      
  </div>
      <span class="d-inline-block mx-4 mb-4">
        <button class="btn btn-primary" type="submit">Tambah</button>
      </span>
    </form>
</div>

<script type="text/javascript">
  // $('.date').datetimepicker({
  //   dateFormat: 'yy-mm-dd',
  //   timeFormat: 'hh:mm tt',
  //   controlType: 'select',
  //   maxDate: '0',
  //   oneLine: true
  // });  
</script>

<script type="text/javascript">
  // $('#date').datetimepicker({
  //     dateFormat: 'yy-mm-dd',
  //     showMillisec:false,
  //     showMicrosec:false,
  //     showTimezone:false,
  //     maxDate: '0'
  //   }  
  // );
</script>

<script type="text/javascript">
  // $('#date').datetimepicker({
  //   datePickerId.max = new Date().toISOString().split("T")[0];
  //   }  
  // );

  document.getElementById('dt').max = new Date(new Date().getTime() - new Date().getTimezoneOffset() * 60000).toISOString().split("T")[0];


</script>

<script>
  $(document).ready(function() {
  $('#gruplayanan_id').on('change', function() {
     var groupserviceID = $(this).val();
     if(groupserviceID) {
         $.ajax({
             url: '/getService/'+groupserviceID,
             type: "GET",
             data : {"_token":"{{ csrf_token() }}"},
             dataType: "json",
             success:function(data)
             {
               if(data){
                  $('#layanan_id').empty();
                  $('#layanan_id').append('<option hidden>--Pilih Layanan--</option>'); 
                  $.each(data, function(layanan_id, layanan_id){
                      $('select[name="layanan_id"]').append('<option value="'+ layanan_id.id +'">' + layanan_id.nama+ '</option>');
                  });
              }else{
                  $('#layanan_id').empty();
              }
           }
         });
     }else{
       $('#layanan_id').empty();
     }
  });
  });
</script>


@endsection