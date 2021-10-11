(function () {

initiateGeoInformation();
initAllDomDisabled();

disabledEnabledLogicOther();
checkChange();

})();


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

    e = $("[name='q_1']");
    //console.log(e.attr('name'));
    e.removeAttr('disabled');
    e.parents('.form-group').removeAttr('style');


    e = $("[name='q_8']");
    //console.log(e.attr('name'));
    e.removeAttr('disabled');
    e.parents('.form-group').removeAttr('style');

    e = $("[name='_token']");
    //console.log(e.attr('name'));
    e.removeAttr('disabled');

    e = $("[name='id']");
    //console.log(e.attr('name'));
    e.removeAttr('disabled');
    


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
    $('#q_5_mc').val(null).trigger('change');
    $("#q_5_mc").empty();
    $("#q_5_mc").append('<option value="">--Municipal--</option>');    
    
    for(var i=0;i<mc.length;i++){
        $("#q_5_mc").append('<option value="'+mc[i].id+'">'+mc[i].text+'</option>');
    }

    filted_uz = getFilterData(upaziladata,val );        
    uz = setDataForGeo(filted_uz);
    //console.log(uz);
    //$("#gi_1_3_uz").select2('destroy').empty().select2({ data: uz });
    $('#q_5_uz').val(null).trigger('change');
    $("#q_5_uz").empty();
    $("#q_5_uz").append('<option value="">--Upazila--</option>');   
    for(var i=0;i<uz.length;i++){
        $("#q_5_uz").append('<option value="'+uz[i].id+'">'+uz[i].text+'</option>');
    }
}

function checkChange(){


	$('#validation  input').on('click', function(){ // on change of state
            
            reverseCheckSequence($(this));
            //data_submit();
            //name = marialstatusWiseSkipLogic($(this));
            
            //if(name == ""){ 
                console.log("name:"+name);           
                checkSkipLogicMVersion($(this));
            //}
    });


    $('#validation .select2').on('select2:open', function (e) {
        
        reverseCheckSequence($(this),1);
        //enabledAndDisabledAgain($(this));
        //data_submit();            
        //name = marialstatusWiseSkipLogic($(this));

        name = checkAgeJarLimit($(this));
            
        if(name == ""){   
            //console.log("name:"+name);          
            checkSkipLogicMVersion($(this),1);
        }
    });

    


    $('#validation  select').on('change', function(){
            //disableMultipleDropdown($(this));            
            reverseCheckSequence($(this),1);
            //enabledAndDisabledAgain($(this));
            //data_submit();            
            //name = marialstatusWiseSkipLogic($(this));
            name = checkAgeJarLimit($(this));
            if(name == ""){   
              //  console.log("name:"+name);          
                checkSkipLogicMVersion($(this),1);
            }

    });

    

    $('#validation  input').on('change', function(){ // on change of state
            
            reverseCheckSequence($(this));
            //data_submit();
            //name = marialstatusWiseSkipLogic($(this));
            //name = checkAgeJarLimit($(this));
            
            //if(name == ""){ 
                console.log("name:"+name);           
                checkSkipLogicMVersion($(this));
            //}
    });

    
    
    
    

}


function checkAgeJarLimit(el){
    var name = "";
    if(el.attr('name') == 'q_3'){
        
        age_checked_val = el.val();

        

        if(age_checked_val == "" || age_checked_val < 18){  
            removeBlockAndFollow('submit');          
            return el.attr('name');
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
                    //focusOnElement(followNodes, type);
                    
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



//dom disable enabled functilities
function removeBlockAndFollow(name,type=null){
    
    var e = $("[name='"+name+"']");
    e.removeAttr('disabled');    
    e.parent().parent().removeAttr('style');
    e.parents('.form-group').removeAttr('style');
    //focusOnElement(name,type);
    
}


function gotoSpecificStepAndFocus(name,step){
    //$('#exampleValidator').wizard('goTo', step);
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
function focusOnElement(name,type=null){
    var focusElement = $("[name='"+name+"']").parents('.form-group');
    if( type < 1){
        ScrollToTop(focusElement, function() { focusElement.focus(); });
    }
}
function ScrollToTop(el, callback) { 
    $('html, body').animate({ scrollTop: $(el).offset().top - 65 }, 'slow', callback);
}




//optional logic
function disabledEnabledLogicOther(){
    
	$("[name='q_5_dd']").change(function () {
		initCityAndUpazila($(this).val());        	

	});

    
    
	$('#q_5_mc').on('select2:open', function (e) {
		$("[name='q_5']").removeAttr('checked');
        $("[name='q_5_e']").attr('disabled','disabled');
	});


	$('#q_5_uz').on('select2:open', function (e) {
		$("[name='q_5']").removeAttr('checked');
        $("[name='q_5_e']").attr('disabled','disabled');
	});
    
	

    if( $("[name='q_5']:checked").val() == 66 ){
        $('#q_5_e').removeAttr("disabled");       
    }

    $("[name='q_5']").change(function () {
        e= $(this);
        if( e.val() == 66  ){                         
            $('#q_5_e').removeAttr("disabled");            
        }
        else{
            disabledSection($('#q_5_e'));          
        }
    
    });


    $("[name='q_6']").change(function () {
        e= $(this);
        if( e.val() == 66  ){                         
            $('#q_6_e').removeAttr("disabled");            
        }
        else{
            disabledSection($('#q_6_e'));          
        }
    
    });


    $("[name='q_7']").change(function () {
        e= $(this);
        if( e.val() == 66  ){                         
            $('#q_7_e').removeAttr("disabled");            
        }
        else{
            disabledSection($('#q_7_e'));          
        }
    
    });

    $("[name='q_7_1']").change(function () {
        e= $(this);
        if( e.val() == 66  ){                         
            $('#q_7_1_e').removeAttr("disabled");            
        }
        else{
            disabledSection($('#q_7_1_e'));          
        }
    
    });


    $("[name='q_9']").change(function () {
        e= $(this);
        if( e.val() == 66  ){                         
            $('#q_9_e').removeAttr("disabled");            
        }
        else{
            disabledSection($('#q_9_e'));          
        }
    
    });

    $("[name='q_9_1']").change(function () {
        e= $(this);
        if( e.val() == 66  ){                         
            $('#q_9_1_e').removeAttr("disabled");            
        }
        else{
            disabledSection($('#q_9_1_e'));          
        }
    
    });




}