<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>HouseRegistration Delete</title>
</head>
<body>
    @foreach($registers as $register)
<div class="card text-center">
  <div class="card-header">
    HouseRegistration Delete Confirm Card
  </div>
  <div class="card-body">
    <h5 class="card-title">HouseRegistration Name : {{$register->registration_people_name}}</h5>
    <p class="card-text">HouseRegistration Surname : {{$register->registration_people_surname}} | 
        HouseRegistration Number : {{$register->registration_people_number}} |
        House ID : {{$register->house_id}}
    </p>
    <a href="{{route('houseRegister')}}" class="btn btn-primary">Back</a>

    <form action="{{route('houseRegisterDestroy', $register->house_registration_id)}}" method="get">
        
        <br>
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
  </div>
  <div class="card-footer text-muted">
    Are you sure to delete this HouseRegistration
  </div>
</div>
    @endforeach
</body>
</html>