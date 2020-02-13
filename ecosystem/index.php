<?php
  # start bootstrap
  require dirname(__DIR__) . "/core/bootstrap.php";

  $app = new Module();

  # modulos
  $modules = $app->getModules();

  # configurações
  $config = $app->getConfig();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>Ecossistema Atomo - Configuração</title>
  </head>
  <body>
    <div class="container">
      
      <div class="card card-main">

        <div class="card-header bg-dark">
          <ul class="nav nav-pills" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link text-white font-weight-bold active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-atom"></i> Geral</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white font-weight-bold" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-bezier-curve"></i> Modulos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white font-weight-bold" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-cogs"></i> Configurações</a>
            </li>
          </ul>
        </div>

        <div class="card-body">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <!-- geral -->

              <!-- ./ -->
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <!-- modulos -->

              <!-- new module -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importModule">
                <i class="fas fa-plus-circle"></i> <b>Importar Modulo</b>
              </button>

              <hr>

              <!-- Modal -->
              <div class="modal fade" id="importModule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <form action="" method="post" enctype="multipart/form-data">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Importar Modulo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Modulo(.zip)</label>
                          <input type="file" class="form-control" name="" required />
                          <small>O modulo padrão(esqueleto) pode ser baixado no repositório oficial no <b><a target="_blank" href="https://github.com/EricCamposDev/AF-default-module">github</b></a></small>
                        </div>

                        <div class="form-group">
                          <label>Nome</label>
                          <input type="text" class="form-control" name=""  required />
                        </div>

                        <div class="form-group">
                          <label>Versão</label>
                          <input type="text" class="form-control" name=""  required />
                        </div>

                        <div class="form-group">
                          <label>base de Aplicação</label>
                          <input type="text" class="form-control" name=""  required />
                        </div>

                        <div class="form-group">
                          <label>Encapsulamento</label>
                          <select class="form-control" name=""  required>
                            <option value="public">Publico</option>
                            <option value="private">Privado</option>
                          </select>
                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">cancelar</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> <b>Importar</b></button>
                      </div>
                      <
                    </form>
                  </div>
                </div>
              </div>
              <!-- ./ -->

              <?php
                if( $modules ):
              ?>
              <div class="row">
                <?php
                  foreach($modules as $mod):
                ?>
                <div class="col-md-3">

                  <div class="card card-module">
                    <div class="card-body">
                      <p class="text-center"><i class="fab fa-codepen fa-5x"></i></p>
                    </div>
                    <div class="card-footer">

                      <div class="row">
                        <div class="col-8">
                          <b><?=$mod['name']; ?> - <small><?=$mod['version']; ?></small></b>
                        </div>
                        <div class="col-4">
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Modificar</a>
                              <a class="dropdown-item" href="#">Detalhes</a>
                              <a class="dropdown-item text-danger font-weight-bold" href="#">Remover</a>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
                <?php
                  endforeach;
                ?>
              </div>
              <?php
                endif;
              ?>


              <!-- ./ -->
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
              <!-- configurações -->

              <form action="core/manager-config.php" method="post">

              <h4>Configurações Gerais</h4>

              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Nome do Projeto</label>
                <div class="col-sm-8">
                  <input type="text" name="project" class="form-control" id="inputEmail3" value="<?=$config['project']; ?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Diretorio da Aplicação</label>
                <div class="col-sm-8">
                  <input type="text" name="folder" class="form-control" id="inputEmail3" value="<?=$config['folder']; ?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Versão</label>
                <div class="col-sm-8">
                  <input type="text" name="version" class="form-control" value="<?=$config['version']; ?>" id="inputEmail3">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Protocolo TCP</label>
                <div class="col-sm-8">
                  <select class="form-control" name="protocol">
                    <option <?=($config['protocol'] == "https") ? 'selected' : ''; ?>>https</option>
                    <option <?=($config['protocol'] == "http") ? 'selected' : ''; ?>>http</option>
                  </select>
                </div>
              </div>

              <?php
                if( $modules ):
              ?>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Modulo Padrão</label>
                <div class="col-sm-8">
                  <select class="form-control" name="default_module">
                    <?php foreach($modules as $mp): ?>
                    <option <?=($config['default_module'] == $mp['name']) ? 'selected' : ''; ?>><?=$mp['name']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <?php
                endif;
              ?>

              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Exceptions</label>
                <div class="col-sm-8">
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="disableExp" <?=($config['debug'] == false) ? 'checked' : ''; ?> name="debug" value="false" class="custom-control-input">
                    <label class="custom-control-label" for="disableExp">Desativado</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="enableExp" <?=($config['debug'] == true) ? 'checked' : ''; ?> name="debug" value="true" class="custom-control-input">
                    <label class="custom-control-label" for="enableExp">Ativado</label>
                  </div>
                </div>
              </div>

              <h4>Banco de Dados Mysql</h4>

              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Host</label>
                <div class="col-sm-8">
                  <input type="text" name="dbhost" value="<?=$config['dbhost']; ?>" class="form-control" id="inputEmail3">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Banco</label>
                <div class="col-sm-8">
                  <input type="text" name="dbname" value="<?=$config['dbname']; ?>" class="form-control" id="inputEmail3">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Usuário</label>
                <div class="col-sm-8">
                  <input type="text" name="dbuser" value="<?=$config['dbuser']; ?>" class="form-control" id="inputEmail3">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Senha</label>
                <div class="col-sm-8">
                  <input type="password" name="dbpass" value="<?=$config['dbpass']; ?>" class="form-control" id="inputEmail3">
                </div>
              </div>

              <p class="text-right"><button class="btn btn-primary" type="submit"><i class="fas fa-check-circle"></i> <b>Salvar Dados</b></button></p>

              </form>

              <!-- ./ -->
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/878d8bd672.js" type="text/javascript"></script>
  </body>
</html>