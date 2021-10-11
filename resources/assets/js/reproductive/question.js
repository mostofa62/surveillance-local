/* Common Dom Js, Jquery Ready */

(function () {




$('#exampleValidator').wizard({

     onInit: stepWizardInit(),
     validator: function () {
        var fv = $('#validation').data('formValidation');
        var $this = $(this);
        // Validate the container
        fv.validateContainer($this);
        var isValidStep = fv.isValidContainer($this);
        if (isValidStep === false || isValidStep === null) {
            return false;
        }
        return true;
     },
     onFinish: function () {
        $('#validation').submit();
        $('#validation').append("<input type='hidden' name='submitted_at' value='1' />");
        $("#call_status").append('<option value="1" selected="selected">সাক্ষাৎকার সম্পন্ন হয়েছে</option>');
        $(".wizard-finish ").attr("disabled", "disabled");
        data_submit(true);
     },     
				
});



//others sections for input
//test();
//question_id = parseInt(prompt("Enter question_id"));
//last_input = prompt("Enter last_input");

if( question_id > 0 && last_input!=null ){
    initAllDomDisabled();
    initChange(last_input,step_index);
}else{
    initAllDomDisabled();
}
//initAllDomDisabled();
initiateGeoInformation();
disabledEnabledLogicOther();
checkChange();
/*
if( question_id > 0 && last_input!=null ){
    //alert(question_id+""+last_input);
    //initChange(last_input);
}*/
/*
step = parseInt(prompt("Enter Step"));
$('#exampleValidator').wizard('goTo',step);
node = prompt("Enter node");
removeBlockAndFollow(node);
pi_2_1 = parseInt(prompt("Enter MARIAL"));
//fp_3_1 = parseInt(prompt("Enter FAMILY"));
$("input[name=pi_2_1][value="+pi_2_1+"]").prop("checked",true);
//$("input[name=fp_3_1][value="+fp_3_1+"]").prop("checked",true);
*/
showScheduleBlock();
})();

function showScheduleBlock(){

    $("#show_reschedule").click(function(){

        $('.table-position').removeAttr('style');
    });
    $(".close").click(function(){
        $('.table-position').attr('style','display:none');
    });

    //logic for question running scheduled

    schedule = $("[name='s_type']");
    schedule.attr('disabled','disabled');
    schedule.parents('.form-group').attr('style', 'color:#a6a6a6');

    date = $("[name='date']");
    date.attr('disabled','disabled');
    date.parents('.form-group').attr('style', 'color:#a6a6a6');

    time = $("[name='time']");
    time.attr('disabled','disabled');
    time.parents('.form-group').attr('style', 'color:#a6a6a6');

    $("#submit_new").attr('disabled','disabled');

    $('#call_status').change(function(){

        val = $(this).val();

        if((val == 0 || val == 3) && val !=""){

            schedule.removeAttr('disabled');
            schedule.parents('.form-group').removeAttr('style');

            date.attr('disabled','disabled');
            date.parents('.form-group').attr('style', 'color:#a6a6a6');

            time.attr('disabled','disabled');
            time.parents('.form-group').attr('style', 'color:#a6a6a6');

            $("#submit_new").attr('disabled','disabled');

        }else{

            schedule.attr('disabled','disabled');
            schedule.parents('.form-group').attr('style', 'color:#a6a6a6');

            date.attr('disabled','disabled');
            date.parents('.form-group').attr('style', 'color:#a6a6a6');

            time.attr('disabled','disabled');
            time.parents('.form-group').attr('style', 'color:#a6a6a6');
            if(val!=""){
                $("#submit_new").removeAttr('disabled');
            }

        }

    });

    $("[name='s_type']").click(function(){

        date.removeAttr('disabled');
        date.parents('.form-group').removeAttr('style');

        time.removeAttr('disabled');
        time.parents('.form-group').removeAttr('style');


    });

    date.change(function(){
        if(time.val()!=""){
            $("#submit_new").removeAttr('disabled');
        }
    });

    time.change(function(){
        if(date.val()!=""){
            $("#submit_new").removeAttr('disabled');
        }
    });



    //end logic


}
/*
function test(){
    
    var data = {};
    $('#validation input, #validation select').each(
        function(i, field){
            input = $(this);
            type = input.prop('type');
            //console.log(type);
            if(type == "select-one"){
                type = "select";
                data[field.name]=type;
            }else if(type == "hidden"){

            }else{
                data[field.name]=type;
            }

                       
            //arr.push({'type':input.attr('type'), 'name': input.attr('name')});
        }
    );

    data['_token']=token;

    
    console.log(data);
    

    $.ajax({
        method: "POST",
        url: testurl,
        data: data,
    });

}
*/
function initiateGeoInformation(){

    $.getJSON( citycorporationurl, function( data ) {        
        //citycorporationdata = JSON.parse(data);
        $.each( data, function( key, val ) {
            citycorporationdata.push(val);
        });
    });

    $.getJSON( upazilaurl, function( data ) {
        //upaziladata = JSON.parse(data);
        $.each( data, function( key, val ) {
            upaziladata.push(val);
        });
    });
    /*
    $.getJSON( municipalurl, function( data ) {
        //upaziladata = JSON.parse(data);
        $.each( data, function( key, val ) {
            municipaldata.push(val);
        });
    });
    */

    
}

function stepWizardInit(){

    //initiate form validation
    $('#validation').formValidation({
        framework: 'bootstrap',
        fields:{}
    });
    
    
    
    

}

