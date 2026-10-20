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
