document.getElementById('cep').addEventListener('blur', async function () {
    const cep = this.value;

    try {
        let endereco = await obterEndereco(cep);
        alert(endereco);
    } catch (error) {
        alert('CEP não encontrado');
    }
});

// Função para obter o endereço usando a API ViaCEP
async function obterEndereco(cep) {
    let response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);

    if (!response.ok) {
        throw new Error('Erro na requisição');
    }

    let data = await response.json();
    return `CEP: ${data.cep}\nLogradouro: ${data.logradouro}\nBairro: ${data.bairro}\nLocalidade: ${data.localidade}\nUF: ${data.uf}`;
}
