function ToggleDropdown()
{
    document.getElementById("NavDropdown").classList.toggle("show-dropdown");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
    if (!e.target.matches('.dropbtn')) {
      var myDropdown = document.getElementById("NavDropdown");
        if (myDropdown.classList.contains('show-dropdown')) {
          myDropdown.classList.remove('show-dropdown');
        }
    }
}