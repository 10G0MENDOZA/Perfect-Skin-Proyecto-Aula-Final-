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
        /* Estilos CSS para las horas */
        .hora {
            background-color: #28a745; /* Verde por defecto */
            color: white;
            padding: 10px;
            margin: 5px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .hora.disponible {
            background-color: #28a745; /* Verde para horas disponibles */
        }

        .hora.reservada {
            background-color: #dc3545; /* Rojo para horas reservadas */
            cursor: not-allowed;
        }

        .hora:disabled {
            background-color: #dc3545; /* Rojo cuando está deshabilitado */
            cursor: not-allowed;
        }

        .horas-disponibles {
            display: none;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .horas-disponibles.show {
            display: block;
            opacity: 1;
        }
    </style>
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

    $result = $conexion->query("SELECT fecha, hora, servicio FROM citas_agendadas");
    $citasOcupadas = [];
    while ($row = $result->fetch_assoc()) {
        $citasOcupadas[] = [
            'fecha' => $row['fecha'],
            'hora' => $row['hora'],
            'servicio' => $row['servicio']
        ];
    }
    
    // Cerrar la conexión a la base de datos
    $conexion->close();

    // Obtener el servicio seleccionado desde la URL
    $servicioSeleccionado = isset($_GET['servicio']) ? $_GET['servicio'] : 'No se ha seleccionado servicio';
    $precioSeleccionado = isset($_GET['precio']) ? $_GET['precio'] : 0; // Añadir precio
    ?>

    <form method="post" id="reservaForm" class="mx-auto" action="guardar_citas.php">
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
            <div id="horasDisponibles" class="horas-disponibles">
                <h5>Selecciona una hora:</h5>
                <div class="hora-opciones">
                    <button type="button" class="hora" value="08:00 AM">08:00 AM</button>
                    <button type="button" class="hora" value="09:00 AM">09:00 AM</button>
                    <button type="button" class="hora" value="10:00 AM">10:00 AM</button>
                    <button type="button" class="hora" value="11:00 AM">11:00 AM</button>
                    <button type="button" class="hora" value="02:00 PM">02:00 PM</button>
                    <button type="button" class="hora" value="03:00 PM">03:00 PM</button>
                    <button type="button" class="hora" value="04:00 PM">04:00 PM</button>
                    <button type="button" class="hora" value="05:00 PM">05:00 PM</button>
                    <button type="button" class="hora" value="06:00 PM">06:00 PM</button>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="hora" class="form-label">Hora Seleccionada:</label>
            <input type="text" id="hora" name="hora" class="form-control" readonly>
        </div>
        
        <div class="mb-3">
            <label for="precio" class="form-label">Precio:</label>
            <input type="number" id="precio" name="precio" class="form-control" value="<?php echo htmlspecialchars($precioSeleccionado); ?>" readonly>
        </div>

        <div class="mb-3">
            <label for="servicio" class="form-label">Servicio Seleccionado:</label>
            <input type="text" id="servicio" name="servicio" class="form-control" value="<?php echo htmlspecialchars($servicioSeleccionado); ?>" readonly>
        </div>

        <input type="submit" class="btn boton-reserva" value="Pagar">
    </form>
</section>

<!-- Scripts para manejar la selección de horas -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const horasDiv = document.getElementById('horasDisponibles');
    const fechaInput = document.getElementById('fecha');
    const horaInput = document.getElementById('hora');
    const horasButtons = document.querySelectorAll('.hora');
    
    // Obtener el servicio seleccionado desde el campo oculto (PHP)
    const servicioSeleccionado = "<?php echo htmlspecialchars($servicioSeleccionado); ?>";

    // Días festivos que no se trabajan
    const diasFestivos = [
        "2024-01-01", // Año Nuevo
        "2024-12-25", // Navidad
        // Agrega más días festivos en el formato "YYYY-MM-DD"
    ];

    // Obtener las citas ocupadas desde PHP
    const citasOcupadas = <?php echo json_encode($citasOcupadas); ?>;

    // Función para convertir la hora de los botones al formato 24 horas (HH:MM:SS)
    function convertirHoraFormato(hora) {
        let [h, m, ampm] = hora.split(/[: ]/); // Separar horas, minutos y AM/PM
        if (ampm === "PM" && h !== "12") h = (parseInt(h, 10) + 12).toString(); // Convertir PM a formato 24 horas
        if (ampm === "AM" && h === "12") h = "00"; // Manejar el caso de medianoche
        return `${h.padStart(2, '0')}:${m}:00`; // Retornar en formato HH:MM:SS
    }

    // Inicializar el calendario de Flatpickr con deshabilitación de domingos y festivos
    flatpickr(fechaInput, {
        disable: [
            function (date) {
                // Deshabilitar domingos y festivos
                return (date.getDay() === 0 || diasFestivos.includes(date.toISOString().split('T')[0]));
            }
        ],
        locale: {
            firstDayOfWeek: 1 // Semana comienza en lunes
        },
        onChange: function(selectedDates) {
            if (selectedDates.length > 0) {
                const selectedDate = selectedDates[0].toISOString().split('T')[0]; // Formato "YYYY-MM-DD"

                // Filtrar las citas ocupadas para la fecha y servicio seleccionado
                const citasDelDia = citasOcupadas.filter(cita => 
                    cita.fecha === selectedDate && cita.servicio === servicioSeleccionado);

                // Mostrar las horas disponibles
                horasDiv.style.display = "block";
                horasDiv.style.opacity = 0;
                setTimeout(() => {
                    horasDiv.style.opacity = 1;
                }, 100);

                // Verificar qué horas están ocupadas y cuáles están disponibles
                horasButtons.forEach(button => {
                    const horaBoton = convertirHoraFormato(button.value); // Convertir la hora del botón
                    const estaOcupada = citasDelDia.some(cita => cita.hora === horaBoton);

                    if (estaOcupada) {
                        button.classList.remove('disponible');
                        button.classList.add('reservada');
                        button.disabled = true; // Deshabilitar botón si la hora está ocupada
                    } else {
                        button.classList.remove('reservada');
                        button.classList.add('disponible');
                        button.disabled = false; // Habilitar botón si la hora está disponible
                    }
                });
            }
        }
    });

    // Añadir evento a los botones de hora para seleccionar la hora
    horasButtons.forEach(button => {
        button.addEventListener('click', function () {
            const horaEnFormato24 = convertirHoraFormato(this.value); // Convertir a formato 24 horas
            horaInput.value = horaEnFormato24; // Establecer la hora convertida
            horasDiv.style.display = 'none'; // Ocultar las horas después de seleccionar
        });
    });
});
</script>

</body>
</html>
