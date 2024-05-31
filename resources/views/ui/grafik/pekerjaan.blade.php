@extends('layouts.ui')
@section('judul','Statistik Desa')
@section('php')
<?php
  $sezarah = \App\Webs::get();
    foreach ($sezarah as $sez);


?>
@endsection

@section('content')
 <div class="bradcam_area breadcam_bg bradcam_overlay">
      <div class="container">
          <div class="row">
              <div class="col-xl-12">
                  <div class="bradcam_text">
                      <h3>Grafik Mata Pencaharian</h3>
                      <p><a href="">Home /</a> Grafik Mata Pencaharian</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- bradcam_area_end  -->
    <div class="container"  >
        <br>
        <canvas id="myChart" style="height:200px;" ></canvas>
        <br><br><br>
        <table class="table">
            <thead class="thead" >
                <tr>
                <th scope="col">#</th>
                <th scope="col">Pekerjaan</th>
                <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($tes as $te) 
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $te->lebel }}</td>
                    <td>{{ $te->nomor }}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
        
    </div>
    <br><br>
@endsection
@section('js')
    <script src="{{ asset('assets/libs/chart-js/Chart.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/pages/chartjs.init.js')}}"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {!! json_encode($datum) !!},
        datasets: [{
            label: 'Jumlah Pekerjaan',
            data: {!! json_encode($jumlah) !!},
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>

@endsection