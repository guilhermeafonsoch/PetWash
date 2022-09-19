var cadastro = document.getElementById('cadastro');
cadastro.onclick = async (e) => {
    e.preventDefault();
    var senha = document.getElementById('senhaUsuario').value;
    var confirma_senha = document.getElementById('confirmaSenhaUsuario').value;
    if(senha != "" && confirma_senha != ""){
        if (senha == confirma_senha) {
            alert("Senhas iguais");
        } else {
            alert("Senhas diferentes");
        }
    }
}