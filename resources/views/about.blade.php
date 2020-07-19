@extends('layouts.app')
@section('body')
<style>
    select{
        margin-left:15px;
        margin-top:5px;
    }
    label{
        margin-top:10px;
        margin-left:20px;
    }
</style>
    <!--<div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown button
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
            @foreach ($count as $count_var)        
                <a class="dropdown-item" value={{$count_var->id}}>{{$count_var->class_name}}</a>          
            @endforeach
        </div>
    </div>-->
    <div class="form-group row">
        <label for="class_dropdown text-center">Select Class</label>
        <select autofocus="" class="form-control col-md-2" id="class_dropdown">
            @foreach ($count as $count_var) {
                <option value={{$count_var->id}}>{{$count_var->class_name}}</option>
            }
            @endforeach
        </select>
    </div>
<script>
    $(document).ready(function(){
        $("#class_dropdown").change(function () {
            var class_value = $(this).val();
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
                }
            });
            $.ajax({
               type:'POST',
               url:"{{url('/find_class')}}",
               data:{'class_value':class_value,_token: '{!! csrf_token() !!}'},
               dataType: 'json',
               success:function(data) {
                  console.log(data);
               }
            });
        });
    });
</script>
@endsection