@extends('dashboard.index')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-3">
    @section('title')
    <h1 class="h2">Permintaan Berjalan</h1>
    @endsection
  </div>

  <a href="{{ route('task.create') }}" class="btn btn-primary mb-3"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Permintaan</a>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ml-3 mr-3">
  
  <div class="container">
    <div class="row">
      @foreach ($list as $item)
        <div class="col-3">
          <div class="card-group">
            <div class="card" style="width: auto">
              <div class="card-body">
                @if($item->status->id === 1)
                <h6 class="card-title bg-primary rounded text-black opacity-75 d-inline-flex p-2" style="">{{ $item->status->deskripsi }}</h6>
                @elseif($item->status->id === 2)
                  <h6 class="card-title bg-secondary rounded text-black opacity-75 d-inline-flex p-2" style="">{{ $item->status->deskripsi }}</h6>
                @elseif($item->status->id === 3)
                  <h6 class="card-title bg-info rounded text-black opacity-75 d-inline-flex p-2" style="">{{ $item->status->deskripsi }}</h6>
                @elseif($item->status->id === 4)
                  <h6 class="card-title bg-warning rounded text-black opacity-75 d-inline-flex p-2" style="">{{ $item->status->deskripsi }}</h6>
                @elseif($item->status->id === 5)
                  <h6 class="card-title bg-danger rounded text-black opacity-75 d-inline-flex p-2" style="">{{ $item->status->deskripsi }}</h6>
                @else
                  <h6 class="card-title bg-success rounded text-black opacity-75 d-inline-flex p-2" style="">{{ $item->status->deskripsi }}</h6>
                @endif
              </div>
              <div class="card-body">
                <h4 class="card-title">{{ $item->perihal }}</h4>
              </div>
              <div class="card-body">
                  <p class="card-text">{{ $item->deskripsi }}</p>
              </div>
                <a href="{{ route('task.edit', $item->id) }}" class="btn btn-primary d-flex justify-content-center">Tindak Lanjuti</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

@endsection