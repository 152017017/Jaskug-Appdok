@extends('dashboard.index')

@section('container')

<h1 class="h3 mb-4 text-gray-800">Tindak Lanjuti Permintaan</h1>

<h1 class="h4 mb-4"><b>Info Permintaan</b></h1>
<div class="row">
  <div class="col-md-4 mx-4">
    <div class="mb-2">
      <label for="pemilik" class="form-label">Nama Aplikasi</label>
        <input type="text" class="form-control" value="{{ $dokumentasi->business->deskripsi }}" readonly>
    </div>
    <div class="mb-2">
      <label for="status" class="form-label">Status</label>
        <input type="text" class="form-control" value="{{ $dokumentasi->status->deskripsi }}" readonly>
    </div>
    <div class="mb-2">
      <label for="platform" class="form-label">Platform</label>
        <input type="text" class="form-control" value="{{ $dokumentasi->platform->deskripsi }}" readonly>
    </div>
    <div class="mb-2">
      <label for="group" class="form-label">Group Layanan</label>
        <input type="text" class="form-control" value="{{ $dokumentasi->groupservice->deskripsi }}" readonly>
    </div>
    <div class="mb-2">
      <label for="layanan" class="form-label">Layanan</label>
        <input type="text" class="form-control" value="{{ $dokumentasi->service->deskripsi }}" readonly>
    </div>
    
  </div> 
  <div class="col-md-4 mx-auto">
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
        <input type="text" class="form-control @error('perihal') is-invalid @enderror"
        value="{{ $dokumentasi->perihal }}" readonly>
    </div>
    <div class="mb-3">
      <label for="deskripsi" class="form-label">4. Uraian NDE</label>
        <input type="text" class="form-control" value="{{ $dokumentasi->deskripsi }}" readonly>
    </div>
    <div class="mb-3">
      <label for="lampiran" class="form-label">5. Lampiran NDE</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" value="{{ $dokumentasi->lampiran }}" readonly>
            <span class="input-group-text"><a href="/storage/{{ $dokumentasi->lampiran }}" target="_blank"><i class="fa fa-info-circle" aria-hidden="true"></i></a></span>
        </div>
    </div>
  </div>
</div>

<h1 class="h4 mb-4"><b> History Tindak Lanjut</b></h1>
<div class="row mx-auto">

  @if (empty($activityLog->changes['old'] ))

    {{-- @foreach($activityLog->changes['attributes'] as $key => $value)
      {{ $activityLog->changes['attributes'][$key] . " (" .$activityLog->created_at->format('d M Y'). ")"  }}
    @endforeach --}}

    @foreach($activityLog->changes['attributes'] as $key => $value)
      {{ "Field $key : " .$activityLog->changes['attributes'][$key] }}
    @endforeach

    <br>
    [Dibuat pada {{ $activityLog->created_at->format('d M Y') }}]

  @else
  
    @foreach($activityLog->changes['old'] as $key => $val)
      {{ $activityLog->changes['old'][$key] }}        
    @endforeach
  
    <br>
    Diupdate pada tanggal : ({{ $activityLog->created_at->format('d M Y') }})

  @endif
  
  
  <div class="mb-2">
    :
  </div>

  {{-- @foreach ($activityLog->changes['attributes'] as $key=>$val)

    {{ $activityLog->changes['attributes'][$key]. " " . "(" .$activityLog->created_at->format('d M Y'). ")"}}<br>

  @endforeach --}}

</div>

{{-- @foreach($activityLog->changes['attributes'] as $field => $value)
    {{ trans('activitylog.field_change', ['field' => $field, 'old_value' => $activityLog->changes['old'][$field], 'new_value' => $activityLog->changes['attributes'][$field]]) }}
@endforeach --}}

{{-- <table>
  <thead>
  <tr>
    <th>field</th>
    <th>old</th>
    <th>new</th>
  </thead>
  <tbody>
    @foreach($activityLog->changes['attributes'] as $field => $value)
    <tr>
      <td>{{ $field }}</td>
      <td>{{ $activityLog->changes['old'][$field] }}</td>
      <td>{{ $activityLog->changes['attributes'][$field] }}</td>
    </tr>
    @endforeach
  </tbody>
  </table> --}}

<script>
    //
</script>

@endsection