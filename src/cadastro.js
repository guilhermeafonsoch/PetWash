formCadastro.onsubmit = async (e) => {
    e.preventDefault();
  
    let response = await fetch('php/cadastro.php', {
      method: 'POST',
      body: new FormData(formCadastro)
    });
    
    let result = await response.json();
  
    document.getElementById('retorno').innerHTML = "Retorno:" + result.Mensagem;
  };