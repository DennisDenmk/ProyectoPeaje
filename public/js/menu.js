document.querySelectorAll('.info-link').forEach(function(element) {
    element.addEventListener('click', function() {
        var targetId = this.getAttribute('data-target');
        var targetElement = document.getElementById(targetId);
        
        document.querySelectorAll('.description').forEach(function(desc) {
            if (desc !== targetElement) {
                desc.style.display = 'none';
            }
        });

        if (targetElement.style.display === "block") {
            targetElement.style.display = "none";
        } else {
            targetElement.style.display = "block";
        }
    });
});

window.onclick = function(event) {
    if (!event.target.matches('.info-link')) {
        document.querySelectorAll('.description').forEach(function(desc) {
            desc.style.display = 'none';
        });
    }
}