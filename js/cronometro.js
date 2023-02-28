var intervalos = {};

function FbotonOn(btn) {
  if ($(btn).text() == "Disponible") {
    $(btn).text("Laborando").css("background-color", "#138D75");
    var startTime = Date.now();

    if ($(btn).text() == "Laborando") {
      var idUsuario = $(btn).data("id");
      intervalos[idUsuario] = setInterval(function () {
        var tiempo = new Date(Date.now() - startTime)
          .toISOString()
          .substr(11, 8);
        var cronometro = document.getElementById(
          "iniciarCronometro_" + idUsuario
        );
        if (cronometro) {
          cronometro.textContent = tiempo;
          cronometro.style.color = tiempo >= "00:10:00" ? "red" : "";
        }
      }, 1000);
    } 
  } else if ($(btn).text() == "Laborando") {
    $(btn).text("Disponible").css("background-color", "#3498DB");
    var idUsuario = $(btn).data("id");
    clearInterval(intervalos[idUsuario]);
    delete intervalos[idUsuario]; // Eliminar el ID de intervalo para el ID de usuario especificado
  }
}

function reiniciar(btn, idUsuario) {
  clearInterval(intervalos[idUsuario]); // Detener la función de cronómetro correspondiente al ID de usuario especificado
  delete intervalos[idUsuario]; // Eliminar el ID de intervalo para el ID de usuario especificado
  // Resetear el cronómetro
  var cronometro = document.getElementById("iniciarCronometro_" + idUsuario);
  if (cronometro) {
    cronometro.textContent = "00:00:00";
    cronometro.style.color = "";
  }
}
