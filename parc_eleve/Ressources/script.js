//checks date validity(end minus begining)
function checkDate(){
    $('input[type=date]').change(function(){
        console.log('check date');            
        if (this.name.includes('date_debut') && $(this).next('input[type=date]').val()!==""){
            console.log($(this).next('input[type=date]').val());               
            debut = new Date(this.value);
            fin = new Date($(this).next('input[type=date]').val());                 
            if (fin<=debut){
                alert('Veuillez rentrer une date valide');                
            }  
        }
        else if (this.name.includes('date_fin') && $(this).prev('input[type=date]').val()!==""){
            console.log($(this).prev('input[type=date]').val());   
            fin = new Date(this.value);
            debut = new Date($(this).prev('input[type=date]').val());                
            if (fin<=debut){
                alert('Veuillez rentrer une date valide');                
            }  
        }         
    });
}

//enables date input fields when checked
function activateDateField(){
    $('[type="checkbox"]').click(function(){
        if (this.checked===true){
            $(this).nextAll('[type="date"]').slice(0,2).prop( "disabled",false);
        }
        else
            $(this).nextAll('[type="date"]').slice(0,2).prop("disabled",true);
    });
}

    // displays formateurs according to formation chosen
function displayFormateur(){    
    $('.type').change(activeField);
//            function(){              
//        switch ($(this).val()){
//            case '5be300465efb3':                    
//                $('.web').show();
//                $('.dev').hide();
//                break;
//            case '5be300465f14f':                    
//                $('.web').hide();
//                $('.dev').show(); 
//                break;
//            case '':
//                $('.web').hide();   
//                $('.dev').hide();
//                break;
//        }
//    });  
}

// shows formateur field according to type_formation
function activeField(){    
    type = document.querySelectorAll('.type');
    type.forEach(function(currentValue){            
        name = $(currentValue).attr('name');
        switch ($(currentValue).val()){
            case '5be300465efb3':                    
                $('[name="'+name+'"].web').show();
                $('[name="'+name+'"].dev').hide();
                break;
            case '5be300465f14f':                    
                $('[name="'+name+'"].web').hide();
                $('[name="'+name+'"].dev').show();
                break;                
        }
    });
}
//validation tests before submit
function validate(element){    
    let input = element.querySelectorAll('input[type=text], select');
    for (let elem of input){        
        if (elem.value===''){
            alert('Veuillez remplir tous les champs');
            elem.focus();
            return false;
        }        
    }     
    let checkbox = element.querySelectorAll('fieldset input[type=checkbox]:checked');    
    if (checkbox.length===0){
        alert('Veuillez choisir un formateur');
        return false;
    } 
    else {
        for (elem of checkbox){        
            if (elem.checked===true){            
                for (var subelem of $(elem).nextAll('input[type=date]').slice(0,2)){
                    if (subelem.value===''){
                        alert('Veuillez rentrer une date');
                        return false;
                    }
                }
            }
        }
    }
    return true;
}

function check(){
    let checkbox = document.querySelectorAll('input[type=checkbox][name*=true]:checked');
    for (element of checkbox){
        tr = element.closest('tr');
        return validate(tr);        
    }
}