function initChange(last_input, step_index){
    last_active_dropdown = null;
    if(AllSteps.length > 0){
        for(i=0;i<AllSteps.length;i++){

            last_active_dropdown=checkHasData(AllSteps[i], last_active_dropdown);
        }
        console.log(AllSteps[AllSteps.length-1]);
        //console.log($("#"+last_active_dropdown).parent().siblings("label"));
        if(last_active_dropdown!=null){
            
            click_element = $("#"+last_active_dropdown).parent().siblings("label");        
            click_element.attr('style','text-decoration:underline;');
            click_element.click(function(){
                $(this).removeAttr('style');
                elem = $("[name='"+last_active_dropdown+"']");
                reverseCheckSequence(elem);
                //data_submit();
                name = marialstatusWiseSkipLogic(elem);
                
                if(name == ""){ 
                    console.log("name:"+name);           
                    checkSkipLogicMVersion(elem);
                }

            });
        }
        //$("#"+last_active_dropdown).closest("label").css( "background-color", "green" );
        //lastelementTrigger(AllSteps[AllSteps.length-1]);

        if(step_index > 0){
            /*
            for(i=0;i<step_index;i++){
                $(".wizard-steps > li").removeClass('disabled');
                $(".wizard-steps > li").addClass('done');
            }*/
            gotoSpecificStepAndFocus(AllSteps[AllSteps.length-1],step_index);
        }else{
            focusOnElement(AllSteps[AllSteps.length-1]);
        }
    }
}


function checkHasData(name, last_active_dropdown){
    el=$("[name='"+name+"'");
    
    
    if(el.is(":checked") && el.attr('type')=="radio" ){
        //console.log(name+el.val());
        removeBlockAndFollow(name);
    }else if(el.attr('type')== undefined && el.val()!=""){
        removeBlockAndFollow(name);
        //name=e.attr('name');
        //name=name;
        //console.log("name:"+name+":"+$("[name^='"+name+"']").length);
        
        last_active_dropdown = name;
        len = $("[name^='"+name+"']").length;
        if(len > 1 && el.val() == 666){
            removeBlockAndFollow(name+"_e");
        }

    }

    return last_active_dropdown;

}

function lastelementTrigger(name){
    el=$("[name='"+name+"'");
    el.focus(function() {
       alert(el.val());
    });
}


function getFilterData(data,parent){


    return data.filter(
      function(data){return data.parent_id == parent}
    );
}

function setDataForGeo(data){

    
        //obj = {val.id:val.name};
        //console.log(val.id+":"+val.name);
        atopush = [];
        for(i in data){
            //console.log(data[i]);            
            //atopush[data[i].id] = data[i].name;
            atopush.push({'id':data[i].id, 'text':data[i].name });
        }
        return atopush;
                
        

}


function initCityAndUpazila(val){


    filted_cc = getFilterData(citycorporationdata,val );           
    cc = setDataForGeo(filted_cc);            
    //$("#gi_1_3_cc").select2('destroy').empty().select2({ data: cc });
    $('#gi_1_3_cc').val(null).trigger('change');
    $("#gi_1_3_cc").empty();
    $("#gi_1_3_cc").append('<option value="">--City Corporation--</option>');    
    
    for(var i=0;i<cc.length;i++){
        $("#gi_1_3_cc").append('<option value="'+cc[i].id+'">'+cc[i].text+'</option>');
    }

    filted_uz = getFilterData(upaziladata,val );        
    uz = setDataForGeo(filted_uz);
    //console.log(uz);
    //$("#gi_1_3_uz").select2('destroy').empty().select2({ data: uz });
    $('#gi_1_3_uz').val(null).trigger('change');
    $("#gi_1_3_uz").empty();
    $("#gi_1_3_uz").append('<option value="">--Upazila--</option>');   
    for(var i=0;i<uz.length;i++){
        $("#gi_1_3_uz").append('<option value="'+uz[i].id+'">'+uz[i].text+'</option>');
    }
}


function checkChange(){

    /*
    $('#validation  input').on('change', function(){ // on change of state
            data_submit();
            name = marialstatusWiseSkipLogic($(this));
            
            if(name == ""){ 
                //console.log("name:"+name);           
                checkSkipLogicMVersion($(this));
            }
    });
    */

    $('#validation  input').on('click', function(){ // on change of state
            
            reverseCheckSequence($(this));
            //data_submit();
            name = marialstatusWiseSkipLogic($(this));
            
            if(name == ""){ 
                console.log("name:"+name);           
                checkSkipLogicMVersion($(this));
            }
    });


    $('#validation .select2').on('select2:open', function (e) {
        
        reverseCheckSequence($(this),1);
        enabledAndDisabledAgain($(this));
        //data_submit();            
        name = marialstatusWiseSkipLogic($(this));
        
        if(name == ""){   
            console.log("name:"+name);          
            checkSkipLogicMVersion($(this),1);
        }
    });

    


    $('#validation  select').on('change', function(){
            //disableMultipleDropdown($(this));            
            reverseCheckSequence($(this),1);
            enabledAndDisabledAgain($(this));
            data_submit();            
            name = marialstatusWiseSkipLogic($(this));
            
            if(name == ""){   
                console.log("name:"+name);          
                checkSkipLogicMVersion($(this),1);
            }

    });

    

    $('#validation  input').on('change', function(){ // on change of state
            
            reverseCheckSequence($(this));
            data_submit();
            name = marialstatusWiseSkipLogic($(this));
            
            if(name == ""){ 
                console.log("name:"+name);           
                checkSkipLogicMVersion($(this));
            }
    });

    


    /*
    $('#validation  select').change(function(){
            data_submit();
            enabledAndDisabledAgain($(this));
            name = marialstatusWiseSkipLogic($(this));
            
            if(name == ""){   
                //console.log("name:"+name);          
                checkSkipLogicMVersion($(this));
            }

    });*/

    $('#submit_new').click(function(){        
            data_submit(true);
            //alert($("[name='s_type']").filter(":checked").val());

            /*
            name = marialstatusWiseSkipLogic($(this));
            
            if(name == ""){   
                //console.log("name:"+name);          
                checkSkipLogicMVersion($(this));
            }*/
    });
    
    var api = $('#exampleValidator').data('wizard');

    $('#exampleValidator').on('wizard::next', function (e) {
        //checkStepWiseActive(e);
        var index = api.currentIndex();
        wizardIndexWiseChange(index,'next');
    });

    $('#exampleValidator').on('wizard::back', function (e) {
        //checkStepWiseActive(e);
        var index = api.currentIndex();
        wizardIndexWiseChange(index,'back');
    });
    
    

}

