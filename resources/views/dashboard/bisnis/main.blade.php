@extends('dashboard.index')

@section('container')
    {{-- @section('title') --}}
    <h1 class="h3 mb-2 text-gray-800">Master Data Bisnis</h1>
    {{-- @endsection --}}

    @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
    @endif

  <a href="{{ route('bisnis.create') }}" class="btn btn-primary mb-3"><i class="fa fa-plus" aria-hidden="true"></i> Tambah data</a>
    <div class="card shadow mb-4">
      <div class="card-body">  
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">ID Bisnis</th>
              <th scope="col">Nama Bisnis</th>
              <th scope="col">Channel Aplikasi</th>
              <th scope="col">Terakhir Update</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($list as $item)    
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->id }}</td>
              <td>{{ $item->deskripsi }}</td>
              <td>{{ $item->pemilik }}</td>
              <td>{{ $item->updated_at->format('d M Y') }}</td>
              <td>
                {{-- <a href="#" class="badge bg-success"><span data-feather="eye"></span></a> --}}
                <a href="{{ route('bisnis.edit', $item->id) }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="{{ route('bisnis.delete', $item->id) }}" method="post" class="d-inline">
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></i>
                </button>
                </form>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
@endsection