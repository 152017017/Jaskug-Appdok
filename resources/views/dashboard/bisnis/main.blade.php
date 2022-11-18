@extends('dashboard.index')

@section('container')
  {{-- @section('title') --}}
  <h1 class="h3 mb-2 text-gray-800">Master Data Bisnis</h1>
  {{-- @endsection --}}

  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
      {{ session('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @elseif (session()->has('danger'))
    <div class="alert alert-danger alert-dismissible fade show col-lg-8" role="alert">
      {{ session('danger') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  <div class="d-flex justify-content-end"><a href="{{ route('bisnis.create') }}" class="btn btn-primary mb-3"><i class="fa fa-plus" aria-hidden="true"></i> Tambah data</a></div>
    <div class="card shadow mb-4">
      <div class="card-body">  
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Bisnis</th>
                <th scope="col">Channel Aplikasi</th>
                <th scope="col">Terakhir Update</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody>
            @foreach ($business as $item => $business)    
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $business->deskripsi }}</td>
                <td>{{ $business->pemilik }}</td>
                <td>{{ $business->updated_at->format('d M Y') }}</td>
                <td>
                  {{-- <a href="#" class="badge bg-success"><span data-feather="eye"></span></a> --}}
                  
                  {{-- Edit Button --}}
                  <a href="{{ route('bisnis.edit', Crypt::encrypt($business->id)) }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                  {{-- Delete Button --}}
                  <form action="{{ route('bisnis.delete', Crypt::encrypt($business->id)) }}" method="post" class="d-inline">
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('DATA AKAN DIHAPUS ?')"><span data-feather="x-circle"></span></i>
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