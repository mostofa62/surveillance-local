@extends('layouts/site')
@section('content')
    <link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/typeahead.js-master/dist/typehead-min.css')}}" rel="stylesheet">

    <div class="row panel-body">
        {!! Form::open(array('url' => '','id'=>'form','method' => 'get',  'enctype'=>'multipart/form-data')) !!}
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                
                <div class="col-md-3">
                    {!! Form::text('start_date', Input::old('start_date',isset($question->start_date)?$question->start_date:date('Y/m/d', strtotime('-6 days'))),array('id'=>'start_date','class' => 'form-control datepick','placeholder'=>'Start Date')) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::text('end_date', Input::old('end_date',isset($question->end_date)?$question->end_date:date('Y/m/d')),array('id'=>'end_date','class' => 'form-control datepick','placeholder'=>'end Date')) !!}
                </div>
                <input type="submit" class="submit btn btn-primary"/>
            </div>
        </div>
        {{ Form::close() }}
        <div class="col-md-12 col-lg-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">COVID-19 Confirmed Patients </h3>
                <p>(up to {!! @date('d/m/Y') !!})</p>
                <div class="flot-chart">
                    <div class="flot-chart-content" id="case-date-vs-quantity"></div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Gender Distribution of Confirmed Patients</h3>
                <p>(n={!! @$sumMF !!})</p>
                <div id="piechart">
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Age Distribution of Confirmed Patients</h3>
                <p>(n={!! @$sumAG !!})</p>
                <div class="flot-chart">
                    <div class="flot-chart-content" id="case-age-group-vs-quantity"></div>
                </div>
            </div>
        </div>
        {{--
        <div class="col-md-6 col-lg-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Comorbidity of the Confirmed Patients</h3>
                <p>(n={!! @$sumC !!})</p>
                <div id="comorbidity">
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Travel History of Confirmed Patients </h3>
                <p>(n={!! @$sumTH !!})</p>
                <div id="travelHistory">
                </div>
            </div>
        </div>
        --}}
        

        <div class="col-md-12 col-lg-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Outcome of Confirmed Patients</h3>
                <p>(n={!! @$sumOC !!})</p>
                <div id="exposure">
                </div>
            </div>
        </div>

        
        
        
       
        

    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/typeahead.js-master/dist/typeahead.bundle.min.js')}}"></script>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawDateVsQuantity);
        google.charts.setOnLoadCallback(drawAgeGroupVsQuantity);
        google.charts.setOnLoadCallback(drawChart);        
        //google.charts.setOnLoadCallback(drawComorbidity);
        //google.charts.setOnLoadCallback(drawTravelHistory);
        google.charts.setOnLoadCallback(drawChartOutCome);
        

        function drawDateVsQuantity() {
            var data = google.visualization.arrayToDataTable([
              ['Date', 'Number of Patients'],
             
              
              @foreach ($covidDateVsQuantity as $value)
              ['{!! @date('d/m/Y', strtotime(@$value->date)) !!}',{!! @$value->quantity !!}],
              @endforeach
              
              
            ]);

            var options = {
                //title: '(up to March 25, 2020)',
                legend: { position: 'top', maxLines: 3 },
                bar: { groupWidth: '100%' },
                isStacked: false,
                tooltip: {isHtml: true},
                hAxis: { 
                    direction: -1, 
                    slantedText: true, 
                    slantedTextAngle: 45 // here you can even use 180 
                } 
                /*
                vAxis: {
                    //format: "#'%'"
                    title: 'Number of patients'
                }*/

            };

            var chart = new google.visualization.ColumnChart(document.getElementById('case-date-vs-quantity'));

            chart.draw(data, options);

        }

        function drawAgeGroupVsQuantity() {
            var data = google.visualization.arrayToDataTable([
              ['Age Group ', 'Number of Patients'],
             
              
              @foreach ($covidAgeGroupVsQuantity as $key => $value)
              ['{!! @$key !!}',{!! @$value !!}],
              @endforeach
              
              
            ]);

            var options = {
                //title: '(up to March 25, 2020)',
                legend: { position: 'top', maxLines: 3 },
                bar: { groupWidth: '100%' },
                isStacked: false,
                tooltip: {isHtml: true},
                
                hAxis: { 
                    //direction: -1, 
                    //slantedText: true, 
                    //slantedTextAngle: 45 // here you can even use 180 
                    title: 'Age Group'
                }
                /*
                vAxis: {
                    //format: "#'%'"
                    title: 'Number of patients'
                }*/

            };

            var chart = new google.visualization.ColumnChart(document.getElementById('case-age-group-vs-quantity'));

            chart.draw(data, options);

        }

        function drawComorbidity() {

            var data = google.visualization.arrayToDataTable([
                ['Comorbidity', 'No of Case', { role: 'style' }],
                @foreach ($comorbidityInfo as $key => $value)
                ['{!! @$value !!}',{!! @$comorbidity[$key] !!}, '#33{!!@$key!!}6cc'],
                @endforeach
            ]);

            var options = {
                width: '100%',
                height: 400,
                pieSliceText: 'value',
                /*
                tooltip: {
                    text: 'value'
                }*/
//                title: 'Gender Pie Chart'
            };
            var chart = new google.visualization.PieChart(document.getElementById('comorbidity'));

            chart.draw(data, options);

        }

        function drawTravelHistory() {

            var data = google.visualization.arrayToDataTable([
                ['Travel History', 'No of Case', { role: 'style' }],
                @foreach ($travelHistoryInfo as $key => $value)
                ['{!! @$value !!}',{!! @$travelHistory[$key] !!}, '#33{!!@$key!!}6cc'],
                @endforeach
            ]);

            var options = {
                width: '100%',
                height: 400,
                pieSliceText: 'value',
                /*
                tooltip: {
                    text: 'value'
                }*/
//                title: 'Gender Pie Chart'
            };
            var chart = new google.visualization.PieChart(document.getElementById('travelHistory'));

            chart.draw(data, options);

        }
                

        function drawChartOutCome() {

            var data = google.visualization.arrayToDataTable([
                ['History', 'No of Case', { role: 'style' }],
                @foreach ($outcomenfo as $key => $value)
                ['{!!@$value!!}',{!!@$outcome[$key]!!}, '#33{!!@$key!!}6cc'],
                @endforeach
            ]);

            var options = {
                width: '100%',
                height: 400,
                pieSliceText: 'value',
//                title: 'Gender Pie Chart'
            };
            var chart = new google.visualization.PieChart(document.getElementById('exposure'));

            chart.draw(data, options);

        }

        



        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Gender', 'No of Case', { role: 'style' }],
                @foreach (\App\Common::getDengueGenderType() as $key => $value)
                ['{!!@$value!!}',{!!@$denguePie[$key]!!}, '#33{!!@$key!!}6cc'],
                @endforeach
            ]);

            var options = {
                width: '100%',
                height: 400,
                pieSliceText: 'value',
                /*
                tooltip: {
                    text: 'value'
                }*/
//                title: 'Gender Pie Chart'
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);

        }

       
  


       
        
    </script>



   

    

@endsection