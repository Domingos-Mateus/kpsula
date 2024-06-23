// script.js

document.addEventListener('DOMContentLoaded', () => {
    // Funcionalidade para a avaliação com estrelas
    const ratingContainer = document.getElementById('rating');
    const stars = 5; // Número de estrelas
    for (let i = 1; i <= stars; i++) {
        const star = document.createElement('span');
        star.textContent = '★';
        star.dataset.value = i;
        star.addEventListener('click', () => {
            setRating(i);
        });
        ratingContainer.appendChild(star);
    }

    function setRating(value) {
        const allStars = document.querySelectorAll('.rating span');
        allStars.forEach(star => {
            star.classList.remove('active');
            if (star.dataset.value <= value) {
                star.classList.add('active');
            }
        });
    }

    // Funcionalidade para a navegação entre módulos
    const modules = document.querySelectorAll('.modules-list li');
    modules.forEach(module => {
        module.addEventListener('click', () => {
            alert(`Carregar vídeo para: ${module.textContent}`);
        });
    });

    // Alternar visibilidade dos módulos
    const toggleModulesButton = document.querySelector('.toggle-modules');
    const sidebar = document.querySelector('.sidebar');
    toggleModulesButton.addEventListener('click', () => {
        sidebar.classList.toggle('active');
    });
});
document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.createElement('button');
    toggleButton.textContent = 'Alternar Modo';
    toggleButton.style.position = 'fixed';
    toggleButton.style.top = '10px';
    toggleButton.style.right = '10px';
    toggleButton.style.padding = '10px';
    toggleButton.style.zIndex = '1000';

    document.body.appendChild(toggleButton);

    toggleButton.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        document.querySelector('.navbar').classList.toggle('dark-mode');
        document.querySelector('.main-content').classList.toggle('dark-mode');
        document.querySelector('.sidebar').classList.toggle('dark-mode');
        // Adicione aqui outros elementos que precisam ser alternados
    });
});

