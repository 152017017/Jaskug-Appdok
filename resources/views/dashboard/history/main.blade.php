@extends('dashboard.index')

@section('container')
  {{-- @section('title') --}}
  <h1 class="h3 mb-2 text-gray-800">History</h1>
  {{-- @endsection --}}

  @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
  @endif

  <div class="card shadow mb-4">
    <div class="card-body">  
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Permintaan</th>
              <th scope="col">Group Layanan</th>
              <th scope="col">Layanan</th>
              <th scope="col">Terakhir Update</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($dokumentasi as $item => $dokumentasi)    
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $dokumentasi->perihal }}</td>
              <td>{{ $dokumentasi->groupservice->deskripsi }}</td>
              <td>{{ $dokumentasi->service->deskripsi ?? '(Tidak ada bisnis)' }}</td>
              <td>{{ $dokumentasi->updated_at->format('d M Y') }}</td>
            @if($dokumentasi->status->id === 1)
              <td><label class="bg-primary rounded text-black opacity-75 d-inline-flex p-1">{{ $dokumentasi->status->deskripsi }}</label></td>
            @elseif($dokumentasi->status->id === 2)
              <td><label class="bg-secondary rounded text-black opacity-75 d-inline-flex p-1">{{ $dokumentasi->status->deskripsi }}</label></td>
            @elseif($dokumentasi->status->id === 3)
              <td><label class="bg-info rounded text-black opacity-75 d-inline-flex p-1">{{ $dokumentasi->status->deskripsi }}</label></td>
            @elseif($dokumentasi->status->id === 4)
              <td><label class="bg-warning rounded text-black opacity-75 d-inline-flex p-1">{{ $dokumentasi->status->deskripsi }}</label></td>
            @elseif($dokumentasi->status->id === 5)
              <td><label class="bg-danger rounded text-black opacity-75 d-inline-flex p-1">{{ $dokumentasi->status->deskripsi }}</label></td>
            @else
              <td><label class="bg-success rounded text-black opacity-75 d-inline-flex p-1">{{ $dokumentasi->status->deskripsi }}</label></td>
            @endif
              <td>
                <a href="{{ route('history.show', $dokumentasi->id) }}" class="badge bg-primary" style="flex-wrap"><span data-feather="eye"></span></a>
                {{-- <a href="{{ route('history.edit', $item->id) }}" class="badge bg-warning" style="flex-wrap"><span data-feather="edit"></span></a> --}}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
  </div>
@endsection