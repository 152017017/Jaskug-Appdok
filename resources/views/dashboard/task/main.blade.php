@extends('dashboard.index')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-3">
    @section('title')
    <h1 class="h2">Permintaan Berjalan</h1>
    @endsection
  </div>

  <a href="{{ route('task.create') }}" class="btn btn-primary mb-3"><span data-feather="plus"></span> Tambah Permintaan</a>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ml-3 mr-3">
      
      @foreach ($list as $item)

      <div class="card pt-2" style="width: 20rem">

        @if($item->status->id === 1)
          <h6 class="d-inline card-header text-bg-primary rounded opacity-75 mx-2" style="width: 9rem">{{ $item->status->deskripsi }}</h6>
        @elseif($item->status->id === 2)
          <h6 class="d-inline card-header text-bg-secondary rounded opacity-75 mx-2" style="width: 9rem">{{ $item->status->deskripsi }}</h6>
        @elseif($item->status->id === 3)
          <h6 class="d-inline card-header text-bg-success rounded opacity-75 mx-2" style="width: 9rem">{{ $item->status->deskripsi }}</h6>
        @elseif($item->status->id === 4)
          <h6 class="d-inline card-header text-bg-warning rounded opacity-75 mx-2" style="width: 9rem">{{ $item->status->deskripsi }}</h6>
        @elseif($item->status->id === 5)
          <h6 class="d-inline card-header text-bg-danger rounded opacity-75 mx-2" style="width: 9rem">{{ $item->status->deskripsi }}</h6>
        @else
          <h6 class="d-inline card-header text-bg-secondary rounded opacity-75 mx-2" style="width: 9rem">{{ $item->status->deskripsi }}</h6>
        @endif
        <div class="card-body">
          <h4 class="card-title">{{ $item->perihal }}</h4>
          <div class="text-muted mb-4">
          <p class="card-text">{{ $item->deskripsi }}</p>
          </div>
          <a href="{{ route('task.edit', $item->id) }}" class="btn btn-primary d-flex justify-content-center">Tindak Lanjuti</a>
        </div>
      </div>

    </div>
    @endforeach

@endsection