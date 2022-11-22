@extends('dashboard.index')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-2">
    <h1 class="h3 mb-2 text-gray-800">Tambah Permintaan</h1>
</div>

<div class="row">
  <div class="col-sm-4 mx-2">
    <form method="post" action="{{ route('task.store') }}" class="mb-5" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="business" class="form-label">Nama Aplikasi</label><span style="color: red;">*</span>
          <select class="select_group" name="bisnis_id" style="width : 300px" data-placeholder="Pilih aplikasi.." autofocus required>
              <option value="" hidden></option>
                @foreach ($business as $item => $business)
                  <option value="{{ $business->id }}">{{ $business->deskripsi }}</option>
                @endforeach
          </select>
      </div>
      <div class="mb-3">
        <label for="status" class="form-label">Status</label><span style="color: red;">*</span>
        <br>
        <select class="select_group" name="status_id" style="width: 300px" data-placeholder="Pilih status.." autofocus required>
          <option value="" hidden></option>
            @foreach ($status as $item => $status)
              <option value="{{ $status->id }}">{{ $status->deskripsi }}</option>
            @endforeach
          </select>
      </div>
      <div class="mb-3">
        <label for="platform" class="form-label">Jenis Platform</label><span style="color: red;">*</span>
          <select class="select_group" name="platform_id" style="width: 300px" data-placeholder="Pilih platform.." autofocus required>
            <option value="" hidden></option>
              @foreach ($platform as $item => $platform)
                <option value="{{ $platform->id }}">{{ $platform->deskripsi }}</option>
              @endforeach
          </select>
      </div>
      <div class="mb-3">
        <label for="gruplayanan" class="form-label">Group Layanan</label><span style="color: red;">*</span>
          <select class="#select_group" name="gruplayanan_id" id="gruplayanan_id" style="width: 300px" data-placeholder="Pilih group.." autofocus required>
            {{-- <option value="" hidden></option>
              @foreach ($groupservice as $item => $groupservice)
                <option value="{{ $groupservice->id }}">{{ $groupservice->deskripsi }}</option>
              @endforeach --}}
          </select>
      </div>
      <div class="mb-3">
        <label for="layanan" class="form-label">Layanan</label><span style="color: red;">*</span>
          <br>
            <select class="#select_group" name="layanan_id" id="layanan_id" style="width: 300px" data-placeholder="Pilih layanan.." autofocus required></select>
            
      </div>
  </div>
  <div class="col-md-4 mx-6">
      <div class="mb-3">
        <label for="nomor" class="form-label">1. Nomor NDE</label><span style="color: red;">*</span>
          <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor" name="nomor" required>
            @error('nomor')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
      </div>
      <div class="mb-3">
        <label for="tanggal" class="form">2. Tanggal NDE </label><span style="color: red;">*</span>
          <input id="dt" type="date" name="tanggal" class="date form-control" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
            @error('tanggal')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
      </div>
      <div class="mb-3">
        <label for="perihal" class="form-label">3. Perihal NDE</label><span style="color: red;">*</span>
          <textarea type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal" name="perihal" value="{{ old('perihal') }}" style="height: 95px;" required></textarea>
            @error('perihal')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
      </div>
      <div class="mb-3">
        <label for="deskripsi" class="form-label">4. Uraian Singkat NDE</label><span style="color: red;">*</span>
          <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}" style="height: 95px;" required></textarea>
            @error('deskripsi')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
      </div>
      <div class="mb-3">
        <label for="lampiran" class="form-label">5. Upload Lampiran NDE</label><span style="color: red;">*</span>
          <input class="form-control @error('lampiran') is-invalid @enderror" type="file" id="lampiran" name="lampiran">
            @error('lampiran')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
      </div>
      <span class="d-flex justify-content-end mb-2">
        <a class="btn btn-outline-secondary text-black-50 text-decoration-none mx-2" href="/dashboard/task">Kembali</a>
        <button class="btn btn-primary" type="submit" style="width: 110px">Tambah</button>
      </span>
    </form>
  </div>
</div>

<script type="text/javascript">
  document.getElementById('dt').max = new Date(new Date().getTime() - new Date().getTimezoneOffset() * 60000).toISOString().split("T")[0];
</script>

<script>
  $(document).ready(function() {
    $(".select_group").select2({
      allowClear: true
    }); 
  });
</script>

<script>
  // $(document).ready(function() {
  //   $('#gruplayanan_id').on('change', function() {
  //     var groupserviceID = $(this).val();
  //     if(groupserviceID) {
  //         $.ajax({
  //             url: '/getService/'+groupserviceID,
  //             type: "GET",
  //             data : {"_token":"{{ csrf_token() }}"},
  //             dataType: "json",
  //             success:function(data)
  //             {
  //               if(data){
  //                   $('#layanan_id').empty();
  //                   $('#layanan_id').append('<option hidden>--Pilih Layanan--</option>'); 
  //                   $.each(data, function(layanan_id, layanan_id){
  //                       $('select[name="layanan_id"]').append('<option value="'+ layanan_id.id +'">' + layanan_id.nama+ '</option>');
  //                   });
  //               }else{
  //                   $('#layanan_id').empty();
  //               }
  //           }
  //         });
  //     }else{
  //       $('#layanan_id').empty();
  //     }
  //   });
  // });
</script>

<script>
  $(document).ready(function() {

     //  select province:start
     $('#gruplayanan_id').select2({
        allowClear: true,
        ajax: {
           url: "{{ route('groupservice.select') }}",
           dataType: 'json',
           delay: 250,
           processResults: function(data) {
              return {
                 results: $.map(data, function(item) {
                    return {
                       text: item.deskripsi,
                       id: item.id
                    }
                 })
              };
           }
        }
     });
     //  select province:end

     //  Event on change select district:Start
     $('#gruplayanan_id').change(function() {
        //clear select
        $("#layanan_id").empty();
        //set id
        let groupserviceID = $(this).val();
        if (groupserviceID) {
           $('#layanan_id').select2({
              allowClear: true,
              ajax: {
                 url: "{{ route('service.select') }}?groupserviceID=" + groupserviceID,
                 dataType: 'json',
                 delay: 250,
                 processResults: function(data) {
                    return {
                       results: $.map(data, function(item) {
                          return {
                             text: item.nama,
                             id: item.id
                          }
                       })
                    };
                 }
              }
           });
        }
     });
     //  Event on change select district:End

     // EVENT ON CLEAR
     $('#gruplayanan_id').on('select2:clear', function(e) {
        $("#layanan_id").select2();
     });
  });
</script>


@endsection