@extends('layouts/site')
@section('content')
    @foreach($datas as $data) 

        <button onclick="calltoaction({{ $data->id }})">
            {{ $data->id }}-MAR_BODI_ALAM 
        </button>
        <button onclick="clearIntervalId({{ $data->id }})" >
            {{ $data->id }}-CLEAR_BODI_ALAM
        </button> 
        <br/>
    @endforeach

    

    <script type="text/javascript">
        var token="{{csrf_token()}}";
        var url = "{{url('async')}}";

        var data = {};

        data['_token']=token;

        var interval = {};

        function calltoaction(id){
            interval[id] = setInterval(myTimer ,1000,id);
        }

        function myTimer(id) {
           console.log('interval for bodi alam:'+id);
        }

        function clearIntervalId(id){
            clearInterval(interval[id]);
            console.log('cleared interval for bodi alam:'+id);
        }



        function sendupdate(id){

            data['id'] = id;
            @if(!isset($updated))
            data['stage6'] = 1;
            @endif
            data['stage7'] = 1;

            $.ajax({
                method: "POST",
                url: url,
                data: data,
            }).done(function( result ) {

                if(result.success > 0){
                    $("#stg"+id).hide();

                    @if(!isset($updated))
                    $("#s6"+id).css('background-color','#22701f');
                    @endif

                    $("#s7"+id).css('background-color','#22701f');

                    @if(!isset($updated))
                    $("#s6"+id).text("COMPLETED");
                    @endif

                    $("#s7"+id).text("COMPLETED");

                }
            });

        }

        

    </script>

@endsection