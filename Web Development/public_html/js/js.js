/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */

function searchBarValidation(event) {
    event.preventDefault(); // Prevent form submission if validation fails

    var searchBar = document.getElementById("searchBar");

    if (searchBar.value === "") {
        searchBar.style.color = "black";
        searchBar.placeholder = "Please enter a room name";
        searchBar.setAttribute("data-placeholder-color", "red");
        searchBar.focus();
    } else {
        // Validation passed, perform further actions or submit the form
        searchBar.style.color = "grey";
        searchBar.placeholder = "Search rooms";
        searchBar.removeAttribute("data-placeholder-color");
        // Perform your desired actions here, such as submitting the form or executing a search
        // For example: document.forms[0].submit();
    }
}

function validatePass() {
    var newPassword = document.getElementById('newPassword').value;
    var confirmPassword = document.getElementById('confirmPassword').value;
    var regularExpression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;





    if (newPassword != confirmPassword) {
        alert('New password and confirm password do not match.');
        return false; // Prevent form submission
    }

    if (!regularExpression.test(newPassword)) {
        alert("password should contain atleast 6 character with one number and one special character");
        return false;
    }

    return true; // Allow form submission
}