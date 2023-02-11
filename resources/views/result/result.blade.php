@extends('index')
@section('title', 'House')
@section('topbar')
    @parent
        : Result Page
@endsection

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container mt-2">
        <div class="row">
            <br>
            <br>
            
            <table class="table table-hover table-bordered">
        <tr class="table-primary">
            <td>Canton Name : ชื่อตำบล</td>
            
            <td>Amount People In This Canton : จำนวนคนในตำบลนั้นๆ</td>

        </tr>
        @foreach($results as $result)
        <tr>
            <td>{{$result->canton_name}}</td>
            
            <td>{{$result->total}}</td>
            
        </tr> 
        @endforeach 
            </table>   
        </div>
        <div class="row">
                <div class="col">
                    {!! $results->links("pagination::bootstrap-4") !!}
                </div>
        </div>
    </div>
</body>
</html>
@endsection