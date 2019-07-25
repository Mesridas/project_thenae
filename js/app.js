$(document).ready(function(){
       
    var idStatut = ''; 
        
    $("button").click(function(){

        var idStatut = ($(this).val());

        $('.tile').removeClass("notification");    
        $(this).addClass("notification is-primary");

        $('#orderMessage').empty().hide();
        $('#orderMessage').append('<p>Veuillez selectionner une commande.</p>');
        $('#orderMessage').fadeIn(1000);

        $('#stateorder').empty().hide();      


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
    

    $(document).on('click', '.selectedOrder', function(){ 

        var idOrder = ($(this).attr('id'));   


        $('.selectedOrder').removeClass("notification");    
        $(this).addClass("notification is-primary");

        // requête test pour json        
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


