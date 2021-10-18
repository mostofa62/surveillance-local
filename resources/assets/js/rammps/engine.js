function checkSkipLogicForTabuler(el, type){

    /* logic for internal issue */
    //console.log(el);
     root = el.attr('name');
     index = root.match(/\d/);
     nameblock = root.match(/(\w)+(\[)(\w)+\]/);

    if(index == null || nameblock == null) return;
     //console.log(parseInt(index[0]));
     

    value = null;
    if(type > 0){
        value = el.val();
    }else{
        value = el.filter(':checked').val();
    }

    //we will do some major boxign here 

    skipVal = DecesionBasedForward[nameblock[0]];
    if(skipVal !== undefined){
        indexI  = value.toString();
        //console.log("n "+  skipVal['1']);
        if(skipVal[indexI] !== undefined){

            previousCheckerArr = skipVal[indexI][0];
            openOnPreAndCurrent = skipVal[indexI][1];

            //console.log("n "+  previousCheckerArr);

            openOn = false;

            $.each( previousCheckerArr, function( key, val ) {
                //console.log('key'+key+'val'+val);
                //console.log("[name='"+key+'['+index[0]+']'+"']");
                elm = $("[name='"+key+'['+index[0]+']'+"']");
                v = elm.val();
                if(elm.attr('type') == "radio" || elm.attr('type') == "checkbox"){
                    v = elm.filter(':checked').val();
                }
                //v = parseInt(v);
                ///val = parseInt(val);
                //console.log('checked'+v);
                //console.log($("[name='"+key+'['+index[0]+']'+"']").val());
                openOn = v == val ? true:false;
                //console.log(openOn);
            });

            if(openOn){
                //console.log(openOn);
                $.each( openOnPreAndCurrent, function( key, val ) {
                    //console.log('key'+key+'val'+val);
                    removeBlockAndFollow(val+'['+index[0]+']');
                })
            }
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
    

    keyVal = TabluerSequenceArray[nameblock[0]];
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
                console.log(keyVal[i]);
                removeBlockAndFollow(keyVal[i]+'['+index[0]+']');
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
                        removeBlockAndFollow(valueNode[i]+'['+index[0]+']');
                    }

                }
            }
           
        }


    }else{
        
        followNodes=keyVal[0];
        console.log("First Single Checks"+followNodes);
        removeBlockAndFollow(followNodes+'['+index[0]+']');
        
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
        
        followNodes=keyVal[0];
        console.log("First Single Checks"+followNodes);
        removeBlockAndFollow(followNodes);
        
    }

}


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