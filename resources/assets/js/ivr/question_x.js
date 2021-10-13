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
        data_submit(1);
     },     
				
	});


	if( question_id > 0 && last_input!=null ){
    	initAllDomDisabled();
    	initChange(last_input,step_index);
	}else{
	    initAllDomDisabled();
	}

	initiateGeoInformation();
	disabledEnabledLogicOther();

	checkChange();	
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
    /*
    schedule = $("[name='s_type']");
    schedule.attr('disabled','disabled');
    schedule.parents('.form-group').attr('style', 'color:#a6a6a6');
	*/
    date = $("[name='date']");
    date.attr('disabled','disabled');
    date.parents('.form-group').attr('style', 'color:#a6a6a6');

    time = $("[name='time']");
    time.attr('disabled','disabled');
    time.parents('.form-group').attr('style', 'color:#a6a6a6');

    $("#submit_new").attr('disabled','disabled');

    $('#call_status').change(function(){

        val = $(this).val();

        if((val == 0) && val !=""){
        	/*
            schedule.removeAttr('disabled');
            schedule.parents('.form-group').removeAttr('style');
			
            date.attr('disabled','disabled');
            date.parents('.form-group').attr('style', 'color:#a6a6a6');

            time.attr('disabled','disabled');
            time.parents('.form-group').attr('style', 'color:#a6a6a6');
            */
            date.removeAttr('disabled');
        	date.parents('.form-group').removeAttr('style');

        	time.removeAttr('disabled');
        	time.parents('.form-group').removeAttr('style');

            $("#submit_new").attr('disabled','disabled');

        }else{
        	/*
            schedule.attr('disabled','disabled');
            schedule.parents('.form-group').attr('style', 'color:#a6a6a6');
			*/
            date.attr('disabled','disabled');
            date.parents('.form-group').attr('style', 'color:#a6a6a6');

            time.attr('disabled','disabled');
            time.parents('.form-group').attr('style', 'color:#a6a6a6');
            if(val!=""){
                $("#submit_new").removeAttr('disabled');
            }

        }

    });
    /*
    $("[name='s_type']").click(function(){

        date.removeAttr('disabled');
        date.parents('.form-group').removeAttr('style');

        time.removeAttr('disabled');
        time.parents('.form-group').removeAttr('style');


    });
    */

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

function initiateGeoInformation(){
    /*
    $.getJSON( citycorporationurl, function( data ) {        
        //citycorporationdata = JSON.parse(data);
        $.each( data, function( key, val ) {
            citycorporationdata.push(val);
        });
    });
    */

    $.getJSON( upazilaurl, function( data ) {
        //upaziladata = JSON.parse(data);
        $.each( data, function( key, val ) {
            upaziladata.push(val);
        });
    });
    
    $.getJSON( municipalurl, function( data ) {
        //upaziladata = JSON.parse(data);
        $.each( data, function( key, val ) {
            municipaldata.push(val);
        });
    });

    
    

    
}


function stepWizardInit(){
    //initiate form validation
    $('#validation').formValidation({
        //framework: 'bootstrap',
        fields:{}
    });
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
                //reverseCheckSequence(elem);
                //data_submit();
                //name = marialstatusWiseSkipLogic(elem);
                
                //if(name == ""){ 
                //    console.log("name:"+name);           
                    checkSkipLogicMVersion(elem);
                    //31-8-2020
                    //checkAgeJarLimit(elem);
                //}

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

    
    filted_mc = getFilterData(municipaldata,val );           
    mc = setDataForGeo(filted_mc);            
    //$("#gi_1_3_cc").select2('destroy').empty().select2({ data: cc });
    $('#di_1_2_mc').val(null).trigger('change');
    $("#di_1_2_mc").empty();
    $("#di_1_2_mc").append('<option value="">--Municipal--</option>');    
    
    for(var i=0;i<mc.length;i++){
        $("#di_1_2_mc").append('<option value="'+mc[i].id+'">'+mc[i].text+'</option>');
    }

    filted_uz = getFilterData(upaziladata,val );        
    uz = setDataForGeo(filted_uz);
    //console.log(uz);
    //$("#gi_1_3_uz").select2('destroy').empty().select2({ data: uz });
    $('#di_1_2_uz').val(null).trigger('change');
    $("#di_1_2_uz").empty();
    $("#di_1_2_uz").append('<option value="">--Upazila--</option>');   
    for(var i=0;i<uz.length;i++){
        $("#di_1_2_uz").append('<option value="'+uz[i].id+'">'+uz[i].text+'</option>');
    }
}



