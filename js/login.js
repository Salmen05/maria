function login() {
    const alert = document.getElementById('alert');
    const formLogin = document.getElementById('formLogin');
    const url = 'validar.php';
    const formData = new FormData(formLogin);
    fetch(url, {
        headers: {
            'Accept': 'application/json'
        },
        body: formData,
        method: 'POST'
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert.style.display = 'block';
                alert.classList.remove('alert-warning');
                alert.classList.add('alert-success');
                alert.innerHTML = 'Bem-vindo!'
                setTimeout(function () {
                    window.location.href = './dashboard.php'
                }, 2500)
            } else if (data.errorType == 'email') {
                alert.style.display = 'block';
                alert.innerHTML = 'Email não encontrado'
            } else {
                alert.style.display = 'block';
                alert.innerHTML = 'Senha errada!'
            }
        })

}
function deletar(idturma) {
    const url = './ponte.php';
    const formData = new FormData();
    formData.append("idturma", idturma);
    fetch(url, {
        headers: {
            'Accept': 'application/json'
        },
        body: formData,
        method: 'POST'
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Não é possível excluir, ainda há atividades cadastradas');
            } else {
                const botaoExcluir = document.getElementById('botaoExcluir');
                const deletarModal = new bootstrap.Modal(document.getElementById('deletarModal'));
                deletarModal.show();
                botaoExcluir.addEventListener('click', function () {
                    const url = './deletar.php';
                    fetch(url, {
                        headers: {
                            'Accept': 'appication/json'
                        },
                        body: formData,
                        method: 'POST'
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('A turma foi excluída com sucesso');
                                window.location.href = './dashboard.php';
                            }
                        })
                })
            }
        })
}