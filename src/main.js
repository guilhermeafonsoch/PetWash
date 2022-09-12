//colocando as mensagens dos formularios
function criaMsgFormulario(elemFormulario, type, msg) {
    const msgElem = elemFormulario.querySelector(".msgFormulario");

    msgElem.textContent = msg;
    msgElem.classList.remove("msgFormularioSuccess", "msgFormularioError");
    msgElem.classList.add(`msgFormulario--${type}`);
}

function erroDeInput(elemImput, msg) {
    elemImput.classList.add("inputErrorFormulario");
    elemImput.parentElement.querySelector(".inputFormularioErrorMsg").textContent = msg;
}

function limpaErro(elemImput) {
    elemImput.classList.remove("inputErrorFormulario");
    elemImput.parentElement.querySelector(".inputFormularioErrorMsg").textContent = "";
}

// pegandos as informacoes dos formularios de login e criar conta
document.addEventListener("DOMContentLoaded", () => {
    const formularioLogin = document.querySelector("#login");
    const formularioCadastro = document.querySelector("#cadastro");

    //tirando o formulario de login e colocando de cadastro
    // document.querySelector("#linkCadastro").addEventListener("click", e => {
    //     e.preventDefault();
    //     formularioLogin.classList.add("formularioCadastro");
    //     formularioCadastro.classList.remove("formularioCadastro");
    // });

    //tirando o formulario de cadastro e colocando de login
    // document.querySelector("#linkLogin").addEventListener("click", e => {
    //     e.preventDefault();
    //     formularioLogin.classList.remove("formularioCadastro");
    //     formularioCadastro.classList.add("formularioCadastro");
    // });

    //erro de login
    formularioLogin.addEventListener("submit", e => {
        e.preventDefault();
        criaMsgFormulario(formularioLogin, "error", "E-mail ou senha inválidos");
    });

    //erro
//     document.querySelectorAll(".inputFormulario").forEach(elemImput => {
//         elemImput.addEventListener("blur", e => {
//             if (e.target.id === "cadastroUsuario" && e.target.value.length > 0 && e.target.value.length < 10) {
//                 erroDeInput(elemImput, "Nome de Usuario deve conter mais de 10 letras");
//             }
//         });

//         elemImput.addEventListener("input", e => {
//             limpaErro(elemImput);
//         });
//     });
});