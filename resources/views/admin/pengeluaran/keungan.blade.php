 @extends('layouts.master')

@section('content')

<div class="row">
   
    <div class="col-lg-12">
    <div class="card-box widget-chart-one gradient-success bx-shadow-lg">
    <div class="float-left" dir="ltr">
        <h1> Dana Desa</h1> 
    </div>
    <div class="widget-chart-one-content text-right">
        <p class="text-white mb-0 mt-2">Statistics</p>
        <h3 class="text-white">{{ $hasil_rupiah}}</h3>
    </div>
</div>


<div class="row">
        
    <div class="col-lg-12">
        <div class="card-box">
            <a href="{{url('/pemasukan')}}" class="btn btn-light btn-rounded waves-effect width-md mr-1">Pemasukan</a>
            <a href="{{url('/pengeluaran')}}" class="btn btn-sm btn-outline-dark btn-rounded waves-effect waves-light width-md">Pengeluaran</a>

            <br><br><br><br>
            <h4 class="header-title">Grafik Dana Desa</h4>
                <canvas id="myChart"></canvas>       
        </div>
    </div>

</div>

    </div>
</div>
<div class="row">
    <div class="col-md-4">

    </div>
</div>
@endsection

@section('script')

<!-- Chart JS -->
<script src="assets/libs/chart-js/Chart.bundle.min.js"></script>

<!-- Init js -->
<script src="assets/js/pages/chartjs.init.js"></script>
<script>
            
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['januari','february','maret','april','mei','juni','juli','agustus','september','oktober','november','desember'],
    datasets: [{
        label: '# of Votes 1',
        data: {!! json_encode($pemasukan) !!},
        backgroundColor: [
          'rgba(182, 189, 185, 0.959)',
          'rgba(182, 189, 185, 0.959)',
          'rgba(182, 189, 185, 0.959)',
          'rgba(182, 189, 185, 0.959)',
          'rgba(182, 189, 185, 0.959)',
          'rgba(182, 189, 185, 0.959)'
        ],
        borderColor: [
          '#f7f7f799',
          '#f7f7f799',
          '#f7f7f799',
          '#f7f7f799',
          '#f7f7f799',
          '#f7f7f799'
        ],
        borderWidth: 2
      },
      {
        label: '# of Votes 2',
        data: {!! json_encode($keluar) !!},
        backgroundColor: [
          'rgba(67, 143, 108, 0.959)',
          'rgba(67, 143, 108, 0.959)',
          'rgba(67, 143, 108, 0.959)',
          'rgba(67, 143, 108, 0.959)',
          'rgba(67, 143, 108, 0.959)',
          'rgba(67, 143, 108, 0.959)'
        ],
        borderColor: [
          '#2dcc9a',
          '#2dcc9a',
          '#2dcc9a',
          '#2dcc9a',
          '#2dcc9a',
          '#2dcc9a'
        ],
        borderWidth: 2
      }
    ]
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