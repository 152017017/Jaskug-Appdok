@extends('dashboard.index')

@section('container')
  <a href="{{ route('task.create') }}" class="btn btn-primary mb-3">Tambah data</a>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ml-3 mr-3">
      <div class="card pl-3">
        <h5 class="card-header">Perubahan</h5>
        <div class="card-body">
          <h5 class="card-title">Perubahan Perhitungan Bea</h5>
          <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur harum maxime maiores velit aspernatur nulla dolor sint at ullam dolores!</p>
          <a href="#" class="btn btn-primary">Tindak Lanjuti</a>
        </div>
      </div>
    </div>

@endsection