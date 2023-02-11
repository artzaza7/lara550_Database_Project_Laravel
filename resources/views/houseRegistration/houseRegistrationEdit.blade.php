<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HouseRegistration Edit</title>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-2 text-center">
        <h1>Welcome to HouseRegistration Edit Page</h1>
    </div>
    <div class="container mt-2">
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
        @foreach($registers as $register)
        <form action="{{route('houseRegisterUpdate', $register->house_registration_id)}}" method="get">
            

            <div class="row">
            <label for="" class="col-form-label-lg">House(ทะเบียนบ้าน) </label>
            <select name="house_id" id="house_id" class="form-select form-select-lg house_id" >
                @foreach($houses as $house)    
                    <option value="{{$house->house_id}}" 
                        {{ ($house->house_id == $register->house_id) ? 'selected' : ''}}
                        >{{$house->house_number}}
                    </option>
                @endforeach
            </select>
            </div>

            <div class="row">
            <label for="" class="col-form-label-lg">Gender(เพศ) </label>
            <select name="register_people_sex_id" id="register_people_sex_id" class="form-select form-select-lg register_people_sex_id" >
                @foreach($sexs as $sex)    
                    <option value="{{$sex->register_people_sex_id}}" 
                        {{ ($sex->register_people_sex_id == $register->registration_people_sex_id) ? 'selected' : ''}}
                        >{{$sex->register_people_sex_name}}
                    </option>
                @endforeach
            </select>
            </div>

            <div class="row">
                <div class="col-md-12">
                <div class="form-group my-2">
                    <strong>People Name</strong>
                    <input type="text" name="registration_people_name" class="form-control" placeholder="People Name" value={{$register->registration_people_name}}>
                    
                </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                <div class="form-group my-2">
                    <strong>People Surname</strong>
                    <input type="text" name="registration_people_surname" class="form-control" placeholder="People Surname" value={{$register->registration_people_surname}}>
                    
                </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                <div class="form-group my-2">
                    <strong>People Number</strong>
                    <input type="number" name="registration_people_number" class="form-control" placeholder="People Number" value={{$register->registration_people_number}}>
                    
                </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                <div class="form-group my-2">
                    <strong>People Birthday</strong>
                    <input type="date" name="registration_people_birthday" class="form-control" placeholder="People Birthday" value={{$register->registration_people_birthday}}>
                    
                </div>
                </div>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>

        </form>
        
        @endforeach
        <div class="row mt-2">
            <br>
            <div><a href="{{route('houseRegister')}}" class="btn btn-primary">Back</a></div>
        </div>
        </div>
    
</body>
</html>