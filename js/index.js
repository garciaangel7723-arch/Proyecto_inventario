//seleccionar el booton y la navegacion por sus ids y agregarle el evento click para que se muestre o no la navegacion
const toggleMenu = document.getElementById("header-menu-toggle");
const headerNav = document.getElementById("header__nav");

//cuando se hace click en el boton se muestra el menu
toggleMenu.addEventListener("click", () => {
  //quitar o poner la clase is-active
  headerNav.classList.toggle("header__nav--active");
});

//barra de progreso
const progressBars = document.querySelectorAll(".monitoring__bar");

progressBars.forEach((bar) => {
  bar.addEventListener("click", () => {
    const progressBar = bar.parentElement.querySelector(
      ".monitoring__bar--level-1",
    );
    progressBar.style.width = "55%";
  });
});

// grafico de inventario
const grafico = document.getElementById("graficoinventario").getContext("2d");
new Chart(grafico, {
  type: "doughnut",
  data: {
    labels: ["En Stock", "Stock Bajo", "Stock Agotado"],
    datasets: [
      {
        //aqui agregar los datos de inventario en stock y stock bajo y stock agotado en el array data
        data: [80, 32, 12],
        backgroundColor: ["#16805b", "#c26a14", "#c2413a"],
      },
    ],
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: "top",
      },
      title: {
        display: true,
        text: "Inventario",
      },
    },
  },
});
