<!DOCTYPE html>
<html lang="en">
  <head>
    <title>E-Voting Barnox</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" {{public_path($css)}}>
    
    <style>
      table {
        font-family: 'Roboto', sans-serif;
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
      }
      th, td {
        border: 2px solid #ddd;
        text-align: center;
        padding: 16px;
      }

      tr:nth-child(even){background-color: #f2f2f2}

      p {
        font-family: 'Roboto', sans-serif;
        font-size: 18px;
      }
    </style>
    
  </head>
  <body>
    <div class="container">
      <div align="center">
        <h2 class="mt-3"><pre>E Voting Barnox</pre></h2>
        <img class="img-profile rounded-circle" src="{{public_path($image)}}" alt="E-Voting" style="width: 70px; height: 70px;">
        <pre><b>Report Hasil Pemilihan di ID Pemilihan : {{ $pemilihan->id_pemilihan }}</b></pre>
        <div align="left" style="margin-top: 50px;">
          <b>
            <pre>Jumlah Total Suara                     : {{ $jumlahSuara }}</pre>
            <pre>Jumlah Suara Terpakai                  : {{ $SuaraTerpakai }}</pre>
            <pre>Jumlah Suara Tidak Terpakai            : {{ $SuaraTidakTerpakai }}</pre>
          </b>
        </div>
      </div>
      <hr>

      <table style="overflow-x:auto;">
        <thead>
          <tr>
            <th>No</th>
            <th>User</th>
            <th>Foto User</th>
            <th>Calon</th>
            <th>Waktu</th>
          </tr>
        </thead>
        <tbody>
          @forelse($hasil as $item )
            <tr>
              <td>{{$i++}}</td>
              <td>{{$item->user->nama}}</td>
              <td><img src="./assets/fotouser/{{$item->image}}" height="75px"></td>
              <td>{{$item->calon->nama}}</td>
              <td>{{ date("d M Y, H:i", strtotime($item->created_at))}}</td>
            </tr>
            @empty
            <tr>
              <td colspan="5" style="text-align: center;"> Data Kosong</td>
            </tr>
          @endforelse
        </tbody>

      </table>
      <hr>
      <div align="left">
        <p>Catatan : </p>
        <p>
          {!! nl2br( $pemilihan->keterangan ) !!}
        </p>
      </div>
      <hr>
    </div>
    
      {{-- footer --}}
      {{-- <div align="center">
        <p>Copyright &copy; Tunas Mitra Sukses 2020</p>            
      </div> --}}
    <script>
        // window.print();
    </script>
  </body>
</html>