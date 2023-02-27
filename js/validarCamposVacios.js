function validar() {
    // Obtener los valores de los campos del formulario
    var identidad = document.getElementById("ident").value;
    var nombre = document.getElementById("name").value;
    var apellido = document.getElementById("ape").value;
    var cargo = document.getElementById("cargo").value;
  
    // Verificar si algún campo está vacío
    if (identidad == "" || nombre == "" || apellido == "" || cargo == "") {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Por favor, complete todos los campos!'
      })
      return false;
    }
  
  }