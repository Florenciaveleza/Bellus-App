<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php
require_once "resources/controllers/productos.php";

$objetoProductos= new productos;
$Productos = $objetoProductos->catalogoProductos();

include  "public/views/parts/head.php";
include  "public/views/parts/header.php";


// Generar la tabla HTML
echo '
<div id="agregarProducto">
<button id="agregarProducto">Agregar</button>
</div>

<table>
  <thead>
    <tr>
      <th>id</th>
      <th>Nombre</th>
      <th>Categoria</th>
      <th>Precio</th>
      <th>Descripción</th>
      <th>imagen</th>
      <th>stock</th>
    </tr>
  </thead>
  <tbody>';

foreach ($Productos as $producto) {
    echo '
    <tr>
      <td>' . $producto->id . '</td>
      <td>' . $producto->nombre . '</td>
      <td>' . $producto->categoria . '</td>
      <td>' . $producto->precio . '</td>
      <td>' . $producto->descripcion . '</td>
      <td>' . $producto->imagen . '</td>
      <td>' . $producto->stock . '</td>
      <td>

      <button class="editar-producto" data-id="' . $producto->id . '" data-nombre="' . $producto->nombre . '" data-categoria="' . $producto->categoria . '" data-precio="' . $producto->precio . '" data-descripcion="' .  $producto->descripcion . '" data-imagen="' . $producto->imagen . '"data-stock = "' . $producto->stock . '">Editar</button>

      <button onclick="eliminarProducto(' . $producto->id . ')">Eliminar</button>
      </td>
    </tr>';
}

echo '
  </tbody>
</table>';
?>

<!-- Modal para editar el producto -->
<div id="modalEditar" class="modal">
  <div class="modal-content">
    <h2>Editar Producto</h2>
    <form id="formularioEditar">
      <!-- Campos de edición -->
      <input type="text" id="editId" name="editId" placeholder="ID">
      <input type="text" id="editNombre" name="editNombre" placeholder="Nombre">
      <input type="text" id="editCategoria" name="editCategoria" placeholder="Categoria">
      <input type="number" id="editPrecio" name="editPrecio" placeholder="Precio">
      <input type="text" id="editDescripcion" name="editDescripcion" placeholder="Descripción">
      <input type="text" id="editImagen" name="editImagen" placeholder="Imagen">
      <input type="text" id="editStock" name="editStock" placeholder="Imagen">
      <!-- Otros campos de edición -->      
      <button type="button" id="guardarProducto" name="guardar" >Guardar</button>
    </form>
  </div>
</div>

<!-- Estilos CSS para el modal -->
<style>
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
  background-color: white;
  margin: 10% auto;
  padding: 20px;
  width: 80%;
}

</style>

<script>
 // Función para abrir el modal de edición y rellenar los campos con los datos del producto
 $(document).on('click', '.editar-producto', function() {
  // Obtener los datos del atributo data del botón
  var id = $(this).data('id');
  var nombre = $(this).data('nombre');
  var categoria = $(this).data('categoria');
  var precio = $(this).data('precio');
  var descripcion = $(this).data('descripcion');
  var imagen = $(this).data('imagen');
  var stock = $(this).data('stock');

  // Rellenar los campos del formulario con los datos del producto
  $('#editId').val(id);
  $('#editNombre').val(nombre);
  $('#editCategoria').val(categoria);
  $('#editPrecio').val(precio);
  $('#editDescripcion').val(descripcion);
  $('#editImagen').val(imagen);
  $('#editStock').val(stock);

  // Mostrar el modal
  $('#modalEditar').show();
});

// Función para guardar los cambios
// Controlador de eventos para el botón "Guardar"
$('#guardarProducto').on('click', function() {
  // Obtener los valores de los campos del formulario
  var id = $('#editId').val();
  var nombre = $('#editNombre').val();
  var categoria = $('#editCategoria').val();
  var precio = $('#editPrecio').val();
  var descripcion = $('#editDescripcion').val();
  var imagen = $('#editImagen').val();
  var stock = $('#editStock').val();

  // Crear un objeto con los datos a enviar al servidor
  var data = {
    id: id,
    nombre: nombre,
    categoria: categoria,
    precio: precio,
    descripcion: descripcion,
    imagen: imagen,
    stock: stock
  };

console.log(data);
  // Enviar la solicitud AJAX al servidor
  $.ajax({
    url: 'resources/controllers/admin/obtener_producto.php', // URL del script PHP que procesará la solicitud
    method: 'POST',
    data: data,
    success: function(response) {
      // La solicitud se ha completado con éxito  
     
      // Cerrar el modal
      $('#modalEditar').hide();
      location.reload();
    },
    error: function(xhr, status, error) {
      // Se produjo un error en la solicitud     
      console.error(error);
    }
  });
});


function eliminarProducto(id) {
  if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
    $.ajax({
      type: "POST",
      url: "resources/controllers/admin/eliminar_producto.php",
      data: { id: id },
      success: function (response) {

          alert("Producto eliminado correctamente");

          location.reload();  
 
      },
      error: function () {

        alert("Error en la solicitud AJAX");
      }
    });
  }
  
}

</script>


<!-- //agregar productos -->

<!-- Modal Agregar Producto -->
<div id="modalAgregar" class="modal">
  <div class="modal-content">
    <h2>Agregar Producto</h2>
    <form id="formularioAgregar">
      <!-- Campos de edición -->
      <input type="text" id="addId" name="addId" placeholder="ID">
      <input type="text" id="addNombre" name="addNombre" placeholder="Nombre">
      <input type="text" id="addCategoria" name="addCategoria" placeholder="Categoria">
      <input type="number" id="addPrecio" name="addPrecio" placeholder="Precio">
      <input type="text" id="addDescripcion" name="addDescripcion" placeholder="Descripción">
      <input type="text" id="addImagen" name="addImagen" placeholder="Imagen">
      <input type="number" id="addStock" name="addStock" placeholder="Stock">
      <!-- Otros campos de edición -->
      
      <button type="button" id="guardarProducto2" name="guardar" >Guardar</button>
    </form>
  </div>
</div>

<script>

// Abrir modal para agregar producto
$(document).on('click', '#agregarProducto', function() {
  // Limpiar los campos del formulario
  $('#addId').val('');
  $('#addNombre').val('');
  $('#addCategoria').val('');
  $('#addPrecio').val('');
  $('#addDescripcion').val('');
  $('#addImagen').val('');
  $('#addStock').val('');
  // Mostrar el modal
  $('#modalAgregar').show();
});

// Guardar producto

$(document).on('click', '#guardarProducto2', function() {
  // Obtener los valores de los inputs
  var id = $('#addId').val();
  var nombre = $('#addNombre').val();
  var categoria = $('#addCategoria').val();
  var precio = $('#addPrecio').val();
  var descripcion = $('#addDescripcion').val();
  var imagen = $('#addImagen').val();
  var stock = $('#addStock').val();
  // Realizar la solicitud AJAX para guardar el producto
  $.ajax({
    type: "POST",
    url: "resources/controllers/admin/guardar_producto.php",
    data: {
      id: id,
      nombre: nombre,
      categoria: categoria,
      precio: precio,
      descripcion: descripcion,
      imagen: imagen,
      stock: stock
    },
    success: function(response) {
      // Procesar la respuesta del servidor    
        // Guardado exitoso
        alert("Producto agregado correctamente");
        // Actualizar 
        location.reload();  
    },
    error: function() {
      // Error de conexión 
      alert("Error en la solicitud AJAX");
    }
  });
});

</script>
