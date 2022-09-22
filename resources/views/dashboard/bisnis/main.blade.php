@extends('dashboard.index')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Master Data Bisnis</h1>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
    @endif

    <div class="justify-content-start table-responsive col-lg-8">
      <a href="/dashboard/bisnis/create" class="btn btn-primary mb-3">Tambah data</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ID Bisnis</th>
              <th scope="col">Deskripsi</th>
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
                <a href="/dashboard/bisnis/{{ $item->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="#" method="post" class="d-inline">
                @method('delete')
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