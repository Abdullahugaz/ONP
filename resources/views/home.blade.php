<!DOCTYPE html>
<html lang="so">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Isticmaale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a> -->

    <div class="container mt-5">
        {{-- Success Flash Message --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Welcome Box --}}
        <div class="card">
            <div class="card-header bg-primary text-white">
                Dashboard-kaaga
            </div>
            <div class="card-body">
                <h4 class="card-title">👋 Ku soo dhawoow, {{ Auth::user()->name }}!</h4>
                <p class="card-text">Waxaad ku jirtaa gudaha nidaamka. Waxaa laguu oggol yahay inaad aragto macluumaadka isticmaale ahaan.</p>
                <p class="text-muted">Login Time: {{ now()->format('d M Y, h:i A') }}</p>
                <a href="{{ route('logout') }}" class="btn btn-danger mt-3">Logout</a>
            </div>
        </div>
    </div>

</body>
</html>
