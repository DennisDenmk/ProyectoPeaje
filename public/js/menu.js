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