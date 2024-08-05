<?php include 'includes/header.php'; ?>
<main>
    <div style="display:flex;justify-content:end;" id="login">
    <button id="loginButton">Admin Login</button>
    </div>
    
    <div id="logout" style="display:none;justify-content:end;">
        <button id="logoutButton">Logout</button>
    </div>
    <div>
        <h2 style="text-align:center">Faculty Information</h2>
        <hr></hr>
    <button id="facultyInfoButton" onclick="window.location.href='faculty.php'">Faculty Info</button>
    </div>
    <div id="adminSection" style="display:none;">
        <h2 style="text-align:center">Add New Faculty</h2>
        <hr></hr>
        <button id="addFacultyButton">Add Faculty</button>
    </div>
</main>
<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Admin Login</h2>
        <form id="loginForm">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</div>
<div id="addFacultyModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Add Faculty</h2>
        <form id="addFacultyForm" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone">
            <label for="department">Department:</label>
            <input type="text" id="department" name="department">
            <label for="designation">Designation:</label>
            <input type="text" id="designation" name="designation">
            <label for="bio">Bio:</label>
            <textarea id="bio" name="bio"></textarea>
            <label for="cv_file">CV:</label>
            <input type="file" id="cv_file" name="cv_file">
            <label for="profile_pic">Profile Picture:</label>
            <input type="file" id="profile_pic" name="profile_pic">
            <label for="date_of_joining">Date of Joining:</label>
            <input type="date" id="date_of_joining" name="date_of_joining">
            <button type="submit">Add Faculty</button>
        </form>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
<script src="js/script.js"></script>

