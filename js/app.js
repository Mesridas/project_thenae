$(document).ready(function(){

    $("button").click(function(){
        var idStatut = ($(this).val());
        // console.log(idStatut);

        $('.tile').removeClass("notification");    
        $(this).addClass("notification is-primary");

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
        
    });
    


    $(document).on('click', '.selectedOrder', function(){ 

        var idOrder = ($(this).attr('id'));     
        console.log(this);
        console.log(idOrder);

        $('.selectedOrder').removeClass("notification");    
        $(this).addClass("notification is-primary");

        // ajouter un notification is-primary dans la class en même temps que je clic dessus
    
        $.ajax({
            url : "index.php",
            type : 'GET',
            data : 'is_ajax=true&ctrl=order&action=getMessageFromOrder&params=' + idOrder,
            dataType : 'html',
            success : function(data){console.log(data);
                $('#orderMessage').empty().hide();
                $('#orderMessage').append(data);
                $('#orderMessage').fadeIn(2000);
               
            }
            // error : function(result, state, error){

            // }

        })
        
    });

})


