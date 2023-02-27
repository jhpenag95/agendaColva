var estadoBoton = 0;

function FbotonOn(btn) {
  var idUsuario = $(btn).data("id");
  var startTime;

  if ($(btn).text() == "Disponible") {
    // Cambiar texto y color del botón
    $(btn).text("Laborando");
    $(btn).css("background-color", "#138D75");
    console.log(idUsuario);

    // Establecer startTime en el momento actual
    startTime = Date.now();

    // Hacer solicitud AJAX a PHP para registrar la actividad
    // $.post('registro_actividad.php', { id_usuario: idUsuario, estado: 'laborando' });

    if ($(btn).text("Laborando")) {
      var intervalo;
      btn.textContent = "Laborando";
      intervalo = setInterval(function () {
        var currentTime = Date.now();
        var tiempoTranscurrido = currentTime - startTime;
        var horas = Math.floor(tiempoTranscurrido / 3600000);
        var minutos = Math.floor(
          (tiempoTranscurrido - horas * 3600000) / 60000
        );
        var segundos = Math.floor(
          (tiempoTranscurrido - horas * 3600000 - minutos * 60000) / 1000
        );
        var tiempo = `${horas.toString().padStart(2, "0")}:${minutos
          .toString()
          .padStart(2, "0")}:${segundos.toString().padStart(2, "0")}`;
        document.getElementById("iniciarCronometro_" + idUsuario).textContent =
          tiempo;

        if (tiempoTranscurrido >= 600000) {
          document.getElementById("iniciarCronometro_"+ idUsuario).style.color = "red";
        }
      }, 1000);
    }
  } else {
    // Cambiar texto y color del botón
    $(btn).text("Disponible");
    $(btn).css("background-color", "");

    if ($(btn).text("Disponible")) {
      document.getElementById("reinicarCronometro")
        .addEventListener("click", function () {
          clearInterval(intervalo);
          var cronometro = document.querySelector("#iniciarCronometro_" + idUsuario);
          if (cronometro) {
            cronometro.textContent = "00:00:00";
            cronometro.style.color = "black";
          }
        });
    }

    // Hacer solicitud AJAX a PHP para registrar la actividad
    // $.post('registro_actividad.php', { id_usuario: idUsuario, estado: 'disponible' });
  }
}

document
  .getElementById("reinicarCronometro")
  .addEventListener("click", function () {
    clearInterval(intervalo);
    var cronometro = document.querySelector("#iniciarCronometro_" + indent);
    if (cronometro) {
      cronometro.textContent = "00:00:00";
      cronometro.style.color = "black";
    }
  });
