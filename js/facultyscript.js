document.addEventListener('DOMContentLoaded', function () {
  
  
      // Fetch and display faculty data
    if (document.getElementById('facultyTableBody')) {
        fetch('/api/get_faculty.php')
        .then(response => response.json())
        .then(data => {
            console.log(data);
            const tbody = document.getElementById('facultyTableBody');
            data.forEach(faculty => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${faculty.name}</td>
                    <td>${faculty.email}</td>
                    <td>${faculty.phone}</td>
                    <td>${faculty.department}</td>
                    <td>${faculty.designation}</td>
                    <td><a href="${faculty.cv_file}" target="_blank">View CV</a> | <a href="${faculty.cv_file}" download>Download CV</a></td>
                    <td><img src="${faculty.profile_pic}" alt="Profile Picture" width="50"></td>
                `;
                tbody.appendChild(tr);
            });
        })
        .catch(error => console.error('Error:', error));
    }
});
