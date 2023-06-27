<div class="image-header"></div>

<!-- off canvas -->
<!--
<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Enable both scrolling & backdrop</button>
-->
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdrop with scrolling</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <p>Try scrolling the rest of the page to see this option in action.</p>
  </div>
</div>
<!-- end off canvas -->
<!-- begin modals -->

<div class="modal fade" id="modalAdicionarProduto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAdicionarProdutoLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <form action="#" method="POST" class="modal-content">
      <input type="hidden" name="exec" value="cadastraProduto"/>
      <div class="modal-header">
        <h5 class="modal-title" id="modalAdicionarProdutoLabel">Adicionar novo produto</h5>
      </div>
      <div class="modal-body">
        <div class="form-floating m-2">
            <input type="text" class="form-control" id="inputNomeProduto" name="inputNomeProduto" placeholder="Nome do produto">
            <label for="inputNomeProduto" class="text-secondary">Nome do produto</label>
        </div>
        <div class="form-floating m-2">
            <input type="text" class="form-control" id="inputChamadaProduto" name="inputChamadaProduto" placeholder="Breve descrição do produto">
            <label for="inputChamadaProduto" class="text-secondary">Breve descrição do produto</label>
        </div>
        <div class="form-floating m-2">
            <textarea rows="5" class="form-control" id="inputDescProduto" name="inputDescProduto" placeholder="Descrição completa do produto" style="height: auto"></textarea>
            <label for="inputDescProduto" class="text-secondary">Descrição completa do produto</label>
        </div>
        <div class="form-floating m-2">
            <textarea rows="5" class="form-control" id="inputProcessoFabricacaoProduto" name="inputProcessoFabricacaoProduto" placeholder="Processo de fabricação do produto" style="height: auto"></textarea>
            <label for="inputProcessoFabricacaoProduto" class="text-secondary">Processo de fabricação do produto</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary" value="Adicionar"/>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="modalAdicionarPeca" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAdicionarPecaLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <form action="#" method="POST" class="modal-content">
      <input type="hidden" name="exec" value="cadastraPeca"/>
      <div class="modal-header">
        <h5 class="modal-title" id="modalAdicionarPecaLabel">Adicionar nova peça</h5>
      </div>
      <div class="modal-body">
        <div class="form-floating m-2">
            <input type="text" class="form-control" id="inputNomeItem" name="inputNomeItem" placeholder="Nome da peça">
            <label for="inputNomeItem" class="text-secondary">Nome da peça</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary" value="Adicionar"/>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="modalAdicionarPrograma" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAdicionarProgramaLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <form action="#" method="POST" class="modal-content">
      <input type="hidden" name="exec" value="cadastraPrograma"/>
      <div class="modal-header">
        <h5 class="modal-title" id="modalAdicionarProgramaLabel">Adicionar novo programa</h5>
      </div>
      <div class="modal-body">
        <div class="form-floating m-2">
            <input type="text" class="form-control" id="inputNomePrograma" name="inputNomePrograma" placeholder="Nome do programa">
            <label for="inputNomePrograma" class="text-secondary">Nome do programa</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary" value="Adicionar"/>
      </div>
    </form>
  </div>
</div>


