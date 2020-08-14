function modalAdd () {
    $('#modalInsert').modal('show')
}

function modalUpdate (id, nome, telefone, email) {
    document.getElementById('id').value = id
    document.getElementById('updateNome').value = nome
    document.getElementById('updateTel').value = telefone
    document.getElementById('updateEmail').value = email
    $('#modalUpdate').modal('show')
}

function limparModal() {
    document.getElementById('nomeContato').value = ''
    document.getElementById('telContato').value = ''
    document.getElementById('emailContato').value = ''
    document.getElementById('fotoContato').value = ''
  }

function remover(id) {
    location.href = 'controller.php?acao=remove&id='+id;
}

function removerAlerta() {
    location.href = 'index.php';
}