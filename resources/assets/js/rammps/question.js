(function () {

	$('#exampleValidator').wizard({

     onInit: stepWizardInit(),
     validator: function () {
        /*var fv = $('#validation').data('formValidation');
        var $this = $(this);
        // Validate the container
        fv.validateContainer($this);
        var isValidStep = fv.isValidContainer($this);
        if (isValidStep === false || isValidStep === null) {
            return false;
        }*/
        return true;
     },
     onFinish: function () {
       /* $('#validation').submit();
        $('#validation').append("<input type='hidden' name='submitted_at' value='1' />");
        $("#call_status").append('<option value="1" selected="selected">সাক্ষাৎকার সম্পন্ন হয়েছে</option>');
        $(".wizard-finish ").attr("disabled", "disabled");*/
        data_submit(1);
     },     
				
	});


	/*if( question_id > 0 && last_input!=null ){
    	initAllDomDisabled();
    	initChange(last_input,step_index);
	}else{*/
	    initAllDomDisabled();
	/*}*/

	initiateGeoInformation();
	disabledEnabledLogicOther();

	checkChange();	
	//showScheduleBlock();
    tabularInput();

})();




function stepWizardInit(){
    //initiate form validation
    $('#validation').formValidation({
        //framework: 'bootstrap',
        fields:{}
    });
}

function tabularInput(){

    e = $("[name='s_1_2']");

    /*e.change(function(){
        
    });*/

    $('#death').addInputArea({

        after_add: function () {
            //e = $("[name^='s_1_3_']");
            //e.removeAttr('disabled');
            $("[name^='cdeath\[name']").each(function (i, el) {
                //console.log(el);
                $(this).removeAttr('disabled');
            });

            $('.death_del').removeAttr('disabled');
        }

    }).on('click', 'input',function(){
        //console.log($(this).attr('name'));
        otherOptionOpenTab($(this));
        checkSkipLogicForTabuler($(this));
        reverseCheckSequenceTabuler($(this));
    })
    .on('change', 'input',function(){
        //console.log($(this).attr('name'));
        otherOptionOpenTab($(this));
        checkSkipLogicForTabuler($(this));
        reverseCheckSequenceTabuler($(this));
    }).on('change', 'select',function(){
        //console.log($(this).attr('name'));
        otherOptionOpenTab($(this));
        checkSkipLogicForTabuler($(this));
        reverseCheckSequenceTabuler($(this),1);
    });


    $('#death_sibiling').mostoInputArea({

        after_add: function () {
            //e = $("[name^='s_1_3_']");
            //e.removeAttr('disabled');
            $("[name^='sibiling\[g_of_death']").each(function (i, el) {
                //console.log(el);
                $(this).removeAttr('disabled');
            });

            $('.death_sibiling_del').removeAttr('disabled');
        }

    }).on('click', 'input',function(){
        //console.log($(this).attr('name'));
        otherOptionOpenTab($(this));
        checkSkipLogicForTabuler($(this));
        reverseCheckSequenceTabuler($(this));
    })
    .on('change', 'input',function(){
        //console.log($(this).attr('name'));
        otherOptionOpenTab($(this));
        checkSkipLogicForTabuler($(this));
        reverseCheckSequenceTabuler($(this));
    }).on('change', 'select',function(){
        //console.log($(this).attr('name'));
        otherOptionOpenTab($(this));
        checkSkipLogicForTabuler($(this));
        reverseCheckSequenceTabuler($(this),1);
    });

}

