<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

<body>
<h2>Selamat datang di {{$user['name']}}</h2>
<br/>
Anda telah mendaftar menjadi member dengan menggunakan email : {{$user['email']}} , Silahkan klik link di bawah untuk aktifas.
<br/>
<a href="{{url('user/verify', $user->verifyUser->token)}}">Verifikasi Email</a>
</body>

</html>