<?php
    
    if(!isset($_GET['acao'])) {
        $acao = 'select';
    }

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
        <div class="container mt-2 mb-5 py-0">
            <div class="row">
                <div class="col">
                    <div class="jumbotron py-1 border">
                        <h1 class="display-4"><i class="fas fa-book mr-3 text-success"></i>Agenda Pessoal</h1>
                        <p class="lead">Visualize os seus contatos abaixo e também adicione novos através do botão na tela.</p>
                        <div class="d-flex">
                            <div class="mr-auto">
                                <button class="btn btn-primary btn-lg rounded border-secondary mx-2 px-3 bg-secondary mb-3" href="#" role="button" onclick="mainPage()"><i class="fas fa-home fa-lg"></i></button>
                            </div>
                            <div class="ml-auto">
                                <button class="btn btn-primary btn-lg rounded border-secondary mx-2 px-3 bg-secondary mb-3" href="#" role="button" onclick="search()"><i class="fas fa-search fa-lg"></i></button>
                                <button class="btn btn-primary btn-lg rounded border-success mx-2 px-3 bg-success mb-3" href="#" role="button" onclick="modalAdd()"><i class="fas fa-user-plus fa-lg"></i></button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="row">

            <? if($acao == 'select') { ?>
                <? foreach ($listagem as $key => $value) { ?>
                    <div class="col-md-4 d-flex mb-5">
                        <div class="card-header shadow" style="width: auto; padding: 0;">
                            <img class="card-img-top p-0" src="./upload/<?= $value->foto ?>" alt="Card image cap">
                                <div class="text-right mt-2 mr-3">
                                    <button class="btn btn-info py-1" onclick="modalUpdate(<?= $value->id ?>, '<?= $value->nome ?>', '<?= $value->telefone ?>', '<?= $value->email ?>')"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger py-1" onclick="remover(<?= $value->id ?>)"><i class="fas fa-user-minus"></i></button>
                                </div>
                                <div class="card-body align-content-end">
                                    <h5 class="card-title"><?= $value->nome ?></h5>
                                    <p class="card-text mb-2"><?= $value->telefone ?></p>
                                    <p class="card-text mb-2"><?= $value->email ?></p>
                                </div>
                        </div>
                    </div>
                <?}?>
            <?}?>
            
            <? if($acao == 'search') { ?>
                <? foreach ($pesquisa as $key => $value) { ?>
                    <div class="col-md-6 d-flex mb-5 m-auto">
                        <div class="card-header shadow" style="width: auto; padding: 0;">
                            <img class="card-img-top p-0" src="./upload/<?= $value->foto ?>" alt="Card image cap">
                                <div class="text-right mt-2 mr-3">
                                    <button class="btn btn-info py-1" onclick="modalUpdate(<?= $value->id ?>, '<?= $value->nome ?>', '<?= $value->telefone ?>', '<?= $value->email ?>')"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger py-1" onclick="remover(<?= $value->id ?>)"><i class="fas fa-user-minus"></i></button>
                                </div>
                                <div class="card-body align-content-end">
                                    <h5 class="card-title"><?= $value->nome ?></h5>
                                    <p class="card-text mb-2"><?= $value->telefone ?></p>
                                    <p class="card-text mb-2"><?= $value->email ?></p>
                                </div>
                        </div>
                    </div>
                <?}?>
            <?}?>



            </div>
        </div>
    </section>

    <? require 'modal.php'; ?>

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