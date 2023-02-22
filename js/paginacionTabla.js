$(document).ready(function () {
  var rowsShown = 5; // Cantidad de filas por página
  var rowsTotal = $("#miTabla tbody tr").length; // Total de filas en la tabla
  var numPages = Math.ceil(rowsTotal / rowsShown); // Cantidad de páginas

  for (var i = 0; i < numPages; i++) {
    var pageNum = i + 1;
    $("#paginacion").append(
      '<li class="page-item"><a class="page-link" href="#" rel="' +
        i +
        '">' +
        pageNum +
        "</a></li>"
    );
  } // Agrega los enlaces de paginación

  $("#miTabla tbody tr").hide(); // Oculta todas las filas de la tabla
  $("#miTabla tbody tr").slice(0, rowsShown).show(); // Muestra las filas de la primera página
  $("#paginacion li:first-child").addClass("active"); // Marca la primera página como activa

  $("#paginacion a").bind("click", function () {
    $("#paginacion li").removeClass("active"); // Elimina la marca de página activa
    $(this).parent().addClass("active"); // Marca la página actual como activa
    var currPage = $(this).attr("rel"); // Obtiene la página actual
    var startItem = currPage * rowsShown; // Calcula el primer ítem a mostrar
    var endItem = startItem + rowsShown; // Calcula el último ítem a mostrar
    $("#miTabla tbody tr").hide(); // Oculta todas las filas de la tabla
    $("#miTabla tbody tr").slice(startItem, endItem).show(); // Muestra las filas de la página actual
    return false;
  });
});

/**
 * Este código es para implementar la paginación en una tabla HTML usando jQuery. Básicamente, divide la tabla en varias páginas y muestra solo un cierto número de filas por página. El usuario puede navegar por las páginas haciendo clic en los enlaces de paginación.
 */
