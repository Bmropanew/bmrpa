<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registrate</title>
    <link rel="stylesheet" href="nuevousuario.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <header>
        <div class="logo">
                <img src="img/el_logo_BM.jpg" alt="Logo">                    
        </div>
        <nav>
            <ul>         
                <li><a href="Principal.php"><i class="fas fa-home"></i> Inicio</a></li>
             <li><a href="Nosotros.php"><i class="fas fa-user"></i> Nosotros</a></li>
             <li><a href="Contactanos.php"><i class="fas fa-envelope"></i>Contactanos</a></li>
            </ul>
        </nav>
    </header>
    <div id="contenedor2">
  

                <div class="formulario">
                    <form class="needs-validation" novalidate method="POST" action="newUsuario.php">
                        <fieldset>
                            <h2>Crear Cuenta</h2>
                            <p>Nombre</p>
                            <div class="tamañobarras">
                                <input type="text" placeholder="nombre" id="nombre" name="nombre" required>
                                <div class="invalid-feedback">Por favor, ingrese un nombre válido.</div>
                            </div>
                            <div class="valid-feedback">
                                ¡Campo válido!
                             </div>

                            <p>Apellidos</p>
                            <div class="tamañobarras">
                               <input type="text" placeholder="apellido" id="apellido" name="apellido" required>
                                <div class="invalid-feedback">Por favor, ingrese un apellido válido.</div>
                            </div>
                            <div class="valid-feedback">
                                ¡Campo válido!
                             </div>

                            <p>Correo electrónico:</p>
                            <div class="tamañobarras">
                                <input type="email" placeholder="ejemplo@gmail.com" id="correo" name="correo" required>
                                <div class="invalid-feedback">Por favor, ingrese un correo electrónico válido.</div>
                            </div>
                            <div class="valid-feedback">
                                ¡Campo válido!
                             </div>

                            <p>Número de teléfono móvil</p>
                            <div class="tamañobarras">
                                <input type="text" placeholder="123456789" id="telefono" name="telefono" pattern="^[0-9]{9}$" required>
                                <div class="invalid-feedback">Por favor, ingrese un número de teléfono válido (9 dígitos).</div>
                            </div>
                            <div class="valid-feedback">
                                ¡Campo válido!
                             </div>

                            <p>Dirección de envío</p>
                            <div class="tamañobarras">
                                <input type="text" placeholder="ejemplo: 7042 Av. Universitaria Comas, Provincia de Lima" id="direccion" name="direccion" required>
                                <div class="invalid-feedback">Por favor, ingrese una dirección válida.</div>
                            </div>
                            <div class="valid-feedback">
                                ¡Campo válido!
                             </div>

                            <p>Fecha de nacimiento</p>
                            <div class="tamañobarras">
                                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
                                <div class="invalid-feedback">Por favor, ingrese una fecha de nacimiento.</div>
                            </div>
                            <div class="valid-feedback">
                                ¡Campo válido!
                             </div>

                            <p>Género</p>
                            <div class="tamañoselect">
                            <select name="genero" id="genero" required>
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="hombre">hombre</option>
                                <option value="mujer">mujer</option>
                                <option value="nd">prefiero no decirlo</option>
                            </select>
                            <div class="invalid-feedback">Por favor, seleccione un género.</div>
                            </div>
                            <div class="valid-feedback">
                                ¡Campo válido!
                             </div>

                            <p>Contraseña:</p>
                            <div class="tamañobarras">
                                <input type="password" placeholder="Contraseña" id="contraseña" name="contraseña" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$">
                                <div class="invalid-feedback">La contraseña debe tener al menos una letra mayúscula, <br> una minúscula, un carácter especial y ser de 8 a 15 caracteres.</div>
                            </div>
                            <div class="valid-feedback">
                                ¡Campo válido!
                             </div>

                            <div class="tamañoboton">
                                <button type="submit" class="registrar" id="boton_registrar">Registrar</button>
                            </div><br>

                            <div class="texto-blanco">
                                <input class="aceptar" type="checkbox" id="politica" required> Al crear una cuenta, aceptas las 
                                <a href="#"> 
                            <span>Condiciones de Uso</span>
                                </a> y el <a href="#">
                            <span>Aviso de Privacidad</span>
                                </a> de BM.com<br>
                            <div class="invalid-feedback">Debes aceptar las condiciones y el aviso de privacidad.</div>
                            </div>

                            <p class="texto-pequeño">¿Ya tienes una cuenta? <a href="IniciarSesion.php">
                            <span>Inicia Sesión</span></a></p>

                        </fieldset>
                    </form>
                 </div>
    </div>

   
        <div class="footer-container">
            <footer>
                <p>&copy; 2024 BM.com - Todos los derechos reservados.</p>
            </footer>


        </div>
    </header>

    <script>
            (() => {
            'use strict';

            const form = document.querySelector('.needs-validation');
            const inputs = document.querySelectorAll('.tamañobarras input, .tamañoselect select');

            inputs.forEach(input => {
                input.addEventListener('blur', function () {
                     if (input.validity.valid) {
                        const invalidFeedback = input.nextElementSibling;
                        const validFeedback = input.parentNode.nextElementSibling;

                    if (invalidFeedback && invalidFeedback.classList.contains('invalid-feedback')) {
                        invalidFeedback.style.display = 'none';
                    }

                    if (validFeedback && validFeedback.classList.contains('valid-feedback')) {
                        validFeedback.style.display = 'inline-block';
                    }
                } else {
                    const invalidFeedback = input.nextElementSibling;
                    if (invalidFeedback && invalidFeedback.classList.contains('invalid-feedback')) {
                        invalidFeedback.style.display = 'inline-block';
                    }

                    const validFeedback = input.parentNode.nextElementSibling;
                    if (validFeedback && validFeedback.classList.contains('valid-feedback')) {
                        validFeedback.style.display = 'none';
                    }
                }
            }); 
        });

            form.addEventListener('submit', function (event) {
                let isValid = true;

                inputs.forEach(input => {
                    if (!input.validity.valid) {
                        isValid = false;
                    }
                });

                if (!isValid) {
                    event.preventDefault();
                    alert('Por favor, complete todos los campos correctamente.');
                }
            });
        })();


    </script>



</body>


</html>