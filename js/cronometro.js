var estadoBoton = 0;
var intervalo; // definir intervalo como una variable global

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

    if ($(btn).text("Laborando")) {
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
        var cronometro = (document.getElementById(
          "iniciarCronometro_" + idUsuario
        ).textContent = tiempo);

        if (cronometro) {
          cronometro.textContent = tiempo;
          if (tiempoTranscurrido >= 600000) {
            cronometro.style.color = "red";
          }
        }
      }, 1000);
    }else {
      btn.textContent = "Laborando";
      document.getElementById("botonOn").style.backgroundColor = "#138D75";
    }
  } 
}

