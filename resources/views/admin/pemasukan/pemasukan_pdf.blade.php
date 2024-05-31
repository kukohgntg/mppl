<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pengeluaran Dana Desa</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h4>Laporan Pengeluaran Dana Desa</h4>
        <h6><b>{{ $start }} Sampai {{ $end }}</b></h6>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Jumlah</th>
				<th>Keterangan</th>
				<th>Sumber</th>
				<th>Petugas</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($dana as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td><?= $tes = "Rp-" . number_format($p->jumlah,0, ".", ".") ;?></td>
				<td>{{$p->keterangan}}</td>
				<td>{{$p->sumber}}</td>
				<td>{{$p->user_id}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>