<<<<<<< HEAD
document.addEventListener('DOMContentLoaded', function() {
    document.addEventListener('click', function(event) {
        var isInfoLink = event.target.matches('.info-link');
        var isDescription = event.target.closest('.description');

        // Verificar si el elemento clicado es un enlace de información
        if (isInfoLink) {
            var targetId = event.target.getAttribute('data-target');
            var targetElement = document.getElementById(targetId);
            
            // Ocultar todas las descripciones excepto la seleccionada
            document.querySelectorAll('.description').forEach(function(desc) {
                if (desc !== targetElement) {
                    desc.style.display = 'none';
                }
            });

            // Alternar la visualización del elemento objetivo
            if (targetElement.style.display === "block") {
                targetElement.style.display = "none";
            } else {
                targetElement.style.display = "block";
            }
        } else if (!isDescription) {
            // Si se hace clic fuera de un enlace de información y descripción, no hacer nada
        }
    });
});
=======
// public/js/menu.js
document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.info-link');
    const descriptions = document.querySelectorAll('.description');

    // Función para mostrar una descripción específica y ocultar las demás
    function showDescription(targetId) {
        descriptions.forEach(description => {
            if (description.id === targetId) {
                description.style.display = 'block';
            } else {
                description.style.display = 'none';
            }
        });
    }

    // Manejar clics en los enlaces de navegación
    links.forEach(link => {
        link.addEventListener('click', function(event) {
            const targetId = this.getAttribute('data-target');
            showDescription(targetId);
            event.preventDefault();
            event.stopPropagation();
        });
    });

    // Prevenir que los clics dentro de una descripción cierren la sección
    descriptions.forEach(description => {
        description.addEventListener('click', function(event) {
            event.stopPropagation();
        });
    });

    // Prevenir la propagación de eventos de clic en los inputs del formulario
    document.querySelectorAll('input, button, select, textarea').forEach(element => {
        element.addEventListener('click', function(event) {
            event.stopPropagation();
        });
    });

    // Mostrar la primera descripción al cargar la página
    if (descriptions.length > 0) {
        showDescription(descriptions[0].id);
    }
});
>>>>>>> test
