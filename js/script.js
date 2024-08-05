document.addEventListener('DOMContentLoaded', function () {
    const loginButton = document.getElementById('loginButton');
    const logoutButton=document.getElementById('logoutButton');
    const loginModal = document.getElementById('loginModal');
    const closeButtons = document.getElementsByClassName('close');
    const addFacultyButton = document.getElementById('addFacultyButton');
    const addFacultyModal = document.getElementById('addFacultyModal');
    const adminSection = document.getElementById('adminSection');
    const loginSection =document.getElementById('login');
    const logoutSection =document.getElementById('logout');

    // Login button event
    loginButton.onclick = function () {
        
            loginModal.style.display = 'block';    
        
        
    }
    
    logoutButton.onclick = function () {
        
            location.reload();
        
    }

    // Add Faculty button event
    addFacultyButton.onclick = function () {
        addFacultyModal.style.display = 'block';
    }

    // Close modal event
    for (let i = 0; i < closeButtons.length; i++) {
        closeButtons[i].onclick = function () {
            loginModal.style.display = 'none';
            addFacultyModal.style.display = 'none';
        }
    }

    // Close modal if clicked outside
    window.onclick = function (event) {
        if (event.target == loginModal) {
            loginModal.style.display = 'none';
        }
        if (event.target == addFacultyModal) {
            addFacultyModal.style.display = 'none';
        }
    }

    // Handle login form submission
    document.getElementById('loginForm').onsubmit = function (event) {
        event.preventDefault();
        const formData = new FormData(this);
        fetch('/api/login.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                adminSection.style.display = 'block';
                loginModal.style.display = 'none';
                loginSection.style.display='none';
                logoutSection.style.display='flex';
                
            } else {
                alert('Login failed: ' + data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    }

    // Handle add faculty form submission
    document.getElementById('addFacultyForm').onsubmit = function (event) {
        event.preventDefault();
        const formData = new FormData(this);
        fetch('/api/add_faculty.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Faculty added successfully');
                
                addFacultyModal.style.display = 'none';
                
            } else {
                alert('Failed to add faculty: ' + data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    }

    
});
