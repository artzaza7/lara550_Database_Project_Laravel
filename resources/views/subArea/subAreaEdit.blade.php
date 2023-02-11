<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SubArea Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-2 text-center">
        <h1>Welcome to SubArea Edit Page</h1>
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
    @foreach($subareas as $subarea)
    <form action="{{route('subAreaUpdate', $subarea->sub_area_id)}}" method="get">
            
        <div class="row">
            <label for="" class="col-form-label-lg">Canton(ตำบล / แขวง) </label>
  
            <select name="canton_id" id="canton_id" class="form-select form-select-lg canton_id" >
                @foreach($cantons as $canton)    
                    <option value="{{$canton->canton_id}}" 
                        {{ ($canton->canton_id == $subarea->canton_id) ? 'selected' : ''}}
                        >{{$canton->canton_name}}
                    </option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group my-2">
                    <strong>SubArea Name</strong>
                    <input type="text" name="sub_area_name" class="form-control" placeholder="Sub Area Name" value={{$subarea->sub_area_name}}>
                    
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group my-2">
                    <strong>SubArea Size</strong>
                    <input type="number" name="sub_area_size" class="form-control" placeholder="Sub Area Size | Number" value={{$subarea->sub_area_size}}>
                    
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group my-2">
                    <strong>SubArea Latitude</strong>
                    <input type="text" name="sub_area_latitude" class="form-control" placeholder="Sub Area Latitude" value={{$subarea->sub_area_latitude}}>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group my-2">
                    <strong>SubArea Longitude</strong>
                    <input type="text" name="sub_area_longitude" class="form-control" placeholder="Sub Area longitude" value={{$subarea->sub_area_longitude}}>
                    
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group my-2">
                    <strong>SubArea Near Coastal [No/Yes]</strong>
                    <select name="sub_area_near_coastal" id="sub_area_near_coastal" class="form-select form-select-lg canton_id" >
                        @foreach($nearCoastal as $near)    
                            <option value="{{$near->sub_area_near_coastal}}" 
                                {{ ($near->sub_area_near_coastal == $subarea->sub_area_near_coastal) ? 'selected' : ''}}
                                >{{$near->sub_area_near_coastal_name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group my-2">
                    <strong>Type of SubArea</strong>
                    <select name="type_sub_area_id" id="type_sub_area_id" class="form-select form-select-lg" >
                        @foreach($typesubareas as $typesubarea)    
                            <option value="{{$typesubarea->type_sub_area_id}}" 
                                {{ ($typesubarea->type_sub_area_id == $subarea->type_sub_area_id) ? 'selected' : ''}}
                                >{{$typesubarea->type_sub_area_name}}
                            </option>
                        @endforeach
                    </select>
                    <br>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
        </form>
    @endforeach
    <br>
        <div class="row">
            <br>
            <div><a href="{{route('subArea')}}" class="btn btn-primary">Back</a></div>
        </div>
    </div>
</body>
</html>