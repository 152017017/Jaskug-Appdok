@extends('dashboard.index')

@section('container')

<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Permintaan</h1>
</div>

<div class="col-md-4">
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
<div class="col-md-4">
        <div class="mb-3">
          a
        </div>  
</div>  
        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Tambah data ">
          <button class="btn btn-primary" type="submit">Tambah</button>
        </span>
      </form>
</div>
    
<script>
    //
</script>

@endsection