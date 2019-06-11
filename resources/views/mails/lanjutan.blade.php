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
<p>Anda telah melakukan pendaftaran.</p>

<p>Silahkan cek email Anda untuk melakukan verifikasi dan klik link yang terdapat di email tersebut untuk melanjutkan ke tahap berikutnya.</p>
<p>Jika tidak ada di inbox, silahkan cek di folder spam.</p>
<p>Klik <a href="{{ url('kirim-ulang-email',$personal->idpersonal) }}"><strong>Disini</strong></a> untuk mengirimkan ulang email verifikasi.</p>

<p>Terimakasih.<br>
Tuhan Memberkati.</p>

</body>

</html>
