@extends('dashboard.index')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Master Data Bisnis</h1>
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
      <a href="{{ route('bisnis.create') }}" class="btn btn-primary mb-3"><span data-feather="plus"></span> Tambah data</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ID Bisnis</th>
              <th scope="col">Nama Bisnis</th>
              <th scope="col">Pemilik</th>
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
              <td>{{ $item->updated_at->diffForHumans() }}</td>
              <td>
                {{-- <a href="#" class="badge bg-success"><span data-feather="eye"></span></a> --}}
                <a href="{{ route('bisnis.edit', $item->id) }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="{{ route('bisnis.delete', $item->id) }}" method="post" class="d-inline">
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