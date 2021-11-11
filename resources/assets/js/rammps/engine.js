function checkSkipLogicForTabuler(el, type){

    /* logic for internal issue */
    //console.log(el);
     root = el.attr('name');
     index = root.match(/(\d+)(?!.*\d)/);
     nameblock = root.match(/(\w)+(\[)(\w)+\]/);

    //console.log("index root"+nameblock[0]);

    if(index == null || nameblock == null) return;
    

     

    
    value = el.filter(':checked').val();
    if(value == undefined || value == null){            
        value = el.val();
    }

    console.log("index root"+value);

    //we will do some major boxign here 

    skipVal = DecesionBasedForward[nameblock[0]];
    if(skipVal !== undefined){
        //console.log('skip val:'+skipVal);
        //console.log('value:'+value);
        indexI  = value.toString();
        //console.log("n "+  skipVal['1']);
        console.log("n "+  JSON.stringify(skipVal['1001']));       

        if(skipVal[indexI] !== undefined 
            || 
            skipVal['1001'] !== undefined){
            //for any other options
            if(skipVal['1001'] !== undefined){
                indexI = '1001';
            }

            previousCheckerArr = skipVal[indexI][0];
            //openOnPreAndCurrent = skipVal[indexI][1];

            //console.log("n "+  JSON.stringify(previousCheckerArr));



            $.each( previousCheckerArr, function( key, val ) {

                elm = $("[name='"+key+'['+index[0]+']'+"']");                
                
                v = elm.filter(':checked').val();
                if(v == undefined || v == null){            
                    v = elm.val();
                }                

                openOnPreAndCurrent = val.hasOwnProperty(v)?val[v]:val[1001];

                

                if(openOnPreAndCurrent != null){
                    $.each( openOnPreAndCurrent, function( key, val ) {
                    //console.log('key'+key+'val'+val);
                        removeBlockAndFollow(val+'['+index[0]+']',1);
                    });
                }

            });


            /*openOn = false;
            

            $.each( previousCheckerArr, function( key, val ) {
                //console.log('key'+key+'val'+val);
                //console.log("[name='"+key+'['+index[0]+']'+"']");
                elm = $("[name='"+key+'['+index[0]+']'+"']");
                v = elm.val();
                if(elm.attr('type') == "radio" || elm.attr('type') == "checkbox"){
                    v = elm.filter(':checked').val();
                }

                if(Object.keys(val).length > 1 && $.inArray(v,val)){
                    openOn = true;
                }
                //v = parseInt(v);
                ///val = parseInt(val);
                //console.log('checked'+v);
                //console.log($("[name='"+key+'['+index[0]+']'+"']").val());
                else{
                    openOn = v == val ? true:false;
                }
                //console.log(openOn);
            });

            if(openOn){
                //console.log(openOn);
                $.each( openOnPreAndCurrent, function( key, val ) {
                    //console.log('key'+key+'val'+val);
                    removeBlockAndFollow(val+'['+index[0]+']');
                })
            }*/
        }
        
        return;
    }
    /*skipValLen = Object.keys(skipVal).length;
    if(skipValLen > 1){
        skipValueNode = skipVal[el.val()];

        console.log("Node Values:"+skipValueNode);

    }*/

    //end we will do some major boxing here
    /* end logic for internal issues */

    cblogic =  CombineForwardLogic[nameblock[0]];
    if( cblogic !== undefined ) {
        console.log('Combination logic tabuler'+JSON.stringify(cblogic));
        if(Object.keys(cblogic).length > 1){
                console.log(value);
                //console.log(JSON.stringify( cblogic[0]));
                //console.log($.inArray(parseInt(value), cblogic[0]));
                value = parseInt(value);


            open_issue_length = 0;
            depend_logic_length = Object.keys(cblogic[1]).length;
            if( $.inArray(value, cblogic[0]) > -1 ){

                depend_logic = cblogic[1];
                open_issue = cblogic[2];
                //console.log("flogic"+JSON.stringify(depend_logic));
                //console.log("blogic"+JSON.stringify(open_issue));

                $.each( depend_logic, function( key, val ) {

                    //console.log(key);
                    n = "[name='"+key+'['+index[0]+']'+"']";
                    e = $(n);
                    v = e.filter(':checked').val();                
                    if(v == undefined || v == null){
                        v = e.val();
                    }
                    v = parseInt(v);
                    console.log("name:"+n+"|value:"+JSON.stringify(val));

                    if( $.inArray(v, val) > -1 ){
                        console.log("|value:"+JSON.stringify(val));                    
                        open_issue_length++;
                    }
                });

                console.log('open_issue_length:'
                    +open_issue_length
                    +'depend_logic_length'+depend_logic_length);

                if(open_issue_length > 0 && open_issue_length == depend_logic_length){
                    $.each( open_issue, function( key,val ) {
                        console.log('open_issue:'+val+'['+index[0]+']');
                        removeBlockAndFollow(val+'['+index[0]+']');
                    });
                }


            }
        }

    }

        //end combine logic  
    

    keyVal = TabluerSequenceArray[nameblock[0]];
    if(keyVal == undefined ) return;
    console.log('tabluer keyVal'+keyVal);
    len = Object.keys(keyVal).length;
    console.log("Length:"+len+"Value:"+JSON.stringify(keyVal));

    console.log("index here"+index);

    followNodes = null;
    if( len > 1 ){

        /*value = null;
        if(type > 0){
            value = el.val();
        }else{
            value = el.filter(':checked').val();
        }*/

        value = el.filter(':checked').val();            
        if(value == undefined || value == null){
            value = el.val();
        }

        console.log("selected values:"+value);
        valueNode = keyVal[value];
        console.log("Checking for specific[node]"+valueNode+"[mainkeyval]"+keyVal);

        if(valueNode === undefined){

            if(keyVal[1001]!=null){
                
                if( Array.isArray(keyVal[1001]) ){
                    
                    for(i=0;i< keyVal[1001].length;i++){                
                        removeBlockAndFollow(keyVal[1001][i]+'['+index[0]+']',1);
                    }
                }else{
                    
                    removeBlockAndFollow(keyVal[1001]+'['+index[0]+']',1);
                }

            }

            
            for(i=0;i< keyVal.length;i++){
                console.log(keyVal[i]);
                removeBlockAndFollow(keyVal[i]+'['+index[0]+']',1);
            }

        }else{  
            if( !Array.isArray(valueNode) && !Array.isArray(keyVal) ){
                console.log("single not Array:"+valueNode+'['+index[0]+']');                
                removeBlockAndFollow(valueNode+'['+index[0]+']',1);
                

            }else if(!Array.isArray(valueNode) && Array.isArray(keyVal)){
                //console.log("node:"+valueNode+"|array:"+keyVal);
                
                for(i=0;i< keyVal.length;i++){
                    
                    removeBlockAndFollow(keyVal[i]+'['+index[0]+']',1);
                }
            }
            else{
                console.log("array node or json:"+valueNode);
                followNodes=valueNode[0];
                step = parseInt(valueNode[1]);
                console.log("Nodes "+followNodes+"step:"+step);
                if(!isNaN(step)){
                    removeBlockAndFollowChangeStep(followNodes+'['+index[0]+']', step);
                    focusOnElement(followNodes+'['+index[0]+']');
                    
                }else{
                    console.log("many array:"+valueNode);
                    
                    for(i=0;i< valueNode.length;i++){
                        //console.log(keyVal[i]);
                        removeBlockAndFollow(valueNode[i]+'['+index[0]+']',1);
                    }

                }
            }
           
        }


    }else{
        
        followNodes=keyVal[0];
        console.log("First Single Checks"+followNodes);
        removeBlockAndFollow(followNodes+'['+index[0]+']',1);
        
    }


    //combine forward logic modified here
    //console.log('name block in here'+nameblock[0]);

      


}

