var intervalo;
/*
function FbotonOn() {
  var btn = document.getElementById("botonOn");
  var indent = btn.value;
  if (btn.textContent == "Laborando") {
    btn.textContent = "Disponible";
    document.getElementById("botonOn").style.backgroundColor = "#3498DB";
    clearInterval(intervalo);
    actualizarCronometro(indent);
  } else {
    btn.textContent = "Laborando";
    document.getElementById("botonOn").style.backgroundColor = "#138D75";
    iniciarCronometro(indent);
  }
}

function actualizarCronometro(indent) {
  var tiempo_trabajado = document.getElementById("iniciarCronometro").textContent;
  $.ajax({
    type: 'POST',
    url: 'actualizarCronometro.php',
    data: {indent: indent, tiempo_trabajado: tiempo_trabajado},
    success: function(data) {
      console.log(data);
    },
    error: function(xhr, status, error) {
      console.log(error);
    }
  });
}


function iniciarCronometro(indent) {
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
*/

function FbotonOn(event) {
  var btn = event.target;
  var indent = btn.getAttribute("data-indent");
  var startTime = Date.now();
  var tiempoTranscurrido = 0;
  var intervalo;
  var tiempo = "00:00:00"; // Valor predeterminado
  if (btn.textContent == "Laborando") {
    btn.textContent = "Disponible";
    btn.style.backgroundColor = "#3498DB";
    clearInterval(intervalo);
    actualizarCronometro(indent, tiempo);
  } else {
    btn.textContent = "Laborando";
    btn.style.backgroundColor = "#138D75";
    intervalo = setInterval(function() {
      var currentTime = Date.now();
      tiempoTranscurrido = currentTime - startTime;
      var horas = Math.floor(tiempoTranscurrido / 3600000);
      var minutos = Math.floor((tiempoTranscurrido - horas * 3600000) / 60000);
      var segundos = Math.floor((tiempoTranscurrido - horas * 3600000 - minutos * 60000) / 1000);
      tiempo = `${horas.toString().padStart(2, "0")}:${minutos.toString().padStart(2, "0")}:${segundos.toString().padStart(2, "0")}`;
      var cronometro = document.querySelector("#iniciarCronometro_" + indent);
      if (cronometro) {
        cronometro.textContent = tiempo;
        if (tiempoTranscurrido >= 600000) {
          cronometro.style.color = "red";
        }
      }
    }, 1000);
  }
}

function actualizarCronometro(indent, tiempo_trabajado) {
  $.ajax({
    type: 'POST',
    url: 'actualizarCronometro.php',
    data: {indent: indent, tiempo_trabajado: tiempo_trabajado},
    success: function(data) {
      console.log(data);
    },
    error: function(xhr, status, error) {
      console.log(error);
    }
  });
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

/*
    $(document).ready(function() {
      $('#example').DataTable({
        scrollY: '100vh',
        scrollCollapse: true,
        "language": {
          "lengthMenu": "Mostrar " + `
            <select>
            <option value='10'>10</option>
            <option value='25'>25</option>
            <option value='50'>50</option>
            <option value='100'>100</option>
            <option value='-1'>All</option>
            </select>
            ` + " Registros por página",
          "zeroRecords": "No se encontraron datos!!",
          "info": "Mostrando la página _PAGE_ de _PAGES_",
          "infoEmpty": "No records available",
          "infoFiltered": "(Filtrado de _MAX_ registros totale)",
          'search': 'Buscar:',
          'paginate': {
            'next': 'Siguiente',
            'previous': 'Anterior'
          }
        }


      });

    });
 */
