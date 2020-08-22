<?php ?>

<!-- Modal insert -->
<div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar contato</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="controller.php?acao=insert" method="POST" enctype="multipart/form-data">
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text" >Nome:</span>
                      </div>
                      <input name ="nome" id="nomeContato" type="text" class="form-control" placeholder="Ex: Karl Marx">
                  </div>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text" >Telefone:</span>
                      </div>
                      <input name="telefone" id="telContato" type="text" class="form-control" placeholder="Ex: (11)99999-9999">
                  </div>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">E-mail:</span>
                      </div>
                      <input name="email" id="emailContato" type="email" class="form-control" placeholder="Ex: karlmarx@gmail.com">
                  </div>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
                            <input type="file" name="file" id="custom-file" class="custom-file-input">
                            <label class="custom-file-label" for="fotoContato">Adicionar imagem de perfil</label>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer d-flex">                    
                      <div class="mr-auto"><button type="button" class="btn btn-info" onclick="limparModal()">Limpar campos</button></div>
                      <div><button type="button" class="btn btn-secondary mr-1" data-dismiss="modal" onclick="limparModal()">Fechar</button></div>
                      <div><button type="submit" class="btn btn-success">Salvar</button></div>
                  </div>               
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal update -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="exampleModalLabel">Editar contato</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        

            <div class="modal-body">
                <form action="controller.php?acao=update" method="POST" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nome:</span>
                        </div>
                        <input name="nome" id="updateNome" type="text" class="form-control">
                        <input type="hidden" id="id" name="idContato">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Telefone:</span>
                        </div>
                        <input name="telefone" id="updateTel" type="text" class="form-control">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">E-mail:</span>
                        </div>
                        <input name="email" id="updateEmail" type="email" class="form-control">
                    </div>

                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
                            <input type="file" name="file" id="custom-file" class="custom-file-input">
                            <label class="custom-file-label" for="fotoContato">Nova imagem de perfil</label>
                        </div>
                    </div>
                
                    <div class="modal-footer d-flex">                    
                        <div><button type="button" class="btn btn-secondary mr-1" data-dismiss="modal" onclick="limparModal()">Fechar</button></div>
                        <div><button type="submit" class="btn btn-info">Atualizar</button></div>
                    </div>               
                </form>        
            </div>
        </div>
    </div>
</div>

<!-- Modal search -->
<div class="modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Pesquisar contato</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="index.php?acao=search" method="POST">
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text" >Nome:</span>
                      </div>
                      <input name="nome" id="nome" type="text" class="form-control" placeholder="Ex: Gandhi">
                    </div>
                  </div>
                  <div class="modal-footer d-flex">                    
                      <div><button type="submit" class="btn btn-secondary">Pesquisar<i class="fas fa-search ml-2"></i></button></div>
                  </div>               
                </form>
            </div>
        </div>
    </div>
</div>

<? ?>