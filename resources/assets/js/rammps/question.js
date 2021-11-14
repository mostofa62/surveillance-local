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

    /*id = $("[name='rammps_id']").val();
    data = JSON.parse(getLocalItem(id));

    if(data != null && data.hasOwnProperty('last_input')){
        last_input = data.last_input;
        initAllDomDisabled();        

    }else{*/
        initAllDomDisabled();
   /* }*/


	/*if( question_id > 0 && last_input!=null ){
    	initAllDomDisabled();
    	initChange(last_input,step_index);
	}else{*/
	    
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


function tabulerDataGet(d,k){

    key_arrays = [];
    index = [];
    n = [];
    $.each(d, function(i,v){
        if( i.match('^'+k) ){
        n.push({'key':i,'value':v});
        key_arrays.push(i);    
      }
    });

    //console.log(n);

    index = [];
    $.each(key_arrays, function(i,v){
        f = v. match('[0-9]+');
      //console.log(f);
      index.push(parseInt(f));
        //if( i.match('\d') ){
        //n.push({'key':i,'value':v});
        //key_arrays.push(i);
      //}
    });
    //console.log(index);
    var unique = index.filter(function(itm, i, a) {
        return i == index.indexOf(itm);
    });

    //console.log(unique);


    /*$.each(n, function(i,v){
        console.log(v.value);

    });*/

    return {'length':unique.length, 'data':n};

}


$(function(){
    
    
    id = $("[name='rammps_id']").val();
    data = JSON.parse(getLocalItem(id));

    console.log('data'+data);

    if(data !== null){

         $.each(data, function(i,v){

            //console.log('from storage'+i);

            enabled_cdeath_or_sibiling(i,v);

            removeBlockAndFollow(i);
            if($("[name='"+i+"']").attr("type") == "radio"){
                $("[name='"+i+"']").val([v]);
            }else{
                $("[name='"+i+"']").val(v);
                try{
                    $("[name='"+i+"']").val(v).trigger('change');
                }catch(err){

                }
            }                    
         });

         last_index = 0;
         last_input = null;

         if(data.hasOwnProperty('last_index')){
            last_index = data.last_index;

         }

         if(data.hasOwnProperty('last_input')){
            last_input = data.last_input;
         }
         console.log('last_input'+last_input)

         if(last_input != null){

            data['last_input'] = last_input;
            saveOnLocalAndloadFromLocal(id,JSON.stringify(data));
            if(last_index > 0){
                gotoSpecificStepAndFocus(last_input,last_index);
            }else{
                focusOnElement(last_input);
            }
         }

         child_or_sibling_enabled();
         tabuler_indexining();
    }

    


});

function enabled_cdeath_or_sibiling(el,val){

    if(el == 's_3_until_2019' && val == 1){
        removeBlockAndFollow('cdeath[name][0]',1);
        removeBlockAndFollow('s_3_add_death');        
    }

    if(el == 's_5_sibiling_dead_in_alive' && val!=''){
        removeBlockAndFollow('sibiling[g_of_death][0]',1);
        removeBlockAndFollow('death_sibiling_add');
    }


}

function child_or_sibling_enabled(){

    cdeath = "[name='cdeath[name][0]']";

    if( $(cdeath).val() != "" ){
        cdeath = "[name^='cdeath\[name]']";
        $(cdeath).removeAttr('disabled','disabled');
    }

    sibling = "[name='sibiling[g_of_death][0]']";
    if($(sibling).is(':checked')){
        sibiling = "[name^='sibiling\[g_of_death]']";
        $(sibiling).removeAttr('disabled','disabled');
        //$(sibiling).parent().removeAttr('style');                
    }
}

function tabuler_indexining(){

    $('#death').find('.death_var').each(function(i,e) {
        //console.log('i'+i);
     inc = i+1;   $(this).find('.death_index').text(inc);
    });

    $('#death_sibiling').find('.death_sibiling_var').each(function(i,e) {
     inc = i+1;   $(this).find('.death_sibiling_index').text(inc);
    });
}



