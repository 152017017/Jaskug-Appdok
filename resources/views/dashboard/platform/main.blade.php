@extends('dashboard.index')

@section('container')
  {{-- @section('title') --}}
  <h1 class="h3 mb-2 text-gray-800">Master Data Platform</h1>
  {{-- @endsection --}}

  @if (session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
  @endif

  <a href="{{ route('platform.create') }}" class="btn btn-primary mb-3"><i class="fa fa-plus" aria-hidden="true"></i> Tambah data</a>
    <div class="card shadow mb-4">
      <div class="card-body">  
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Platform</th>
                <th scope="col">Terakhir Update</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody>
            @foreach ($platform as $item => $platform)    
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $platform->deskripsi }}</td>
                <td>{{ $platform->updated_at->format('d M Y') }}</td>
                <td>
                  {{-- <a href="#" class="badge bg-success"><span data-feather="eye"></span></a> --}}
                  {{-- Edit Button --}}
                  <a href="{{ route('platform.edit', $platform->id) }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                  {{-- Delete Button --}}
                  <form action="{{ route('platform.delete', $platform->id) }}" method="post" class="d-inline">
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                  </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
  </div>
  @endsection