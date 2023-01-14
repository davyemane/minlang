$(document).ready(function(){
    $('#action_menu_btn').click(function(){
        $('.action_menu').toggle();
    });
        });
        $(document).ready(function(){
            $("#send").on("click",function(){
                $.ajax({
                   url:"insertMessage.php",
                   method:"POST",
                   data:{
                       expediteur: $("#exp").val(),
                       destinataire: $("#dest").val(),
                       message: $("#message").val(),
                   },
                   datatype:"text",
                   success:function(data)
                   {
                       $("#message").val("");
                       win.classList.add('show');
                   },
                   error:function(data){
                       echec.classList.add('show');
   
                   }
                });
                setTimeout(() =>{
                       win.classList.remove('show');
                       echec.classList.remove('show');
                   }, 2000 );
   
            });
            //partie qui envoi en temps réel
            setInterval(function(){
               $.ajax({
                   url:"realTimeChat.php",
                   method:"POST",
                   data:{
                       expediteur: $("#exp").val(),
                       destinataire: $("#dest").val(),
                   },
                   dataType:"text",
                   success:function(data)
                   {
                       $("#msgBody").html(data);
                   },
                   error:function(data){
                    echec.classList.add('show');
                }
               });
            },);800
        });
   