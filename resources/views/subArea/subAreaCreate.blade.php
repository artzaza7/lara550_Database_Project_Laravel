<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SubArea Create Data</title>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="containe mt-2 text-center">
        <h1>Welcome to SubArea Create Data</h1>
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
        <div class="row">
            
            <label for="" class="col-form-label-lg">Sector(ภูมิภาค) </label>
  
            <select name="sector" id="sector" class="form-select form-select-lg sector">
                <option value="">Select your Sector | ทำการเลือกข้อมูลภูมิภาค</option>
                @foreach($sectors as $sector)
                    <option value={{$sector->sector_id}}>{{$sector->sector_name}}</option>
                @endforeach
            </select>
            
        </div>
        
        <div class="row">
            <label for="" class="col-form-label-lg">Province(จังหวัด) </label>
  
            <select name="province" id="province" class="form-select form-select-lg province">
                <option value="">Select your Province | ทำการเลือกข้อมูลจังหวัด</option>
                
            </select>
        </div>
        
        <div class="row">
            <label for="" class="col-form-label-lg">District(อำเภอ / เขต) </label>
  
            <select name="district" id="district" class="form-select form-select-lg district">
                <option value="">Select your District | ทำการเลือกข้อมูลอำเภอหรือเขต</option>
                
            </select>
        </div>
        
        <form action="{{route('subAreaStore')}}" method="get">
            
        <div class="row">
            <label for="" class="col-form-label-lg">Canton(ตำบล / แขวง) </label>
  
            <select name="canton_id" id="canton_id" class="form-select form-select-lg canton_id">
                <option value="">Select your Canton | ทำการเลือกข้อมูลตำบลหรือแขวง</option>
            </select>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group my-2">
                    <strong>SubArea Name</strong>
                    <input type="text" name="sub_area_name" class="form-control" placeholder="Sub Area Name">
                    
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group my-2">
                    <strong>SubArea Size</strong>
                    <input type="number" name="sub_area_size" class="form-control" placeholder="Sub Area Size | Number">
                    
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group my-2">
                    <strong>SubArea Latitude</strong>
                    <input type="text" name="sub_area_latitude" class="form-control" placeholder="Sub Area Latitude">
                    
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group my-2">
                    <strong>SubArea Longitude</strong>
                    <input type="text" name="sub_area_longitude" class="form-control" placeholder="Sub Area longitude">
                    
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group my-2">
                    <strong>SubArea Near Coastal [No/Yes]</strong>
                    <select name="sub_area_near_coastal" id="sub_area_near_coastal" class="form-select form-select-lg">
                    @foreach($nearCoastal as $near)
                        <option value={{$near->sub_area_near_coastal}}>{{$near->sub_area_near_coastal_name}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group my-2">
                    <strong>Type of SubArea</strong>
                    <select name="type_sub_area_id" id="type_sub_area_id" class="form-select form-select-lg">
                        @foreach($typesubareas as $typesubarea)
                            <option value={{$typesubarea->type_sub_area_id}}>{{$typesubarea->type_sub_area_name}}</option>
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
        <br>
        <div class="row">
            <br>
            <div><a href="{{route('subArea')}}" class="btn btn-primary">Back</a></div>
        </div>
    </div>
    {{csrf_field()}}
</body>
<script type="text/javascript">
    $(document).ready(function(){
        $('#sector').on('change', function() {
            if($(this).val()!=''){
                var sector_id = $(this).val();
                console.log(sector_id);
                // var _token=$('input[name="_token"]').val();
                $.ajax({
                    url:"{{route('subAreaCreate_dropdown_Sector')}}",
                    method:"GET",
                    data:{sector_id:sector_id},
                    success:function(result){
                        // ทำอะไรต่อ
                        $('.province').html(result);
                    }
                })
            }
        });

        $('#province').on('change', function() {
            if($(this).val()!=''){
                var province_id = $(this).val();
                console.log(province_id);

                $.ajax({
                    url:"{{route('subAreaCreate_dropdown_Province')}}",
                    method:"GET",
                    data:{province_id:province_id},
                    success:function(result){
                        //ทำอะไรต่อ
                        $('.district').html(result);
                    }
                })
            }
        });

        $('#district').on('change', function() {
            if($(this).val()!=''){
                var district_id = $(this).val();
                console.log(district_id);

                $.ajax({
                    url:"{{route('subAreaCreate_dropdown_District')}}",
                    method:"GET",
                    data:{district_id:district_id},
                    success:function(result){
                        //ทำต่ออะไร
                        $('.canton_id').html(result);
                    }
                })
            }
        });
    });
</script>
</html>