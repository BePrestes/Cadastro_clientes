document.addEventListener("DOMContentLoaded", () => {
    const botoesExcluir = document.querySelectorAll(".btn-excluir");
    botoesExcluir.forEach(botao => {
        botao.addEventListener("click", (event) => {
            const confirmar = confirm(
                "Tem certeza que deseja excluir este cliente?"
            );
            if (!confirmar) {
                event.preventDefault();
            }
        });
    });
});