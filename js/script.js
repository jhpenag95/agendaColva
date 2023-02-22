var intervalo;

function FbotonOn() {
  var btn = document.getElementById('botonOn');
  if (btn.textContent == 'Laborando') {
    btn.textContent = 'Disponible';
    document.getElementById("botonOn").style.backgroundColor = "#3498DB";
    clearInterval(intervalo);
  } else {
    btn.textContent = 'Laborando';
    document.getElementById("botonOn").style.backgroundColor = "#138D75";
    iniciarCronometro();
  }
}

function iniciarCronometro() {
  var startTime = Date.now();
  var tiempoTranscurrido = 0;
  intervalo = setInterval(function(){
    var currentTime = Date.now();
    tiempoTranscurrido = currentTime - startTime;
    var horas = Math.floor(tiempoTranscurrido / 3600000);
    var minutos = Math.floor((tiempoTranscurrido - horas * 3600000) / 60000);
    var segundos = Math.floor((tiempoTranscurrido - horas * 3600000 - minutos * 60000) / 1000);
    var tiempo = `${horas.toString().padStart(2, '0')}:${minutos.toString().padStart(2, '0')}:${segundos.toString().padStart(2, '0')}`;
    document.getElementById("iniciarCronometro").textContent = tiempo;
    
    if (tiempoTranscurrido >= 600000) {
      document.getElementById("iniciarCronometro").style.color = "red";
    }
  }, 1000);
}

document.getElementById("reinicarCronometro").addEventListener("click", function() {
  clearInterval(intervalo);
  document.getElementById("iniciarCronometro").textContent = "00:00:00";
  document.getElementById("iniciarCronometro").style.color = "black";
});