function data_submit(submitted=false){

    var form = $('#validation').serializeArray();
    var data = {};    
    $.each(form, function(i, field){ 
        //obj = {};
        data[field.name]=field.value;
        //data.push(obj);
        //last_input = data[field.name];
        if(field.name!== "end_point" 
           
            ){
            data['last_input'] =field.name;
        }
    });
    //data['last_input'] = last_input;
    if(submitted){
        data['call_status']=$('#call_status').val();
        data['date']=$('#date').val();
        data['time']=$('#time').val();
        data['s_type'] =$("[name='s_type']").filter(":checked").val();
        console.log(data);
    }else{
        data['call_status']=0;
    }

    data['_token']=token;
    
    $.ajax({
        cache: false,
        method: "POST",
        url: url,
        data: data,
    }).done(function( msg ) {

        if(submitted){

                    if(msg.success==true)
                    window.location.href =  redirect;

        }else{

        }
    });
    
    
    
    
    
}





function wizardIndexWiseChange(index, type){

    if(index == 1){
        removeBlockAndFollow('fp_3_1');
        focusOnElement('fp_3_1');
    }
    else if(index == 2){
        removeBlockAndFollow('rh_6_1');
        focusOnElement('rh_6_1');
    }else if(index == 3){

        martial_status_el = $("[name='pi_2_1']");
        ms_checked_v = martial_status_el.filter(":checked").val();

        if(ms_checked_v == 1 || ms_checked_v == 999){

            if(type == 'back'){

                $('#exampleValidator').wizard('goTo',2);
                removeBlockAndFollow('rh_6_1');
                focusOnElement('rh_6_1');
            }else{

                $('#exampleValidator').wizard('goTo',4);
                removeBlockAndFollow('fq_11_1');
                focusOnElement('fq_11_1');
            }

        }else{
            removeBlockAndFollow('prq_8_1');
            focusOnElement('prq_8_1');
        }
    }else if(index == 4){
        removeBlockAndFollow('fq_11_1');
        focusOnElement('fq_11_1');
    }

}


function disableMultipleDropdown(el){
    //alert(el.val());
    keyVal = dropdownoffseq[el.attr('name')];
    if( keyVal === undefined ) return;

    for(i=0;i< keyVal.length;i++){
            if(el.val() == 666) continue;

            $("[name='"+keyVal[i]+"'] option[value='"+el.val()+"']").prop('disabled',true);    
    }

}

