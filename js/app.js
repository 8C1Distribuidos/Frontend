// Variables


const carrito = document.getElementById('carrito');
const listaProductos = document.querySelector('#lista-carrito tbody');
const vaciarCarritoBtn = document.getElementById('vaciar-carrito');
const pagarBtn = document.getElementById('pagar');
//const botonMenos;
//const ListaCarrito = [];


// Listeners
cargarEventListeners();
function cargarEventListeners() {
  // Dispara cuando se presiona "Agregar Carrito"
  pagarBtn.addEventListener('click', pagar);
  // Cuando se elimina un curso del carrito
  carrito.addEventListener('click', eliminarProducto);
  // Al Vaciar el carrito
  vaciarCarritoBtn.addEventListener('click', vaciarCarrito);
  // Al cargar el documento, mostrar LocalStorage
  document.addEventListener('DOMContentLoaded', leerLocalStorage);
}


function pagar(){
  location.href = "pago.php";
}
// Funciones
// Función que añade el curso al carrito
function comprar(e) {
  e.preventDefault();
  // Delegation para agregar-carrito
  if(e.target.classList.contains('add')) {
    const product = e.target.parentElement.parentElement;
    const product2 = e.target.parentElement.parentElement.parentElement;
    // Enviamos el curso seleccionado para tomar sus datos
    leerDatosProducto(product, product2);
  }
}
function añadir(e) {
  producto = e.target.parentElement.parentElement.parentElement;
  productoId = producto.querySelector('a').getAttribute('data-id');
  let ListaCarrito = obtenerProductosLocalStorage();
  for (var i in ListaCarrito) {
    if (ListaCarrito[i].id == productoId) {
      if((ListaCarrito[i].amount + 1) <= ListaCarrito[i].stock){
        ListaCarrito[i].amount = ListaCarrito[i].amount + 1;
        cargarCarrito(ListaCarrito);
        if(ListaCarrito[i].amount == ListaCarrito[i].stock){
          var children = listaProductos.childNodes;
          for (var i = 0; i < children.length; i++) {
            var botones = children[i].querySelectorAll('i');
            var boton = children[i].querySelector('a');
            if(productoId == boton.getAttribute('data-id')){
              for (var i = 0; i < botones.length; i++) {
                if(botones[i].classList.contains('fa-plus-square')){
                  botones[i].style.color = "gray";
                  break;
                }
              }
            }
          }
        }
      }
      break;
    }
  }
}

function disminuir(e) {
  producto = e.target.parentElement.parentElement.parentElement;
  productoId = producto.querySelector('a').getAttribute('data-id');
  let ListaCarrito = obtenerProductosLocalStorage();
  for (var i in ListaCarrito) {
    if (ListaCarrito[i].id == productoId) {
      if(ListaCarrito[i].amount > 1){
        ListaCarrito[i].amount = ListaCarrito[i].amount - 1;
      }
      cargarCarrito(ListaCarrito);
      break;
    }
  }
}

// Lee los datos del curso
function leerDatosProducto(infoProduct, product2) {
  console.log(product2);
  const product = {
    id: infoProduct.querySelector('button').getAttribute('data-id'),
    stock: infoProduct.querySelector('input').value,
    image: product2.querySelector('img').src,
    name: infoProduct.querySelector('h1').textContent,
    price: infoProduct.querySelector('h2').textContent,
    amount: 0
  }
  insertarCarrito(product);
}

// Muestra el curso seleccionado en el Carrito
function insertarCarrito(product) {
  let ListaCarrito = obtenerProductosLocalStorage();
  var findProduct = ListaCarrito.find(pro => pro.id == product.id);
  if(findProduct == null){ 
    product.amount = 1;
    ListaCarrito.push(product);
  }else{
    if((ListaCarrito[i].amount + 1) <= ListaCarrito[i].stock){
      product.amount = findProduct.amount + 1;
      for (var i in ListaCarrito) {
        if (ListaCarrito[i].id == product.id) {
          ListaCarrito[i] = product;
          break;
        }
      }
    }
  }
  cargarCarrito(ListaCarrito);
}

