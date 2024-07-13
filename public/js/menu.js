document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.info-link');
    const descriptions = document.querySelectorAll('.description');
    const addVehicleBtn = document.getElementById('addVehicleBtn');
    const vehicleRegistrationForm = document.querySelector('.vehicle-registration');

    links.forEach(link => {
        link.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const targetElement = document.getElementById(targetId);

            descriptions.forEach(description => {
                if (description !== targetElement) {
                    description.style.display = 'none';
                }
            });

            if (targetElement.style.display === "block") {
                targetElement.style.display = "none";
            } else {
                targetElement.style.display = "block";
            }
        });
    });

    addVehicleBtn.addEventListener('click', function() {
        if (vehicleRegistrationForm.style.display === "block") {
            vehicleRegistrationForm.style.display = "none";
        } else {
            vehicleRegistrationForm.style.display = "block";
        }
    });
});
