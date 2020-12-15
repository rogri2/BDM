function cambioUsuario() {
  jQuery(document).on("click", ".formCambio", function (event) {
    event.preventDefault();

    jQuery.ajax({
      url: "Php/cambioUsuario.php",
      type: "POST",
      dataType: "json",
      data: $(this).serialize(),
      beforeSend: function () {
        $(".usuario").slideDown("slow");
        setTimeout(function () {
          $(".usuario").slideUp("slow");
          location = 'cambiarUsuario.php';
        }, 3000);
      },
    });
  });
  this.onclick = function() {return true;};

};
