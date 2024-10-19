// Courses
function showOverview(overviewId) {
    // Hide all course overviews first
    var overviews = document.querySelectorAll('.course-overview');
    overviews.forEach(function(overview) {
        overview.style.display = 'none';
    });

    // Show the selected course overview
    document.getElementById(overviewId).style.display = 'block';
}
window.onload = function() {
    showOverview('cse-overview');
}
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

    // Add code here to send data to a server or further process it
    alert("Registration successful!");
});