<div class="modal fade" id="modalStatusFila" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalStatusFilaLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <form action="#" method="POST" class="modal-content">
      <input type="hidden" name="exec" value="cadastraPrograma"/>
      <div class="modal-header">
        <h5 class="modal-title" id="modalStatusFilaLabel">Alterar Status Fila</h5>
      </div>
      <div class="modal-body">
        <div class="form-floating m-2">
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="inputStatusPedido" name="inputStatusPedido"  style="height: 70px">
              <option selected value="">Selecione</option>
              <option value="A">Aguardando</option>
              <option value="P">Produzindo</option>
              <option value="F">Finalizado</option>
              <option value="C">Cancelado</option>
            </select>


            <label for="inputNomePrograma" class="text-secondary">Status do pedido</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button id="btnAtualizarPedidoConfirma" type="button" class="btn btn-primary">Alterar</button>
        <script>
          let btnAtualizarPedidoConfirma = document.getElementById('btnAtualizarPedidoConfirma')
          btnAtualizarPedidoConfirma.addEventListener('click', function(){

            // /apiLojaFabricaV1/filaProducao/atualizaItemProducao
            var statusPedidoSelect = document.getElementById('inputStatusPedido')
            alert(statusPedidoSelect.value)

            var formData = new FormData();
            formData.append('n_pedido_pedido', pedidoAlterar);
            formData.append('c_status_filaproducao', statusPedidoSelect.value);
            fetch("https://fredaugusto.com.br/centro40/apiLojaFabricaV1/filaProducao/atualizaTodosItemProducaoPedido", {
                method: "POST", 
                body: formData
            }).then(res_ => res_.json())
            .then(dados_ => {
                console.log('Fetch terminado');
            }).catch((error) => {
                console.log("erro" + error);
            });

          })
        </script>
      </div>
    </form>
  </div>
</div>
<!-- end modals -->

<div class="container bg-light rounded shadow" style="margin-top: -100px">

<?php

