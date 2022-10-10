@extends('dashboard.index')

@section('container')

<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Permintaan</h1>
</div>

<div class="row">
<div class="col-md-4 mx-4">
    <form method="post" action="{{ route('task.store') }}" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="category" class="form-label">Pilih Grup Layanan</label>
          <select class="form-select" name="gruplayanan_id">
            @foreach ($groupservice as $item)
            <option value="{{ $item->id }}" {{ old('gruplayanan_id') == $item->id ? ' selected' : ' ' }}>
              {{ $item->deskripsi }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Pilih Status</label>
          <select class="form-select" name="gruplayanan_id">
            @foreach ($status as $item)
            <option value="{{ $item->id }}" {{ old('gruplayanan_id') == $item->id ? ' selected' : ' ' }}>
              {{ $item->deskripsi }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Tanggal NDE</label>
          <input type="text" id="datepicker" type="text" class="form-control">
        </div>
        <div class="mb-3">
          <label for="perihal" class="form-label">Perihal NDE</label>
          <textarea type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal" name="perihal" required value="{{ old('perihal') }}" style="height: 110px;"></textarea>
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Upload Lampiran NDE</label>
          <img class="img-preview img-fluid mb-3 col-sm-5">
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
</div>
<div class="col-md-4 mx-auto">
        <div class="mb-3">
          <label for="category" class="form-label">Pilih Layanan</label>
          <select class="form-select" name="layanan_id">
            @foreach ($service as $item)
            <option value="{{ $item->id }}" {{ old('layanan_id') == $item->id ? ' selected' : ' ' }}>
              {{ $item->deskripsi }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Pilih Jenis Platform</label>
          <select class="form-select" name="platform_id">
            @foreach ($platform as $item)
            <option value="{{ $item->id }}" {{ old('platform_id') == $item->id ? ' selected' : ' ' }}>
              {{ $item->deskripsi }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="nomor" class="form-label">Nomor NDE</label>
          <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor" name="nomor" required value="{{ old('nomor') }}">
          @error('nomor')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label">Uraian NDE</label>
          <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" required value="{{ old('deskripsi') }}" style="height: 110px;"></textarea>
        </div>
        
</div>
        <span class="d-inline-block mx-4 mb-4">
          <button class="btn btn-primary" type="submit">Tambah</button>
        </span>
      </form>

</div>

<script>
    //
</script>

@endsection