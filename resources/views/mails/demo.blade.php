<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
<style type="text/css">
	span.besar {text-transform: uppercase}
	span.kecil {text-transform: lowercase}
	span.kapital {text-transform: capitalize}
</style>
<body>
	<form action=""></form>
<p>Email ini dibuat secara otomatis. Mohon tidak mengirimkan balasan ke email ini.</p>

<p>Yth. Bpk/Ibu/Sdr/i <span class="besar"><?php
echo strtoupper($nama);
?> </span>,</p>
<p>Terima Kasih telah mendaftarkan email Anda, {{$email}} sebagai akun di HMMinistry.</p>
<p>Berikut ID Anda : {{$id}}</p>
<p>Untuk mengaktifkan akun HMMinistry Anda, silahkan klik link di bawah ini:</p>
<p><a href="{{ $link }}"><strong>{{ $link }}</strong></p>
<p>Kami perlu memastikan bahwa email Anda benar dan tidak disalahgunakan 
oleh pihak yang tidak berkepentingan.</p>
<p>Terimakasih.<br>
Tuhan Memberkati.</p>

</body>

</html>
