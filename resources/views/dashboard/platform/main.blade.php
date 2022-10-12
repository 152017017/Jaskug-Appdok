@extends('dashboard.index')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-3">
      @section('title')
      <h1 class="h2">Master Data Platform</h1>
      @endsection
      {{-- <form class="justify-content" role="search">
        <input type="text" class="form-control" placeholder="Search.." name="search" value=""><button class="btn btn-primary" type="submit"><span data-feather="search"></span></button>
      </form> --}}
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
    @endif

    <div class="justify-content-start table-responsive col-lg-8">
      <a href="{{ route('platform.create') }}" class="btn btn-primary mb-3"><span data-feather="plus"></span> Tambah data</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">ID Platform</th>
              <th scope="col">Platform</th>
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
              <td>{{ $item->updated_at->format('d M Y') }}</td>
              <td>
                {{-- <a href="#" class="badge bg-success"><span data-feather="eye"></span></a> --}}
                <a href="{{ route('platform.edit', $item->id) }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="{{ route('platform.delete', $item->id) }}" method="post" class="d-inline">
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