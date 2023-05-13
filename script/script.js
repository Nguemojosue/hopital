

$(document).ready(function(){

  $('.ombre-load').hide();
  $('.ombre').hide();

  var id_photo = 0;

  // ################### FUNCTIONS  ############################


    // ------ ADD NEW ACTUALITE -----------

      function addService(datas){
        $('.ombre-load').show();
        $.ajax({
          url:'requettes/addService.php',
          method:'post',
          data:datas,
          contentType: false, // IMPORTANT POUT L'UPLOAD
          processData: false, // IMPORTANT POUT L'UPLOAD
          success:function(data){
            if(data == 0){
                $('#titre').val('');
                $('#localisation').val('');
                $('#categorie').val('');
                $('#duree').val('');
                $('#detail').val('');
                $('#prix').val('');
            }else if(data == 1){
              alert("Echec d'importation !");
            }else{
              alert("Extension de la photo non valide !");
            }
            $('.ombre-load').hide();
          }
        });
      }



     // ------ ADD NEW PRODUIT -----------

      function addDemande(datas){
        // $('.ombre-load').show();
        $.ajax({
          url:'request/addDemande.php',
          method:'post',
          data:datas,
          contentType: false, // IMPORTANT POUT L'UPLOAD
          processData: false, // IMPORTANT POUT L'UPLOAD
          success:function(data){
            if(data == 0){
                 // $('#close-btn').click();
                 // getProduit();
              alert("Demande envoyé !");
            }else if(data == 1){
              alert("Echec d'importation !");
            }else{
              alert("Extension du fichier non valide !");
            }
            // $('.ombre-load').hide();
          }
        });
      }

    // --------- GET PRODUIT -------------

      function getProduit(){
        $('.loader').show();
         $.ajax({
          url:'librairies/request/getProduit.php',
          method:'post',
          success:function(data){
            $('.datas-produit').html(data);
            // getActualiteLimit();
            $('.loader').hide();
          }
        });
      }


  // ################# END FUNCTIONS ###########################

  $('.ombre').click(function(){
    $('.connexion-bloc').removeClass('see');
    $('#login-btn').removeClass('active');
    $('.box-new-actualite').removeClass('see');
    $('.ombre').removeClass('color');
    $(this).hide();
    id_photo = 0;
    $('#imgM').hide();
    $('#imgM').attr('src','');
    $('#camM').show();
    $('#titre').val('');
    $('#prix').val('');
    $('#description').val('');
    $('#publie').removeClass('active');
    $('.confirmBox').removeClass('see');
    $('.boxInscription').removeClass('see');
  });


  // INSCRIPTION SCRIPT


  $('#send').click(function(e){
    e.preventDefault();
    let nom = $('#nom').val();
    let email = $('#email').val();
    let description = $('#description').val();
    let cv = document.getElementById('inputGroupFile03').files[0];
    let phone = $('#phone').val();
    let titref = $('#titreF').val();

    if(nom != '' && email != '' && phone != '' && description != '' && phone.match(/^[6]\d{8}$/) && email.match(/[^\s@]+@[^\s@]+\.[^\s@]+/gi) ){
     
     var datas = new FormData();
     datas.append('doc', cv);
     datas.append('nom', nom);
     datas.append('email', email);
     datas.append('phone', phone);
     datas.append('titref', titref);
     datas.append('description', description);
     addDemande(datas);

    }else if(nom == ''){
      alert("Entrez votre nom");
    }else if(email == ''){
      alert("Entrez votre email");
    }else if(email.match(/[^\s@]+@[^\s@]+\.[^\s@]+/gi) == null){
      alert("Addresse email invalide !");
    }else if(phone == ''){
      alert("Entrez votre numero");
    }else if(phone.match(/^[6]\d{8}$/) == null){
      alert("Le numero de contenir 9 chiffres en débutent par 6 !");
    }else if(description == ''){
      alert("Entrez le message");
    }
  });

$('#send2').click(function(){
  $('#send').click();
});

$('#inputGroupFile03').change(function(e){
    e.preventDefault();

    if(URL.createObjectURL(e.target.files[0])){
       var image = URL.createObjectURL(e.target.files[0]);

       id_photo = 1;
       let nomphoto =  document.getElementById('inputGroupFile03').files[0].name;
        $('.labelvalue').html(nomphoto);
     }
});



  $('#publier').click(function(){
      let titre = $('#titre').val();
      let typeservice = $('#statut').val();
      let type = '';
      let localisation = '';
      if(typeservice == 'stage'){
         type = $('#typestage').val();
         localisation = $('#localisation').val();
      }else if(typeservice == 'jobs'){
         type = $('#typeemploi').val();
         localisation = $('#localisation').val();
      }else{
         type = 'null';
         localisation = 'null';
      }
      
     
      let categorie = $('#categorie').val();
      let duree = $('#duree').val();
      
      let description = $('#detail').val();
      let prix = $('#prix').val();
      let etoiles = $('#etoile').val();
      
      let photo =  document.getElementById('photo').files[0];


     
        if(titre != '' && type != '' && localisation != '' && categorie != '' && duree != ''  && id_photo == 1 && description != ''){

           var datas = new FormData();
           datas.append('photo', photo);
           datas.append('titre', titre);
           datas.append('type', type);
           datas.append('localisation', localisation);
           datas.append('categorie', categorie);
           datas.append('duree', duree);
           datas.append('typeservice', typeservice);
           datas.append('prix', prix);
           datas.append('etoiles', etoiles);
           datas.append('description', description);
           addService(datas);

        }
      
    
  });


});