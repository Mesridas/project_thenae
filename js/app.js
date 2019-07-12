






// httpRequest.open('GET', 'index.php?ctrl=admin&action=manageForm&id=', true);   

// httpRequest.send();
 
$(document).ready(function(){

    $("button").click(function(){
        var idStatut = ($(this).val());
        console.log(idStatut);

    // var httpRequest = new XMLHttpRequest();

    // httpRequest.onreadystatechange = function () {
    //     if(httpRequest.readyState === 4 ){
    //     // document.getElementById() = httpRequest.responseText;
        
    //         httpRequest.open('GET', 'index.php?ctrl=admin&action=manageForm&id='+idStatut, true); 
    //         httpRequest.send();
    //     }
    // }
        $.ajax({
            url : "index.php",
            type : 'GET',
            data : 'is_ajax=true&ctrl=order&action=getLastOrdersBy&params=' + idStatut,
            dataType : 'html',
            success : function(data){console.log(data);
                $('#lastorders').empty().hide();
                $('#lastorders').append(data);
                $('#lastorders').fadeIn(2000);
               
            }
            // error : function(result, state, error){

            // }

        })
        
    })

})