<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="iniciarsesion.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
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

                    <form action="controler_IniciarSesion.php"  method="POST">
                        <fieldset >
                            <h2>Iniciar Sesion</h2>
                            <p>EMAIL: </p>
                            <div class="tamañobarras">
                                <input type="email" placeholder="ejemplo.gmail.com" id="correo" name="correo">
                                <div class="invalid-feedback">Por favor, ingrese un correo válido.</div>
                                <div class="valid-feedback">¡Correo válido!</div>
                            </div>

                            <p>CONTRASEÑA:</p>
                            <div class="tamañobarras">
                                <input type="password" placeholder="************" id="contraseña" name="contraseña"  novalidate >
                                <div class="invalid-feedback">Por favor, ingrese una contraseña.</div>
                                <div class="valid-feedback">Completado</div>
                            </div>
                            <div>
                            <div>
                            
                            <a class="olvidado" href="#"><span >¿Olvidaste tu Contraseña?
                            </span></a>
                            </div>
                            <div class="tamañoboton">
                                <button type="submit" class="IniciarSesion" id="IniciarSesion" name="btnIniciarSesion">Iniciar Sesion </button>
                            </div><br>

                            <div class="registrate">
                                <h5>¿Todavia no tienes una cuenta? <a href="NuevoUsuario.php"> <span>Registrate!!!</span></a></h5>
                            </div>
                        </fieldset>

                    </form>
                </div>
    </div>



    <script>


            document.getElementById("correo").addEventListener("blur", function () {
                let corre = document.getElementById("correo").value;
                let expCorreo = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;

                if (corre === "") {
                    document.getElementById("correo").nextElementSibling.style.display = 'inline-block';
                    document.getElementById("correo").nextElementSibling.nextElementSibling.style.display = 'none'; // Ocultar "Completado"
                } else if (!expCorreo.test(corre)) {
                    alert("Por favor ingrese un correo válido.");
                    document.getElementById("correo").nextElementSibling.style.display = 'inline-block';
                    document.getElementById("correo").nextElementSibling.nextElementSibling.style.display = 'none'; // Ocultar "Completado"
                } else {
                    document.getElementById("correo").nextElementSibling.style.display = 'none';
                    document.getElementById("correo").nextElementSibling.nextElementSibling.style.display = 'inline-block'; // Mostrar "Completado"
                }
            });

            document.getElementById("contraseña").addEventListener("blur", function () {
                let contra = document.getElementById("contraseña").value;
                let expContraseña = /^(?=.*\d)(?=.*[a-z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

                if (contra === "") {
                    document.getElementById("contraseña").nextElementSibling.style.display = 'inline-block';
                    document.getElementById("contraseña").nextElementSibling.nextElementSibling.style.display = 'none'; // Ocultar "Completado"
                } else if (!expContraseña.test(contra)) {
                    alert("La contraseña debe contener entre 8 y 15 caracteres, al menos un número, una letra minúscula y un carácter especial.");
                    document.getElementById("contraseña").nextElementSibling.style.display = 'inline-block';
                    document.getElementById("contraseña").nextElementSibling.nextElementSibling.style.display = 'none'; // Ocultar "Completado"
                } else {
                    document.getElementById("contraseña").nextElementSibling.style.display = 'none';
                    document.getElementById("contraseña").nextElementSibling.nextElementSibling.style.display = 'inline-block'; // Mostrar "Completado"
                }
            });

            document.querySelector('form').addEventListener('submit', function (event) {
                let corre = document.getElementById("correo").value;
                let contra = document.getElementById("contraseña").value;

                let expCorreo = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
                let expContraseña = /^(?=.*\d)(?=.*[a-z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

                let valid = true;

                if (!expCorreo.test(corre) || corre === "") {
                    valid = false;
                }

                if (!expContraseña.test(contra) || contra === "") {
                    valid = false;
                }

                if (!valid) {
                    event.preventDefault(); // Evitar envío si los campos no son válidos
                    alert("Por favor, complete correctamente todos los campos.");
                }
            });
            
    </script>

        <div class="footer-container">
            <footer>
                <p>&copy; 2024 BM.com - Todos los derechos reservados.</p>
            </footer>
        </div>

</body>


</html>