function checkChange(){


	$('#validation  input').on('click', function(){ // on change of state
            
            //reverseCheckSequence($(this));
            //data_submit();
            //name = marialstatusWiseSkipLogic($(this));
            
            //if(name == ""){ 
                console.log("name:"+name);           
                checkSkipLogicMVersion($(this));
                //31-8-2020
                //checkAgeJarLimit($(this));
            //}
    });


    $('#validation .select2').on('select2:open', function (e) {
        
        //reverseCheckSequence($(this),1);
        //enabledAndDisabledAgain($(this));
        //data_submit();            
        //name = marialstatusWiseSkipLogic($(this));

        //name = checkAgeJarLimit($(this));
            
        //if(name == ""){   
            console.log("name:"+name);          
            checkSkipLogicMVersion($(this),1);
        //}
    });

    


    $('#validation  select').on('change', function(){
            //disableMultipleDropdown($(this));            
            reverseCheckSequence($(this),1);
            //enabledAndDisabledAgain($(this));
            data_submit();            
            //name = marialstatusWiseSkipLogic($(this));
            //name = checkAgeJarLimit($(this));
            //if(name == ""){   
                console.log("name:"+name);          
                checkSkipLogicMVersion($(this),1);
            //}

    });

    

    $('#validation  input').on('change', function(){ // on change of state
            
            reverseCheckSequence($(this));
            data_submit();
            //name = marialstatusWiseSkipLogic($(this));
            //name = checkAgeJarLimit($(this));
            
            //if(name == ""){ 
                console.log("name:"+name);           
                checkSkipLogicMVersion($(this));
            //}
    });

    $('#submit_new').click(function(){        
            data_submit(1);
           
    });

    //age limit exceed
    $('#target_reached_submit').click(function(){
    		$("#call_status").append('<option value="9" selected="selected">সাক্ষাৎকার সম্পন্ন হয়েছে</option>');        
            data_submit(2);
           
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


//31-8-2020
function checkAgeJarLimit(el){
    var name = "";
    if(el.attr('name') == 'di_1_3' /*
        || el.attr('name') == 's_0_1'
        || el.attr('name') == 's_0_2'
        || el.attr('name') == 's_0_3'
        || el.attr('name') == 'di_1_1'
        || el.attr('name') == 'di_1_2'
        || el.attr('name') == 'di_1_2_dd'
        || el.attr('name') == 'di_1_2_cc'
        || el.attr('name') == 'di_1_2_mc'
        || el.attr('name') == 'di_1_2_uz' */
        ){


        gender_checked_el = $("[name='s_0_1']");
        age_checked_el = $("[name='s_0_3']");
        
        //value
        gender_checked_val = gender_checked_el.filter(":checked").val();
        age_checked_val = age_checked_el.val();

        

        if(age_checked_val == ""){
            name = el.attr('name');
            return name;
        }

	 	/*data = {
	 		"age":age_checked_val, 
	 		"gender":gender_checked_val,
	 		"_token": token
	 	};
	 	
	 	
	 	$.ajax({
	        cache: false,
	        method: "POST",
	        url: ageUrl,
	        data: data,
	        async: false,
	    }).done(function( response ) {
	    	console.log(response);
	    	
	    	if( response.limit_crossed  > 0){

	    		name = el.attr('name');
	    		//console.log("here done"+name);
	    		//return name;
	    		$("#target_reached").show();
	    	}else{
	    		$("#target_reached").hide();
	    	}    		
	    		
	    	
	        
	    });*/

        found= jar_data.filter(
          function(data){
          return data.gender == gender_checked_val && 
            (age_checked_val>=data.range_min && age_checked_val<=data.range_max) 
          }
        );
        //console.log(found);
        if(found.length > 0){

            if(found[0].done_limit >=385){
                removeBlockAndFollowChangeStep('cov_7_s',3);
                $("#target_reached").show();
            }else{
                $("#target_reached").hide();
            }    

        }

	 	
	}

	//console.log("debuged:"+name);

	return name;
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
function data_submit(submitted=0){

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
    if(submitted == 1){
        data['call_status']=$('#call_status').val();
        data['date']=$('#date').val();
        data['time']=$('#time').val();
        data['s_type'] =$("[name='s_type']").val();
        console.log(data);
    }else if(submitted == 0){
        data['call_status']=0;
    }else if(submitted == 2){
    	data['call_status']=$('#call_status').val();
    }

    data['_token']=token;
    //console.log(data);
    
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

//dom disable enabled functilities
function removeBlockAndFollow(name){
    
    var e = $("[name='"+name+"']");
    e.removeAttr('disabled');    
    e.parent().parent().removeAttr('style');
    e.parents('.form-group').removeAttr('style');
    
}

function removeBlockAndFollowChangeStep(name, step){
    $('#exampleValidator').wizard('goTo', step);    
    var e = $("[name='"+name+"']");
    e.removeAttr('disabled');
    e.parent().parent().removeAttr('style');
    e.parents('.form-group').removeAttr('style');
}

function wizardIndexWiseChange(index, type){
	if(index == 1){
		removeBlockAndFollow('drk_3_1');
        focusOnElement('drk_3_1');
	} else if(index == 2){
		removeBlockAndFollow('hq_5_1');
        focusOnElement('hq_5_1');
	}

}

function gotoSpecificStepAndFocus(name,step){
    $('#exampleValidator').wizard('goTo', step);
    focusOnElement(name);

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
function cleanValue(name){
    var e = $("[name='"+name+"']");
    if(e.attr("type") == "radio"){
       e.prop("checked", false); 
    }else{
        //e.select2("val", "");

        e.find('option').removeAttr("selected");
    }
}

function disableReverseSection(e,type){
    
    if(e.attr("type") == "radio"){
        e.prop("checked", false);
    }else{
        //e.val(null).trigger('change');
        e.find('option').removeAttr("selected");
    }
    e.attr('disabled', 'disabled');
    e.parent().parent().attr('style', 'color:#a6a6a6');
}


//animation segment
function focusOnElement(name){
    var focusElement = $("[name='"+name+"']").parents('.form-group');
    ScrollToTop(focusElement, function() { focusElement.focus(); });
}
function ScrollToTop(el, callback) { 
    $('html, body').animate({ scrollTop: $(el).offset().top - 65 }, 'slow', callback);
}

function ageChange(data){

    $('#s_0_3').val(null).trigger('change');
    $("#s_0_3").empty();
    $("#s_0_3").append('<option value="">--Select an option--</option>');    
    console.log(data);

    for (var key in data) {
        $("#s_0_3").append('<option value="'+data[key]+'">'+data[key]+'</option>');
    }
    
}

//optional logic
function disabledEnabledLogicOther(){
    
	$("[name='di_1_2_dd']").change(function () {
		initCityAndUpazila($(this).val());

        
		district = $("[name='di_1_1']").filter(":checked").val();
		/*
        if(district == 1){
			//cleanValue('di_1_2_dd');
            cleanValue('di_1_2_uz');
		}else{
            cleanValue('di_1_2_cc');            
			//cleanValue('di_1_2_dd');
            cleanValue('di_1_2_mc');
		}*/

	});

    /*$("[name='s_0_2']").click(function (e) {
        e= $(this);
        if(e.val() == 1){
            ageChange(ageEighteenUp);
        }else{
            ageChange(ageEighteenDown);
        }
    });*/
    
    
	$('#di_1_2_mc').on('select2:open', function (e) {
		$("[name='di_1_2']").removeAttr('checked');
        $("[name='di_1_2_e']").attr('disabled','disabled');
	});


	$('#di_1_2_uz').on('select2:open', function (e) {
		$("[name='di_1_2']").removeAttr('checked');
        $("[name='di_1_2_e']").attr('disabled','disabled');
	});
    
	

    if( $("[name='di_1_2']:checked").val() == 66 ){
        $('#di_1_2_e').removeAttr("disabled");       
    }

    $("[name='di_1_2']").change(function () {
        e= $(this);
        if( e.val() == 66  ){                         
            $('#di_1_2_e').removeAttr("disabled");            
        }
        else{
            disabledSection($('#di_1_2_e'));          
        }
    
    });

    if( $("[name='di_1_3']").val() == 66 ){
        $('#di_1_3_e').removeAttr("disabled");       
    }

    $("[name='di_1_3']").change(function () {
        e= $(this);
        if( e.val() == 66  ){                         
            $('#di_1_3_e').removeAttr("disabled");            
        }
        else{
            disabledSection($('#di_1_3_e'));          
        }
    
    });

    //20-8-2020
    $("[name='cov_7_4_9']").change(function () {
        e= $(this);
        if(e. is(":checked")){
            $('#cov_7_4_9_e').removeAttr("disabled"); 
        }                                                               
        else{
            disabledSection($('#cov_7_4_9_e'));          
        }
    
    });


    $("[name='cov_7_1']").change(function () {
        val = $(this).val();
        $("#cov_7_3").empty();          
        for(i=0;i<=val;i++){
            $("#cov_7_3").append('<option value="'+i+'">'+i+'</option>');
        }

        $("#cov_7_6").empty();          
        for(i=1;i<=val;i++){
            $("#cov_7_6").append('<option value="'+i+'">'+i+'</option>');
        }

        $("#cov_7_8").empty();          
        for(i=1;i<=val;i++){
            $("#cov_7_8").append('<option value="'+i+'">'+i+'</option>');
        }

        $("#cov_7_10").empty();          
        for(i=1;i<=val;i++){
            $("#cov_7_10").append('<option value="'+i+'">'+i+'</option>');
        }



    });
}
