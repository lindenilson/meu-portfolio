let showingAll = false;
const projectsContainer = document.getElementById("projects-container");
const toggleButton = document.getElementById("toggleButton");

function toggleProjects() {
    const additionalProjects = projectsContainer.querySelectorAll(".additional-project");

    if (showingAll) {
        // Oculta os projetos adicionais
        additionalProjects.forEach(project => project.classList.add("hidden"));
        toggleButton.textContent = "Ver Todos";
    } else {
        // Exibe os projetos adicionais
        additionalProjects.forEach(project => project.classList.remove("hidden"));
        toggleButton.textContent = "Ver Menos";
    }

    showingAll = !showingAll;
}


//FUNÇÃO MENU MOBILE

let btnAbrir = document.getElementById ('btn-abrir')
let btnFechar = document.getElementById ('btn-fechar')
let menu = document.getElementById ('menu-mobile')
let orvelay = document.getElementById ('orvelay-menu')

btnAbrir.addEventListener('click', ()=> {
    menu.classList.add('abrir-menu')
})

btnFechar.addEventListener('click', ()=> {
    menu.classList.remove('abrir-menu')
})

orvelay.addEventListener('click', ()=> {
    menu.classList.remove('abrir-menu')
})


const menuLinks = document.querySelectorAll('.menu-link');
const menuMobile = document.getElementById('menu-mobile');

  // Fecha o menu ao clicar em um link
  menuLinks.forEach((link) => {
    link.addEventListener('click', () => {
      menuMobile.classList.remove('abrir-menu');
    });
  });
