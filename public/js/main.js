$(document).ready(function(){
  //Affichage du menu Mobile
  $("#navMobile").click(function(){
        menuMobile();
    });
});

function menuMobile() {
    $("#navMobile").toggleClass("menuHidden");
    $("#navIcon").toggleClass("fa-times-circle transformIconClose");
}

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    $(document).ready(function() {
    	// get current URL path and assign 'active' class
    	var pathname = window.location.href;
    	$('a[href="'+pathname+'"]').addClass('active');
    });


    //affichage de la Modal
    if($('#myModal')){$('#myModal').modal('show');}

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
