document.addEventListener("DOMContentLoaded", function () {
  eventListeners();
  // darkMode();
});

/* Función para el Dark Mode */
function darkMode() {
  const prefiereDarkMode = window.matchMedia("(prefers-color-scheme: dark)");

  if (prefiereDarkMode.matches) {
    document.body.classList.add("dark-mode");
  } else {
    document.body.classList.remove("dark-mode");
  }

  prefiereDarkMode.addEventListener("change", function () {
    if (prefiereDarkMode.matches) {
      document.body.classList.add("dark-mode");
    } else {
      document.body.classList.remove("dark-mode");
    }
  });

  const botonDarkMode = document.querySelector(".dark-mode-boton");
  botonDarkMode.addEventListener("click", function () {
    document.body.classList.toggle("dark-mode");
  });
}

/* Función para el menú de hamburguesa */
function eventListeners() {
  const mobileMenu = document.querySelector(".mobile-menu");

  mobileMenu.addEventListener("click", navegacionResponsive);

  // Mostar campos condicionales
  const metodoContacto = document.querySelectorAll(
    'input[name="contacto[contacto]"]'
  );

  metodoContacto.forEach((input) =>
    input.addEventListener("click", mostarMetodosContacto)
  );
}

/* Función para la navegación responsiva */
function navegacionResponsive() {
  const navegacion = document.querySelector(".navegacion");

  if (navegacion.classList.contains("mostrar")) {
    navegacion.classList.remove("mostrar");
  } else {
    navegacion.classList.add("mostrar");
  }
}

/* Función para seleccionar el método de contacto */

function mostarMetodosContacto(e) {
  const contactoDiv = document.querySelector("#contacto");

  if (e.target.value === "telefono") {
    contactoDiv.innerHTML = `
        <label class="requerido" for="telefono">Número de teléfono:</label>
        <input type="tel" placeholder="12345678900" id="telefono" name="contacto[telefono]" required/>
    
        <p>Eliga fecha y hora para ser contactado para la llamada</p>

        <label class="requerido" for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="contacto[fecha]"/>

        <label for="hora">hora:</label>
        <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]" />
        `;
  } else {
    contactoDiv.innerHTML = `
        <label class="requerido" for="email">E-mail:</label>
        <input type="email" placeholder="correo@correo.com" id="email" name="contacto[email]" required/>`;
  }
}
