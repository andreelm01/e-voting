@extends('admin_layout')
@section('title', 'List HasiL')
@section('admin_content')

	<div class="container-fluid">
      <nav aria-label="breadcrumb" class="d-none d-sm-block">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('administrator')}}">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="#">Data Hasil Pemilihan</a></li>
        </ol>
      </nav>
      <hr class="sidebar-divider">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          {{-- notifikasi alert --}}
          @if ($message = Session::get('success'))
            <div class="alert alert-success m-2">
              <p><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ $message }}</p>
            </div>
          @endif
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr class="text-center">
                  <th>#</th>
                  <th>ID Pemilihan</th>
                  <th>Keterangan</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody style="text-align: center;">
                @forelse($items as $item)
                <tr>
                  <td>{{$i++}}</td>
                  <td><a href="{{ route('admin-list-hasil', encrypt($item->id_pemilihan)) }}">{{$item->id_pemilihan}}</a></td>
                  <td>{!! nl2br($item->keterangan) !!}</td>
                  <td>                    
                    @if( $item->status==1 )
                      <a href="#" data-name="status" class="status" data-type="select" data-pk="{{ $item->id }}" data-url="/api/admin-pemilihan/{{ $item->id }}/change-status" data-title="Change Status">          
                      <p>ACTIVE</p>
                      </a>
                    @else
                      <a href="#" data-name="status" class="status" data-type="select" data-pk="{{ $item->id }}" data-url="/api/admin-pemilihan/{{ $item->id }}/change-status" data-title="Change Status">
                        <p>NON ACTIVE</p>
                      </a>
                    @endif
                  </td>

                  <td>
                    <a href="{{ route('admin-hasil-report', encrypt($item->id_pemilihan)) }}" title="Report" class="btn btn-warning" target="_blank"><i class="fas fa-fw fa-print"></i></a>
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
          {value: "1", text: "ACTIVE"},
          {value: "0", text: "NON ACTIVE"}
      ]
      });
    });
    // location.reload();
  </script>
@endpush

@push('datatable-js')
  <!-- Page level plugins datatables -->
  <script src="{{url('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <!-- Page level custom scripts datatables -->
  <script src="{{url('backend/js/demo/datatables-demo.js')}}"></script>
@endpush