let carrito = [];

window.onload = function() {
    const carritoStorage = localStorage.getItem('carrito');
    if (carritoStorage) {
        carrito = JSON.parse(carritoStorage);
        actualizarIconoCarrito();
    }
};

function agregarAlCarrito(nombre, precio, cantidad) {
    const item = carrito.find(producto => producto.nombre === nombre);
    if (item) {
        item.cantidad += parseInt(cantidad);
    } else {
        carrito.push({ nombre, precio, cantidad: parseInt(cantidad) });
    }
    localStorage.setItem('carrito', JSON.stringify(carrito));
    actualizarIconoCarrito();
}

function mostrarCarrito() {
    let modal = document.getElementById('carritoModal');
    if (!modal) {
        modal = document.createElement('div');
        modal.classList.add('modal', 'fade');
        modal.id = 'carritoModal';
        modal.setAttribute('tabindex', '-1');
        modal.setAttribute('aria-labelledby', 'carritoModalLabel');
        modal.setAttribute('aria-hidden', 'true');
        modal.innerHTML = `
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="carritoModalLabel">Carrito de Compras</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="carritoBody">
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <h5>Total:</h5>
                            <span id="totalCarrito">S/0.00</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-danger" onclick="vaciarCarrito()">Vaciar Carrito</button>
                    </div>
                </div>
            </div>
        `;
        document.body.appendChild(modal);
    }

    const carritoModal = new bootstrap.Modal(modal);
    carritoModal.show();

    actualizarCarritoModal();
}

function actualizarCarritoModal() {
    const carritoBody = document.getElementById('carritoBody');
    const totalCarrito = document.getElementById('totalCarrito');
    carritoBody.innerHTML = '';

    if (carrito.length === 0) {
        carritoBody.innerHTML = '<p class="text-center">El carrito está vacío.</p>';
        totalCarrito.innerText = 'S/0.00';
    } else {
        let total = 0;

        carrito.forEach(producto => {
            total += producto.precio * producto.cantidad;
            carritoBody.innerHTML += `
                <div class="d-flex justify-content-between align-items-center border-bottom py-3">
                    <div class="d-flex align-items-center">
                        <span class="badge bg-info text-dark me-2">${producto.cantidad}</span>
                        <span>${producto.nombre}</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="me-2">S/${(producto.precio * producto.cantidad).toFixed(2)}</span>
                        <button class="btn btn-danger btn-sm" onclick="eliminarDelCarrito('${producto.nombre}')">Eliminar</button>
                    </div>
                </div>
            `;
        });

        totalCarrito.innerText = `S/${total.toFixed(2)}`;
    }
}

function eliminarDelCarrito(nombre) {
    carrito = carrito.filter(producto => producto.nombre !== nombre);
    localStorage.setItem('carrito', JSON.stringify(carrito));
    actualizarCarritoModal();
    actualizarIconoCarrito();
}

function vaciarCarrito() {
    carrito = [];
    localStorage.setItem('carrito', JSON.stringify(carrito));
    actualizarCarritoModal();
    actualizarIconoCarrito();
}

function actualizarIconoCarrito() {
    const iconoCarrito = document.getElementById('iconoCarrito');
    const totalProductos = carrito.reduce((acc, producto) => acc + producto.cantidad, 0);
    
    if (totalProductos > 0) {
        iconoCarrito.innerText = totalProductos;
        iconoCarrito.style.display = 'inline-block';
        iconoCarrito.style.backgroundColor = 'red';
        iconoCarrito.style.color = 'white';
        iconoCarrito.style.borderRadius = '50%';
        iconoCarrito.style.padding = '1px 7px';
    } else {
        iconoCarrito.style.display = 'none';
    }
}

document.querySelectorAll('.carrito button').forEach(button => {
    button.addEventListener('click', function() {
        const cantidadInput = this.previousElementSibling;
        const nombreProducto = this.previousElementSibling.previousElementSibling.previousElementSibling.textContent.trim();
        const precioProducto = parseFloat(this.previousElementSibling.previousElementSibling.textContent.replace("S/", "").trim());

        agregarAlCarrito(nombreProducto, precioProducto, cantidadInput.value);
    });
});

function actualizarCarritoModal() {
    const carritoBody = document.getElementById('carritoBody');
    const totalCarrito = document.getElementById('totalCarrito');
    carritoBody.innerHTML = '';

    if (carrito.length === 0) {
        carritoBody.innerHTML = '<p class="text-center">El carrito está vacío.</p>';
        totalCarrito.innerText = 'S/0.00';
    } else {
        let total = 0;

        carrito.forEach(producto => {
            total += producto.precio * producto.cantidad;
            carritoBody.innerHTML += `
                <div class="d-flex justify-content-between align-items-center border-bottom py-3">
                    <div class="d-flex align-items-center">
                        <span class="badge bg-info text-dark me-2">${producto.cantidad}</span>
                        <span>${producto.nombre}</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="me-2">S/${(producto.precio * producto.cantidad).toFixed(2)}</span>
                        <button class="btn btn-danger btn-sm" onclick="eliminarDelCarrito('${producto.nombre}')">Eliminar</button>
                    </div>
                </div>
            `;
        });

        totalCarrito.innerText = `S/${total.toFixed(2)}`;
    }
}

