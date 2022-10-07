@extends('dashboard.index')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Master Data Group Layanan</h1>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
    @endif

    <div class="justify-content-start table-responsive col-lg-8">
      <a href="{{ route('gruplayanan.create') }}" class="btn btn-primary mb-3"><span data-feather="plus"></span> Tambah data</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">ID Grup</th>
              <th scope="col">Bisnis</th>
              <th scope="col">Grup Layanan</th>
              <th scope="col">Terakhir Update</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($list as $item)    
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->id }}</td>
              <td>{{ $item->business->deskripsi ?? '(Tidak ada bisnis)' }}</td>
              <td>{{ $item->deskripsi }}</td>
              <td>{{ $item->updated_at->format('d M Y') }}</td>
              <td>
                {{-- <a href="#" class="badge bg-success"><span data-feather="eye"></span></a> --}}
                <a href="{{ route('gruplayanan.edit', $item->id) }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="{{ route('gruplayanan.delete', $item->id) }}" method="post" class="d-inline">
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                </form>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
@endsection