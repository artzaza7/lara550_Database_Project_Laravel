<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chanakan_6320502371-@yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container text-center">
        <h1>Database</h1>
        @section('topbar')
        <a href="https://bservcpe.eng.kps.ku.ac.th/db22/db22_050/" class="btn btn-secondary">Back Group 2</a>
        <a href="{{ route('index_project') }}" class="btn btn-secondary">Index</a>
        <a href="{{ route('subArea') }}" class="btn btn-secondary">SubArea</a>
        <a href="{{ route('house') }}" class="btn btn-secondary">House</a>
        <a href="{{ route('houseRegister') }}" class="btn btn-secondary">HouseRegistration</a>
        <a href="{{ route('result') }}" class="btn btn-secondary">Result</a>
        @show
        <br>
        <br>
    </div>
    
    <div class="container text-center">
    ======================================================================================================================
    </div>
    @yield('content')
    <div class="container text-center">
        <h1>
            6320502371 นายชนกานต์ ศรีศรุติพร
        </h1>
        <h2>
            ส่วนที่ 2 : รับผิดชอบในส่วนของ พื้นที่ย่อย, ทะเบียนบ้าน, สมาชิกในทะเบียนบ้าน และสรุปผลจำนวนคนในตำบล
        </h2>
        <a href="https://laravel.com/" target="_blank" class="btn btn-danger">
            <--- Laravel Framework --->
        <a>
    </div>
    
    <div class="container text-center">
    ======================================================================================================================
    </div>

</body>
</html>