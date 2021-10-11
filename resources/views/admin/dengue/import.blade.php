@extends('layouts/master')
@section('content')
    <style>
        .added_element label {
            display: none;
        }

        .added_element .add-element {
            display: none;
        }

        .origin_element .remove-element {
            display: none;
        }

        #dvCSV table tr td{
            padding: 1px !important;
        }
        #dvCSV table tr td input,table tr td select {
            padding: 0px 3px 0px 5px !important;
        }
        .has-error{
            border-style: solid;
            border-color: #ff0000;
        }
    </style>
    <div class="app-content-body ">
        <div class="hbox hbox-auto-xs hbox-auto-sm">
            <div class="col">
                <!-- main header -->
                <div class="bg-light lter b-b wrapper-sm">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <h1 class="m-n font-thin h4 text-black "> {{@$page_title}} </h1>
                        </div>
                    </div>
                </div>
                <div class="wrapper-xs">
                    <div class="bg-white-only">
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="box">
                                        <div class="text-center">
                                            <span  style="font-size:16px">Please download the csv format file from <a id="downloadcsv" style="color: red" href="{{URL::to('dengue.csv')}}" target="_blank" download>here!</a></span>
                                        </div>
                                        <div class="box-content nopadding">
                                            {!! Form::open(['url' =>URL::to(session('access').'dengue/import') , 'method'=>'POST', 'class'=>'form-horizontal form-wizard', 'id' => 'profile_form',  'enctype'=>'multipart/form-data' ]) !!}


                                            <div class="col-md-12">
                                                <input id="fileUpload" name="csv_file" type="file">
                                                <span class="help-inline error" id="PersonalInfo_csv_file_em_" style="display: none"></span>
                                            </div>
                                            <input type="submit" class="btn btn-primary pull-right" value="সংরক্ষণ" onclick="return form_validation()">

                                            <div id="dvCSV">
                                            </div>

                                            {{ Form::close() }}
                                            <label class="text-danger alert_text"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        $(document).ready(function () {

            $("#fileUpload").bind("change", function () {
                var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.csv|.txt)$/;
                if (regex.test($("#fileUpload").val().toLowerCase())) {
                    if (typeof (FileReader) != "undefined") {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var table = $("<table class='table'/>");
                            var rows = e.target.result.split("\n");


                            var row = $("<tr/>");
                            var cells = CSVtoArray(rows[0]);
                            if (cells.length > 1) {
                                for (var j = 0; j < cells.length; j++) {
                                    var cell = $("<td />");
                                    if(j!=7)
                                        cell.html(cells[j]);
                                    row.append(cell);
                                }
                                table.append(row);
                            }
                            for (var i = 1; i < rows.length; i++) {
                                var row = $("<tr/>");
                                var cells = CSVtoArray(rows[i]);
                                console.log(i)

                                if (cells.length > 1) {
                                    for (var j = 0; j < cells.length; j++) {

                                        var cell = $("<td />");
                                        switch (j) {
                                            case 0:
                                                cell.html('<input class="form-control site_name"name="site_id[]" type="text" value="'+cells[j]+'">');
                                                break;
                                            case 1:
                                                cell.html('<input class="form-control site_name"name="site_name[]" type="text" value="'+cells[j]+'">');
                                                break;
                                            case 2:
                                                cell.html('<input class="form-control name" name="name[]" type="text" value="'+cells[j]+'">');
                                                break;
                                            case 3:
                                                cell.html('<input class="form-control age" name="age[]" type="text" value="'+cells[j]+'">');
                                                break;
                                            case 4:
                                                cell.html('<input class="form-control sex" name="sex[]" type="text" value="'+cells[j]+'">');
                                                break;
                                            case 5:
                                                cell.html('<input class="form-control address" name="address[]" type="text" value="'+cells[j]+'">');
                                                break;
                                            case 6:
                                                if(cells[j]!=51)
                                                    cell.html('<input class="form-control area" name="area[]" type="text" value="'+cells[j]+'">');
                                                else
                                                    cell.html('<input class="form-control area" name="area[]" type="text" value="'+cells[j+1]+'">');
                                                break;
                                            case 8:
                                                cell.html('<input class="form-control mobile_no" name="mobile_no[]" type="text" value="'+cells[j]+'">');
                                                break;
                                            case 9:
                                                cell.html('<input class="form-control date_of_admission datepicker" name="date_of_admission[]" type="text" value="'+cells[j]+'">');
                                                break;
                                            case 10:
                                                cell.html('<input class="form-control lt_ns1" name="lt_ns1[]" type="text" value="'+cells[j]+'">');
                                                break;
                                            case 11:
                                                cell.html('<input class="form-control lt_igm" name="lt_igm[]" type="text" value="'+cells[j]+'">');
                                                break;
                                            case 12:
                                                cell.html('<input class="form-control other_test" name="other_test[]" type="text" value="'+cells[j]+'">');
                                                break;
                                            case 13:
                                                cell.html('<input class="form-control comorbidity" name="comorbidity[]" type="text" value="'+cells[j]+'">');
                                                break;
                                            case 14:
                                                cell.html('<input class="form-control comorbidity_others" name="comorbidity_others[]" type="text" value="'+cells[j]+'">');
                                                break;
                                            case 15:
                                                cell.html('<input class="form-control current_fever_status" name="current_fever_status[]" type="text" value="'+cells[j]+'">');
                                                break;
                                            case 16:
                                                cell.html('<input class="form-control discharge_date datepicker" name="discharge_date[]" type="text" value="'+cells[j]+'">');
                                                break;
                                            case 17:
                                                cell.html('<input class="form-control death_flag" name="death_flag[]" type="text" value="'+cells[j]+'">');
                                                break;
                                            case 18:
                                                cell.html('<input class="form-control death_date datepicker" name="death_date[]" type="text" value="'+cells[j]+'">');
                                                break;
                                            default:
                                                break;
                                        }

                                        // cell.html(cells[j]+'s');
                                        row.append(cell);
                                    }
                                    table.append(row);
                                }

                            }
                            $("#dvCSV").html('');
                            $("#dvCSV").append(table);
                        }
                        reader.readAsText($("#fileUpload")[0].files[0]);
                    } else {
                        alert("This browser does not support HTML5.");
                    }
                } else {
                    alert("Please upload a valid CSV file.");
                }
            });
        });
        function CSVtoArray(text) {
            var re_valid = /^\s*(?:'[^'\\]*(?:\\[\S\s][^'\\]*)*'|"[^"\\]*(?:\\[\S\s][^"\\]*)*"|[^,'"\s\\]*(?:\s+[^,'"\s\\]+)*)\s*(?:,\s*(?:'[^'\\]*(?:\\[\S\s][^'\\]*)*'|"[^"\\]*(?:\\[\S\s][^"\\]*)*"|[^,'"\s\\]*(?:\s+[^,'"\s\\]+)*)\s*)*$/;
            var re_value = /(?!\s*$)\s*(?:'([^'\\]*(?:\\[\S\s][^'\\]*)*)'|"([^"\\]*(?:\\[\S\s][^"\\]*)*)"|([^,'"\s\\]*(?:\s+[^,'"\s\\]+)*))\s*(?:,|$)/g;
            // Return NULL if input string is not well formed CSV string.
            if (!re_valid.test(text)) return null;
            var a = [];                     // Initialize array to receive values.
            text.replace(re_value, // "Walk" the string using replace with callback.
                function(m0, m1, m2, m3) {
                    // Remove backslash from \' in single quoted values.
                    if      (m1 !== undefined) a.push(m1.replace(/\\'/g, "'"));
                    // Remove backslash from \" in double quoted values.
                    else if (m2 !== undefined) a.push(m2.replace(/\\"/g, '"'));
                    else if (m3 !== undefined) a.push(m3);
                    return ''; // Return empty string.
                });
            // Handle special case of empty last value.
            if (/,\s*$/.test(text)) a.push('');
            return a;
        };
        function form_validation() {
            var i = true;
            $('.name').each(function () {
                if ($(this).val() == null || $(this).val() == '') {
                    $(this).css("border-color", "red");
                    // $(this).parent().children('.alert_text').html('Must be greater than 0');
                    i = false;
                }
                else {
                    $(this).css("border-color", "#e4e7ea");
                    // $(this).parent().children('.alert_text').html('');
                }

            });
            console.log(i);
            return i;
        }
        $('#next').click(function(){
            if($(this).val()=="সংরক্ষণ করুন"){
                $('#profile_form').submit();
                window.location.href="{{url('admin/user')}}";
            }
        });


        function clone_element(e, origin, target) {
            $('#' + origin).clone().find(":input").val("").end().appendTo("#" + target).removeClass("hide");
            $('.datepicker').datepicker();
//            $('.datepicker').on('changeDate', function(ev){
//                $(this).datepicker('hide');
//            });
        }


        function remove_element(e) {
            $(e).parent().parent().remove();
        }

        $(function () {
            $('.datepicker').datepicker();
            $('.datepicker').on('changeDate', function(ev){
                $(this).datepicker('hide');
            });
            $('body').on('focus',".datepicker", function(){
                // $(this).datepicker();
                $('.datepicker').datepicker({
                    format: 'yyyy-mm-dd'
                });
            });
        });

    </script>
@stop
