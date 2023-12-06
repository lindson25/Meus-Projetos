//Validar o formulário
function validarFormulario() {
    var nomeMatricula = document.getElementById("nomeMatricula").value;
    var email = document.getElementById("email").value;
    var problema = document.getElementById("problema").value;
    var localizacao = document.getElementById("localizacao").value;
    var foto = document.getElementById("imagem").value;

    //Caracteres permitidos no 1º input
    var nomeMatriculaRegex = /^[A-Za-zÀ-ÖØ-öø-ÿ ]+[0-9]+$/;

    // Validar email
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    //Verificar caracteres
    if (!nomeMatriculaRegex.test(nomeMatricula)) {
        alert("Nome e Matrícula devem conter apenas letras e números.");
        return false;
    }

    if (!emailRegex.test(email)) {
        alert("Digite um endereço de e-mail válido.");
        return false;
    }

    if (problema.trim() === "") {
        alert("Descreva o problema.");
        return false;
    }

    if (localizacao.trim() === "") {
        alert("Digite a localização com precisão.");
        return false;
    }

    if (imagem.trim() === "") {
        alert("Selecione uma imagem.");
        return false;
    }

    window.location.href = "pag02.html";

    return true;
}

//Adicionar olho no campo de senha (Tela de login)
function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var eyeIcon = document.getElementById("show-password").firstElementChild;

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.remove("bi-eye");
        eyeIcon.classList.add("bi-eye-slash");
    } else {
        passwordInput.type = "password";
        eyeIcon.classList.remove("bi-eye-slash");
        eyeIcon.classList.add("bi-eye");
    }
}

//Verifica se os campos foram preenchidos e verifica login e senha. (Tela de login)
function validateForm() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var errorMessageElement = document.getElementById("error-message");

    if (username === "" || password === "") {
        alert("Por favor, preencha todos os campos.");
        return false;
    }

    if (username === "admin" && password === "admin") {
        return true;

    } else {
        errorMessageElement.textContent = "Usuário ou senha inválido.";
        return false;
    }
}