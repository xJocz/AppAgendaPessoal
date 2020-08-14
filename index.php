<?php
    $acao = 'select';
    require 'controller.php';
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/custom_style.css">
    <script src="./js/app.js"></script>
    <script src="https://kit.fontawesome.com/44b7d6d5c2.js" crossorigin="anonymous"></script>
  </head>
  <body>

    <header>
        <div class="cheader container mt-2 mb-5">
            <div class="row">
                <div class="col">
                    <div class="jumbotron py-1 border">
                        <h1 class="display-4">Agenda Pessoal</h1>
                        <p class="lead">Visualize os seus contatos abaixo e também adicione novos através do botão na tela.</p>
                        <div class="text-right">
                        <button class="btn btn-primary btn-lg rounded border-secondary mx-2 px-3 bg-secondary mb-3" href="#" role="button" onclick="#"><i class="fas fa-search fa-lg"></i></button>
                        <button class="btn btn-primary btn-lg rounded border-success mx-2 px-3 bg-success mb-3" href="#" role="button" onclick="modalAdd()"><i class="fas fa-user-plus fa-lg"></i></button>
                    </div>
                        
                    </div>
                    <div class="rounded-lg d-flex justify-content-center">
                        <? if (isset($_GET['code']) && $_GET['code'] == 'insert') {?>
                            <div class="alert h2 bg-success text-white text-center">Registro adicionado!</div>
                            <div><i class="far fa-times-circle ml-1 bg-success px-1 py-1 text-white rounded" onclick="removerAlerta()"></i></div>
                        <? } ?>
                        <? if (isset($_GET['code']) && $_GET['code'] == 'update') {?>
                            <div class="alert h2 bg-info text-white text-center">Registro atualizado!</div>
                            <div><i class="far fa-times-circle ml-1 bg-info px-1 py-1 text-white rounded" onclick="removerAlerta()"></i></div>
                        <? } ?>
                        <? if (isset($_GET['code']) && $_GET['code'] == 'remove') {?>
                            <div class="alert h2 rounded bg-danger text-white text-center">Registro removido!</div>
                            <div><i class="far fa-times-circle ml-1 bg-danger px-1 py-1 text-white rounded" onclick="removerAlerta()"></i></div>
                        <? } ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    

    <section>
        <div class="container">
            <div class="row">
                <? foreach ($lista as $key => $value) { ?>
                    <div class="col-md-4 d-flex justify-content-center mb-5">
                        <div class="card-box card bg-light mb-3" style="width: 20rem;">
                            <div class="card-header">
                                <img src="https://via.placeholder.com/125C/" class="img-thumbnail"></img>
                                <div class="text-right mt-2">
                                    <button class="btn btn-info" onclick="modalUpdate(<?= $value->id ?>, '<?= $value->nome ?>', '<?= $value->telefone ?>', '<?= $value->email ?>')"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger" onclick="remover(<?= $value->id ?>)"><i class="fas fa-user-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                            <h5 class="card-title"><?= $value->nome ?></h5>
                            <p class="card-text mb-2"><?= $value->telefone ?></p>
                            <p class="card-text mb-2"><?= $value->email ?></p>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar contato</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form action="controller.php?acao=insert" method="post">
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
                                <input type="file" class="custom-file-input" >
                                <label name="foto" id="fotoContato" class="custom-file-label" for="fotoContato">Adicionar imagem de perfil</label>
                            </div>
                          <!-- <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                          </div> -->
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
    </div>

    <!-- Modal update-->
    <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar contato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="controller.php?acao=update" method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >Nome:</span>
                        </div>
                        <input name ="nome" id="updateNome" type="text" class="form-control">
                        <input type="hidden" id="id" name="idContato">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >Telefone:</span>
                        </div>
                        <input name="telefone" id="updateTel" type="text" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">E-mail:</span>
                        </div>
                        <input name="email" id="updateEmail" type="email" class="form-control">
                    </div>
                    
                    </div>
                    <div class="modal-footer d-flex">                    
                        <div><button type="button" class="btn btn-secondary mr-1" data-dismiss="modal" onclick="limparModal()">Fechar</button></div>
                        <div><button type="submit" class="btn btn-success">Atualizar</button></div>
                    </div>               
                </form>            
            </div>
        </div>
    </div>


      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
      $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });
  </script>
  </body>
</html>