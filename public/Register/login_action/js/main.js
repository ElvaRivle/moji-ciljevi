function validate_uname(input) {
    let errorDiv = document.getElementById("error-handle");
    if (input.value.length < 4) {
        errorDiv.innerHTML = "Korisničko ime mora imati minimum 4 slova";
        return;
    }
    else errorDiv.innerHTML = "";
}