//reverse for tabuler

function reverseCheckSequenceTabuler(el,type=0){

    root = el.attr('name');
    index = root.match(/(\d+)(?!.*\d)/);
    nameblock = root.match(/(\w)+(\[)(\w)+\]/);

    if(index == null || nameblock == null) return;

    console.log("index root"+parseInt(index[0]));
     

    /*value = null;
    if(type > 0){
        value = el.val();
    }else{
        value = el.filter(':checked').val();
    }*/

    value = el.filter(':checked').val();    
    if(value == undefined || value == null){
        value = el.val();
    }


    console.log("--Reverse Checek--");
    keyVal = RevTabluerSequenceArray[nameblock[0]];
    if( keyVal === undefined ) return;

    len = Object.keys(keyVal).length;
    console.log("Length:"+len+"Value:"+JSON.stringify(keyVal));

    if( len >= 1 ){
        
        valueNode = keyVal[value];
        console.log('reverse node:'+valueNode);
        if( valueNode === undefined ){

            if(keyVal[1001]!=null){
                for(i=0;i< keyVal[1001].length;i++){                
                    e = $("[name^='"+keyVal[1001][i]+"']");
                    console.log(keyVal[1001][i]);
                    disableReverseSection(e,type,1);
                }
            }

            return;
        }else{            

                for(i=0;i< valueNode.length;i++){                
                    e = $("[name^='"+valueNode[i]+'['+index[0]+']'+"']");
                    console.log(valueNode[i]);
                    disableReverseSection(e,type,1);
                }

            
        }
    }

    

}