// if (!isset($url[1]) || $url[1] != 'logout' || $_SESSION['lojafabrica_administrador']['s_tipo_administrador'] != "administrador" ){
//   header("location: ./produtos");
//   exit;
// }
  if(isset($url[1])){
    if($url[1] == 'logout'){
      session_destroy();
      ?>
        <div class="row m-0">
          <div action="#" method="POST" class="col-lg-7 col-xl-5 m-auto pb-4 pt-4">
            <div class="row m-0">
                <div class="col-12 p-0">
                  
                  <p class="display-4">
                    Logout realizado
                  </p>
                  <p>Você será redirecionado em segundos.</p>
                  <meta http-equiv="refresh" content="3; URL='<?php echo SITE_ROOT ?>'"/>

                </div>
            </div>
          </div>
        </div>
      <?php
    }
  } else if(isset($_POST['inputEmail']) && isset($_POST['inputSenha'])){
    $sql = "SELECT * FROM lojafabrica_tb_administradores WHERE s_email_administrador = '".$_POST['inputEmail']."' AND s_senha_administrador = '".$_POST['inputSenha']."'";
    //echo $sql;
    $query = getSelectBD($sql);
    $retorno = null;
    if(count($query)>0){
      foreach ($query as $key => $registro) {
        $_SESSION['lojafabrica_administrador'] = $registro;
        $retorno = "
          <p class=\"display-4\">
              Login realizado
          </p>
          <p>Você será redirecionado em segundos.</p>";
          if($registro['s_tipo_administrador'] == 'administrador'){
            $retorno .= "
              <meta http-equiv=\"refresh\" content=\"3; URL='" . SITE_ROOT . "admProdutos'\"/>
            ";  
          }else {
            $retorno .= "
              <meta http-equiv=\"refresh\" content=\"3; URL='" . SITE_ROOT . "produtos'\"/>
            ";
          }
      }
    } else {
      $retorno = "
        <p class=\"display-4\">
            Login não realizado
        </p>
        <p>Usuário/senha incorretos.</p>
      ";
    }
    ?>
    <div class="row m-0">
      <div action="#" method="POST" class="col-lg-7 col-xl-5 m-auto pb-4 pt-4">
        <div class="row m-0">
            <div class="col-12 p-0">
              <?php echo $retorno ?>
            </div>
        </div>
      </div>
    </div>
    <?php
  } else if(!isset($_SESSION['lojafabrica_administrador']['n_administrador_administrador']) || $_SESSION['lojafabrica_administrador']['n_administrador_administrador'] == null){
    ?>
    <div class="row m-0">
      <form action="#" method="POST" class="col-lg-7 col-xl-5 m-auto pb-4 pt-4">
        <div class="row m-0">
            <div class="col-12 p-0">
                <p class="display-4">
                    Login
                </p>
                <p>Faça o login para administrar a loja.</p>
            </div>
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="email" class="form-control" name="inputEmail">
          <div id="emailHelp" class="form-text">Nunca compartilhe seu acesso com ninguém.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Senha</label>
          <input type="password" class="form-control" name="inputSenha">
        </div>
        <button class="btn btn-primary col-12">Login</button>
      </form>
    </div>
    <?php
  } else if (isset($_SESSION['lojafabrica_administrador']['s_tipo_administrador']) && $_SESSION['lojafabrica_administrador']['s_tipo_administrador'] != "administrador" ){
    echo "
    <meta http-equiv='refresh' content='2; URL=" .  SITE_ROOT . "produtos'/>";
    echo "<h3 class='text-center row' style='height: 400px'><div class='m-auto'>Você não tem permissão para acessar esta página</div></h3>";
  } else {
    $sql = "SELECT 
            lojafabrica_tb_pedido.n_pedido_pedido,
            lojafabrica_tb_pedido.s_data_pedido,
            lojafabrica_tb_pedido.n_prioridade_pedido,
            lojafabrica_tb_pedido.s_status_pedido,
            lojafabrica_tb_personalizacao.n_personalizacao_personalizacao,
            lojafabrica_tb_personalizacao.n_codigopersonalizacao_personalizacao,
            lojafabrica_tb_personalizacao.s_descricao_personalizacao,
            lojafabrica_tb_personalizacao.s_imagem_personalizacao,
            lojafabrica_tb_personalizacao.c_status_personalizacao,
            lojafabrica_tb_filaproducao.n_filaproducao_filaproducao,
            lojafabrica_tb_pedido.n_pedido_pedido,
            lojafabrica_tb_itemproduto.n_itemproduto_itemproduto,
            lojafabrica_tb_personalizacao.n_personalizacao_personalizacao,
            lojafabrica_tb_filaproducao.c_status_filaproducao,
            lojafabrica_tb_itemproduto.n_itemproduto_itemproduto,
            lojafabrica_tb_itemproduto.s_textopersonalizacao_itemproduto,
            lojafabrica_tb_produto.n_produto_produto,
            lojafabrica_tb_itemproduto.c_personalizavel_itemproduto,
            lojafabrica_tb_itemproduto.n_personalizacaopadrao_itemproduto,
            lojafabrica_tb_filaproducao.s_texto_personalizacao_pedidoprodutos,
            lojafabrica_tb_item.n_item_item,
            lojafabrica_tb_item.n_item_item,
            lojafabrica_tb_item.s_nome_item,
            lojafabrica_tb_produto.n_produto_produto,
            lojafabrica_tb_produto.s_nome_produto,
            lojafabrica_tb_produto.s_chamada_produto,
            lojafabrica_tb_produto.s_desc_produto,
            lojafabrica_tb_produto.s_processofabricacao_produto,
            lojafabrica_tb_produto.s_codigo_produto,
            lojafabrica_tb_produto.s_modelo_produto,
            lojafabrica_tb_produto.s_material_produto,
            lojafabrica_tb_produto.s_dimensoes_produto,
            lojafabrica_tb_produto.b_ativo_produto
            FROM lojafabrica_tb_pedido, lojafabrica_tb_personalizacao, lojafabrica_tb_filaproducao, lojafabrica_tb_itemproduto, lojafabrica_tb_item, lojafabrica_tb_produto
            WHERE lojafabrica_tb_filaproducao.n_itemproduto_itemproduto = lojafabrica_tb_itemproduto.n_itemproduto_itemproduto
            AND lojafabrica_tb_produto.n_produto_produto = lojafabrica_tb_itemproduto.n_produto_produto
            AND lojafabrica_tb_pedido.n_pedido_pedido = lojafabrica_tb_filaproducao.n_pedido_pedido
            AND lojafabrica_tb_item.n_item_item = lojafabrica_tb_itemproduto.n_item_item
            AND lojafabrica_tb_personalizacao.n_personalizacao_personalizacao = lojafabrica_tb_filaproducao.n_personalizacao_personalizacao
            ORDER BY lojafabrica_tb_pedido.n_pedido_pedido DESC";
    //echo $sql;
    $query = getSelectBD($sql);
    $filaPedidosRaw = array();
    $filaPedidos = array();
    foreach ($query as $key => $registro) {
      array_push($filaPedidosRaw, $registro);
    }
    foreach ($filaPedidosRaw as $key => $valuePedidosRaw) {
      $achou = false;
      foreach ($filaPedidos as $keyPedidos => $valuePedidos) {
        if($valuePedidos['n_pedido_pedido'] == $valuePedidosRaw['n_pedido_pedido']){
          $achou = true;
        }
      }
      if(!$achou){
        array_push($filaPedidos, $valuePedidosRaw);
      }
    }


    foreach ($filaPedidos as $keyPedidos => $valuePedidos) {
      $itensPedido = array();
      foreach ($filaPedidosRaw as $keyPedidosRaw => $valuePedidosRaw) {
        if($valuePedidos['n_pedido_pedido'] == $valuePedidosRaw['n_pedido_pedido']){
          array_push($itensPedido, $valuePedidosRaw);
        }
      }
      $filaPedidos[$keyPedidos] += ['itens' => $itensPedido];
    }

  ?>
    <div class="row">
        <div class="col-12">
            <p class="display-4">
                Fila de pedidos
            </p>
        </div>
    </div>

    <div class="row pb-4">
      <div class="accordion accordion-flush col-12" id="accordionFlushExample">
        <script>
          let pedidoAlterar = 0
        </script>
        <?php
          foreach ($filaPedidos as $keyPedidos => $valuePedidos) {
          ?>
            <div class="accordion-item">
              <h2 class="accordion-header" id="accListaProdutos<?php echo $keyPedidos ?>">
                  <div class="accordion-button collapsed p-2" type="button">
                      <div class="col text-start p-0 row" data-bs-toggle="collapse" data-bs-target="#accListaProdutosCollapse<?php echo $keyPedidos ?>" aria-expanded="false" aria-controls="accListaProdutosCollapse<?php echo $keyPedidos ?>">
                        <div class="row col-12">
                          <?php
                            echo "<div class='col-6'>Pedido #" . $valuePedidos['n_pedido_pedido'] . " - <i><small style='font-size: .6em'>(".$valuePedidos['s_data_pedido'].")</small></i></div>";
                            //echo "Texto personalização: " . $valuePedidos['s_texto_personalizacao_pedidoprodutos'];
                          ?>
                          <div class="col-6 text-end" id="rowTituloPedido<?php echo $valuePedidos['n_pedido_pedido'] ?>"></div>
                        </div>
                      </div>
                  </div>
              </h2>
              <div id="accListaProdutosCollapse<?php echo $keyPedidos ?>" class="accordion-collapse collapse" aria-labelledby="accListaProdutos<?php echo $keyPedidos ?>" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body row">
                    <?php 
                      foreach ($filaPedidosRaw as $keyPedidosPedidosRaw => $valuePedidosRaw) {
                        if($valuePedidos['n_pedido_pedido'] == $valuePedidosRaw['n_pedido_pedido']){

                          ?>

                            <div class="row">
                              <div class="col-8 row">
                                <?php
                                echo $valuePedidosRaw['s_nome_produto'] . "<br>";
                                $status = array();
                                foreach ($filaPedidosRaw as $keyPedidosPedidosRaw_ => $valuePedidosRaw_) {
                                  if($valuePedidosRaw['n_produto_produto'] == $valuePedidosRaw_['n_produto_produto'] && $valuePedidosRaw['n_pedido_pedido'] == $valuePedidosRaw_['n_pedido_pedido']){
                                    $achouStatus = false;
                                    foreach ($status as $keyStatus => $valueStatus) {
                                      if($valueStatus == $valuePedidosRaw_['c_status_filaproducao'])
                                        $achouStatus = true;
                                    }
                                    if(!$achouStatus)
                                      array_push($status, $valuePedidosRaw_['c_status_filaproducao']);
                                    echo "<div class=\"ml-4\">";

                                    $statusDet = '';
                                    switch ($valuePedidosRaw_['c_status_filaproducao']) {
                                      case 'A':
                                        $statusDet = "Aguardando";
                                        break;
                                      
                                      case 'P':
                                        $statusDet = "Produzindo";
                                        break;
                                      
                                      case 'F':
                                        $statusDet = "Finalizado";
                                        break;
                                      
                                      case 'C':
                                        $statusDet = "Cancelado";
                                        break;
                                    }


                                    echo "- <b>(".$statusDet.")</b> ".$valuePedidosRaw_['s_nome_item'];
                                    if ($valuePedidosRaw_['c_personalizavel_itemproduto'] == '1') {
                                      echo "<small><i> (";
                                      echo "Este produto será personalizado com o texto \"" . $valuePedidosRaw_['s_texto_personalizacao_pedidoprodutos'] . "\"";
                                      echo " e com a imagem \"" . $valuePedidosRaw_['s_descricao_personalizacao'] . "\"";
                                      echo ")</i></small>";
                                    }
                                    
                                    echo "</div><br>";

                                  }
                                }
                                $statusSerialized = '';
                                foreach ($status as $keyStatus => $valueStatus) {
                                  $spacer = " / ";
                                  if ($keyStatus == 0)
                                    $spacer = "";
                                  switch ($valueStatus) {
                                    case 'A':
                                      $valueStatus = "Aguardando";
                                      break;
                                    
                                    case 'P':
                                      $valueStatus = "Produzindo";
                                      break;
                                    
                                    case 'F':
                                      $valueStatus = "Finalizado";
                                      break;
                                    
                                    case 'C':
                                      $valueStatus = "Cancelado";
                                      break;
                                  }
                                  $statusSerialized .= $spacer . $valueStatus;
                                }
                                ?>
                                <script>
                                  document.getElementById('rowTituloPedido<?php echo $valuePedidos['n_pedido_pedido'] ?>').innerText = "<?php echo $statusSerialized ?>"
                                </script>
                              </div>
                              <div class="col-4 text-end">
                                <button id="btnAtualizaPedido<?php echo $valuePedidos['n_pedido_pedido'] ?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalStatusFila" data-itempedido="<?php echo $valuePedidos['n_pedido_pedido'] ?>">Alterar status do pedido</button>
                                <script>
                                  let btnAtualizaPedido<?php echo $valuePedidos['n_pedido_pedido'] ?> = document.getElementById('btnAtualizaPedido<?php echo $valuePedidos['n_pedido_pedido'] ?>')
                                  btnAtualizaPedido<?php echo $valuePedidos['n_pedido_pedido'] ?>.addEventListener('click', function(){
                                    pedidoAlterar = btnAtualizaPedido<?php echo $valuePedidos['n_pedido_pedido'] ?>.dataset.itempedido
                                  })
                                </script>
                              </div>
                            </div>
                          <?php

                          break;
                        }
                      }
                    ?>
                  </div>
              </div>
            </div>
          <?php
          }
        ?>
      </div>
    </div>




    <?php if (false){ ?>
      <div class="row p-3 lead fw-semibold">
        <?php
          if (isset($_POST['exec'])) {
            if ($_POST['exec'] == "cadastraProduto") {
              $sql = "INSERT INTO lojafabrica_tb_produto (s_nome_produto, s_chamada_produto, s_desc_produto, s_processofabricacao_produto) VALUES ('".$_POST['inputNomeProduto']."','".$_POST['inputChamadaProduto']."','".$_POST['inputDescProduto']."','".$_POST['inputProcessoFabricacaoProduto']."')";
              $query = execCommandBD($sql);

              if (!$query) {
                echo "Houve um erro ao cadastrar o produto.";
              } else {
                echo "Produto cadastrado";
              }

            } else if ($_POST['exec'] == "cadastraPeca") {
              $sql = "INSERT INTO lojafabrica_tb_item (s_nome_item) VALUES ('".$_POST['inputNomeItem']."')";
              $query = execCommandBD($sql);

              if (!$query) {
                echo "Houve um erro ao cadastrar a peça.";
              } else {
                echo "Peça cadastrada";
              }

            } else if ($_POST['exec'] == "cadastraPrograma") {
              $sql = "INSERT INTO lojafabrica_tb_programa (s_nome_programa) VALUES ('".$_POST['inputNomePrograma']."')";
              $query = execCommandBD($sql);

              if (!$query) {
                echo "Houve um erro ao cadastrar o programa.";
              } else {
                echo "Programa cadastrado";
              }

            } else {
              echo "Houve um erro.";
            }
          }
        ?>
      </div>
      <div class="row">
          <div class="accordion accordion-flush col-12" id="accordionFlushExample">
              <div class="accordion-item">
                  <h2 class="accordion-header" id="accListaProdutos">
                      <div class="accordion-button collapsed p-0" type="button">
                          <div class="col text-start p-3" data-bs-toggle="collapse" data-bs-target="#accListaProdutosCollapse" aria-expanded="false" aria-controls="accListaProdutosCollapse">
                              Lista de produtos
                          </div>
                          <button type="button" class="btn btn-light col-4 border border-secondary m-0" data-bs-toggle="modal" data-bs-target="#modalAdicionarProduto">
                              Adicionar produto
                          </button>
                      </div>
                  </h2>
                  <div id="accListaProdutosCollapse" class="accordion-collapse collapse" aria-labelledby="accListaProdutos" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body row">
                          <?php
                              $sql = "SELECT * FROM lojafabrica_tb_produto";
                              //echo $sql;
                              $query = getSelectBD($sql);
                              foreach ($query as $key => $registro) {
                                  echo "<div class=\"col-12\">" . $registro['s_nome_produto'] . "</div>";
                              }
                          ?>
                      </div>
                  </div>
              </div>
              <div class="accordion-item">
                  <h2 class="accordion-header" id="accListaItens">
                      <div class="accordion-button collapsed p-0" type="button">
                          <div class="col text-start p-3" data-bs-toggle="collapse" data-bs-target="#accListaItensCollapse" aria-expanded="false" aria-controls="accListaItensCollapse">
                              Lista de peças (itens)
                          </div>
                          <button type="button" class="btn btn-light col-4 border border-secondary m-0" data-bs-toggle="modal" data-bs-target="#modalAdicionarPeca">
                              Adicionar peça
                          </button>
                      </div>
                  </h2>
                  <div id="accListaItensCollapse" class="accordion-collapse collapse" aria-labelledby="accListaItens" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body row">
                          <?php
                              $sql = "SELECT * FROM lojafabrica_tb_item";
                              //echo $sql;
                              $query = getSelectBD($sql);
                              foreach ($query as $key => $registro) {
                                  echo $registro['s_nome_item'];
                              }
                          ?>
                      </div>
                  </div>
              </div>
              <div class="accordion-item">
                  <h2 class="accordion-header" id="accListaProgramas">
                      <div class="accordion-button collapsed p-0" type="button">
                          
                          <div class="col text-start p-3" data-bs-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#accListaProgramasCollapse" aria-expanded="false" aria-controls="accListaProgramasCollapse">
                              Lista de programas (máquinas)
                          </div>
                          <button type="button" class="btn btn-light col-4 border border-secondary m-0" data-bs-toggle="modal" data-bs-target="#modalAdicionarPrograma">
                              Adicionar programa
                          </button>
                      </div>
                  </h2>
                  <div id="accListaProgramasCollapse" class="accordion-collapse collapse" aria-labelledby="accListaProgramas" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body">
                          <?php
                              $sql = "SELECT * FROM lojafabrica_tb_programa";
                              //echo $sql;
                              $query = getSelectBD($sql);
                              foreach ($query as $key => $registro) {
                                  echo $registro['s_nome_programa'];
                              }
                          ?>
                      </div>
                  </div>
              </div>

          </div>
      </div>
    <?php
    }
  }
  ?>
</div>
