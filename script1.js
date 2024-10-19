// Get the modal
const modal = document.getElementById("modal");
const openModalButton = document.getElementById("open-modal");
const closeModalButton = document.getElementById("close-modal");

// When the user clicks the button, open the modal
openModalButton.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
closeModalButton.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
}

// Form validation
document.getElementById("registration-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the default form submission

    const selectedSubjects = Array.from(document.querySelectorAll('input[name="subjects"]:checked'));
    const selectedLabSubjects = Array.from(document.querySelectorAll('input[name="lab-subjects"]:checked'));

    if (selectedSubjects.length !== 4) {
        alert("Please select exactly 4 subjects.");
        return;
    }

    if (selectedLabSubjects.length !== 2) {
        alert("Please select exactly 2 lab subjects.");
        return;
    }

    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());
    console.log("Form Data:", data);

    // Close the modal and show a success message
    alert("Registration successful!");
    modal.style.display = "none";
});