function marialstatusWiseSkipLogic(el){
    
    name = el.attr('name');
    //marial status
    martial_status_el = $("[name='pi_2_1']");
    ms_checked_v = martial_status_el.filter(":checked").val();
    //prosob seba taken before
    prosob_seba_el = $("[name='pprq_10_2']");
    ps_checked_v = prosob_seba_el.filter(":checked").val();
    



    pregnant_history_el = $("[name='rprq_9_2']");
    ph_checked_v = pregnant_history_el.filter(":checked").val();

    //console.log("NAME:"+name+"MARIAL STATUS:"+ms_checked_v);

    //console.log("NAME:"+name+"PREGNANT STATUS:"+ph_checked_v);
    prosob_month_val = $("[name='pprq_10_1_month']").val();
    prosob_day_val = $("[name='pprq_10_1_day']").val();
    prosob_year_val = $("[name='pprq_10_1_year']").val();

    //rh_6_8
    rh_6_8_1=$("[name='rh_6_8_1']").val();
    rh_6_8_2=$("[name='rh_6_8_2']").val();
    rh_6_8_3=$("[name='rh_6_8_3']").val();

    console.log("NAME:"+name+"PROSOB MONTH VALUE:"+prosob_month_val);
    
    if(name == 'rh_6_9' && ( el.val() == 999 || el.val()==3 )){
        
        if(ms_checked_v == 1 || ms_checked_v == 999){
            disableSectionSwitch('bc_7_1');
            removeBlockAndFollowChangeStep('fq_11_1',4);
            return name;
        }

    }    
    else if(name == 'rh_6_5' && ( el.val() == 999 || el.val()==2 )){
        if(ms_checked_v == 1 || ms_checked_v == 999){
            disableSectionSwitch('bc_7_1');
            removeBlockAndFollowChangeStep('fq_11_1',4);
            return name;
        }
    }
    else if(name == 'rh_6_10_1'|| name == 'rh_6_10_2'|| name == 'rh_6_10_3' ||
    name == 'rh_6_11_1' || name == 'rh_6_11_2' || name == 'rh_6_11_3'
    ){
        
        if(ms_checked_v == 1 || ms_checked_v == 999 ){
            disableSectionSwitch('bc_7_1');
            
            if(rh_6_8_1 ==22 || rh_6_8_2 ==22 || rh_6_8_3 ==22){
                
                removeBlockAndFollow('rh_6_12');
                return name;
            }else{

                if( (name == 'rh_6_10_3' || name == 'rh_6_11_3') && ( el.val()==888 || el.val() != "") ){
                    removeBlockAndFollowChangeStep('fq_11_1',4);
                    return name;
                }
            }

            return name;
        }

    }else if(name == 'rh_6_12'){
        if((ms_checked_v == 1 || ms_checked_v == 999) && 
            ( el.val() == 2 || el.val() == 888 || el.val() == 999  ) ){
            disableSectionSwitch('bc_7_1');
            removeBlockAndFollowChangeStep('fq_11_1',4);
            return name;
        }


    }
    else if(name == 'rh_6_13'){
        if(ms_checked_v == 1 || ms_checked_v == 999 ){
            disableSectionSwitch('bc_7_1');
            removeBlockAndFollowChangeStep('fq_11_1',4);
            return name;
        }

    }
    else if(name == 'bc_7_1' || name == 'bc_7_2' || name =='pi_2_1'){

        if(ms_checked_v == 4 || ms_checked_v == 5 || ms_checked_v == 6){
            disableSectionSwitch('bc_7_3');
            disableSectionSwitch('bc_7_4_1');
            disableSectionSwitch('bc_7_4_2');
            disableSectionSwitch('bc_7_5_1');
            disableSectionSwitch('bc_7_5_2');
            disableSectionSwitch('bc_7_5_3');
            removeBlockAndFollow('bc_7_6');
            if(name =='pi_2_1') return "";
        }
        if(ms_checked_v == 2 || ms_checked_v == 3){
            return "";
        }
        if(name == 'bc_7_1' && el.val()==1){
            return "";
        }else return name;

        
    }else if(name == 'prq_8_3'){
        if( ms_checked_v == 5 || ms_checked_v == 6 ){
            removeBlockAndFollow('pprq_10_1');
            return name;
        }else return "";
        
    }else if(name == 's_0_3'){

        if( el.val() < 15 || el.val() > 49){            
            removeBlockAndFollowChangeStep('end_point',4);
        }else if( el.val() >= 15 && el.val() < 18 ){
            removeBlockAndFollow('s_0_4');
        }else if(el.val() >=18 ){
            disableSectionSwitch('s_0_4');

        }
    }else if(name == 'pprq_10_5_1' || name == 'pprq_10_5_2' || name == 'pprq_10_5_3'
    ){

        if(ps_checked_v == 1){
            removeBlockAndFollow('pprq_10_7');
        }
        return name;

    }else if(name == 'rprq_9_9_3' || name == 'rprq_9_9_2' || name == 'rprq_9_9_1'){
        
        if(ph_checked_v == 1){

            //removeBlockAndFollow('pprq_10_18');
            if(name == 'rprq_9_9_3'){
                disableSectionSwitch('pprq_10_1');
                removeBlockAndFollowChangeStep('fq_11_1',4);
                return name;
            }else{
                disableSectionSwitch('pprq_10_1');
                return name;
            }
        }
        
        return "";
    }
    else if(name == 'pprq_10_18' && (el.val() == 2 || el.val() == 888 || el.val() == 999 )){
        //console.log("value:"+el.val()+"|year:"+prosob_year_val+", month:"+prosob_month_val+",day:"+prosob_day_val);
        
        if(prosob_year_val!="" && prosob_year_val > 0){
            //removeBlockAndFollowChangeStep('fq_11_1',4);
            return "";            
        }
        else if(prosob_month_val!="" || prosob_day_val!=""){
            

            if(prosob_month_val!="" && prosob_day_val!=""){

                if((prosob_month_val > 0 && prosob_month_val < 6) && (prosob_day_val > 0 && prosob_day_val <32)){
                    removeBlockAndFollow('pprq_10_21');
                    return name;
                }else if((prosob_month_val > 0 && prosob_month_val < 6) && prosob_day_val < 1){
                    removeBlockAndFollow('pprq_10_21');
                    return name;

                }
                else if(prosob_month_val ==6 && prosob_day_val <1){
                    removeBlockAndFollow('pprq_10_21');
                    return name;
                }else if( (prosob_day_val > 0 && prosob_day_val <32) && prosob_month_val < 1){
                    removeBlockAndFollow('pprq_10_21');
                    return name;
                }else{
                    disableSectionSwitch('pprq_10_21');                    
                    //removeBlockAndFollowChangeStep('fq_11_1',4);
                    return "";
                }

            }else{

                if(prosob_month_val!="" && (prosob_month_val > 0 && prosob_month_val <=6)){
                    removeBlockAndFollow('pprq_10_21');
                    return name;
                }else if(prosob_day_val!="" && (prosob_day_val > 0 && prosob_day_val <32)){
                    removeBlockAndFollow('pprq_10_21');
                    return name;
                }else{
                    disableSectionSwitch('pprq_10_21');
                    //removeBlockAndFollowChangeStep('fq_11_1',4);
                    return "";
                }


            }
            

            
        }


        return "";

    }
    else if(name == 'pprq_10_19' && (el.val() == 2 || el.val() == 999 )){
        //same logic pqrq_10_18
        //console.log("value:"+el.val()+"|year:"+prosob_year_val+", month:"+prosob_month_val+",day:"+prosob_day_val);
        
        if(prosob_year_val!="" && prosob_year_val > 0){
            //removeBlockAndFollowChangeStep('fq_11_1',4);
            return "";            
        }
        else if(prosob_month_val!="" || prosob_day_val!=""){
            

            if(prosob_month_val!="" && prosob_day_val!=""){

                if((prosob_month_val > 0 && prosob_month_val < 6) && (prosob_day_val > 0 && prosob_day_val <32)){
                    removeBlockAndFollow('pprq_10_21');
                    return name;
                }else if((prosob_month_val > 0 && prosob_month_val < 6) && prosob_day_val < 1){
                    removeBlockAndFollow('pprq_10_21');
                    return name;

                }else if(prosob_month_val ==6 && prosob_day_val <1){
                    removeBlockAndFollow('pprq_10_21');
                    return name;
                }else if( (prosob_day_val > 0 && prosob_day_val <32) && prosob_month_val < 1){
                    removeBlockAndFollow('pprq_10_21');
                    return name;
                }else{
                    disableSectionSwitch('pprq_10_21');                    
                    //removeBlockAndFollowChangeStep('fq_11_1',4);
                    return "";
                }

            }else{

                if(prosob_month_val!="" && (prosob_month_val > 0 && prosob_month_val <=6)){
                    removeBlockAndFollow('pprq_10_21');
                    return name;
                }else if(prosob_day_val!="" && (prosob_day_val > 0 && prosob_day_val <32)){
                    removeBlockAndFollow('pprq_10_21');
                    return name;
                }else{
                    disableSectionSwitch('pprq_10_21');
                    //removeBlockAndFollowChangeStep('fq_11_1',4);
                    return "";
                }


            }
            

            
        }


        return "";
    }else if(name == 'pprq_10_1_month'){

        if( el.val() > 0 && el.val() <=6 && prosob_year_val < 1 ){
            removeBlockAndFollow('pprq_10_21');
            
            if(el.val() == 6 && prosob_day_val > 0){
                disableSectionSwitch('pprq_10_21');
                
            }else if(el.val() == 6 && prosob_day_val <= 0){
                removeBlockAndFollow('pprq_10_21');
            }
        }else if(el.val() < 1 && (prosob_day_val > 0 && prosob_day_val <32)){
                removeBlockAndFollow('pprq_10_21');
        }
        else{
            disableSectionSwitch('pprq_10_21');
        }

                
        return "";
    }else if(name == 'pprq_10_1_day'){

        if( el.val() > 0 && el.val() <32 && prosob_year_val < 1 ){


            if(prosob_month_val < 6){
                removeBlockAndFollow('pprq_10_21');
            }else if(prosob_month_val == 6 && el.val() < 1){
                
                    removeBlockAndFollow('pprq_10_21');
                
            }else{
                disableSectionSwitch('pprq_10_21');
            }
        }else if( (prosob_month_val > 0 && prosob_month_val < 6) && prosob_day_val < 1 ){
            removeBlockAndFollow('pprq_10_21');
        }
        else if( el.val() == 0 && prosob_month_val == 6 && prosob_year_val < 1){
            removeBlockAndFollow('pprq_10_21');
        }else{
            disableSectionSwitch('pprq_10_21');
        }

                
        return "";
    }else if(name == 'pprq_10_1_year'){

        if( el.val() > 0 ){
            disableSectionSwitch('pprq_10_21');
        }else{
            if((prosob_month_val > 0 && prosob_month_val < 6) && (prosob_day_val > 0 && prosob_day_val <32)){
                removeBlockAndFollow('pprq_10_21');
            }
            else if(prosob_month_val == 6 && prosob_day_val < 1 ){
                removeBlockAndFollow('pprq_10_21');
            }else{
                disableSectionSwitch('pprq_10_21');
            }
        }

                
        return "";
    }else if(name == 'pprq_10_20'){
        //console.log("year:"+prosob_year_val+"|month:"+prosob_month_val+"|day:"+prosob_day_val);
        //same logic pqrq_10_18
        if(prosob_year_val!="" && prosob_year_val > 0){
            //removeBlockAndFollowChangeStep('fq_11_1',4);            
            disableSectionSwitch('pprq_10_21');
            return name;
        }
        else if(prosob_month_val!="" || prosob_day_val!=""){

            if(prosob_month_val!="" && prosob_day_val!=""){

                if((prosob_month_val > 0 && prosob_month_val < 6) && (prosob_day_val > 0 && prosob_day_val <32)){
                    //removeBlockAndFollow('pprq_10_21');
                    return "";
                }else if(prosob_month_val ==6 && prosob_day_val <1){
                    return "";
                }else{
                    disableSectionSwitch('pprq_10_21');
                    return name;
                    //removeBlockAndFollowChangeStep('fq_11_1',4);
                }

            }else{

                if(prosob_month_val!="" && (prosob_month_val > 0 && prosob_month_val <=6)){
                    return "";
                }else if(prosob_day_val!="" && (prosob_day_val > 0 && prosob_day_val <32)){

                    return "";
                }else{
                    disableSectionSwitch('pprq_10_21');
                    return name;
                }


            }
            
            

            
        }

    }
    

    return "";
}