function checkChange(){



    $('#validation  input').on('click', function(){ // on change of state
            
            otherOptionOpen($(this));
            reverseCheckSequence($(this));
            //data_submit();
            //name = marialstatusWiseSkipLogic($(this));
            //console.log($(this));
            //if(name == ""){ 
                //console.log("name:"+name);           
                checkSkipLogicMVersion($(this));
                //31-8-2020
                //checkAgeJarLimit($(this));
            //}
    });


    $('#validation .select2').on('select2:open', function (e) {
        
        otherOptionOpen($(this));
        reverseCheckSequence($(this),1);
        //enabledAndDisabledAgain($(this));
        //data_submit();            
        //name = marialstatusWiseSkipLogic($(this));

        //name = checkAgeJarLimit($(this));
            
        //if(name == ""){   
            //console.log("name:"+name);          
            checkSkipLogicMVersion($(this),1);
        //}
    });

    


    $('#validation  select').on('change', function(){
            otherOptionOpen($(this));
            //disableMultipleDropdown($(this));            
            reverseCheckSequence($(this),1);
            //enabledAndDisabledAgain($(this));
            data_submit();            
            //name = marialstatusWiseSkipLogic($(this));
            //name = checkAgeJarLimit($(this));
            //if(name == ""){   
                //console.log("name:"+name);          
                checkSkipLogicMVersion($(this),1);
            //}

    });

    

    $('#validation  input').on('change', function(){ // on change of state
            otherOptionOpen($(this));
            reverseCheckSequence($(this));
            checkSkipLogicMVersion($(this));
            data_submit();
            //name = marialstatusWiseSkipLogic($(this));
            //name = checkAgeJarLimit($(this));
            
            //if(name == ""){ 
                //console.log("name:"+name);           
                
            //}
    });

    $('#submit_new').click(function(){        
            data_submit(1);
           
    });

    //age limit exceed
    /*$('#target_reached_submit').click(function(){
            $("#call_status").append('<option value="9" selected="selected">সাক্ষাৎকার সম্পন্ন হয়েছে</option>');        
            data_submit(2);
           
    });*/

    $('#exampleValidator').wizard('goTo', 4);
    
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



function data_submit(submitted=0){
    var form = $('#validation').serializeArray();
    var data = {};    
    $.each(form, function(i, field){ 
        //obj = {};
        data[field.name]=field.value;
        //data.push(obj);
        //last_input = data[field.name];        
        if(field.name!== "end_point" && !field.name.match('^cdeath')
           
            ){
            //console.log(field.name);
            data['last_input'] =field.name;
        }
    });

    data['_token']=token;
    saveOnLocalAndloadFromLocal(data['rammps_id'],JSON.stringify(data));
    //storage = JSON.parse(getLocalItem(data['rammps_id']));
    //console.log(storage);



    /*$.ajax({
        cache: false,
        method: "POST",
        url: url,
        data: data,
    }).done(function( msg ) {
        console.log(msg);*/

        /*if(submitted){

                    if(msg.success==true)
                    window.location.href =  redirect;

        }else{

        }*/
    /*});*/
}

//setInterval(postDataOnTime, 5000);

function postDataOnTime(){
    
    id = $("[name='rammps_id']").val();
    data = JSON.parse(getLocalItem(id));

    $.ajax({
        cache: false,
        method: "POST",
        url: url,
        data: data,
    }).done(function( msg ) {
        console.log(msg);

        /*if(submitted){

                    if(msg.success==true)
                    window.location.href =  redirect;

        }else{

        }*/
    });
}

function saveOnLocalAndloadFromLocal(id,data){



    window.localStorage.setItem('data_'+id, data);

} 

function getLocalItem(id){

    return window.localStorage.getItem('data_'+id);


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

    e = $("[name='s_1_consent']");
    //console.log(e.attr('name'));
    e.removeAttr('disabled');
    e.parents('.form-group').removeAttr('style');

    e = $("[name='s_3_until_2018']");
    e.removeAttr('disabled');
    e.parents('.form-group').removeAttr('style');


    e = $("[name='s_4_mother_a_or_d']");
    e.removeAttr('disabled');
    e.parents('.form-group').removeAttr('style');


    e = $("[name='s_5_sibiling_alive']");
    e.removeAttr('disabled');
    e.parents('.form-group').removeAttr('style');


     e = $("[name='rammps_id']");
     e.removeAttr('disabled');

}


function wizardIndexWiseChange(index, type){
    if(index == 1){
        removeBlockAndFollow('s_2_name');
        focusOnElement('s_2_name');
    }else if(index == 2){
        removeBlockAndFollow('s_3_khana_m');
        focusOnElement('s_3_khana_m');
        removeBlockAndFollow('s_3_khana_f');
        focusOnElement('s_3_khana_f');
    }else if(index == 3){       
        removeBlockAndFollow('s_4_mother_a_or_d');
        focusOnElement('s_4_mother_a_or_d');
    }
    else if(index == 4){

        //console.log('you are here');
        removeBlockAndFollow('s_5_sibiling_alive');
        focusOnElement('s_5_sibiling_alive');
        

        

        
        
    } 

}


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
    
    $.getJSON( municipalurl, function( data ) {
        //upaziladata = JSON.parse(data);
        $.each( data, function( key, val ) {
            municipaldata.push(val);
        });
    });

    /*$.getJSON( jar_url, function( data ) {
        //upaziladata = JSON.parse(data);
        $.each( data, function( key, val ) {
            jar_data.push(val);
        });
    });*/
    

    
}

function initCityAndUpazila(val){

    
    filted_mc = getFilterData(municipaldata,val );           
    mc = setDataForGeo(filted_mc);            
    //$("#gi_1_3_cc").select2('destroy').empty().select2({ data: cc });
    $('#s_1_mc').val(null).trigger('change');
    $("#s_1_mc").empty();
    $("#s_1_mc").append('<option value="">--Municipal--</option>');    
    
    for(var i=0;i<mc.length;i++){
        $("#s_1_mc").append('<option value="'+mc[i].id+'">'+mc[i].text+'</option>');
    }

    filted_uz = getFilterData(upaziladata,val );        
    uz = setDataForGeo(filted_uz);
    //console.log(uz);
    //$("#gi_1_3_uz").select2('destroy').empty().select2({ data: uz });
    $('#s_1_uz').val(null).trigger('change');
    $("#s_1_uz").empty();
    $("#s_1_uz").append('<option value="">--Upazila--</option>');   
    for(var i=0;i<uz.length;i++){
        $("#s_1_uz").append('<option value="'+uz[i].id+'">'+uz[i].text+'</option>');
    }
}


function disabledEnabledLogicOther(){


    $("[name='s_1_dd']").change(function () {
        initCityAndUpazila($(this).val());                
    });


    $('#s_1_mc').on('select2:open', function (e) {
        $("[name='s_1_ccuzmc_o']").removeAttr('checked');
        $("[name='s_1_ccuzmc_o_e']").attr('disabled','disabled');
    });


    $('#s_1_uz').on('select2:open', function (e) {
        $("[name='s_1_ccuzmc_o']").removeAttr('checked');
        $("[name='s_1_ccuzmc_o_e']").attr('disabled','disabled');
    });
    
    

    if( $("[name='s_1_ccuzmc_o']:checked").val() == 66 ){
        $('#s_1_ccuzmc_o_e').removeAttr("disabled");       
    }


}