// Elimina el curso del carrito en el DOM
function eliminarProducto(e) {
  e.preventDefault();
  let producto,
      productoId;
      console.log(e.target.classList);
  if(e.target.classList.contains('fa-times-circle') ) {
    producto = e.target.parentElement.parentElement.parentElement;
    productoId = producto.querySelector('a').getAttribute('data-id');
    console.log(productoId);
    eliminarProductoLocalStorage(productoId);
  }else if(e.target.classList.contains('fa-plus-square') ){
    añadir(e);
  }
  else if(e.target.classList.contains('fa-minus-square') ){
    disminuir(e);
  }
}

// Elimina los cursos del carrito en el DOM
function vaciarCarrito() {
  // forma lenta
  // listaCursos.innerHTML = '';
  // forma rapida (recomendada)
  document.getElementById('pagar').style.display = 'none';
  while(listaProductos.firstChild) {
    listaProductos.removeChild(listaProductos.firstChild);
  }
  // Vaciar Local Storage
  vaciarLocalStorage();
  return false;
}

// Almacena cursos en el carrito a Local Storage
function guardarProductosLocalStorage(productos) {
  localStorage.setItem('productos', JSON.stringify(productos) );
}

// Comprueba que haya elementos en Local Storage
function obtenerProductosLocalStorage() {
  let productos;
  // comprobamos si hay algo en localStorage
  if(localStorage.getItem('productos') == null) {
    productos = [];
  } else {
    productos = JSON.parse( localStorage.getItem('productos') );
  }
  return productos;
}

// Imprime los cursos de Local Storage en el carrito
function leerLocalStorage() {
  let productos;
  productos = obtenerProductosLocalStorage();
  cargarCarrito(productos);
}

function cargarCarrito(productos){
  while(listaProductos.firstChild) {
    listaProductos.removeChild(listaProductos.firstChild);
  }
  if(productos.length != 0){
    document.getElementById('pagar').style.display = 'block';
  }else{
    document.getElementById('pagar').style.display = 'none';
  }
  productos.forEach(function(producto){
    // constrir el template
    const row = document.createElement('tr');
      row.innerHTML = `
      <td>
      <img src="${producto.image}" height=70 width=70>
      </td>
      <td>${producto.name}</td>
      <td>${producto.price}</td>
      <td><span style="font-size: 1.7rem;"class="mas" ><i class="fas fa-minus-square"></i><span></td>
      <td>${producto.amount}</td>
      <td><span style="font-size: 1.7rem;"class="mas"><i class="fas fa-plus-square"></i><span></td>
      <td>
      <a href="#" style="font-size: 1.7rem;" class="borrar-producto" data-id="${producto.id}"><span style="font-size: 1.7rem; color:red"><i class="fas fa-times-circle"></i></span></a>
      </td>
      `;
    listaProductos.appendChild(row);
    });
    guardarProductosLocalStorage(productos);
    calcularTotal();
}
function calcularTotal(){
  let productos = obtenerProductosLocalStorage();
  var total = 0;
  // Iteramos comparando el ID del curso borrado con los del LS
  productos.forEach(function(producto) {
    total = total + (producto.amount * parseFloat(producto.price.substring(1)));
  });
  document.getElementById('pagar').textContent = "Pagar: $"+ total;
}
// Elimina el curso por el ID en Local Storage
function eliminarProductoLocalStorage(id) {
  // Obtenemos el arreglo de cursos
  let productos = obtenerProductosLocalStorage();
  let p = productos;
  // Iteramos comparando el ID del curso borrado con los del LS
  productos.forEach(function(producto, index) {
    if(producto.id == id) {
      p.splice(index, 1);
    }
  });
  // Añadimos el arreglo actual a storage
  localStorage.setItem('productos', JSON.stringify(p) );
  cargarCarrito(p);
}

// Elimina todos los cursos de Local Storage
function vaciarLocalStorage() {
  localStore.removeItem('productos');
}