function tabularInput(){

    e = $("[name='s_1_2']");

    

    id = $("[name='rammps_id']").val();
    data = JSON.parse(getLocalItem(id));

    var sibiling = 0, cdeath=0;

    if(data != null){
        if(data.hasOwnProperty('sibiling')){
            sibiling = data.sibiling;
        }

        if(data.hasOwnProperty('cdeath')){
            cdeath = data.cdeath;
        }
    }
    

    if(sibiling > 0){
        //console.log($('#death_sibiling .death_sibiling_var').size());
        $('.death_sibiling_add').removeAttr('disabled','disabled');
        //var c = $('#death_sibiling').find('.death_sibiling_var')

        while(sibiling > 1){
            var c = $('#death_sibiling').find('.death_sibiling_var').eq(0).clone(true);
            //console.log(c);
            c.appendTo('#death_sibiling');            
            sibiling--;
        }
        var d = $('#death_sibiling').find('.death_sibiling_del');
        d.show();
        d.removeAttr('disabled','disabled');
    }

    if(cdeath > 0){
        $('.death_add').removeAttr('disabled','disabled');
        while(cdeath > 1){
            var c = $('#death').find('.death_var').eq(0).clone(true);
            c.appendTo('#death');
            cdeath--;
        }
        var d = $('#death').find('.death_del');
        d.show();
        d.removeAttr('disabled','disabled');
    }

    

    $('#death').addInputArea({

        //populated_data:cdeath,

        after_add: function () {
            //e = $("[name^='s_1_3_']");
            //e.removeAttr('disabled');
            //setExtraLocalData('cdeath',$('#death .death_var').size());

            id = $("[name='rammps_id']").val();
            data = JSON.parse(getLocalItem(id));

            if( data !=null ){
                data['cdeath']= $('#death .death_var').size();
                saveOnLocalAndloadFromLocal(id,JSON.stringify(data));
            }
            $("[name^='cdeath\[name']").each(function (i, el) {
                //console.log(el);
                $(this).removeAttr('disabled');
            });

            $('.death_del').removeAttr('disabled');

            tabuler_indexining();
        }

    }).on('click', 'input',function(){
        //console.log($(this).attr('name'));
        otherOptionOpenTab($(this));
        checkSkipLogicForTabuler($(this));
        reverseCheckSequenceTabuler($(this));
        replace_text($(this));
    })
    .on('change', 'input',function(){
        //console.log($(this).attr('name'));
        otherOptionOpenTab($(this));
        checkSkipLogicForTabuler($(this));
        reverseCheckSequenceTabuler($(this));
        replace_text($(this));
    }).on('change', 'select',function(){
        //console.log($(this).attr('name'));
        otherOptionOpenTab($(this));
        checkSkipLogicForTabuler($(this));
        reverseCheckSequenceTabuler($(this),1);
        replace_text($(this));
    });


    $('#death_sibiling').addInputArea({

        //populated_data: sibiling,
        dont_clone:true,

        after_add: function () {
            //setExtraLocalData('sibiling',$('#death_sibiling .death_sibiling_var').size());
            //e = $("[name^='s_1_3_']");
            //e.removeAttr('disabled');

            id = $("[name='rammps_id']").val();
            data = JSON.parse(getLocalItem(id));

            if( data !=null ){
                data['sibiling']= $('#death_sibiling .death_sibiling_var').size();
                saveOnLocalAndloadFromLocal(id,JSON.stringify(data));
            }
            $("[name^='sibiling\[g_of_death']").each(function (i, el) {
                //console.log(el);
                $(this).removeAttr('disabled');
            });

            $('.death_sibiling_del').removeAttr('disabled');
            tabuler_indexining();
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

    $('.death_del').click(function(){
        t = $(this).
       parent()
       .parent()
       .parent()
       .find("[name^='cdeath\[name]']")
       .attr('name');
       match = t.match(/(\d+)(?!.*\d)/);
       
       index = match[0];
       //console.log(index); 
       id = $("[name='rammps_id']").val();
       data = JSON.parse(getLocalItem(id));


        delete data['cdeath[name]['+index+']'];
        delete data['cdeath[r_with_death]['+index+']'];
        delete data['cdeath[r_with_death_e]['+index+']'];
        delete data['cdeath[db_location_death]['+index+']'];
        delete data['cdeath[g_of_covid]['+index+']'];
        delete data['cdeath[dyear]['+index+']'];
        delete data['cdeath[dmonth]['+index+']'];
        delete data['cdeath[dday]['+index+']'];
        delete data['cdeath[death_year]['+index+']'];
        delete data['cdeath[death_married]['+index+']'];
        delete data['cdeath[death_pregnant]['+index+']'];
        delete data['cdeath[death_on_birth]['+index+']'];
        delete data['cdeath[death_2m_birth]['+index+']'];

        delete data['cdeath[death_symptoms_1]['+index+']'];
        delete data['cdeath[death_symptoms_1_e]['+index+']'];
        delete data['cdeath[death_symptoms_2]['+index+']'];
        delete data['cdeath[death_symptoms_2_e]['+index+']'];
        delete data['cdeath[death_symptoms_3]['+index+']'];
        delete data['cdeath[death_symptoms_3_e]['+index+']'];
        delete data['cdeath[death_symptoms_4]['+index+']'];
        delete data['cdeath[death_symptoms_4_e]['+index+']'];


        delete data['cdeath[death_location]['+index+']'];
        delete data['cdeath[death_location_e]['+index+']'];
        delete data['cdeath[death_reason_1]['+index+']'];
        delete data['cdeath[death_reason_1_e]['+index+']'];
        delete data['cdeath[death_reason_2]['+index+']'];
        delete data['cdeath[death_reason_2_e]['+index+']'];
        delete data['cdeath[death_reason_3]['+index+']'];
        delete data['cdeath[death_reason_3_e]['+index+']'];
        delete data['cdeath[death_reason_4]['+index+']'];
        delete data['cdeath[death_reason_4_e]['+index+']'];


        delete data['cdeath[death_detect_by]['+index+']'];
        delete data['cdeath[death_covid_symptoms]['+index+']'];
        delete data['cdeath[death_covid_symptoms_e]['+index+']'];
        delete data['cdeath[death_covid_hospital]['+index+']'];
        delete data['cdeath[death_covid_hospital_a]['+index+']'];
        delete data['cdeath[death_covid_death_where]['+index+']'];
        delete data['cdeath[death_covid_death_where_e]['+index+']'];
        delete data['cdeath[death_covid_grave]['+index+']'];
        delete data['cdeath[death_covid_grave_e]['+index+']'];

        if(data.hasOwnProperty('cdeath') && data.cdeath > 0){
            data.cdeath = data.cdeath - 1;           
        }
        
        saveOnLocalAndloadFromLocal(id, JSON.stringify(data));





    });


    $('.death_sibiling_del').click(function(){
       //alert('moving');
       t = $(this).
       parent()
       .parent()
       .parent()
       .find("[name^='sibiling\[g_of_death]']")
       .attr('name');
       match = t.match(/(\d+)(?!.*\d)/);
       
       index = match[0];
       //console.log(index); 

       id = $("[name='rammps_id']").val();
       data = JSON.parse(getLocalItem(id));
       //console.log(data['sibiling[g_of_death]['+index+']']);
        
        delete data['sibiling[g_of_death]['+index+']'];
        delete data['sibiling[age_of_death]['+index+']'];
        delete data['sibiling[year_of_death]['+index+']'];
        delete data['sibiling[db_location_death]['+index+']'];
        delete data['sibiling[death_detect_by]['+index+']'];
        delete data['sibiling[death_covid_symptoms]['+index+']'];
        delete data['sibiling[death_covid_symptoms_e]['+index+']'];
        delete data['sibiling[death_covid_hospital]['+index+']'];
        delete data['sibiling[death_covid_hospital_a]['+index+']'];
        delete data['sibiling[death_covid_death_where]['+index+']'];
        delete data['sibiling[death_covid_death_where_e]['+index+']'];
        delete data['sibiling[death_covid_grave]['+index+']'];
        delete data['sibiling[death_covid_grave_e]['+index+']'];

        if(data.hasOwnProperty('sibiling') && data.sibiling > 0){
            data.sibiling = data.sibiling - 1;           
        }
        
        saveOnLocalAndloadFromLocal(id, JSON.stringify(data));        

    });

}



function checkChange(){






    $('#validation  input').on('click', function(){ // on change of state
            
            otherOptionOpen($(this));
            reverseCheckSequence($(this));
            father_or_mother_death_issues($(this));
            replace_text($(this));
            data_submit();
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
        replace_text($(this));
        data_submit();            
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
            replace_text($(this));
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
            father_or_mother_death_issues($(this));
            checkSkipLogicMVersion($(this));
            replace_text($(this));
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

    //$('#exampleValidator').wizard('goTo', 4);
    
    var api = $('#exampleValidator').data('wizard');

    

    $('#exampleValidator').on('wizard::next', function (e) {
        //checkStepWiseActive(e);
        var index = api.currentIndex();
        wizardIndexWiseChange(index,'next');


        id = $("[name='rammps_id']").val();
        data = JSON.parse(getLocalItem(id));

        if( data !=null ){
            data['last_index']= index;
            saveOnLocalAndloadFromLocal(id,JSON.stringify(data));
        }
    });

    $('#exampleValidator').on('wizard::back', function (e) {
        //checkStepWiseActive(e);
        var index = api.currentIndex();
        wizardIndexWiseChange(index,'back');
    });
    

}

function replace_text(el){
    name = el.attr('name');
    match = name.match(/(\d+)(?!.*\d)/);
    index = match[0];

    dom = $("[name='cdeath[name]["+index+"]']");

    if(dom.val()!==""){
        dom.parent().parent().find('.cdeath_place').text(dom.val());
    }
    //console.log(dom);

}

function father_or_mother_death_issues(el){

    if(el.attr('name')=='s_4_mother_name' &&
        $("[name='s_4_mother_a_or_d']").filter(':checked').val() == 3  
     ){
        removeBlockAndFollow('s_4_mother_d_age');
    }else{
        disableReverseSection( $("[name='s_4_mother_d_age']"));
    }

    if(el.attr('name')=='s_4_father_name' &&
        $("[name='s_4_father_a_or_d']").filter(':checked').val() == 3  
     ){
        removeBlockAndFollow('s_4_father_d_age');
    }else{
        disableReverseSection( $("[name='s_4_father_d_age']"));
    }
    

}



function data_submit(submitted=0){
    var form = $('#validation').serializeArray();
    var data = {};



    $.each(form, function(i, field){ 
        //obj = {};

        if(field.value != ""){
            //console.log(field.name);
            data[field.name]=field.value;
        }
        //data.push(obj);
        //last_input = data[field.name];        
        if( field.name!== "end_point" 
            && !field.name.match('^cdeath') && 
            !field.name.match('^sibiling') &&
            field.value != ""

        
           
            ){
            //console.log(field.name);
            data['last_input'] =field.name;
        }


    });

    data['_token']=token;

    id = $("[name='rammps_id']").val();
    p_data = JSON.parse(getLocalItem(id));
    if(p_data!= null){
        if(p_data.hasOwnProperty('sibiling')){
            data['sibiling'] = p_data.sibiling;
        }

        if(p_data.hasOwnProperty('cdeath')){
            data['cdeath'] = p_data.cdeath;
        }

        if(p_data.hasOwnProperty('last_index')){
            data['last_index'] = p_data.last_index;
        }




    }

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


function saveOnLocalAndloadFromLocal(id,data){
    window.localStorage.setItem('data_'+id, data);
} 


function getLocalItem(id){

    return window.localStorage.getItem('data_'+id);


}

function gotoSpecificStepAndFocus(name,step){
    $('#exampleValidator').wizard('goTo', step);
    focusOnElement(name);

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

    /*e = $("[name='s_3_until_2019']");
    e.removeAttr('disabled');
    e.parents('.form-group').removeAttr('style');


    e = $("[name='s_4_mother_a_or_d']");
    e.removeAttr('disabled');
    e.parents('.form-group').removeAttr('style');


    e = $("[name='s_5_sibiling_alive']");
    e.removeAttr('disabled');
    e.parents('.form-group').removeAttr('style');*/


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