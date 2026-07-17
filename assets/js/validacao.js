document.addEventListener("DOMContentLoaded", () => {
    const formulario = document.getElementById("formCliente");
    if (!formulario) {
        return;
    }
    formulario.addEventListener("submit", (event) => {
        const nome = document.getElementById("nome").value.trim();
        const email = document.getElementById("email").value.trim();
        const telefone = document.getElementById("telefone").value.trim();

        if (nome.length < 3) {
            alert("O nome deve conter pelo menos 3 caracteres.");
            event.preventDefault();
            return;
        }
        if (!email.includes("@")) {
            alert("informe um e-mail válido.");
            event.preventDefault();
            return;
        }
        if (telefone.length < 8) {
            alert("Informe um telefone válido");
            event.preventDefault();
            return;
        }

    });
});