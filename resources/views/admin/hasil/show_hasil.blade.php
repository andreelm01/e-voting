@extends('admin_layout')
@section('title', 'List HasiL')
@section('admin_content')

	<div class="container-fluid">
      <nav aria-label="breadcrumb" class="d-none d-sm-block">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('administrator')}}">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="#">Data Hasil Pemilihan</a></li>
        </ol>
        <button class="btn btn-info" onclick="window.history.go(-1)"><i class="fa fa-arrow-left"></i> Back</button>
      </nav>
      <hr class="sidebar-divider">
      <div class="row">

        <!-- Pie Chart -->
        <div class="col-xl-12 col-lg-12">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h3 class="m-0 font-weight-bold text-primary">Report Hasil Pemilihan di ID Pemilihan : {{ $hasil->id_pemilihan }}</h3>
            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="chart-pie pt-4 pb-2">
                <canvas id="myPieChart"></canvas>
              </div>
              <div class="mt-4 text-center small">
                <span class="mr-2">
                  <i class="fas fa-circle text-primary"></i> Jumlah Total Suara Pemilih : {{$pie['jumlahSuara']}}
                </span>
                <span class="mr-2">
                  <i class="fas fa-circle text-success"></i> Jumlah Suara Digunakan : {{$pie['suaraTerpakai']}}
                </span>
                <span class="mr-2">
                  <i class="fas fa-circle text-danger"></i> Jumlah Suara Tidak Digunakan : {{$pie['tidakTerpakai']}}
                </span>
              </div>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>#</th>
                      <th>ID Calon</th>
                      <th>Nama</th>
                      <th>Jumlah Suara</th>
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                    @forelse($items as $item)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$item->id_calon}}</td>
                      <td>{{($item->nama)}}</td>
                      <td>
                        {{ $item->hasil->count() }} 
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="3" class="text-center"> Data Kosong</td>
                    </tr>
                  @endforelse
                  </tbody>
                </table>
              </div>
            </div>
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

@push('cart-js')
  <!-- Page level plugins -->
  <script src="{{url('backend/vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{url('backend/js/demo/chart-area-demo.js')}}"></script>
  {{-- <script src="{{url('backend/js/demo/chart-pie-demo.js')}}"></script> --}}

  <script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");

    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Jumlah Total Suara Pemilih", "Jumlah Suara Digunakan", "Jumlah Suara Tidak Digunakan"],
        datasets: [{
          data: [{{$pie['jumlahSuara']}}, {{$pie['suaraTerpakai']}}, {{$pie['tidakTerpakai']}}],
          backgroundColor: ['#4e73df', '#1cc88a', '#f26157'],
          hoverBackgroundColor: ['#2e59d9', '#17a673', '#f55247'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });

  </script>
@endpush