@extends('admin_layout')
@section('title', 'List RT')
@section('admin_content')

	<div class="container-fluid">
      <nav aria-label="breadcrumb" class="d-none d-sm-block">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('administrator')}}">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="#">Data RT</a></li>
        </ol>
      </nav>

      @if ($errors->any())
        <hr class="sidebar-divider">
        <div class="alert alert-danger m-2">
         <strong>Opps!,</strong> There were some problems with your input.<br>
          <ul>
            @foreach ($errors->all() as $error)
              <li><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      
      <hr class="sidebar-divider">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary" align="right"><a href="{{route('admin-rt.create')}}">+ Tambah RT</a></h6>
          {{-- notifikasi alert --}}
          @if ($message = Session::get('success'))
            <div class="alert alert-success m-2">
              <p><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ $message }}</p>
            </div>
          @endif
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr class="text-center">
                  <th>#</th>
                  <th>No. RW</th>
                  <th>No. RT</th>
                  <th>Nama RT</th>
                  <th>Keterangan</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody style="text-align: center;">
                @forelse($items as $item)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$item->no_rw}}</td>
                  <td>
                  <a href="{{ route('admin-list-rt', $item->no_rt) }}">{{$item->no_rt}}</a>
                  </td>
                  <td>{{$item->nama_rt}}</td>
                  <td>{!! nl2br($item->keterangan) !!}</td>
                  <td>
                    @if( $item->status==1 )
                      <a href="#" data-name="status" class="status" data-type="select" data-pk="{{ $item->id }}" data-url="/api/admin-rt/{{ $item->id }}/change-status" data-title="Change Status">          
                      <p>ACTIVE</p>
                      </a>
                    @else
                      <a href="#" data-name="status" class="status" data-type="select" data-pk="{{ $item->id }}" data-url="/api/admin-rt/{{ $item->id }}/change-status" data-title="Change Status">
                        <p>NON ACTIVE</p>
                      </a>
                    @endif
                  </td>
                  <td>
                    <form action="{{ route('admin-rt.destroy',$item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                          {{-- btn edit --}}
                          <a href="{{ route('admin-rt.edit',$item->id) }}" title="Edit" class="btn btn-warning"><i class="fas fa-fw fa-edit"></i></a>

                          {{-- btn delete --}}
                          <button type="submit" onclick="return confirm('Data yang sudah di hapus tidak bisa di kembalikan!!. Apakah anda yakin?')" title="hapus" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></button>
                      </form> 
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="7" class="text-center"> Data Kosong</td>
                </tr>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('editable-css')
<link href="{{url('backend/editable/css/bootstrap-editable.css')}}" rel="stylesheet">
@endpush

@push('datatable-css')
<link href="{{url('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@push('editable-js')
<script src="{{url('backend/editable/js/bootstrap-editable.min.js')}}"></script>

  <script>
    $.fn.editable.defaults.mode = 'inline';
    $(document).ready(function() {
      $('.status').editable({
        source: [
          {value: "0", text: "NON ACTIVE"},
          {value: "1", text: "ACTIVE"}
        ]
      });
    });
  </script>
@endpush

@push('datatable-js')
  <!-- Page level plugins datatables -->
  <script src="{{url('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <!-- Page level custom scripts datatables -->
  <script src="{{url('backend/js/demo/datatables-demo.js')}}"></script>
@endpush