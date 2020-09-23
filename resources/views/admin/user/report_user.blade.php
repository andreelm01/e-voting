<!DOCTYPE html>
<html lang="en">
  <head>
    <title>E-Voting Barnox</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
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
        <pre><b>Report ID User : {{ $id_user->id_user }}</b></pre>
        <hr>
        <div align="left" style="margin-top: 50px;">
          <b>
            <pre>Nama           : {{ $id_user->nama }}</pre>
            <pre>Alamat         : {{ $id_user->alamat }}</pre>
            <pre>No. Rumah      : {{ $id_user->no_rumah }}</pre>
            <pre>No. RT         : {{ $id_user->no_rt }}</pre>
            <pre>No.RW          : {{ $id_user->no_rw }}</pre>
            <pre>Username       : {{ $id_user->username }}</pre>
            <pre>ID Pemilihan   : {{ $id_user->id_pemilihan }}</pre>
          </b>
        </div>
      </div>
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