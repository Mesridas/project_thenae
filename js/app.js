$(document).ready(function(){

    var idOrder = ($('.selectedOrder').attr('id'));  
        
    $("button").click(function(){
        var idStatut = ($(this).val());
     

        // console.log(idStatut);
        console.log(idOrder);

        $('.tile').removeClass("notification");    
        $(this).addClass("notification is-primary");

        $('#stateorder').empty().hide();
        // console.log(idStatut);
        switch(idStatut){
            case '1' :
                $('#stateorder').append("<a class=\"button is-rounded is-small\">Répondre </a>"
                + "<a href=\"index.php?ctrl=order&action=updateStatut&params=2&id="+idOrder+" \"class=\"button is-rounded is-small\">Marquer \"En cours\"</a>"
                + "<a href=\"index.php?ctrl=order&action=updateStatut&params=3&id="+idOrder+" \"class=\"button is-rounded is-small\">Marquer \"Achevé\"</a>" );
                break;
            case '2' :
                $('#stateorder').append("<a class=\"button is-rounded is-small\">Répondre </a>"
                + "<a href=\"index.php?ctrl=order&action=updateStatut&params=1&id="+idOrder+" \"class=\"button is-rounded is-small\">Marquer \"En attente\"</a>"
                + "<a href=\"index.php?ctrl=order&action=updateStatut&params=3&id="+idOrder+" \"class=\"button is-rounded is-small\">Marquer \"Achevé\"</a>");
                break;
            case '3' : 
                $('#stateorder').append("<a class=\"button is-rounded is-small\">Répondre </a>"
                + "<a href=\"index.php?ctrl=order&action=updateStatut&params=2&id="+idOrder+" \"class=\"button is-rounded is-small\">Marquer \"En cours\"</a>"
                + "<a href=\"index.php?ctrl=order&action=delete&params=2&id="+idOrder+" \"class=\"button is-rounded is-small\">Supprimer</a>");
                break;
            default :
            $('#stateorder').append("<a class=\"button is-rounded is-small\">Répondre </a>"
            + "<a href=\"index.php?ctrl=order&action=updateStatut&params=2&id="+idOrder+" \"class=\"button is-rounded is-small\">Marquer \"En cours\"</a>"
            + "<a href=\"index.php?ctrl=order&action=updateStatut&params=3&id="+idOrder+" \"class=\"button is-rounded is-small\">Marquer \"Achevé\"</a>" );
        }


       
        // $('#stateorder').append('test');        
        $('#stateorder').fadeIn(2000);

        $.ajax({
            url : "index.php",
            type : 'GET',
            data : 'is_ajax=true&ctrl=order&action=getLastOrdersBy&params=' + idStatut,
            dataType : 'html',
            success : function(data){
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

        // console.log(this);
        // console.log(idOrder);

        $('.selectedOrder').removeClass("notification");    
        $(this).addClass("notification is-primary");

        // changer les buttons pour modifier l'order de status

    
        $.ajax({
            url : "index.php",
            type : 'GET',
            data : 'is_ajax=true&ctrl=order&action=getMessageFromOrder&params=' + idOrder,
            dataType : 'html',
            success : function(data){
                $('#orderMessage').empty().hide();
                $('#orderMessage').append(data);
                $('#orderMessage').fadeIn(2000);
               
            }
            // error : function(result, state, error){

            // }

        })
        
    });

})


