  function editar(id, tarefaAntiga) {
    const form = document.createElement('form');
    form.action = '../controller/tarefa.controller.php?acao=editar';
    form.method = 'POST';
    form.className = 'row';

    const input = document.createElement('input');
    input.type = 'text';
    input.name = 'editarTarefa';
    input.className = 'col-9 form-control';
    input.value = tarefaAntiga;

    const inputId = document.createElement('input');
    inputId.type = 'hidden';
    inputId.name = 'id';
    inputId.value = id;

    const inputPag = document.createElement('input');
    inputPag.type = 'hidden';
    inputPag.name = 'pag';
    if (!location.href.includes('todas_tarefas')) {
      inputPag.value = 1;
    } else {
      inputPag.value = 0;
    }

    const buttonSend = document.createElement('button');
    buttonSend.type = 'submit';
    buttonSend.className = 'col-3 btn btn-info';
    buttonSend.innerHTML = 'Atualizar';

    const tarefa = document.getElementById('tarefa_' + id);
    tarefa.innerHTML = '';

    form.appendChild(input);
    form.appendChild(inputId);
    form.appendChild(inputPag);
    form.appendChild(buttonSend);

    tarefa.insertBefore(form, tarefa[0]);

    input.focus();
  }

  function deletar(divId) {
    if (!location.href.includes('todas_tarefas')) {
      location.href = 'todas_tarefas.php?pag=1&acao=deletar&id=' + divId;
    } else {
      location.href = 'todas_tarefas.php?pag=0&acao=deletar&id=' + divId;
    }
  }

  function realizada(divId) {
    if (!location.href.includes('todas_tarefas')) {
      location.href = 'todas_tarefas.php?pag=1&acao=deletar&id=' + divId;
    } else {
      location.href = 'todas_tarefas.php?pag=0&acao=deletar&id=' + divId;
    }
  }