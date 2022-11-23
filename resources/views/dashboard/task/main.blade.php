@extends('dashboard.index')

@section('container')
  {{-- @section('title') --}}
  <h1 class="h3 mb-2 text-gray-800">Permintaan Berjalan</h1>
  {{-- @endsection --}}

  {{-- Alert --}}
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
  {{-- /Alert --}}

  @role('admin|user-bisnis') 
  <div class="d-flex justify-content-end"><a href="{{ route('task.create') }}" class="btn btn-primary mb-3"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Permintaan</a></div>
  @endrole

    <div class="card shadow mb-4">
      <div class="card-body">
        <a class="btn btn-secondary mb-4" data-toggle="modal" data-target="#filterModal"><i class="fa fa-filter" aria-hidden="true"></i>
          Filter
        </a>
      <div class="table-responsive">
        <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Layanan</th>
              <th scope="col">Group Layanan</th>
              <th scope="col">NDE</th>
              <th scope="col">Nama Kegiatan</th>
              <th scope="col">Status Tindak Lanjut (Operasi)</th>
              <th scope="col">Status Tindak Lanjut (QA)</th>
              @role('admin|operator')
                <th scope="col">Action</th>
              @endrole
              @role('admin|user-qa')
                <th scope="col">Action</th>
              @endrole
            </tr>
          </thead>

          <tbody>
          @foreach ($dokumentasi as $item => $dokumentasi)    
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $dokumentasi->service->deskripsi }}</td>
              <td>{{ $dokumentasi->groupservice->deskripsi }}</td>
              <td>
              Nomor:
              <br>
              <b>{{ $dokumentasi->nomor }}</b>
              <br>
              Tanggal: 
              <br>
              {{ $dokumentasi->tanggal->format('d M Y') }}
              <br>
              Perihal: 
              <br>
              {{ $dokumentasi->perihal }}
              </td>
              @if($dokumentasi->status->id === 1)
                <td><label class="bg-primary rounded text-black opacity-75 d-inline-flex p-1">{{ $dokumentasi->status->deskripsi }}</label></td>
                  @elseif($dokumentasi->status->id === 2)
                <td><label class="bg-info rounded text-black opacity-75 d-inline-flex p-2">{{ $dokumentasi->status->deskripsi }}</label></td>
                  @elseif($dokumentasi->status->id === 3)
                <td><label class="bg-success rounded text-black opacity-75 d-inline-flex p-2">{{ $dokumentasi->status->deskripsi }}</label></td>
                  @elseif($dokumentasi->status->id === 4)
                <td><label class="bg-warning rounded text-black opacity-75 d-inline-flex p-2">{{ $dokumentasi->status->deskripsi }}</label></td>
                  @elseif($dokumentasi->status->id === 5)
                <td><label class="bg-danger rounded text-black opacity-75 d-inline-flex p-2">{{ $dokumentasi->status->deskripsi }}</label></td>
                  @else
                <td><label class="bg-info rounded text-black opacity-75 d-inline-flex p-2">{{ $dokumentasi->status->deskripsi }}</label></td>
              @endif
              {{-- Operator --}}
              @if (empty($dokumentasi->tanggal_eksekusi_op))
                <td> -- </td>
              @else 
                <td> {{"Lingkungan (" .$dokumentasi->status->deskripsi. ") dieksekusi tanggal (" .$dokumentasi->tanggal_eksekusi_op->format('d M Y'). ")" . " pukul " . $dokumentasi->tanggal_eksekusi_op->format('H:i') . " WIB"}}</td>              
              @endif
              {{-- Quality Assurance / QA --}}
              @if (empty($dokumentasi->tanggal_eksekusi_qa))
                <td> -- </td>
              @else 
                <td> {{"Lingkungan (" .$dokumentasi->status->deskripsi. ") dieksekusi tanggal (" .$dokumentasi->tanggal_eksekusi_qa->format('d M Y'). ")" . " pukul " . $dokumentasi->tanggal_eksekusi_qa->format('H:i') . " WIB"}}</td>              
              @endif
              @role('admin|operator')
              <td>
                <a href="{{ route('task.edit', Crypt::encrypt($dokumentasi->id)) }}" class="btn btn-warning d-flex justify-content-center"><span data-feather="edit"></span></a>
              </td>
              @endrole
              @role('admin|user-qa')
              <td>
                <a href="{{ route('task.edit', Crypt::encrypt($dokumentasi->id)) }}" class="btn btn-warning d-flex justify-content-center"><span data-feather="edit"></span></a>
              </td>
              @endrole
            </tr>
          @endforeach
          </tbody>
          
        </table>
      </div>
    </div>

<!-- Filter Modal-->
<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Filter Task</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-3">  
                Group Layanan
                <div class="mb-3" style="">
                  <select class="form-control" id="mylist">
                    @foreach ($groupservice as $item => $groupservice)
                      <option value="{{ $groupservice->id }}">
                        {{ $groupservice->deskripsi }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-3">
                Layanan
                <div class="mb-3" style="">
                  <select class="form-control" id="mylist">
                    @foreach ($service as $item => $service)
                      <option value="{{ $service->id }}">
                        {{ $service->deskripsi }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-3">
              Status
                  <div class="mb-3" style="">
                    <select class="form-control" id="mylist">
                      @foreach ($status as $item => $status)
                        <option value="{{ $status->id }}">
                          {{ $status->deskripsi }}
                        </option>
                      @endforeach
                    </select>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-danger" type="button" data-dismiss="modal" onclick="refresh()">Reset</button>
            <button class="btn btn-primary" type="submit" data-dismiss="modal" onclick="filter()">Filter</button>
          </div>
      </div>
</div>

  <script>
    function filter() {
      var input, filter, table, tr, td, i;
        input = document.getElementById("mylist");
        filter = input.value.toUpperCase();
        table = document.getElementById("dataTable");
        tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
    };

    function refresh(){
      location.reload()
    }
</script>

@endsection