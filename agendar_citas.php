<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agendar Citas - Perfect Skin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/LOGO.jpeg">
    <link rel="stylesheet" href="css/agendar_citas.css">
    <script src="https://checkout.bold.co/library/boldPaymentButton.js" async></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        /* Estilo para dividir la pantalla */
        .container-citas {
            display: flex;
            height: 100vh;
        }

        .left-side {
            flex: 1;
            background: url('img/fondo_cita.jpg') no-repeat center center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .left-side img {
            max-width: 80%;
            border-radius: 10px;
        }

        .right-side {
            flex: 1;
            padding: 50px;
            background-color: rgba(255, 255, 255, 0.9);
        }

        /* Asegúrate de que los campos tengan el mismo ancho */
        input[type="text"], input[type="email"], input[type="number"], input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .boton-reserva {
            background-color: #FF6F91;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .boton-reserva:hover {
            background-color: #FF5071;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container-citas">
        <!-- Sección izquierda con imagen o video -->
        <div class="left-side">
            <img src="img/facial_service.jpg" alt="Servicio Facial">
        </div>

        <!-- Sección derecha con el formulario -->
        <div class="right-side">
            <h2>Reservar Cita</h2>
            <p>Selecciona una fecha y horario para tu cita:</p>

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "perfect_skin";
            $port = "3306";

            $conexion = new mysqli($servername, $username, $password, $dbname, $port);

            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }

            $result = $conexion->query("SELECT fecha, hora FROM citas_agendadas");
            $citasOcupadas = [];
            while ($row = $result->fetch_assoc()) {
                $citasOcupadas[] = $row['fecha'] . ' ' . $row['hora'];
            }

            $conexion->close();

            $servicioSeleccionado = isset($_GET['servicio']) ? $_GET['servicio'] : 'No se ha seleccionado servicio';
            $precioSeleccionado = isset($_GET['precio']) ? $_GET['precio'] : 0;
            ?>

            <form method="post" id="reservaForm" action="guardar_citas.php">
                <div class="mb-3">
                    <label for="cedula" class="form-label">Cédula:</label>
                    <input type="text" id="cedula" name="cedula" required>
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo" required>
                </div>

                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha:</label>
                    <input type="date" id="fecha" name="fecha" required>
                </div>

                <div class="mb-3">
                    <label for="hora" class="form-label">Hora:</label>
                    <input type="text" id="hora" name="hora" class="flatpickr-time" required>
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio:</label>
                    <input type="number" id="precio" name="precio" value="<?php echo htmlspecialchars($precioSeleccionado); ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="servicio" class="form-label">Servicio Seleccionado:</label>
                    <input type="text" id="servicio" name="servicio" value="<?php echo htmlspecialchars($servicioSeleccionado); ?>" readonly>
                </div>

                <input type="submit" class="boton-reserva" value="Pagar">
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.getElementById('cedula').addEventListener('input', function (e) {
            this.value = this.value.replace(/\D/g, '');
        });

        document.addEventListener('DOMContentLoaded', function () {
            let citasOcupadas = <?php echo json_encode($citasOcupadas); ?>;

            flatpickr("#fecha", {
                disable: citasOcupadas.map(cita => cita.split(' ')[0]),
                locale: { firstDayOfWeek: 1 },
                onDayCreate: function (dObj, dStr, fp, dayElem) {
                    if (citasOcupadas.some(cita => cita.split(' ')[0] === dayElem.dateObj.toISOString().split('T')[0])) {
                        dayElem.classList.add("disabled");
                    } else {
                        dayElem.classList.add("available");
                    }
                }
            });

            flatpickr(".flatpickr-time", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "h:i K",
                time_24hr: false,
                minuteIncrement: 30 // Incremento de 30 minutos
            });
        });
    </script>

</body>

</html>
