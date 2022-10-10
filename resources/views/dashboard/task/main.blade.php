@extends('dashboard.index')

@section('container')
  <a href="{{ route('task.create') }}" class="btn btn-primary mb-3"><span data-feather="plus"></span> Tambah Permintaan</a>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ml-3 mr-3">
      
      @foreach ($list as $item)

      <div class="card pt-2" style="width: 20rem">
        <h6 class="d-inline card-header text-bg-warning rounded opacity-75 mx-2" style="width: 9rem">{{ $item->status->deskripsi }}</h6>
        <div class="card-body">
          <h4 class="card-title">{{ $item->perihal }}</h4>
          <div class="text-muted mb-4">
          <p class="card-text">{{ $item->deskripsi }}</p>
          </div>
          <a href="#" class="btn btn-primary d-flex justify-content-center">Tindak Lanjuti</a>
        </div>
      </div>

    </div>
    @endforeach

@endsection