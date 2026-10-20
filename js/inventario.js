let offset = 0;
const limit = 30;

const lista = document.getElementById("lista-elementos");
const btncargar = document.getElementById("btn-cargar");

//funcion principal
async function cargar_elementos() {
  try {
    const datosPOST = new FormData();
    datosPOST.append("offset", offset);

    const respuesta = await fetch("procesamiento_php/lista.php", {
      method: "POST",
      body: datosPOST,
    });

    const datos = await respuesta.json();

    if (datos.error) {
      console.log("Error del servidor", datos.error);
      return;
    }

    if (datos.length > 0) {
      datos.forEach((item) => {
        const li = document.createElement("li");
        li.className =
          "list-group-item d-flex justify-content-between align-items-start";

        const divlista_texto = document.createElement("div");
        divlista_texto.className = "ms-2 me-auto";

        const divlista_titulo = document.createElement("div");
        divlista_titulo.className = "fw-bold";
        divlista_titulo.textContent = `${item.nombre}`;

        divlista_texto.append(divlista_titulo, item.descripcion);

        li.append(divlista_texto);
        lista.appendChild(li);
      });

      offset += limit;

      if (datos.length < limit) {
        btncargar.style.display = "none";
      } else {
        btncargar.style.display = "block";
      }
    }
  } catch (error) {
    console.error("Error de conexion: ", error);
  }
}

cargar_elementos();
btncargar.addEventListener("click", cargar_elementos);

const modal = document.getElementById("miModal");
const btnCrearProducto = document.getElementById("btn-crear-producto");
const btnCancelar = document.getElementById("btnCancelar");
const btnGuardar = document.getElementById("btn-guardar");
btnCrearProducto.addEventListener("click", () => {
  modal.showModal();
});
btnCancelar.addEventListener("click", () => {
  modal.close();
});

// lista de categorias
document.addEventListener("DOMContentLoaded", () => {
  //iniciar la busqueda de categorias
  document.querySelectorAll(".select__busqueda").forEach((elemento) => {
    const inputTexto = elemento.querySelector(".select__input");
    const inputHidden = elemento.querySelector(".select__value");
    const lista = elemento.querySelector(".select__opciones");
    const opciones = lista.querySelectorAll("li");

    // 1. Mostrar la lista al hacer clic o dar foco al input
    inputTexto.addEventListener("focus", () => {
      lista.style.display = "block";
    });

    // 2. Filtrar las opciones en tiempo real mientras el usuario escribe
    inputTexto.addEventListener("input", () => {
      const filtro = inputTexto.value.toLowerCase().trim();
      lista.style.display = "block";

      opciones.forEach((opcion) => {
        const texto = opcion.textContent.toLowerCase();
        if (texto.includes(filtro)) {
          opcion.style.display = "block";
        } else {
          opcion.style.display = "none";
        }
      });
    });

    // 3. Seleccionar una opción al hacer clic sobre ella
    opciones.forEach(opcion => {
      opcion.addEventListener("click", () => {
        //asignar texto al inputTexto visible
        inputTexto.value = opcion.textContent.trim();
        //asignar id al inputHidden
        inputHidden.value = opcion.dataset.id;
        //cerrar la lista flotante
        lista.style.display = "none";
      });
    });

  });
});
