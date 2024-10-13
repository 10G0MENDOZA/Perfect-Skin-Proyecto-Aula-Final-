<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agendar Citas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/LOGO.jpeg">
    <link rel="stylesheet" href="css/agendar_citas.css">
    
    <!-- Librería para Flatpickr (calendario personalizado) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>

<body>

    <section class="citas mt-5">
        <h2>Reservar Cita</h2>
        <p>Selecciona una fecha y horario para tu cita:</p>

        <?php
        // Conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "perfect_skin";
        $port = "3306";

        $conexion = new mysqli($servername, $username, $password, $dbname, $port);

        // Verificar si la conexión fue exitosa
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Consulta para obtener las fechas y horas ya agendadas (ocupadas)
        $result = $conexion->query("SELECT fecha, hora FROM citas_agendadas");

        $citasOcupadas = [];
        while ($row = $result->fetch_assoc()) {
            $citasOcupadas[] = $row['fecha'] . ' ' . $row['hora']; // Combinar fecha y hora
        }

        // Cerrar la conexión a la base de datos
        $conexion->close();

        // Obtener el servicio seleccionado desde la URL
        $servicioSeleccionado = isset($_GET['servicio']) ? $_GET['servicio'] : 'No se ha seleccionado servicio';
        ?>

        <form method="post" id="reservaForm" class="mx-auto" action="guardar_citas.php">
            
            <!-- Campo para ingresar la cédula -->
            <div class="mb-3">
                <label for="cedula" class="form-label">Cédula:</label>
                <input type="text" id="cedula" name="cedula" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="correo" class="form-label">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="date" id="fecha" name="fecha" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="hora" class="form-label">Hora:</label>
                <input type="text" id="hora" name="hora" class="form-control flatpickr-time" required>
            </div>

            <!-- Mostrar el servicio seleccionado sin permitir cambios -->
            <div class="mb-3">
                <label for="servicio" class="form-label">Servicio Seleccionado:</label>
                <input type="text" id="servicio" name="servicio" class="form-control" value="<?php echo $servicioSeleccionado; ?>" readonly>
            </div>

            <input type="submit" class="btn boton-reserva" value="Reservar">
        </form>
    </section>

    <footer class="text-center py-4">
        <p>&copy; 2024 Perfect Skin</p>
    </footer>

    <!-- Scripts para validaciones y Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // Validar que en el campo Cédula solo se puedan ingresar números
        document.getElementById('cedula').addEventListener('input', function (e) {
            this.value = this.value.replace(/\D/g, ''); // Reemplaza cualquier carácter no numérico
        });

        // Inicializar el calendario de Flatpickr con las fechas ocupadas desde la base de datos
        document.addEventListener('DOMContentLoaded', function () {
            let citasOcupadas = <?php echo json_encode($citasOcupadas); ?>;

            flatpickr("#fecha", {
                disable: citasOcupadas.map(cita => cita.split(' ')[0]), // Deshabilita las fechas ocupadas
                locale: {
                    firstDayOfWeek: 1 // Iniciar semana en lunes
                },
                onDayCreate: function (dObj, dStr, fp, dayElem) {
                    // Verificar si la fecha es una de las ocupadas o disponibles
                    if (citasOcupadas.some(cita => cita.split(' ')[0] === dayElem.dateObj.toISOString().split('T')[0])) {
                        dayElem.classList.add("disabled");
                    } else {
                        dayElem.classList.add("available");
                    }
                }
            });

            // Inicializar la selección de hora con Flatpickr para el campo de hora con AM/PM
            flatpickr(".flatpickr-time", {
                enableTime: true, // Habilita la selección de tiempo
                noCalendar: true, // No muestra el calendario
                dateFormat: "h:i K", // Formato de 12 horas con AM/PM
                time_24hr: false // Usa formato de 12 horas con AM/PM
            });
        });
    </script>
</body>

</html>
