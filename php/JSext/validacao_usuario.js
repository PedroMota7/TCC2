function validaCPF(cpf) {
    cpf = cpf.replace(/\D+/g, '');
    if (cpf.length !== 11 || /^(\d)\1{10}$/.test(cpf)) return false;

    let soma = 0;
    for (let i = 0; i < 9; i++) soma += parseInt(cpf.charAt(i)) * (10 - i);
    let resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) resto = 0;
    if (resto !== parseInt(cpf.charAt(9))) return false;

    soma = 0;
    for (let i = 0; i < 10; i++) soma += parseInt(cpf.charAt(i)) * (11 - i);
    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) resto = 0;
    return resto === parseInt(cpf.charAt(10));
}

function telefoneEhValido(numero) {
    const tel = numero.replace(/\D/g, '');
    const regexCelular = /^[1-9]{2}9[0-9]{8}$/;
    const regexFixo = /^[1-9]{2}[2-5][0-9]{7}$/;
    return regexCelular.test(tel) || regexFixo.test(tel);
}

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formCadastro');
    const cpfInput = document.getElementById('cpf');
    const telefoneInput = document.getElementById('telefone');

    if (!form || !cpfInput || !telefoneInput) return; // evita erro se elementos não existem

    // Máscara CPF
    cpfInput.addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, '');
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        e.target.value = value;
    });

    // Máscara telefone
    telefoneInput.addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 11) value = value.slice(0, 11);
        if (value.length > 6) {
            value = value.replace(/^(\d{2})(\d{5})(\d{0,4})/, "($1) $2-$3");
        } else if (value.length > 2) {
            value = value.replace(/^(\d{2})(\d{0,5})/, "($1) $2");
        } else {
            value = value.replace(/^(\d{0,2})/, "($1");
        }
        e.target.value = value;
    });

    // Validação no envio
    form.addEventListener('submit', function (e) {
        const cpf = cpfInput.value;
        const telefone = telefoneInput.value;

        if (!validaCPF(cpf)) {
            e.preventDefault();
            alert('CPF inválido.');
            cpfInput.focus();
            return;
        }

        if (!telefoneEhValido(telefone)) {
            e.preventDefault();
            alert('Telefone inválido. Exemplo válido: (61) 91234-5678 ou (11) 2345-6789');
            telefoneInput.focus();
            return;
        }
    });
});
