<link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/typeahead.js-master/dist/typehead-min.css')}}" rel="stylesheet">

    <div class="row panel-body">
        {!! Form::open(array('url' => '','id'=>'form','method' => 'get',  'enctype'=>'multipart/form-data')) !!}
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::select('area', [''=>'---Select Location---']+$area,Input::old('area',isset($question->area)?$question->area:''), array('id' => 'area', 'class' => 'form-control select2')) !!}
                </div>
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

        <div class="col-md-6 col-lg-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Sex Distribution</h3>
                <div id="piechart">
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Daily Reported Case</h3>
                <div class="flot-chart">
                    <div class="flot-chart-content" id="case-date-flot-line-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Age Distribution (%)  <span>n=<strong class="total"></strong></span></h3>
                <div class="flot-chart">
                    <div class="flot-chart-content" id="age-group-date-flot-line-chart"></div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Age Distribution (Histrogram) <span>n=<strong class="total"></strong></span></h3>
                <div class="flot-chart">
                    <div class="flot-chart-content" id="age-group-his-chart"></div>
                </div>
            </div>
        </div>

    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/typeahead.js-master/dist/typeahead.bundle.min.js')}}"></script>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChatBar);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Gender', 'No of Case', { role: 'style' }],
                @foreach (\App\Common::getDengueGenderType() as $key => $value)
                ['{!!@$value!!}',{!!@$denguePie[$key]!!}, '#33{!!@$key!!}6cc'],
                @endforeach
            ]);

            var options = {
                width: '100%',
                height: 400
//                title: 'Gender Pie Chart'
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);

        }

        function drawChatBar() {
            var data = google.visualization.arrayToDataTable([
                ['Date', 
                '<1', {type: 'string', role: 'tooltip', 'p': {'html': true}}, 
                '1-4', {type: 'string', role: 'tooltip', 'p': {'html': true}}, 
                '5-14', {type: 'string', role: 'tooltip', 'p': {'html': true}},
                '15-24', {type: 'string', role: 'tooltip', 'p': {'html': true}},
                '25-34', {type: 'string', role: 'tooltip', 'p': {'html': true}},
                '35-44', {type: 'string', role: 'tooltip', 'p': {'html': true}},
                '45-54', {type: 'string', role: 'tooltip', 'p': {'html': true}},
                '55-64', {type: 'string', role: 'tooltip', 'p': {'html': true}},
                '65+', {type: 'string', role: 'tooltip', 'p': {'html': true}} ],
                @foreach ($denguebar['0'] as $key => $value)
                    @php
                        $v1=0;
                        $v2=0;
                        $v3=0;
                        $v4=0;
                        $v5=0;
                        $v6=0;
                        $v7=0;
                        $v8=0;
                        $v9=0;
                    @endphp
                ['{!!@date('d/m/Y', strtotime($value->date_of_admission))!!}',

                    @if(isset($denguebar['1'][$value->date_of_admission])&&$denguebar['1'][$value->date_of_admission]!="" &&$denguebar['1'][$value->date_of_admission]!=0)
                        @php
                            $v1 = number_format($denguebar['1'][$value->date_of_admission]*100/$denguebarCase[$value->date_of_admission],0);
                            
                        @endphp
                    @endif
                    {{ $v1 }},'<div style="padding:8px;"><p><strong>{!!@date('d/m/Y', strtotime($value->date_of_admission))!!}</strong></p><p><strong><1:</strong><strong style="margin-left:5px;">{{$v1}}%</strong></p></div>',
                
                    @if(isset($denguebar['2'][$value->date_of_admission])&&$denguebar['2'][$value->date_of_admission]!=""&&$denguebar['2'][$value->date_of_admission]!=0)
                    @php    
                        $v2=number_format($denguebar['2'][$value->date_of_admission]*100/$denguebarCase[$value->date_of_admission],0);
                    @endphp 
                    @endif
                    {{ $v2 }},'<div style="padding:8px;"><p><strong>{!!@date('d/m/Y', strtotime($value->date_of_admission))!!}</strong></p><p><strong>1-4:</strong><strong style="margin-left:5px;">{{$v2}}%</strong></p></div>',
                
                    
                    
                    @if(isset($denguebar['3'][$value->date_of_admission])&&$denguebar['3'][$value->date_of_admission]!=""&&$denguebar['3'][$value->date_of_admission]!=0)
                    @php
                    $v3=number_format(@$denguebar['3'][$value->date_of_admission]*100/$denguebarCase[$value->date_of_admission],0);
                    @endphp
                    @endif
                    {{ $v3 }},'<div style="padding:8px;"><p><strong>{!!@date('d/m/Y', strtotime($value->date_of_admission))!!}</strong></p><p><strong>5-14:</strong><strong style="margin-left:5px;">{{$v3}}%</strong></p></div>',
                    
                    
                    @if(isset($denguebar['4'][$value->date_of_admission])&&$denguebar['4'][$value->date_of_admission]!=""&&$denguebar['4'][$value->date_of_admission]!=0)
                    @php    
                    $v4=number_format(@$denguebar['4'][$value->date_of_admission]*100/$denguebarCase[$value->date_of_admission],0);
                    @endphp
                    @endif
                    {{ $v4 }},'<div style="padding:8px;"><p><strong>{!!@date('d/m/Y', strtotime($value->date_of_admission))!!}</strong></p><p><strong>15-24:</strong><strong style="margin-left:5px;">{{$v4}}%</strong></p></div>',
                    
                    
                    @if(isset($denguebar['5'][$value->date_of_admission])&&$denguebar['5'][$value->date_of_admission]!=""&&$denguebar['5'][$value->date_of_admission]!=0)
                    @php
                    $v5 = number_format(@$denguebar['5'][$value->date_of_admission]*100/$denguebarCase[$value->date_of_admission],0);
                    @endphp
                    @endif
                    {{ $v5 }},'<div style="padding:8px;"><p><strong>{!!@date('d/m/Y', strtotime($value->date_of_admission))!!}</strong></p><p><strong>25-34:</strong><strong style="margin-left:5px;">{{$v5}}%</strong></p></div>',

                    
                    @if(isset($denguebar['6'][$value->date_of_admission])&&$denguebar['6'][$value->date_of_admission]!=""&&$denguebar['6'][$value->date_of_admission]!=0)
                    @php
                    $v6=number_format(@$denguebar['6'][$value->date_of_admission]*100/$denguebarCase[$value->date_of_admission],0);
                    @endphp
                    @endif
                    {{ $v6 }},'<div style="padding:8px;"><p><strong>{!!@date('d/m/Y', strtotime($value->date_of_admission))!!}</strong></p><p><strong>35-44:</strong><strong style="margin-left:5px;">{{$v6}}%</strong></p></div>',

                    @if(isset($denguebar['7'][$value->date_of_admission])&&$denguebar['7'][$value->date_of_admission]!=""&&$denguebar['7'][$value->date_of_admission]!=0)
                    @php
                    $v7=number_format(@$denguebar['7'][$value->date_of_admission]*100/$denguebarCase[$value->date_of_admission],0);
                    @endphp
                    @endif
                    {{ $v7 }},'<div style="padding:8px;"><p><strong>{!!@date('d/m/Y', strtotime($value->date_of_admission))!!}</strong></p><p><strong>45-54:</strong><strong style="margin-left:5px;">{{$v7}}%</strong></p></div>',

                    
                    @if(isset($denguebar['8'][$value->date_of_admission])&&$denguebar['8'][$value->date_of_admission]!=""&&$denguebar['8'][$value->date_of_admission]!=0)
                    @php
                    $v8=number_format(@$denguebar['8'][$value->date_of_admission]*100/$denguebarCase[$value->date_of_admission],0);
                    @endphp
                    @endif
                    {{ $v8 }},'<div style="padding:8px;"><p><strong>{!!@date('d/m/Y', strtotime($value->date_of_admission))!!}</strong></p><p><strong>55-64:</strong><strong style="margin-left:5px;">{{$v8}}%</strong></p></div>',

                    
                    @if(isset($denguebar['9'][$value->date_of_admission])&&$denguebar['9'][$value->date_of_admission]!=""&&$denguebar['9'][$value->date_of_admission]!=0)
                    @php
                    $v9=number_format(@$denguebar['9'][$value->date_of_admission]*100/$denguebarCase[$value->date_of_admission],0);
                    @endphp
                    @endif
                    {{ $v9 }},'<div style="padding:8px;"><p><strong>{!!@date('d/m/Y', strtotime($value->date_of_admission))!!}</strong></p><p><strong>65+:</strong><strong style="margin-left:5px;">{{$v9}}%</strong></p></div>',
],
                @endforeach

            ]);

            var options = {
                legend: { position: 'top', maxLines: 3 },
                bar: { groupWidth: '100%' },
                isStacked: true,
                tooltip: {isHtml: true},
                vAxis: {
                    format: "#'%'"
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('age-group-date-flot-line-chart'));
            
            chart.draw(data, options);

            var data = google.visualization.arrayToDataTable([
                ['Age Group', 'case', { role: 'annotation' } ],
                    @foreach ($denguebarCase as $key => $value)
                ['{!!@date('d/m/Y', strtotime($key))!!}',{!! @$value !!}, ''],
                @endforeach
            ]);

            var options = {
                legend: { position: 'top', maxLines: 3 },
                bar: { groupWidth: '100%' },
                isStacked: false
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('case-date-flot-line-chart'));

            chart.draw(data, options);

            @php
            $total = $dengueAgeHis[1][0]+$dengueAgeHis[2][0]+$dengueAgeHis[3][0]+$dengueAgeHis[4][0]+$dengueAgeHis[5][0]+$dengueAgeHis[6][0]+$dengueAgeHis[7][0]+$dengueAgeHis[8][0]+$dengueAgeHis[9][0];
            function getPercent($value, $total){
                if(isset($value) && !empty($value) && $value!=0 ){
                        return number_format(round(($value * 100)/$total),0);
                }
                return 0;
            }
            $v1 = getPercent($dengueAgeHis[1][0], $total);
            $v2 = getPercent($dengueAgeHis[2][0], $total);
            $v3 = getPercent($dengueAgeHis[3][0], $total);
            $v4 = getPercent($dengueAgeHis[4][0], $total);
            $v5 = getPercent($dengueAgeHis[5][0], $total);
            $v6 = getPercent($dengueAgeHis[6][0], $total);
            $v7 = getPercent($dengueAgeHis[7][0], $total);
            $v8 = getPercent($dengueAgeHis[8][0], $total);
            $v9 = getPercent($dengueAgeHis[9][0], $total);
            @endphp
            
            var data = google.visualization.arrayToDataTable([
                ['Age Group', 'case', {type: 'string', role: 'tooltip', 'p': {'html': true}}, { role: 'annotation' } ],
                ['<1',{{  $v1 }}, '<div style="padding:8px;"><p><strong><1</strong></p><p><strong>case :</strong><strong style="margin-left:5px;">{{$v1}}%</strong></p></div>' ,''],
                ['1-4',{{ $v2 }},'<div style="padding:8px;"><p><strong>1-4</strong></p><p><strong>case :</strong><strong style="margin-left:5px;">{{$v2}}%</strong></p></div>',''],
                ['5-14',{{ $v3 }}, '<div style="padding:8px;"><p><strong>5-14</strong></p><p><strong>case :</strong><strong style="margin-left:5px;">{{$v3}}%</strong></p></div>',''],
                ['15-24',{{ $v4 }},'<div style="padding:8px;"><p><strong>15-24</strong></p><p><strong>case :</strong><strong style="margin-left:5px;">{{$v4}}%</strong></p></div>', ''],
                ['25-34',{{ $v5 }},'<div style="padding:8px;"><p><strong>25-34</strong></p><p><strong>case :</strong><strong style="margin-left:5px;">{{$v5}}%</strong></p></div>', ''],
                ['35-44',{{ $v6 }},'<div style="padding:8px;"><p><strong>35-44</strong></p><p><strong>case :</strong><strong style="margin-left:5px;">{{$v6}}%</strong></p></div>', ''],
                ['45-54',{{ $v7 }}, '<div style="padding:8px;"><p><strong>45-54</strong></p><p><strong>case :</strong><strong style="margin-left:5px;">{{$v7}}%</strong></p></div>',''],
                ['55-64', {{ $v8 }},'<div style="padding:8px;"><p><strong>55-64</strong></p><p><strong>case :</strong><strong style="margin-left:5px;">{{$v8}}%</strong></p></div>', ''],
                ['65+', {{ $v9 }},'<div style="padding:8px;"><p><strong>65+</strong></p><p><strong>case :</strong><strong style="margin-left:5px;">{{$v9}}%</strong></p></div>', ''],
            ]);

            var options = {
                legend: { position: 'top', maxLines: 3 },
                bar: { groupWidth: '100%' },
                isStacked: false,
                tooltip: {isHtml: true},
                vAxis: {
                    format: "#'%'"
                }
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('age-group-his-chart'));

            chart.draw(data, options);
        }
        $('.total').html("<?=$total?>");
    </script>