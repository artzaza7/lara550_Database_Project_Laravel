@extends('index')
@section('title', 'HouseRegistration')
@section('topbar')
    @parent
        : HouseRegistration Page
@endsection

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House</title>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container mt-2">
        <div class="row">
            <div class="col-auto">
                <a href="{{ route('houseRegisterCreate') }}" class="btn btn-success">Create HouseRegistration</a>
            </div>
            <div class="col-auto">
                <label for="" class="col-form-label">Search :</label>
            </div>  
            <div class="col-auto mt-1">
                <form action="" method="get">
                    <input type="text" name="key" placeholder="Enter a keyword">
                    <button type="submit" class="btn btn-info">Search</button>
                </form>
            </div>
            <br>
            <br>
            <div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{$message}}</p>
                </div>
                @endif
        </div>
            <table class="table table-hover table-bordered">
        <tr class="table-primary">
            <td>House number</td>

            <td>People Name</td>
            <td>People Surname</td>
            <td>People Number</td>
            <td>People Sex</td>
            <td>People birthday</td>

            <td>Update Button</td>
            <td>Delete Button</td>
        </tr>
        @foreach($houseRegistrations as $houseRegistration)
        <tr>
            <td>{{$houseRegistration->house_number}}</td>
            <td>{{$houseRegistration->registration_people_name}}</td>
            <td>{{$houseRegistration->registration_people_surname}}</td>
            <td>{{$houseRegistration->registration_people_number}}</td>
            <td>{{$houseRegistration->register_people_sex_name}}</td>
            <td>{{$houseRegistration->registration_people_birthday}}</td>
            <td>
                <a href="{{route('houseRegisterEdit', [$houseRegistration->house_registration_id, $houseRegistration->registration_people_sex_id, $houseRegistration->house_id])}}" class="btn btn-warning">Edit</a>    
            </td>
            <td>
                <a href="{{route('houseRegisterDelete', [$houseRegistration->house_registration_id])}}" class="btn btn-danger">Delete</a>    

            </td>
        </tr> 
        @endforeach 
            </table>   
        </div>
        <div class="row">
                <div class="col">
                    {!! $houseRegistrations->links("pagination::bootstrap-4") !!}
                </div>
        </div>
    </div>
</body>
</html>
@endsection