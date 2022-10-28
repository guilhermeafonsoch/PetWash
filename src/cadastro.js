var cadastro = document.getElementById('botaoCadastro');
cadastro.onclick = async (e) => {
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