function reverseCheckSequence(el,type=0){
    console.log("--Reverse Checek--");
    keyVal = RevSequenceArray[el.attr('name')];
    if( keyVal === undefined ) return;

    len = Object.keys(keyVal).length;
    console.log("Length:"+len+"Value:"+keyVal);

    if( len >= 1 ){
        value = el.val();
        valueNode = keyVal[value];
        console.log(valueNode);
        if( valueNode === undefined ){

            if(keyVal[1001]!=null){
                for(i=0;i< keyVal[1001].length;i++){                
                    e = $("[name^='"+keyVal[1001][i]+"']");
                    console.log(keyVal[1001][i]);
                    disableReverseSection(e,type);
                }
            }

            return;
        }else{

            for(i=0;i< valueNode.length;i++){                
                e = $("[name^='"+valueNode[i]+"']");
                console.log(valueNode[i]);
                disableReverseSection(e,type);
            }
        }
    }

    

}

function checkSkipLogicMVersion(el,type){

    keyVal = SequenceArray[el.attr('name')];
    if( keyVal === undefined ) return;

    len = Object.keys(keyVal).length;
    console.log("Length:"+len+"Value:"+keyVal);

    followNodes = null;
    if( len > 1 ){
        value = null;
        if(type > 0){
            value = el.val();
        }else{
            value = el.filter(':checked').val();
        }

        console.log("selected values:"+value);
        valueNode = keyVal[value];
        console.log("Checking for specific[node]"+valueNode+"[mainkeyval]"+keyVal);
        if(valueNode === undefined){

            if(keyVal[1001]!=null){
                
                if( Array.isArray(keyVal[1001]) ){
                    
                    for(i=0;i< keyVal[1001].length;i++){                
                        removeBlockAndFollow(keyVal[1001][i]);
                    }
                }else{
                    
                    removeBlockAndFollow(keyVal[1001]);
                }

            }

            
            for(i=0;i< keyVal.length;i++){
                //console.log(keyVal[i]);
                removeBlockAndFollow(keyVal[i]);
            }

        }else{  
            if( !Array.isArray(valueNode) && !Array.isArray(keyVal) ){
                console.log("single not Array:"+valueNode);                
                removeBlockAndFollow(valueNode);
                

            }else if(!Array.isArray(valueNode) && Array.isArray(keyVal)){
                //console.log("node:"+valueNode+"|array:"+keyVal);
                
                for(i=0;i< keyVal.length;i++){
                    
                    removeBlockAndFollow(keyVal[i]);
                }
            }
            else{
                console.log("array node or json:"+valueNode);
                followNodes=valueNode[0];
                step = parseInt(valueNode[1]);
                console.log("Nodes "+followNodes+"step:"+step);
                if(!isNaN(step)){
                    removeBlockAndFollowChangeStep(followNodes, step);
                    focusOnElement(followNodes);
                    
                }else{
                    console.log("many array:"+valueNode);
                    
                    for(i=0;i< valueNode.length;i++){
                        //console.log(keyVal[i]);
                        removeBlockAndFollow(valueNode[i]);
                    }

                }
            }
           
        }

    }else{
        console.log("First Single Checks");
        followNodes=keyVal[0];
        removeBlockAndFollow(followNodes);
        
    }

}


