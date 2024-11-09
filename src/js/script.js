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
