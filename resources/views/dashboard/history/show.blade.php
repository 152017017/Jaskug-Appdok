@extends('dashboard.index')

@section('container')

<h1 class="h3 mb-4 text-gray-800">Tindak Lanjuti Permintaan</h1>

<h1 class="h4 mb-4">Info Permintaan</h1>
<div class="row">
  <div class="col-md-4 mx-4">
      <div class="mb-2">
        <label for="status" class="form-label">Status</label>
          <input type="text" class="form-control @error('status') is-invalid @enderror"
          value="{{ $dokumentasi->status->deskripsi }}" disabled>
      </div>
      <div class="mb-2">
        <label for="group" class="form-label">Group Layanan</label>
          <input type="text" class="form-control @error('groupservice') is-invalid @enderror"
          value="{{ $dokumentasi->groupservice->deskripsi }}" disabled>
      </div>
      <div class="mb-2">
        <label for="layanan" class="form-label">Layanan</label>
          <input type="text" class="form-control @error('service') is-invalid @enderror"
          value="{{ $dokumentasi->service->deskripsi }}" disabled>
      </div>
      <div class="mb-2">
        <label for="platform" class="form-label">Platform</label>
          <input type="text" class="form-control @error('platform') is-invalid @enderror"
          value="{{ $dokumentasi->platform->deskripsi }}" disabled>
      </div>
      <div class="mb-2">
        <label for="pemilik" class="form-label">Pemilik</label>
          <input type="text" class="form-control @error('business') is-invalid @enderror"
          value="{{ $dokumentasi->business->deskripsi) }}" disabled>
      </div> 
  </div> 
  <div class="col-md-4 mx-auto">
      <div class="mb-3">
        <label for="lampiran" class="form-label">Lampiran</label>
          <input type="text" class="form-control @error('lampiran') is-invalid @enderror"
          value="{{ $dokumentasi->lampiran }}" disabled>
      </div>
      <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal NDE</label>
          <input type="text" class="form-control @error('tanggal') is-invalid @enderror"
          value="{{ $dokumentasi->tanggal->format('d M Y') }}" disabled>
      </div>
      <div class="mb-3">
        <label for="nomor" class="form-label">Nomor NDE</label>
          <input type="text" class="form-control @error('nomor') is-invalid @enderror"
          value="{{ $dokumentasi->nomor }}" disabled>
      </div>
      <div class="mb-3">
        <label for="perihal" class="form-label">Perihal NDE</label>
          <input type="text" class="form-control @error('perihal') is-invalid @enderror"
          value="{{ $dokumentasi->perihal }}" disabled>
      </div>
      <div class="mb-3">
        <label for="deskripsi" class="form-label">Uraian NDE</label>
          <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
          value="{{ $dokumentasi->deskripsi }}" disabled>
      </div>
  </div>
</div>

<h1 class="h4 mb-4">History Tindak Lanjut</h1>
<div class="row mx-auto">

  @if (empty($activityLog->changes['old'] ))

    @foreach($activityLog->changes['attributes'] as $key => $value)
      {{ $activityLog->changes['attributes'][$key] . "( " .$activityLog->created_at->format('d M Y'). " )"  }}
    @endforeach

  @else
  
    @foreach($activityLog->changes['old'] as $key => $val)
      {{ $activityLog->changes['old'][$key]. " " . "(" .$activityLog->created_at->format('d M Y'). ")" }}<br>        
    @endforeach
  
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