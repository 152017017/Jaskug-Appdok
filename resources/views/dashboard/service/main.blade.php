@extends('dashboard.index')

@section('container')
  {{-- @section('title') --}}
  <h1 class="h3 mb-2 text-gray-800">Master Data Layanan</h1>
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

  {{-- <a href="{{ route('layanan.create') }}" class="btn btn-primary mb-3"><i class="fa fa-plus" aria-hidden="true"></i> Tambah data</a> --}}
  <div class="d-flex justify-content-end"><a href="dropdown-item" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createModal"><i class="fa fa-plus" aria-hidden="true"></i> Tambah data</a></div>
    <div class="card shadow mb-4">
      <div class="card-body">  
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Layanan</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Group Layanan</th>
                <th scope="col">Terakhir Update</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody>
            @foreach ($service as $item => $service)    
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $service->nama }}</td>
                <td>{{ $service->deskripsi }}</td>
                <td>{{ $service->groupservice->deskripsi }}</td>
                <td>{{ $service->updated_at->format('d M Y') }}</td>
                <td>
                  {{-- <a href="#" class="badge bg-success"><span data-feather="eye"></span></a> --}}
                  {{-- Edit Button --}}
                  <a href="{{ route('layanan.edit', Crypt::encrypt($service->id)) }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                  {{-- Delete Button --}}
                  <form action="{{ route('layanan.delete', Crypt::encrypt($service->id)) }}" method="post" class="d-inline">
                    @csrf
                      <button class="badge bg-danger border-0" onclick="return confirm('DATA AKAN DIHAPUS ?')"><span data-feather="x-circle"></span></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>

  <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Layanan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">??</span>
                </button>
            </div>
            
            <div class="modal-body">
              <div class="col-md-8 d-flex justify-content-between flex-wrap flex-md-nowrap">
                <form method="post" action="{{ route('layanan.store') }}" class="mb-5" enctype="multipart/form-data">
                  @csrf
                    <div class="mb-3">
                      <label for="gruplayanan" class="form-label">Pilih Group Layanan</label>
                        <select class="select_group" name="gruplayanan_id" style="width: 100%" data-placeholder="Pilih group.." required autofocus>
                          @foreach ($groupservice as $item => $groupservice)
                            <option value="{{ $groupservice->id }}">
                              {{ $groupservice->deskripsi }}
                            </option>
                          @endforeach
                        </select>
                    </div>
                    <div class="mb-3"E>
                      <label for="nama" class="form-label">Nama Layanan</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama') }}">
                          @error('nama')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                    </div>
                    <div class="mb-3">
                      <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" required autofocus value="{{ old('deskripsi') }}" style="height: 110px;"></textarea>
                    </div>
              </div>
            </div>

            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Tambah data">
                <button class="btn btn-primary" type="submit">Tambah</button>
              </span>
            </div>
          </form>
        </div>
    </div>
  </div>

<script>
  $(document).ready(function() {
    $(".select_group").select2({
      allowClear: true,
      dropdownParent: $('#createModal')

    }); 
  });
</script>

@endsection