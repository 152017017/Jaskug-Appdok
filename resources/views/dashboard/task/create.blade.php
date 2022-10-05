@extends('dashboard.index')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Permintaan</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="{{ route('task.store') }}" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="category" class="form-label">Pilih Grup Layanan</label>
          <select class="form-select" name="category_id">
            @foreach ($categories as $category)
            <option value="#" {{ old('category_id') == $category->id ? ' selected' : ' ' }}>
              {{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="title" class="form-label">Tanggal NDE</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
          @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="title" class="form-label">Perihal NDE</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
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