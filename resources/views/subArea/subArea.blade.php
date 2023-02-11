@extends('index')
@section('title', 'SubArea')
@section('topbar')
    @parent
        : SubArea Page
@endsection

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SubArea</title>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-auto">
                <a href="{{route('subAreaCreate')}}" class="btn btn-success">Create SubArea</a>
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
            <td>Sector Name</td>
            <td>Province Name</td>
            <td>District Name</td>
            <td>Canton Name</td>

            <td>SubArea Name</td>
            <td>SubArea Size</td>
            <td>SubArea Latitude</td>
            <td>SubArea Longtitude</td>
            <td>SubArea Near Coastal</td>
            <td>SubArea Type Name</td>

            <td>Update Button</td>
            <td>Delete Button</td>
        </tr>
        
        @foreach($District_Province_Sector_Canton_SubArea_lists as $DPSC_list)
        <tr>
            <td>{{$DPSC_list->sector_name}}</td>
            <td>{{$DPSC_list->province_name}}</td>
            <td>{{$DPSC_list->district_name}}</td>
            <td>{{$DPSC_list->canton_name}}</td>
            
            <td>{{$DPSC_list->sub_area_name}}</td>
            <td>{{$DPSC_list->sub_area_size}}</td>
            <td>{{$DPSC_list->sub_area_latitude}}</td>
            <td>{{$DPSC_list->sub_area_longitude}}</td>
            <td>{{$DPSC_list->sub_area_near_coastal_name}}</td>
            <td>{{$DPSC_list->type_sub_area_name}}</td>

            <td>
                <a href="{{route('subAreaEdit', [$DPSC_list->sub_area_id, $DPSC_list->district_id, $DPSC_list->sub_area_near_coastal])}}" class="btn btn-warning">Edit</a>    
            </td>
            <td>
                <a href="{{route('subAreaDelete', [$DPSC_list->sub_area_id])}}" class="btn btn-danger">Delete</a>    
            </td>
        </tr>
        @endforeach
        
        
            </table>
            
        </div>
        <div class="row">
            
                <div class="col">
                    {!! $District_Province_Sector_Canton_SubArea_lists->links("pagination::bootstrap-4") !!}
                </div>
        </div>
    </div>

    

    
</body>
    @endsection
</html>