function checkSkipLogicMVersion(el,type){

    keyVal = SequenceArray[el.attr('name')];
    if( keyVal === undefined ) return;

    len = Object.keys(keyVal).length;
    //console.log("Length:"+len+"Value:"+keyVal);

    value = el.filter(':checked').val();    
    if(value == undefined || value == null){
        value = el.val();
    }

    followNodes = null;
    if( len > 1 ){
        

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
        
        followNodes=keyVal[0];
        console.log("First Single Checks"+followNodes);
        removeBlockAndFollow(followNodes);
        
    }



    //combine forward logic modified here

    cblogic =  CombineForwardLogic[el.attr('name')];
    if( cblogic === undefined ) return;
    console.log(el.attr('name'));
    if(Object.keys(cblogic).length > 1){
            console.log(value);
            //console.log(JSON.stringify( cblogic[0]));
            //console.log($.inArray(parseInt(value), cblogic[0]));
            value = parseInt(value);


        open_issue_length = 0;
        depend_logic_length = Object.keys(cblogic[1]).length;
        if( $.inArray(value, cblogic[0]) > -1 ){

            depend_logic = cblogic[1];
            open_issue = cblogic[2];
            //console.log("flogic"+JSON.stringify(depend_logic));
            //console.log("blogic"+JSON.stringify(open_issue));

            $.each( depend_logic, function( key, val ) {

                //console.log(key);
                n = "[name='"+key+"']";
                e = $(n);
                v = e.filter(':checked').val();                
                if(v == undefined || v == null){
                    v = e.val();
                }
                v = parseInt(v);
                //console.log("name:"+n+"|value:"+JSON.stringify(val));

                if( $.inArray(v, val) > -1 ){
                    console.log("|value:"+JSON.stringify(val));                    
                    open_issue_length++;
                }
            });

            console.log('open_issue_length:'
                +open_issue_length
                +'depend_logic_length'+depend_logic_length);

            if(open_issue_length > 0 && open_issue_length == depend_logic_length){
                $.each( open_issue, function( key,val ) {
                    console.log('open_issue:'+val);
                    removeBlockAndFollow(val);
                });
            }


        }
    }

        //end combine logic

}

//animation segment
function focusOnElement(name){
    var focusElement = $("[name='"+name+"']").parents('.form-group');
    ScrollToTop(focusElement, function() { focusElement.focus(); });
}
function ScrollToTop(el, callback) { 
    $('html, body').animate({ scrollTop: $(el).offset().top - 65 }, 'slow', callback);
}


function removeBlockAndFollow(name,t){


    
    var e = $("[name='"+name+"']");
    e.removeAttr('disabled');    
    if(t>0){
        e.parent().removeAttr('style');
    }else{
        e.parent().parent().removeAttr('style');
    }
    
    e.parents('.form-group').removeAttr('style');
    
}

function removeBlockAndFollowChangeStep(name, step){
    $('#exampleValidator').wizard('goTo', step);    
    var e = $("[name='"+name+"']");
    e.removeAttr('disabled');
    e.parent().parent().removeAttr('style');
    e.parents('.form-group').removeAttr('style');
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




//animation segment
function focusOnElement(name){
    var focusElement = $("[name='"+name+"']").parents('.form-group');
    ScrollToTop(focusElement, function() { focusElement.focus(); });
}
function ScrollToTop(el, callback) { 
    $('html, body').animate({ scrollTop: $(el).offset().top - 65 }, 'slow', callback);
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


///reverse engine
function reverseCheckSequence(el,type=0){
    console.log("--Reverse Checek--");
    keyVal = RevSequenceArray[el.attr('name')];
    if( keyVal === undefined ) return;

    len = Object.keys(keyVal).length;
    console.log("Length:"+len+"Value:"+keyVal);

    if( len >= 1 ){
        
        value = e.filter(':checked').val();
        if(value == undefined || value == null){
            value = e.val();
        }
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


function disableReverseSection(e,type, t){
    
    if(e.attr("type") == "radio"){
        e.prop("checked", false);
    }else{
        //e.val(null).trigger('change');
        e.find('option').removeAttr("selected");
    }
    e.attr('disabled', 'disabled');
    if(t > 0){
        e.parent().attr('style', 'color:#a6a6a6');
    }else{
        e.parent().parent().attr('style', 'color:#a6a6a6');
    }
}


function otherOptionOpen(e,t){
    name = e.attr('name');
    //val = e.val();
    //if(e.attr("type") == "radio"){
    //    val = e.filter(':checked').val();
    //}
    val = e.filter(':checked').val();
    if(val == undefined || val == null){
        val = e.val();
    }

    console.log('value on other: '+val);

    if(val == 66){
        removeBlockAndFollow(name+'_e');
    }else{
        //disableReverseSection($('#'+name+'_e'));
        e = $("[name='"+name+"_e']");
        e.attr('disabled', 'disabled');
    }
}

function otherOptionOpenTab(e){
    root = e.attr('name');
    index = root.match(/(\d+)(?!.*\d)/);
    nameblock = root.match(/(\w)+(\[)(\w)+\]/);

    if(index == null || nameblock == null) return;



    /*val = e.val();
    if(e.attr("type") == "radio"){
        val = e.filter(':checked').val();
    }*/

    val = e.filter(':checked').val();
    if(val == undefined || val == null){
        val = e.val();
    }
    //console.log(nameblock[0]);
    name = nameblock[0].replace(/]$/,"_e]");
    console.log(name);
    if(val == 66){
        removeBlockAndFollow(name+'['+index[0]+']',1);
    }else{
        e = $("[name='"+name+'['+index[0]+']'+"']");
        e.attr('disabled', 'disabled');
        //e.parent().attr('style', 'color:#a6a6a6');
        //console.log("test="+name+'['+index[0]+']');
        //disableReverseSection(e,1);
    }
}