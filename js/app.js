$(document).ready(function(){
        var idStatut = '';
    // var idOrder = ($('.selectedOrder').attr('id'));  
        
    $("button").click(function(){

        var idStatut = ($(this).val());

        $('.tile').removeClass("notification");    
        $(this).addClass("notification is-primary");

        $('#orderMessage').empty().hide();
        $('#orderMessage').append('<p>Veuillez selectionner une commande.</p>');
        $('#orderMessage').fadeIn(1000);

        $('#stateorder').empty().hide();      
        // $('#stateorder').fadeIn(2000);

        // Affiche les commandes selon leur statut (en cours, achevées, en attente)
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

        })
        
    });
    
    // var idStatut = ($('button').val()); 

    $(document).on('click', '.selectedOrder', function(){ 

        var idOrder = ($(this).attr('id'));   


        $('.selectedOrder').removeClass("notification");    
        $(this).addClass("notification is-primary");

        // changer les buttons pour modifier l'order de status

        // requête initiale 
        // $.ajax({
        //     url : "index.php",
        //     type : 'GET',
        //     data : 'is_ajax=true&ctrl=order&action=getMessageFromOrder&params=' + idOrder,
        //     dataType : 'html',
        //     success : function(data){
        //         $('#orderMessage').empty().hide();
        //         $('#orderMessage').append(data);
        //         $('#orderMessage').fadeIn(2000);
               
        //     }
        //     // error : function(result, state, error){

        //     // }

        // })

        // requête test pour json
        console.log(idOrder);
        
        $.ajax({
            url : "index.php",
            type : 'GET',
            data : 'is_ajax=true&ctrl=order&action=getObjectFromOrder&params=' + idOrder,
            dataType : 'json',
            success : function(data){
                console.log(data);                 

                $('#orderMessage').empty().hide();
                $('#orderMessage').append(data[0].content);
                $('#orderMessage').fadeIn(2000);

                $('#stateorder').empty().hide();
                    console.log(data[0].statut);
                    switch(data[0].statut){
                        case "1" :
                            $('#stateorder').append("<a id=\"anwser\" href=\"mailto:"+data[0].customer_email+"?subject=Réponse%20Thénaë%20Créations&body=Bonjour%20et%20merci%20pour%20votre%20message,%20"+data[0].customer_name+" \" class=\"button is-rounded is-small\">Répondre </a>"
                            + "<a id=\"pending\" href=\"index.php?ctrl=order&action=updateStatut&params=2&id="+data[0].id+" \"class=\"button is-rounded is-small\">Marquer \"En cours\"</a>"
                            + "<a id=\"achieved\" href=\"index.php?ctrl=order&action=updateStatut&params=3&id="+data[0].id+" \"class=\"button is-rounded is-small\">Marquer \"Achevé\"</a>" );
                            break;
                        case "2" :
                            $('#stateorder').append("<a id=\"anwser\" href=\"mailto:"+data[0].customer_email+"?subject=Réponse%20Thénaë%20Créations&body=Bonjour%20et%20merci%20pour%20votre%20message,%20"+data[0].customer_name+" \" class=\"button is-rounded is-small\">Répondre </a>"
                            + "<a href=\"index.php?ctrl=order&action=updateStatut&params=1&id="+data[0].id+" \"class=\"button is-rounded is-small\">Marquer \"En attente\"</a>"
                            + "<a id=\"achieved\" href=\"index.php?ctrl=order&action=updateStatut&params=3&id="+data[0].id+" \"class=\"button is-rounded is-small\">Marquer \"Achevé\"</a>");
                            break;
                        case "3" : 
                            $('#stateorder').append("<a id=\"anwser\" href=\"mailto:"+data[0].customer_email+"?subject=Réponse%20Thénaë%20Créations&body=Bonjour%20et%20merci%20pour%20votre%20message,%20"+data[0].customer_name+" \" class=\"button is-rounded is-small\">Répondre </a>"
                            + "<a id=\"pending\" href=\"index.php?ctrl=order&action=updateStatut&params=2&id="+data[0].id+" \"class=\"button is-rounded is-small\">Marquer \"En cours\"</a>"
                            + "<a id=\"delete\" href=\"index.php?ctrl=order&action=delete&id="+data[0].id+" \"class=\"button is-rounded is-small\">Supprimer</a>");
                            break;
                        default :
                        $('#stateorder').append("<a id=\"anwser\" href=\"mailto:"+data[0].customer_email+"?subject=Réponse%20Thénaë%20Créations&body=Bonjour%20et%20merci%20pour%20votre%20message,%20"+data[0].customer_name+" \" class=\"button is-rounded is-small\">Répondre </a>"
                        + "<a id=\"pending\" href=\"index.php?ctrl=order&action=updateStatut&params=2&id="+idOrder+" \"class=\"button is-rounded is-small\">Marquer \"En cours\"</a>"
                        + "<a id=\"achieved\" href=\"index.php?ctrl=order&action=updateStatut&params=3&id="+idOrder+" \"class=\"button is-rounded is-small\">Marquer \"Achevé\"</a>" );
                    }
                $('#stateorder').fadeIn(2000);      
               
            },
            error: function(xhr, textStatus, errorThrown){
                alert('request failed->'+textStatus);
            }
        })
  

    });





})