function removeBlockAndFollow(name){
    
    var e = $("[name='"+name+"']");
    e.removeAttr('disabled');    
    e.parent().parent().removeAttr('style');
    e.parents('.form-group').removeAttr('style');
    
}

function gotoSpecificStepAndFocus(name,step){
    $('#exampleValidator').wizard('goTo', step);
    focusOnElement(name);

}

function removeBlockAndFollowChangeStep(name, step){
    $('#exampleValidator').wizard('goTo', step);    
    var e = $("[name='"+name+"']");
    e.removeAttr('disabled');
    e.parent().parent().removeAttr('style');
    e.parents('.form-group').removeAttr('style');
}

function disabledSection(e){
    e.attr('disabled', 'disabled');
    e.val(null);
}

function disableSectionSwitch(name){
    var e = $("[name='"+name+"']");
    
    if(e.attr("type") == "radio"){
       e.prop("checked", false); 
    }else{
        //e.select2("val", "");
        e.find('option').removeAttr("selected");
    }
    e.attr('disabled', 'disabled');
    e.parents('.form-group').attr('style', 'color:#a6a6a6');
}

function disableReverseSection(e,type){
    /*
    if(type > 0){
        //e.prop("selected", false);
        e.find('option').removeAttr("selected");
        //e.removeAttr("selected");
        e.select2("val", "");
        //e.val(null).trigger('change');
        e.prop('selectedIndex','');
    }else{
        e.prop("checked", false);
    }*/
    if(e.attr("type") == "radio"){
        e.prop("checked", false);
    }else{
        //e.select2("val", "");
        e.find('option').removeAttr("selected");
    }
    e.attr('disabled', 'disabled');
    e.parent().parent().attr('style', 'color:#a6a6a6');
}

function enabledAndDisabledAgain(el){
    name = el.attr("name");    
    e_c = $("[name='"+name+"_e']");
    //console.log("666 name"+name+"|child:"+e_c);
    
    if(el.val()==666){
        e_c.removeAttr("disabled");
    }
    else{
        //e_c.attr("disabled", "disabled");
        //e_c.val(null);
        disabledSection(e_c);
    }
    

}

//animation segment
function focusOnElement(name){
    var focusElement = $("[name='"+name+"']").parents('.form-group');
    ScrollToTop(focusElement, function() { focusElement.focus(); });
}
function ScrollToTop(el, callback) { 
    $('html, body').animate({ scrollTop: $(el).offset().top - 65 }, 'slow', callback);
}

