<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>House Delete</title>
</head>
<body>
    @foreach($houses as $house)
<div class="card text-center">
  <div class="card-header">
    House Delete Confirm Card
  </div>
  <div class="card-body">
    <h5 class="card-title">House ID : {{$house->house_id}}</h5>
    <p class="card-text">House Number : {{$house->house_number}} | SubArea ID : {{$house->sub_area_id}}
    </p>
    <a href="{{route('house')}}" class="btn btn-primary">Back</a>

    <form action="{{route('houseDestroy', $house->house_id)}}" method="get">
        
        <br>
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
  </div>
  <div class="card-footer text-muted">
    Are you sure to delete this House
  </div>
</div>
    @endforeach
</body>
</html>