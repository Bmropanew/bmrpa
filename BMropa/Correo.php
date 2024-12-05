<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Enviar Correo</title>
    <style>
        nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            background-color: #333;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 10px;
            display: block;
        }

        nav ul li a:hover {
            background-color: #575757;
        }

        form {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            margin: 20px auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .btn {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn i {
            margin-right: 8px;
        }

        .mensaje {
            margin: 20px auto;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
            width: 80%;
            max-width: 600px;
        }

        .mensaje.exito {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .mensaje.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>

<body>

    <header>
        <nav>
            <ul>
                <?php include("menu.php"); ?>
            </ul>
        </nav>
    </header>

    <main>
        <div id="mensaje"></div>

        <form id="formCorreo" enctype="multipart/form-data">
            <div>
                <label class="form-label" for="destinatario">Destinatario</label>
                <input type="email" class="form-control" name="destinatario" id="destinatario" placeholder="Ejemplo@gmail.com" required>
            </div>
            <div>
                <label class="form-label" for="asunto">Asunto del correo</label>
                <input type="text" class="form-control" name="asunto" id="asunto" placeholder="El asunto del correo electrónico" required>
            </div>
            <div>
                <label class="form-label" for="contenido">Mensaje</label>
                <textarea class="form-control" name="contenido" id="contenido" rows="5" placeholder="Escribe aquí..." required></textarea>
            </div>
            <div>
                <label class="form-label" for="archivo">Adjuntar archivo</label>
                <input type="file" class="form-control" name="archivo" id="archivo">
            </div>
            <button class="btn" type="submit">
                <i class="fas fa-paper-plane"></i> Enviar correo
            </button>
        </form>
    </main>

    <footer>
        <p>© 2024 Mi Sitio. Todos los derechos reservados.</p>
    </footer>

    <script>
        document.getElementById('formCorreo').addEventListener('submit', function (e) {
            e.preventDefault();

            const mensajeDiv = document.getElementById('mensaje');
            const formData = new FormData(this);

            fetch('controlerCorreo.php', {
                method: 'POST',
                body: formData
            })
                .then((response) => response.text())
                .then((data) => {
                    if (data.includes('éxito')) {
                        mensajeDiv.innerHTML = `<div class="mensaje exito">${data}</div>`;
                        document.getElementById('formCorreo').reset(); 
                    } else {
                        mensajeDiv.innerHTML = `<div class="mensaje error">${data}</div>`;
                    }
                })
                .catch((error) => {
                    mensajeDiv.innerHTML = `<div class="mensaje error">Error al procesar la solicitud.</div>`;
                });
        });
    </script>

</body>

</html>
