@extends('dashboard.index')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-3">
  {{-- @section('title') --}}
    <h1 class="h2">Registrasi User</h1>
  {{-- @endsection --}}
</div>

<div class="row">
  <div class="col-md-4 mx-4">
    <form method="post" action="{{ route('user.store') }}" class="mb-5" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Nama User</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
            @error('name')
              <div class="invalid-feedback">
                 {{ $message }}
              </div>
            @enderror
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autofocus value="{{ old('email') }}">
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
      </div>
  </div>
  <div class="col-md-4 mx-auto">
      <div class="mb-3">
        <label for="layanan" class="form-label">Pilih Role</label>
          <select class="form-select" name="roles" id="roles">
            @foreach ($roles as $item => $roles)
              <option value="{{ $roles->id }}" {{ old('roles') == $roles->id ? 'selected' : ' ' }}>
                {{ $roles->name }}
              </option>
            @endforeach
          </select>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autofocus value="{{ old('password') }}">
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
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