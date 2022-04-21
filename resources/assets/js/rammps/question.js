$(document).ready(function(){
    complete_load_after();
});




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
        //$("#call_status").append('<option value="1" selected="selected">সাক্ষাৎকার সম্পন্ন হয়েছে</option>');
        $(".wizard-finish ").attr("disabled", "disabled");
        data_submit(1,1);
     },     
				
	});

    initAllDomDisabled();
   
	initiateGeoInformation();
	disabledEnabledLogicOther();

	checkChange();	
	showScheduleBlock();
    tabularInput();

})();


function showScheduleBlock(){

    $("#show_reschedule").click(function(){

        $('.table-position').removeAttr('style');
    });
    $(".close").click(function(){
        $('.table-position').attr('style','display:none');
    });

    
    date = $("[name='date']");
    date.attr('disabled','disabled');
    date.parents('.form-group').attr('style', 'color:#a6a6a6');

    time = $("[name='time']");
    time.attr('disabled','disabled');
    time.parents('.form-group').attr('style', 'color:#a6a6a6');

    $("#submit_new").attr('disabled','disabled');

    $('#call_status').change(function(){

        val = $(this).val();

        if((val == 10) && val !="" || (val == 54) && val !=""){
           
            date.removeAttr('disabled');
            date.parents('.form-group').removeAttr('style');

            time.removeAttr('disabled');
            time.parents('.form-group').removeAttr('style');

            $("#submit_new").attr('disabled','disabled');

        }else{
           
            date.attr('disabled','disabled');
            date.parents('.form-group').attr('style', 'color:#a6a6a6');

            time.attr('disabled','disabled');
            time.parents('.form-group').attr('style', 'color:#a6a6a6');
            if(val!=""){
                $("#submit_new").removeAttr('disabled');
            }

        }

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


    $('.table-position-show').click(function(){
        $('.table-position').css('right',0);
        $('.table-position-hide').show();
        $(this).hide();
    });


    $('.table-position-hide').click(function(){
        $('.table-position').css('right','-23%');
        $('.table-position-show').show();
        $(this).hide();
    });



    //end logic


}

function schedule_block_on_propertime(el){

    s_1_consent = $("[name='s_1_consent']").filter(':checked').val();
    if( (el.attr('name') == 's_1_dd' 
        || el.attr('name') == 's_1_v_or_c' 
        || el.attr('name') == 's_1_cc_uz_mc'
        || el.attr('name') == 's_1_mc'
        || el.attr('name') == 's_1_consent'
        ) && s_1_consent == 5){
        $('.table-position').show();
    }
    else if(el.attr('name') == 's_1_consent' 
        && (
            s_1_consent == 1 || 
            s_1_consent == 3
        )){
        $('.table-position').hide();
    }

    if( (el.attr('name') == 's_1_consent' 
        || el.attr('name') == 's_1_consent_n' 
        || el.attr('name') == 's_1_consent_n_e') &&  s_1_consent == 3){
        $('#consent_no_submit').show();
        $('.wizard-next').addClass('disabled');
    }else{
        $('#consent_no_submit').hide();
        $('.wizard-next').removeClass('disabled');
    }
    

}

function stepWizardInit(){
    //complete_load_after();
    //initiate form validation
    $('#validation').formValidation({
        //framework: 'bootstrap',
        fields:{
            
            

        }
    });

}





//$(function(){
function complete_load_after(){

    //window.location.reload(true);

    id = $("[name='rammps_id']").val();
    data = JSON.parse(getLocalItem(id));

    
    if(previous_data != null && data == null  && Object.keys(previous_data).length > 0){
        saveOnLocalAndloadFromLocal(id,JSON.stringify(previous_data));
    }
    
    
    

    //console.log('data'+data);

    indexing_labels();
    tabuler_indexining();
    cdeath_indexing_label();
    sibiling_indexing_label();


    //initiateGeoInformation();

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
         //console.log('last_input'+last_input)
                          

         if(last_input != null){

            data['last_input'] = last_input;
            saveOnLocalAndloadFromLocal(id,JSON.stringify(data));
            if(last_index > 0){
                $('.table-position').show();
                gotoSpecificStepAndFocus(last_input,last_index);
            }else{
                focusOnElement(last_input);
            }
         }

         child_or_sibling_enabled();
         mother_father_answer_prefilled();
         //initCityAndUpazila($("[name='s_1_dd']").val());


         
        
         
    }


}

//});


function indexing_labels(){

    $('.wizard-pane').each(function(i,v){
            
            var ix = i+1;
            $(this).find('.form-group, #death').each(function(x,y){
                var ex = x+1;
                $(this).find('.control-label').prepend(ix+"."+ex+" |&nbsp;");
            });
    
    });

    $('.mother_index .index_label').each(function(i,v){
        var ix = i + 1;
        $(this).text("5.17."+ix+" | ");
    });

    $('.father_index .index_label').each(function(i,v){
        var ix = i + 1;
        $(this).text("5.18."+ix+" | ");
    });


}

function cdeath_indexing_label(){

    $('.death_var').each(function(i,v){
        var ix=i+1; 
        $(this).find(".cdeath_index").each(function(x,y){
            var ixx= x+1;
            $(this).text("4."+ixx+"."+ix+" | ");
        });

    });
}


function sibiling_indexing_label(){
    $('.death_sibiling_var').each(function(i,v){
        var ix=i+1; 
        $(this).find(".sibiling_index").each(function(x,y){
            var ixx= x+1;
            $(this).text("6.4."+ix+"."+ixx+" | ");
        });

    });
}



function enabled_cdeath_or_sibiling(el,val){

    if(el == 's_3_until_2019' && val == 1){
        removeBlockAndFollow('cdeath[name][0]',1);
        removeBlockAndFollow('s_3_add_death');        
    }

    if(el == 's_5_sibiling_dead_in_alive' && val!=''){
        removeBlockAndFollow('sibiling[name][0]',1);
        removeBlockAndFollow('death_sibiling_add');
    }


}



function child_or_sibling_enabled(){

    cdeath = "[name='cdeath[name][0]']";

    if( $(cdeath).val() != "" ){
        cdeath = "[name^='cdeath\[name]']";
        $(cdeath).removeAttr('disabled','disabled');
    }

    sibling = "[name='sibiling[name][0]']";
    if($(sibling).is(':checked')){
        sibiling = "[name^='sibiling\[g_of_death]']";
        $(sibiling).removeAttr('disabled','disabled');
        //$(sibiling).parent().removeAttr('style');                
    }
}

function tabuler_indexining(){

    $('#death').find('.death_var').each(function(i,e) {
        //console.log('i'+i);
        inc = i+1;
        //console.log($(this).find('.death_index'));
        $(this).find('.death_index').text(inc);
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
        if(data.hasOwnProperty('sibiling_len')){
            sibiling = data.sibiling_len;
        }

        if(data.hasOwnProperty('cdeath_len')){
            cdeath = data.cdeath_len;
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
                data['cdeath_len']= $('#death .death_var').size();
                saveOnLocalAndloadFromLocal(id,JSON.stringify(data));
            }
            $("[name^='cdeath\[name']").each(function (i, el) {
                //console.log(el);
                $(this).removeAttr('disabled');
            });

            $('.death_del').removeAttr('disabled');

            tabuler_indexining();
            cdeath_indexing_label();
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
                data['sibiling_len']= $('#death_sibiling .death_sibiling_var').size();
                saveOnLocalAndloadFromLocal(id,JSON.stringify(data));
            }
            $("[name^='sibiling\[name']").each(function (i, el) {
                //console.log(el);
                $(this).removeAttr('disabled');
            });

            $('.death_sibiling_del').removeAttr('disabled');
            tabuler_indexining();
            sibiling_indexing_label();
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

        if(data.hasOwnProperty('cdeath_len') && data.cdeath_len > 0){
            data.cdeath_len = data.cdeath_len - 1;           
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

        if(data.hasOwnProperty('sibiling_len') && data.sibiling_len > 0){
            data.sibiling_len = data.sibiling_len - 1;           
        }
        
        saveOnLocalAndloadFromLocal(id, JSON.stringify(data));        

    });

}



function checkChange(){






    $('#validation  input').on('click', function(){ // on change of state
            
            //snowball

            checkBoundary();

            otherOptionOpen($(this));
            reverseCheckSequence($(this));
            father_or_mother_death_issues($(this));
            replace_text($(this));
            f_18_up($(this));
            schedule_block_on_propertime($(this));            
            zero_value_logic($(this));
            data_submit();                      
            checkSkipLogicMVersion($(this));

            



    });


    $('#validation .select2').on('select2:open', function (e) {
        
        
        //snowball

        checkBoundary();

        otherOptionOpen($(this));
        reverseCheckSequence($(this),1);        
        //enabledAndDisabledAgain($(this));
        schedule_block_on_propertime($(this));
        replace_text($(this));
        f_18_up($(this));
        zero_value_logic($(this));
        data_submit();            
        checkSkipLogicMVersion($(this),1);

        
        
    });

    


    $('#validation  select').on('change', function(){
            
            //snowball

            checkBoundary(); 

            otherOptionOpen($(this));
            //disableMultipleDropdown($(this));            
            reverseCheckSequence($(this),1);
            //enabledAndDisabledAgain($(this));
            schedule_block_on_propertime($(this));
            replace_text($(this));
            f_18_up($(this));
            zero_value_logic($(this));
            data_submit();                               
            checkSkipLogicMVersion($(this),1);


                       

    });

    

    $('#validation  input').on('change', function(){ // on change of state
            
            //snowball

            checkBoundary();

            otherOptionOpen($(this));
            reverseCheckSequence($(this));
            father_or_mother_death_issues($(this));
            checkSkipLogicMVersion($(this));
            replace_text($(this));
            f_18_up($(this));
            zero_value_logic($(this));
            data_submit();

            
           
    });

    $('#consent_no_submit').click(function(){

        data_submit(1,41);
        
    });

    $('#age_below_18_submit').click(function(){

        data_submit(1,42);
        
    });

    $('#out_of_family').click(function(){

        data_submit(1,52);
        
    });

    $('#snow_ball').click(function(){
        ///alert('fool');

        //data_submit(1,52);
        $('.table-position').css('right',0);
        $('.table-position-hide').show();
        $('.table-position-show').hide();
        $('.table-position').show();

        //$("#call_status").append('<option value="54" selected="selected">স্নোবল সময় নির্ধারণ করুন</option>');
        
        //$("#call_status").append('<option value="55">স্নোবল সময় - অস্বীকৃতি</option>');
        $("#call_status").val(54).attr("selected", "selected");
        $("[name='snow_ball']").val(1);
        $("[name='date']").removeAttr("disabled");
        $("[name='time']").removeAttr("disabled");
        
        $(".wizard-next ").attr("disabled", "disabled");
        $(".wizard-finish ").attr("disabled", "disabled");
    
        
    });

    $('#submit_new').click(function(){

            id = $("[name='rammps_id']").val();
            data = JSON.parse(getLocalItem(id));
            //alert($('#call_status').val());
            data['call_status'] = $('#call_status').val();
            if($("[name='date']").val()!="")
                data['date'] = $("[name='date']").val();
            if($("[name='time']").val() != "")
                data['time'] = $("[name='time']").val();
            saveOnLocalAndloadFromLocal(id, JSON.stringify(data));                  
            data_submit(1);
           
    });

    //age limit exceed
    /*$('#target_reached_submit').click(function(){
            $("#call_status").append('<option value="9" selected="selected">সাক্ষাৎকার সম্পন্ন হয়েছে</option>');        
            data_submit(2);
           
    });*/

    //$('#exampleValidator').wizard('goTo', 2);
    
    var api = $('#exampleValidator').data('wizard');

    

    $('#exampleValidator').on('wizard::next', function (e) {
        //checkStepWiseActive(e);
        var index = api.currentIndex();
        wizardIndexWiseChange(index,'next');

        if( index > 0 ){
            $('.table-position').show();
        }

        /*if( index == 4 ){
            mother_father_answer_prefilled();
        }*/        


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

        if( index < 1 ){
            $('.table-position').hide();
        }
        wizardIndexWiseChange(index,'back');
    });
    

}

function checkBoundary(){

    var gender = $("[name='s_1_gender']").filter(':checked').val();
    var age = $("[name='s_1_age']").val();
    var cc = $("[name='s_1_cc']").val();
    var v_or_c = $("[name='s_1_v_or_c']").filter(':checked').val();
    var age_key = null;
    var vc_key = null;

    var d_a = null;

    var cc_array = [6586,6587,6590];

    //console.log('snowball age:'+age);
    for (var key in age_group) {
        low = age_group[key][0];
        high = age_group[key][1];          
        if( age >= low &&  age <= high){
            age_key = key;
        }
    }

    if(age_key != null){
        if(gender < 5 && v_or_c < 5){            
            if(cc != '' && $.inArray(parseInt(cc), cc_array) != -1 ){
                vc_key = 'c';
            }else{
                vc_key = v_or_c > 1 ?'v':'t';
            }
        }
    }
    if(gender != null && vc_key !=null && age_key!=null){
        d_a = age_boundary[gender][vc_key][age_key];
    }

    if(d_a != null){
        if(d_a[0] >= d_a[1]){
            $("#snow_ball").show();
            $("[name='snow_ball']").val(1);
            $('.wizard-next').addClass('disabled');
        }else{
            $("#snow_ball").hide();
            $("[name='snow_ball']").val(0);
            $('.wizard-next').removeClass('disabled');
        }
    }

    //console.log(vc_key);

    //console.log('data ab:'+age_boundary[gender][vc_key][age_key]);


}

function replace_text(el){
    name = el.attr('name');
    match = name.match(/(\d+)(?!.*\d)/);
    if(match == null) return;
    index = match[0];

    dom = $("[name='cdeath[name]["+index+"]']");

    if(dom.val()!==""){
        dom.parent().parent().parent().find('.cdeath_place').text(dom.val());        
    }

    dom = $("[name='s_4_mother_name']");
    if(dom.val()!==""){
        $('.m_place').text(dom.val());        
    }

    dom = $("[name='s_4_father_name']");
    if(dom.val()!==""){
        $('.f_place').text(dom.val());        
    }

    
    //console.log(dom);

}

function f_18_up(e){


    if(e.attr('name')=='s_1_age'){
        
        if(e.val() >= 18){
            $('#age_below_18_submit').hide();
            removeBlockAndFollow('s_1_dd');
            $('.wizard-next').removeClass('disabled');
        }
        else{
            $('#age_below_18_submit').show();
            disableReverseSection($("[name='s_1_dd']"),0);
            disableReverseSection($("[name='s_1_v_or_c']"),0);        
            disableReverseSection($("[name='s_1_cc']"),0);
            disableReverseSection($("[name='s_1_mc']"),0);
            disableReverseSection($("[name='s_1_uz']"),0);
            disableReverseSection($("[name='s_1_ccuzmc_o']"),0);
            disableReverseSection($("[name='s_1_ccuzmc_o_e']"),0);
            $('.wizard-next').addClass('disabled');
        }

        

    }

    if(e.attr('name')=='s_1_location'){
        
        if(e.val() > 1){
            $('#out_of_family').show();
            disableReverseSection($("[name='s_1_age']"),0);
            disableReverseSection($("[name='s_1_gender']"),0);
            disableReverseSection($("[name='s_1_dd']"),0);
            disableReverseSection($("[name='s_1_v_or_c']"),0);        
            disableReverseSection($("[name='s_1_cc']"),0);
            disableReverseSection($("[name='s_1_mc']"),0);
            disableReverseSection($("[name='s_1_uz']"),0);
            disableReverseSection($("[name='s_1_ccuzmc_o']"),0);
            disableReverseSection($("[name='s_1_ccuzmc_o_e']"),0);
            $('.wizard-next').addClass('disabled');
            
        }
        else{
            $('#out_of_family').hide();
            removeBlockAndFollow('s_1_gender');
            $('.wizard-next').removeClass('disabled');
            
        }

        

    }

    d_year = [2020,2021,2022];
    if(e.attr('name')=='s_4_mother_d_year'){
        if($.inArray(e.val(), d_year) < 0){
            disableReverseSection($("[name='mother_death_detect_by']"));
            disableReverseSection($("[name='mother_death_covid_symptoms_1']"));
            disableReverseSection($("[name='mother_death_covid_symptoms_2']"));
            disableReverseSection($("[name='mother_death_covid_symptoms_3']"));
            disableReverseSection($("[name='mother_death_covid_symptoms_4']"));
            disableReverseSection($("[name='mother_death_covid_hospital']"));
            disableReverseSection($("[name='mother_death_covid_hospital_a']"));
            disableReverseSection($("[name='mother_death_covid_grave']"));
        }
    }


    if(e.attr('name')=='s_4_father_d_year'){
        if($.inArray(e.val(), d_year) < 0){
            disableReverseSection($("[name='father_death_detect_by']"));
            disableReverseSection($("[name='father_death_covid_symptoms_1']"));
            disableReverseSection($("[name='father_death_covid_symptoms_2']"));
            disableReverseSection($("[name='father_death_covid_symptoms_3']"));
            disableReverseSection($("[name='father_death_covid_symptoms_4']"));
            disableReverseSection($("[name='father_death_covid_hospital']"));
            disableReverseSection($("[name='father_death_covid_hospital_a']"));
            disableReverseSection($("[name='father_death_covid_grave']"));
        }
    }

    if(e.attr('name')=='s_4_mother_location'){
        md = $("[name='s_4_mother_a_or_d']").filter(':checked').val();
        if(md < 2){
           disableReverseSection($("[name='s_4_mother_name']")); 
        }
    }

    if(e.attr('name')=='s_4_father_location'){
        md = $("[name='s_4_father_a_or_d']").filter(':checked').val();
        if(md < 2){
           disableReverseSection($("[name='s_4_father_name']")); 
        }
    }


}


function mother_father_answer_prefilled(){
    cdeath = "[name^='cdeath\[r_with_death]']";
    $(cdeath).each(function(i,v){
        //console.log('i'+i+'value'+$(this).val());
        name = $("[name^='cdeath\[name\]\["+i+"\]'\]").val();

        dday = parseInt($("[name^='cdeath\[dday\]\["+i+"\]'\]").val());
        dyear = parseInt($("[name^='cdeath\[dyear\]\["+i+"\]'\]").val());
        dmonth = parseInt($("[name^='cdeath\[dmonth\]\["+i+"\]'\]").val());

        death_year = $("[name^='cdeath\[death_year\]\["+i+"\]'\]").filter(':checked').val();
        death_location = $("[name^='cdeath\[death_location\]\["+i+"\]'\]").val();
        
        death_detect_by = $("[name^='cdeath\[death_detect_by\]\["+i+"\]'\]").filter(':checked').val();

        death_covid_symptoms_1 = $("[name^='cdeath\[death_covid_symptoms_1\]\["+i+"\]'\]").val();
        death_covid_symptoms_2 = $("[name^='cdeath\[death_covid_symptoms_2\]\["+i+"\]'\]").val();
        death_covid_symptoms_3 = $("[name^='cdeath\[death_covid_symptoms_3\]\["+i+"\]'\]").val();
        death_covid_symptoms_4 = $("[name^='cdeath\[death_covid_symptoms_4\]\["+i+"\]'\]").val();

        death_covid_hospital = $("[name^='cdeath\[death_covid_hospital\]\["+i+"\]'\]").filter(':checked').val();

        death_covid_hospital_a = $("[name^='cdeath\[death_covid_hospital_a\]\["+i+"\]'\]").filter(':checked').val();

        death_covid_grave = $("[name^='cdeath\[death_covid_grave\]\["+i+"\]'\]").val();

        //mother
        if($(this).val() == 8){
            
            $("[name='s_4_mother_a_or_d']").val([3]);
            removeBlockAndFollow('s_4_mother_a_or_d');
            $("[name='s_4_mother_name']").val(name);
            removeBlockAndFollow('s_4_mother_name');                    
            $("[name='s_4_mother_db_location']").val([1]);            
            removeBlockAndFollow('s_4_mother_db_location');
            if(dyear > 0 ){
                $("[name='s_4_mother_d_age']").val(dyear).trigger('change');
                removeBlockAndFollow('s_4_mother_d_age');
            }
            if(death_year){                            
                $("[name='s_4_mother_d_year']").val(death_year);
                removeBlockAndFollow('s_4_mother_d_year');   
            }

            if(death_location != null){
                $("[name='mother_death_covid_death_where']").val(death_location).trigger('change');
                removeBlockAndFollow('mother_death_covid_death_where');
            }
            if(death_detect_by != null){
                $("[name='mother_death_detect_by']").val([death_detect_by]);
                removeBlockAndFollow('mother_death_detect_by');
            }
            //DEATH_SYMPTOMS
            if(death_covid_symptoms_1 != null){
                $("[name='mother_death_covid_symptoms_1']").val(death_covid_symptoms_1);
                removeBlockAndFollow('mother_death_covid_symptoms_1');
            }

            if(death_covid_symptoms_2 != null){
                $("[name='mother_death_covid_symptoms_2']").val(death_covid_symptoms_2);
                removeBlockAndFollow('mother_death_covid_symptoms_2');
            }

            if(death_covid_symptoms_3 != null){
                $("[name='mother_death_covid_symptoms_3']").val(death_covid_symptoms_3);
                removeBlockAndFollow('mother_death_covid_symptoms_3');
            }

            if(death_covid_symptoms_4 != null){
                $("[name='mother_death_covid_symptoms_4']").val(death_covid_symptoms_4);
                removeBlockAndFollow('mother_death_covid_symptoms_4');
            }

            if(death_covid_hospital != null){
                $("[name='mother_death_covid_hospital']").val([death_covid_hospital]);
                removeBlockAndFollow('mother_death_covid_hospital');

            }

            if(death_covid_hospital_a != null){
                $("[name='mother_death_covid_hospital_a']").val([death_covid_hospital_a]);
                removeBlockAndFollow('mother_death_covid_hospital_a');

            }

            if(death_covid_grave !=null){
                $("[name='mother_death_covid_grave']").val(death_covid_grave);
                removeBlockAndFollow('mother_death_covid_grave');
            }

            
            
        }
        //father
        if($(this).val() == 7){
            $("[name='s_4_father_a_or_d']").val([3]);
            removeBlockAndFollow('s_4_father_a_or_d');
            $("[name='s_4_father_name']").val(name);
            removeBlockAndFollow('s_4_father_name');
            $("[name='s_4_father_db_location']").val([1]);
            removeBlockAndFollow('s_4_father_db_location');
            
            if(dyear > 0){
                $("[name='s_4_father_d_age']").val(dyear).trigger('change');
                removeBlockAndFollow('s_4_father_d_age');
            }

            if(death_year){
                $("[name='s_4_father_d_year']").val(death_year);
                removeBlockAndFollow('s_4_father_d_year');
            }

            if(death_location !=null){
                $("[name='father_death_covid_death_where']").val(death_location).trigger('change');
                removeBlockAndFollow('father_death_covid_death_where');

            }

            if(death_detect_by != null){
                $("[name='father_death_detect_by']").val([death_detect_by]);
                removeBlockAndFollow('father_death_detect_by');
            }
            //death covid symptoms
            if(death_covid_symptoms_1 != null){
                $("[name='father_death_covid_symptoms_1']").val(death_covid_symptoms_1);
                removeBlockAndFollow('father_death_covid_symptoms_1');
            }

            if(death_covid_symptoms_2 != null){
                $("[name='father_death_covid_symptoms_2']").val(death_covid_symptoms_2);
                removeBlockAndFollow('father_death_covid_symptoms_2');
            }

            if(death_covid_symptoms_3 != null){
                $("[name='father_death_covid_symptoms_3']").val(death_covid_symptoms_3);
                removeBlockAndFollow('father_death_covid_symptoms_3');
            }

            if(death_covid_symptoms_4 != null){
                $("[name='father_death_covid_symptoms_4']").val(death_covid_symptoms_4);
                removeBlockAndFollow('father_death_covid_symptoms_4');
            }


            if(death_covid_hospital != null){
                $("[name='father_death_covid_hospital']").val([death_covid_hospital]);
                removeBlockAndFollow('father_death_covid_hospital');

            }

            if(death_covid_hospital_a != null){
                $("[name='father_death_covid_hospital_a']").val([death_covid_hospital_a]);
                removeBlockAndFollow('father_death_covid_hospital_a');

            }

            if(death_covid_grave !=null){
                $("[name='father_death_covid_grave']").val(death_covid_grave);
                removeBlockAndFollow('father_death_covid_grave');
            }

        }
    });
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

function zero_value_logic(e){
    if(e.attr('name') == 's_3_khana_u_5' && e.val() > 0 ){
        removeBlockAndFollow('s_3_child_health_decesion_1');
    }

    if(e.attr('name') == 's_5_sibiling_dead_in_alive' && e.val() > 0 ){
        removeBlockAndFollow('s_5_sibiling_dead_2019_a');
    }



    if(e.attr('name') == 's_5_sibiling_dead_2019_a' && e.val() > 0 ){
        if(e.val() > 1){
            removeBlockAndFollow('s_5_sibiling_dead_add');
        }else{
            $("[name='s_5_sibiling_dead_add']").attr('disabled','disabled');
        }
        removeBlockAndFollow('sibiling[name][0]');
    }

    if(e.attr('name') == 's_3_khana' && e.val() > 0 ){
        removeBlockAndFollow('s_3_khana_m');
        removeBlockAndFollow('s_3_khana_f');
    }
}


function skip_wizard(){
    s_3_until_2019 =  $("[name='s_3_until_2019']").filter(':checked').val();

    s_3_until_2019_a = $("[name='s_3_until_2019_a']").val();
    if(s_3_until_2019_a > 0 ){
        if(s_3_until_2019_a > 1){
            removeBlockAndFollow('s_3_add_death');
        }else{
            $("[name='s_3_add_death']").attr('disabled','disabled');
        }
        removeBlockAndFollow('cdeath[name][0]');
    }else{
        removeBlockAndFollowChangeStep('s_4_mother_a_or_d',4);
    }

    if(s_3_until_2019 == 3 || s_3_until_2019 == 88 ){
        removeBlockAndFollowChangeStep('s_4_mother_a_or_d',4);
    }
}



function data_submit(submitted=0,call_status=null){
    var form = $('#validation').serializeArray();
    var data = {};
    var error_fields = {};
     

    $.each(form, function(i, field){ 
        //obj = {};

        if( 
        $("[name='"+field.name+"']").prop('disabled') == false 
        && !field.name.match('^cdeath') && 
        !field.name.match('^sibiling') &&
        field.name != "rammps_id" &&
        field.name != "snow_ball" &&
        field.name != "submitted_at"          
        ){        
            console.log($("[name='"+field.name+"']").val());
            if(field.value == "" || $("[name='"+field.name+"']").is(":checked")  ==false ){              
                error_fields[field.name]=field.name;
            }
        }
        if(field.value != ""){
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
        if(p_data.hasOwnProperty('sibiling_len')){
            data['sibiling_len'] = p_data.sibiling_len;
        }

        if(p_data.hasOwnProperty('cdeath_len')){
            data['cdeath_len'] = p_data.cdeath_len;
        }

        if(p_data.hasOwnProperty('last_index')){
            data['last_index'] = p_data.last_index;
        }

        if(p_data.hasOwnProperty('call_status')){
            data['call_status'] = p_data.call_status;
        }

        if(p_data.hasOwnProperty('date')){
            data['date'] = p_data.date;
        }

        if(p_data.hasOwnProperty('time')){
            data['time'] = p_data.time;
        }

        /*if(p_data.hasOwnProperty('s_1_uz')){
            data['s_1_uz'] = p_data.s_1_uz;
        }

        if(p_data.hasOwnProperty('s_1_mc')){
            data['s_1_mc'] = p_data.s_1_mc;

        }

        if(p_data.hasOwnProperty('s_1_cc')){
            data['s_1_cc'] = p_data.s_1_cc;
        }*/




    }

    if(call_status != null){
        data['call_status'] = call_status;
    }

    //console.log(data);

    saveOnLocalAndloadFromLocal(data['rammps_id'],JSON.stringify(data));
    data = JSON.parse(getLocalItem(data['rammps_id']));
    

    


    
    if(submitted > 0){
        if( Object.keys(error_fields).length > 0 ){
            console.log(error_fields);
            $.each( error_fields, function( key, val ) {
                    $("[name='"+key+"']").parent().css({"color": "red", "border": "2px solid red"});
            });
            alert("check red marked inputs");  
        }else{
            $.each( error_fields, function( key, val ) {
                    $("[name='"+key+"']").parent().css({"color": "none", "border": "0px"});
            });
            //alert("check red marked inputs");
           console.log('goint to submit');   
        }
                 
        /*
            $.ajax({
                cache: false,
                method: "POST",
                url: url,
                data: data,
            }).done(function( msg ) {
                //console.log(msg);
                window.localStorage.clear();

                if(submitted){

                    if(msg.success==true)
                        window.location.href =  redirect;

                    if(msg.success==false)
                        window.location.href =  url;

                }
            });
        */

    }
    /*
    else{

        $.each( error_fields, function( key, val ) {
                    $("[name='"+key+"']").parent().css({"color": "red", "border": "2px solid red"});
            });

            alert("check red marked inputs");  

    }*/
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
     e = $("[name='snow_ball']");
     e.removeAttr('disabled');

}


function wizardIndexWiseChange(index, type){
    if(index == 1){
        removeBlockAndFollow('s_2_name');
        focusOnElement('s_2_name');
    }else if(index == 2){
        removeBlockAndFollow('s_3_khana');
        focusOnElement('s_3_khana');
        

    }else if(index == 3){       
        removeBlockAndFollow('cdeath[name][0]');
        focusOnElement('cdeath[name][0]');
        skip_wizard();
    }

    else if(index == 4){       
        removeBlockAndFollow('s_4_mother_a_or_d');
        focusOnElement('s_4_mother_a_or_d');

        mother_father_answer_prefilled();
    }
    else if(index == 5){
        //console.log('you are here');
        removeBlockAndFollow('s_5_sibiling_alive');
        focusOnElement('s_5_sibiling_alive');       
    }
    else if(index == 6){
        removeBlockAndFollow('s_6_vac_possible');
        focusOnElement('s_6_vac_possible');
    }
    else if(index == 7){
        removeBlockAndFollow('s_7_owner_phone');
        focusOnElement('s_7_owner_phone');
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

    //console.log(upaziladata);

    /*$.getJSON( jar_url, function( data ) {
        //upaziladata = JSON.parse(data);
        $.each( data, function( key, val ) {
            jar_data.push(val);
        });
    });*/
    

    
}

function initCityAndUpazila(val){

    id = $("[name='rammps_id']").val();
    p_data = JSON.parse(getLocalItem(id));

    var s_1_mc = null;
    var s_1_uz = null;    

    if(p_data!= null){        

        if(p_data.hasOwnProperty('s_1_uz')){
            s_1_uz = p_data.s_1_uz;
        }
        if(p_data.hasOwnProperty('s_1_mc')){
            s_1_mc = p_data.s_1_mc;

        }
        

    }

    
    var filted_mc = getFilterData(municipaldata,val );              
    var mc = setDataForGeo(filted_mc);            
    //$("#gi_1_3_cc").select2('destroy').empty().select2({ data: cc });
    
    $("#s_1_mc").empty();
    $("#s_1_mc").append('<option value="">--Municipal--</option>');    
    
    for(var i=0;i<mc.length;i++){
        $("#s_1_mc").append('<option value="'+mc[i].id+'">'+mc[i].text+'</option>');
    }
    $('#s_1_mc').val(s_1_mc).trigger('change');


    var filted_uz = getFilterData(upaziladata,val );        
    var uz = setDataForGeo(filted_uz);


        
    $("#s_1_uz").empty();
    $("#s_1_uz").append('<option value="">--Upazila--</option>');   
    for(var i=0;i<uz.length;i++){
        $("#s_1_uz").append('<option value="'+uz[i].id+'">'+uz[i].text+'</option>');
    }
    $('#s_1_uz').val(s_1_uz).trigger('change');


    
}


function disabledEnabledLogicOther(){


    $("[name='s_1_dd']").change(function () {
        initCityAndUpazila($(this).val());                
    });

    
    $("[name='s_1_v_or_c']").click(function () {
        initCityAndUpazila($("[name='s_1_dd']").val());                
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