@extends('dashboard.index')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-3">
      @section('title')
      <h1 class="h2">History</h1>
      @endsection
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
    @endif

    <div class="justify-content-start table-responsive col-lg-8">
      {{-- <a href="{{ route('history.create') }}" class="btn btn-primary mb-3"><span data-feather="plus"></span> Tambah data</a> --}}
        <table class="table table-striped table-sm">
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
          @foreach ($list as $item)    
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->perihal }}</td>
              <td>{{ $item->groupservice->deskripsi }}</td>
              <td>{{ $item->service->deskripsi ?? '(Tidak ada bisnis)' }}</td>
              <td>{{ $item->updated_at->format('d M Y') }}</td>
              <td>{{ $item->status->deskripsi }}</td>
              <td>
                <a href="{{ route('history.show', $item->id) }}" class="badge bg-primary" style="flex-wrap"><span data-feather="eye"></span></a>
                <a href="{{ route('history.edit', $item->id) }}" class="badge bg-warning" style="flex-wrap"><span data-feather="edit"></span></a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
@endsection