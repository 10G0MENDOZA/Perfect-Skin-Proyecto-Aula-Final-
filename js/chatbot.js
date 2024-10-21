const chatInput = document.querySelector(".chat-input textarea");
const sendChatBtn = document.querySelector(".chat-input span");
const chatbox = document.querySelector(".chatbox");
const chatbotToggler = document.querySelector(".chatbot-toggler");
let userMessage;

// Respuesta al mensaje de bienvenida
const mostrarOpcionesIniciales = () => {
    limpiarChat(); // Limpiar el chat antes de mostrar las opciones iniciales
    const bienvenidaMessage = `
    ¡Bienvenido a Perfect Skin! 😊✨
    Estoy aquí para ayudarte a conocer nuestros servicios, productos y para que puedas hacer tus reservas con nosotros.
    ¿Cómo te gustaría continuar? Elige una opción:
    `;
    chatbox.appendChild(createChatLi(bienvenidaMessage, "incoming"));

    const opcionesContainer = document.createElement("div");
    opcionesContainer.classList.add("opciones-container");

    const opciones = [
        { text: "Ver Servicios 💆‍♀️", value: "servicios" },
        { text: "Ver Productos 🛍️", value: "productos" },
        { text: "Ubicación 📍", value: "ubicacion" },
        { text: "Contacto 📲", value: "contacto" },
    ];

    opciones.forEach(opcion => {
        const button = document.createElement("button");
        button.textContent = opcion.text;
        button.classList.add("opcion-btn");
        button.addEventListener("click", () => handleChatOpciones(opcion.value, opcionesContainer));
        opcionesContainer.appendChild(button);
    });

    chatbox.appendChild(opcionesContainer);
};

// Limpiar el contenido del chat
const limpiarChat = () => {
    while (chatbox.firstChild) {
        chatbox.removeChild(chatbox.firstChild);
    }
};

// Normalizar texto
const normalizarTexto = (texto) => {
    return texto
        .toLowerCase()
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "");
};

// Respuestas predefinidas
const responses = {
    "ubicacion": `
    <strong>Perfect Skin está ubicado en:</strong><br>
    Transversal 70,31A-58, Cartagena, Colombia<br><br>
    Aquí tienes el enlace en Google Maps: <br>
    <a href="https://goo.gl/maps/d5vgHsqEU8U4Fscq9" target="_blank" class="enlace">Ver en Google Maps</a>
    `,
    "contacto": `
    <strong>¡Contáctanos en nuestras redes! 📲</strong><br><br>
    - <a href="https://wa.me/+573005615455" class="enlace">Chatear en WhatsApp</a><br>
    - <a href="https://www.instagram.com/perfectskin_ctg/" class="enlace">Instagram</a><br>
    - <a href="https://www.facebook.com/profile.php?id=100064134480986&mibextid=ZbWKwL" class="enlace">Facebook</a>
    `,
    "servicios": `
    Aquí están nuestros servicios 💆‍♀️:<br>
    - Facial Clásico: $80,000 COP<br>
    - Facial Diamante: $70,000 COP<br>
    - Luminous Face: $100,000 COP<br>
    - Dermaplaning: $90,000 COP<br>
    - Masaje Relajante: $85,000 COP<br>
    ¿Te gustaría saber más sobre alguno de ellos?<br><br>
    <a href="servicios.php" class="reserva-btn">Reserva aquí</a>
    `,
    "productos": `
    Aquí están nuestros productos 🛍️:<br>
    - Protector Solar: $41,500 COP<br>
    - Antiarrugas: $80,000 COP<br>
    - Agua Micelar: $40,000 COP<br>
    - Serum Hidratante: $70,000 COP<br>
    - Gel Limpiador Facial: $35,000 COP<br>
    - Toallitas Desmaquillantes: $100,000 COP<br><br>
    ¿Te gustaría comprar alguno de ellos?
     <a href="productos.php" class="reserva-btn">Compra aqui</a>
    `,
};

// Crear el elemento de chat
const createChatLi = (message, className) => {
    const chatLi = document.createElement("li");
    chatLi.classList.add("chat", className);
    let chatContent = className === "outgoing" ? `<p>${message}</p>` : `<span class="material-symbols-outlined">smart_toy</span><p>${message}</p>`;
    chatLi.innerHTML = chatContent;
    return chatLi;
};

// Manejar opciones del chatbot
const handleChatOpciones = (opcion, opcionesContainer) => {
    let responseText = responses[opcion] || "Lo siento, no tengo información sobre esa opción.";

    // Eliminar las opciones una vez seleccionadas
    opcionesContainer.remove();

    // Mostrar la respuesta
    chatbox.appendChild(createChatLi(responseText, "incoming"));
    chatbox.scrollTo(0, chatbox.scrollHeight);

    // Mostrar el botón "Volver al Inicio"
    mostrarBotonVolverInicio();
};

// Mostrar el botón "Volver al Inicio"
const mostrarBotonVolverInicio = () => {
    const volverBtn = document.createElement("button");
    volverBtn.textContent = "Volver al Inicio";
    volverBtn.classList.add("volver-btn");
    volverBtn.addEventListener("click", mostrarOpcionesIniciales); // Muestra las opciones iniciales nuevamente
    chatbox.appendChild(volverBtn);
};

// Manejar el envío de mensajes
const handleChat = () => {
    userMessage = chatInput.value.trim();
    if (!userMessage) return;

    chatbox.appendChild(createChatLi(userMessage, "outgoing"));
    chatInput.value = "";
    chatbox.scrollTo(0, chatbox.scrollHeight);

    generarRespuesta(normalizarTexto(userMessage));
};

// Generar una respuesta basada en el mensaje del usuario
const generarRespuesta = (mensajeNormalizado) => {
    let respuesta = "Lo siento, no entiendo tu pregunta. Intenta preguntar sobre nuestros servicios, productos, ubicación o contacto.";

    if (responses[mensajeNormalizado]) {
        respuesta = responses[mensajeNormalizado];
    }

    // Mostrar la respuesta del chatbot
    setTimeout(() => {
        chatbox.appendChild(createChatLi(respuesta, "incoming"));
        chatbox.scrollTo(0, chatbox.scrollHeight);
        mostrarOpcionesNuevas(); // Muestra las opciones nuevamente
    }, 500);
};

// Mostrar opciones nuevamente después de mostrar la información
const mostrarOpcionesNuevas = () => {
    const opcionesContainer = document.createElement("div");
    opcionesContainer.classList.add("opciones-container");

    const opciones = [
        { text: "Ver Servicios 💆‍♀️", value: "servicios" },
        { text: "Ver Productos 🛍️", value: "productos" },
        { text: "Ubicación 📍", value: "ubicacion" },
        { text: "Contacto 📲", value: "contacto" },
    ];

    opciones.forEach(opcion => {
        const button = document.createElement("button");
        button.textContent = opcion.text;
        button.classList.add("opcion-btn");
        button.addEventListener("click", () => handleChatOpciones(opcion.value, opcionesContainer));
        opcionesContainer.appendChild(button);
    });

    chatbox.appendChild(opcionesContainer);
};

// Abrir o cerrar el chatbot
chatbotToggler.addEventListener("click", () => {
    document.body.classList.toggle("show-chatbot");
    if (document.body.classList.contains("show-chatbot")) {
        mostrarOpcionesIniciales();
    }
});

// Enviar el mensaje al hacer clic en el botón de enviar
sendChatBtn.addEventListener("click", handleChat);

// Enviar el mensaje al presionar la tecla "Enter"
chatInput.addEventListener("keyup", (e) => {
    if (e.key === "Enter") {
        handleChat();
    }
});
