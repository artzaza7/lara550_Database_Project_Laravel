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
        <h1>Welcome to House Create Data</h1>
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
        <form action="{{ route('houseStore') }}" method="get">
                
        <div class="row">
            <label for="" class="col-form-label-lg">SubArea(พื้นที่ย่อย) </label>
  
                <select select name="sub_area_id" id="sub_area_id" class="form-select form-select-lg sub_area_id">
                     <option value="">Select your SubArea | ทำการเลือกข้อมูลพื้นที่ย่อย</option>
                        @foreach($subareas as $subarea)
                            <option value={{$subarea->sub_area_id}}>{{$subarea->sub_area_name}}</option>
                         @endforeach
                </select>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group my-2">
                    <strong>House Number</strong>   
                    <input type="text" name="house_number" class="form-control" placeholder="House Number">
                    
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
            <div><a href="{{route('house')}}" class="btn btn-primary">Back</a></div>
        </div>
    </div>
</body>
</html>