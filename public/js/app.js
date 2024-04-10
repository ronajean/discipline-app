async function searchStudents() {
    const searchQuery = document.getElementById("searchInput").value;
    const response = await fetch(`/students/search?query=${encodeURIComponent(searchQuery)}`);
    const data = await response.json();
    // Call function to update the aside element with the fetched student records
    updateAside(data);
}

function updateAside(students) {
    const asideElement = document.querySelector('.col-span-5 .aside-student-records');
    asideElement.innerHTML = ''; // Clear previous content
    students.forEach(student => {
        asideElement.innerHTML += `
            <div>
                <p>${students.student_id}</p>
                <p>${students.last_name}</p>
                <p>${students.first_name}</p>
                <p>${students.course_id}</p>
                <p>${students.plm_email}</p>
                <!-- Add more fields as needed -->
            </div>
        `;
    });
}
