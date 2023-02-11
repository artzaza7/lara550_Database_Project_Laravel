<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House Create Data</title>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="containe mt-2 text-center">
        <h1>Welcome to HouseRegistration Create Data</h1>
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
        <form action="{{ route('houseRegisterStore') }}" method="get">
                
        <div class="row">
            <label for="" class="col-form-label-lg">House Number(ทะเบียนบ้าน) </label>
  
                <select select name="house_id" id="house_id" class="form-select form-select-lg house_id">
                     <option value="">Select your House | ทำการเลือกข้อมูลทะเบียนบ้าน</option>
                        @foreach($houses as $house)
                            <option value={{$house->house_id}}>{{$house->house_number}}</option>
                         @endforeach
                </select>
        </div>

        <div class="row">
            <label for="" class="col-form-label-lg">People Gender(เพศผู้อยู่อาศัย) </label>
  
                <select select name="register_people_sex_id" id="register_people_sex_id" class="form-select form-select-lg register_people_sex_id">
                     <option value="">Select your gender | ทำการเลือกข้อมูลเพศ</option>
                        @foreach($registersexs as $registersex)
                            <option value={{$registersex->register_people_sex_id}}>{{$registersex->register_people_sex_name}}</option>
                         @endforeach
                </select>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group my-2">
                    <strong>People Name</strong>   
                    <input type="text" name="registration_people_name" class="form-control" placeholder="People Name">
                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group my-2">
                    <strong>People Surname</strong>   
                    <input type="text" name="registration_people_surname" class="form-control" placeholder="People Surname">
                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group my-2">
                    <strong>People Number</strong>   
                    <input type="number" name="registration_people_number" class="form-control" placeholder="People Number">
                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group my-2">
                    <strong>People Birthday</strong>   
                    <input type="date" name="registration_people_birthday" class="form-control" placeholder="People Birday">
                    
                </div>
            </div>
        </div>

        <div class="row">
        <div class="col-md-12">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
        </form>
        <div class="row mt-2">
            <br>
            <div><a href="{{route('houseRegister')}}" class="btn btn-primary">Back</a></div>
        </div>
    </div>
</body>
</html>