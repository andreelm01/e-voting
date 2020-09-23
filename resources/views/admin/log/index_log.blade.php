@extends('admin_layout')
@section('title', 'List Log User')
@section('admin_content')

	<div class="container-fluid">
      <nav aria-label="breadcrumb" class="d-none d-sm-block">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('administrator')}}">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="#">Data Log User</a></li>
        </ol>
      </nav>
      <hr class="sidebar-divider">
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr class="text-center">
                  <th>#</th>
                  <th>ID User</th>
                  <th>Nama</th>
                  <th>Time In</th>
                  <th>Time Out</th>
                  {{-- <th>Action</th> --}}
                </tr>
              </thead>
              <tbody style="text-align: center;">
                @forelse($items as $item)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$item->id_user}}</td>
                  <td>{{$item->user->nama}}</td>
                  <td>{{ date("d M Y, H:i", strtotime($item->time_in))}}</td>
                  @if($item->time_out == null)
                    <td>{{$item->time_out}}</td>
                  @else
                    <td>{{ date("d M Y, H:i", strtotime($item->time_out))}}</td>
                  @endif
                 {{--  <td>
                    <form action="{{ route('admin-log.destroy',$item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                          <button type="submit" onclick="return confirm('Data yang sudah di hapus tidak bisa di kembalikan!!. Apakah anda yakin?')" title="hapus" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></button>
                      </form> 
                  </td> --}}
                </tr>
                @empty
                <tr>
                  <td colspan="5" class="text-center"> Data Kosong</td>
                </tr>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('datatable-css')
<link href="{{url('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@push('datatable-js')
  <!-- Page level plugins datatables -->
  <script src="{{url('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <!-- Page level custom scripts datatables -->
  <script src="{{url('backend/js/demo/datatables-demo.js')}}"></script>
@endpush