function initAllDomDisabled(last_input=null){

    $('form#validation  :input').each(function() {
        
        e = $(this);    
        e.attr('disabled', 'disabled');
        e.parents('.form-group').attr('style', 'color:#a6a6a6');
        //parent = e.parents('.form-group');
        //console.log(parent.attr('class'));
        e=null;

    });



    $('form#validation  select').each(function() {
        e = $(this);
        e.attr('disabled', 'disabled');
        //e.parents().eq(1).attr('style', 'color:#a6a6a6');
        e.parents('.form-group').attr('style', 'color:#a6a6a6');
        e=null;
    });

    e = $("[name='s_0_1']");
    //console.log(e.attr('name'));
    e.removeAttr('disabled');
    e.parents('.form-group').removeAttr('style');
}


function disabledEnabledLogicOther(){
    /*
    $('form#validation  select').each(function() {
        e = $(this);
        name=e.attr('name');
        //name=name;
        

            console.log("name:"+name+":"+$("[name^='"+name+"']").length);
        
        
        if(e.val()!=null && e.val()==666){
            name=e.attr('name');
            name = name+"_";
            //removeBlockAndFollow(name);

        }
    });*/


    //console.log(citycorporationdata);
    //console.log(upaziladata);
    //speacial logic points
    $("[name='s_0_3']").change(function () {
        val = $(this).val();        
        
        $("#pi_2_2").empty();
        $("#pi_2_2").append('<option value="">--Select Age--</option>');   
        for(i=5;i<=val;i++){
            $("#pi_2_2").append('<option value="'+i+'">'+i+'</option>');
        }
        $("#pi_2_2").append('<option value="999">উত্তর দিতে অসম্মত</option>');


        $("#rh_6_1").empty();
        $("#rh_6_1").append('<option value="">--Select Age--</option>');   
        for(i=8;i<=val;i++){
            $("#rh_6_1").append('<option value="'+i+'">'+i+'</option>');
        }
        $("#rh_6_1").append('<option value="555">এখনও হয়নি</option>');
        $("#rh_6_1").append('<option value="999">উত্তর দিতে অসম্মত</option>');


        $("#prq_8_3").empty();
        $("#prq_8_3").append('<option value="">--Select Age--</option>');
        for(i=8;i<=val;i++){
            $("#prq_8_3").append('<option value="'+i+'">'+i+'</option>');
        }
        $("#prq_8_3").append('<option value="999">উত্তর দিতে অসম্মত</option>');
    });
    //end special logic points

    

     $("[name='gi_1_1']").change(function () {
        initCityAndUpazila($(this).val());
        /*
        filted_cc = getFilterData(citycorporationdata,$(this).val() );        
        cc = setDataForGeo(filted_cc);        
        $("#gi_1_3_cc").select2('destroy').empty().select2({ data: cc });


        filted_uz = getFilterData(upaziladata,$(this).val() );        
        uz = setDataForGeo(filted_uz);
        //console.log(uz);
        $("#gi_1_3_uz").select2('destroy').empty().select2({ data: uz });
    */
        /*
        filted_mc = getFilterData(municipaldata,$(this).val() );        
        mc = setDataForGeo(filted_mc);
        console.log(mc);
        $("#gi_1_3_mc").select2('destroy').empty().select2({ data: mc });
        */
        


    });

    $("[name='gi_1_3_cc']").change(function () {
        $("[name='gi_1_3']").removeAttr('checked');
        $("[name='gi_1_3_e']").attr('disabled','disabled');
    });

    $("[name='gi_1_3_uz']").change(function () {
        $("[name='gi_1_3']").removeAttr('checked');
        $("[name='gi_1_3_e']").attr('disabled','disabled');
    });

    $("[name='gi_1_3_mc']").change(function () {
        $("[name='gi_1_3']").removeAttr('checked');
        $("[name='gi_1_3_e']").attr('disabled','disabled');
    });

    

    if( $("[name='gi_1_3']:checked").val() == 666 ){
        $('#gi_1_3_e').removeAttr("disabled");       
    }

    $("[name='gi_1_3']").change(function () {
        e= $(this);
        if( e.val() == 666  ){                         

            $('#gi_1_3_e').removeAttr("disabled");
            //$("[name='gi_1_3_cc']").find('option').removeAttr("selected");
            //$("[name='gi_1_3_uz']").find('option').removeAttr("selected");            

        }/*
        else if(e.val() == 888 || e.val() == 999){
            $("[name='gi_1_3_cc']").find('option').removeAttr("selected");
            $("[name='gi_1_3_uz']").find('option').removeAttr("selected");

        }*/
        else{
            disabledSection($('#gi_1_3_e'));

            

        }
    
    });

    if( $("[name='fp_3_4']:checked").val() == 666 ){
        $('#fp_3_4_e').removeAttr("disabled");       
    }


    $("[name='fp_3_4']").change(function () {
        
        if( $(this).val() == 666 ){                         

            $('#fp_3_4_e').removeAttr("disabled");            

        }else{
            disabledSection($('#fp_3_4_e'));

            

        }
    
    });


    if( $("[name='pi_2_5']:checked").val() == 666 ){
        $('#pi_2_5_1').removeAttr("disabled");
        $('#pi_2_5_2').removeAttr("disabled");       
    }

    $("[name='pi_2_5']").change(function () {
        
        if( $(this).val() == 666 ){                         

            $('#pi_2_5_1').removeAttr("disabled");
            $('#pi_2_5_2').removeAttr("disabled");
            

        }else{

            disabledSection($('#pi_2_5_1'));
            disabledSection($('#pi_2_5_2'));
            

        }
    
    });


    if( $("[name='cq_5_10']:checked").val() == 666 ){
        $('#cq_5_10_day').removeAttr("disabled");
        $('#cq_5_10_month').removeAttr("disabled");
        $('#cq_5_10_year').removeAttr("disabled");
    }

    $("[name='cq_5_10']").change(function () {
        
        if( $(this).val() == 666 ){                         

            $('#cq_5_10_day').removeAttr("disabled");
            $('#cq_5_10_month').removeAttr("disabled");
            $('#cq_5_10_year').removeAttr("disabled");

        }else{

            $('#cq_5_10_day').attr("disabled", "disabled");
            $('#cq_5_10_month').attr("disabled", "disabled");
            $('#cq_5_10_year').attr("disabled", "disabled");

        }
    
    });


    if( $("[name='rprq_9_3']:checked").val() == 666 ){
        $('#rprq_9_3_day').removeAttr("disabled");
        $('#rprq_9_3_month').removeAttr("disabled");
        $('#rprq_9_3_year').removeAttr("disabled");
    }

    $("[name='rprq_9_3']").change(function () {
        
        if( $(this).val() == 666 ){                         

            $('#rprq_9_3_day').removeAttr("disabled");
            $('#rprq_9_3_month').removeAttr("disabled");
            $('#rprq_9_3_year').removeAttr("disabled");

        }else{

            $('#rprq_9_3_day').attr("disabled", "disabled");
            $('#rprq_9_3_month').attr("disabled", "disabled");
            $('#rprq_9_3_year').attr("disabled", "disabled");

        }
    
    });


    if( $("[name='pprq_10_1']:checked").val() == 666 ){
        $('#pprq_10_1_day').removeAttr("disabled");
        $('#pprq_10_1_month').removeAttr("disabled");
        $('#pprq_10_1_year').removeAttr("disabled");
    }

    $("[name='pprq_10_1']").change(function () {
        
        if( $(this).val() == 666 ){                         

            $('#pprq_10_1_day').removeAttr("disabled");
            $('#pprq_10_1_month').removeAttr("disabled");
            $('#pprq_10_1_year').removeAttr("disabled");

        }else{

            $('#pprq_10_1_day').attr("disabled", "disabled");
            $('#pprq_10_1_month').attr("disabled", "disabled");
            $('#pprq_10_1_year').attr("disabled", "disabled");

            $('#pprq_10_1_day').val(null);
            $('#pprq_10_1_month').val(null);
            $('#pprq_10_1_year').val(null);

        }
    
    });


    if( $("[name='fq_11_3']:checked").val() == 666 ){
        $('#fq_11_3_day').removeAttr("disabled");
        $('#fq_11_3_month').removeAttr("disabled");
        $('#fq_11_3_year').removeAttr("disabled");
    }

    $("[name='fq_11_3']").change(function () {
        
        if( $(this).val() == 666 ){                         

            $('#fq_11_3_day').removeAttr("disabled");
            $('#fq_11_3_month').removeAttr("disabled");
            $('#fq_11_3_year').removeAttr("disabled");

        }else{

            $('#fq_11_3_day').attr("disabled", "disabled");
            $('#fq_11_3_month').attr("disabled", "disabled");
            $('#fq_11_3_year').attr("disabled", "disabled");

        }
    
    });


    if( $("[name='fqi_12_1']:checked").val() == 666 ){

        $('#fqi_12_1_name').removeAttr("disabled");
        $('#fqi_12_1_father').removeAttr("disabled");
        $('#fqi_12_1_husband').removeAttr("disabled");
        $('#fqi_12_1_house_no').removeAttr("disabled");
        $('#fqi_12_1_road_no').removeAttr("disabled");
        $('#fqi_12_1_union_or_ward').removeAttr("disabled");
        $('#fqi_12_1_mouja_or_moholla').removeAttr("disabled");
        $('#fqi_12_1_village_or_area').removeAttr("disabled");
        $('#fqi_12_1_house_head').removeAttr("disabled");
        $('#fqi_12_1_mobile_no').removeAttr("disabled"); 
    }

    $("[name='fqi_12_1']").change(function () {
        
        if( $(this).val() == 666 ){                         

            

            $('#fqi_12_1_name').removeAttr("disabled");
            $('#fqi_12_1_father').removeAttr("disabled");
            $('#fqi_12_1_husband').removeAttr("disabled");
            $('#fqi_12_1_house_no').removeAttr("disabled");
            $('#fqi_12_1_road_no').removeAttr("disabled");
            $('#fqi_12_1_union_or_ward').removeAttr("disabled");
            $('#fqi_12_1_mouja_or_moholla').removeAttr("disabled");
            $('#fqi_12_1_village_or_area').removeAttr("disabled");
            $('#fqi_12_1_house_head').removeAttr("disabled");
            $('#fqi_12_1_mobile_no').removeAttr("disabled");
            

        }else{

            $('#fqi_12_1_name').attr("disabled", "disabled");
            $('#fqi_12_1_father').attr("disabled", "disabled");
            $('#fqi_12_1_husband').attr("disabled", "disabled");
            $('#fqi_12_1_house_no').attr("disabled", "disabled");
            $('#fqi_12_1_road_no').attr("disabled", "disabled");
            $('#fqi_12_1_union_or_ward').attr("disabled", "disabled");
            $('#fqi_12_1_mouja_or_moholla').attr("disabled", "disabled");
            $('#fqi_12_1_village_or_area').attr("disabled", "disabled");
            $('#fqi_12_1_house_head').attr("disabled", "disabled");
            $('#fqi_12_1_mobile_no').attr("disabled", "disabled");  

        }
    
    });




}

//end general on off function block