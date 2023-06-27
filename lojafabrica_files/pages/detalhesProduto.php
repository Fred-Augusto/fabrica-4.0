<!--

-->
<?php
  $dadosProduto = array();
  $variacoesProduto = array();
  $personalizavel = false;
  $imagemPersonalizavel = false;
  if (isset($url[1]) && strlen($url[1]) > 0){
    $sql = "SELECT * FROM lojafabrica_tb_produto
            LEFT JOIN lojafabrica_tb_itemproduto 
            ON lojafabrica_tb_produto.n_produto_produto = lojafabrica_tb_itemproduto.n_produto_produto
            WHERE lojafabrica_tb_produto.n_produto_produto = '".$url[1]."'";
    //echo $sql;
    $query = getSelectBD($sql);
    foreach ($query as $key => $registro) {
      array_push($dadosProduto, $registro);
      if($registro['c_personalizavel_itemproduto'] == '1'){
        $personalizavel = true;
      }
      if($registro['c_imagem_personalizavel_itemproduto'] == '1'){
        $imagemPersonalizavel = true;
      }
    }
  } else {
    exit;
  }
?>
<style>
  .dropdown-menu > li:hover {
    background-color: #ccc
  }
  .imagem-personalizacao {
    max-height: 80px
  }
</style>
<script>



  window.onload = function(){
    var modalFooter = document.getElementById('modalFooter')
    var modalBody = document.getElementById('modalBody')
    //Modal Buttons
    var buttonsFooter = "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Não</button><button type='button' class='btn btn-primary' id='btnConfirmaFabricacao'>Sim</button>"
    modalFooter.innerHTML = buttonsFooter

    var myModalEl = document.getElementById('staticBackdrop')
      myModalEl.addEventListener('show.bs.modal', function (event) {
        modalFooter.innerHTML = buttonsFooter
        document.getElementById('btnConfirmaFabricacao').addEventListener('click', function(e) {
          //var quantidadePedido = document.getElementById('floatingQuantidade').value
          var textoPersonalizacaoPedido = document.getElementById('floatingTextoPersonalizacao').value
          var imagemPersonalizacaoPedido = document.getElementById('floatingImagemPersonalizacao').value
          var imagemCodPersonalizacaoPedido = document.getElementById('floatingCodImagemPersonalizacao').value
          var SwitchPrioridade = document.getElementById('flexSwitchPrioridade').checked
          modalFooter.innerHTML = buttonsFooter
          modalBody.innerHTML = "<div class='text-center'><p>Iniciando fabricação, aguarde...</p><div class='spinner-border' role='status'><span class='visually-hidden'>Loading...</span></div></div>"
          modalFooter.innerHTML = null
          var formData = new FormData();
          formData.append('produto', <?php echo $dadosProduto[0]['n_produto_produto'] ?>);
          //formData.append('quantidade', quantidadePedido);
          formData.append('textoPersonalizacao', textoPersonalizacaoPedido);
          formData.append('logoPersonalizacao', imagemPersonalizacaoPedido);
          formData.append('logoCodPersonalizacao', imagemCodPersonalizacaoPedido);
          formData.append('flexSwitchPrioridade', SwitchPrioridade);

          fetch("<?php echo SITE_ROOT ?>/enviaPedido", {
            method: "POST", 
            body: formData
          }).then(res_ => res_.text())
          .then(dados_ => {
            setTimeout(function() {
              modalBody.innerHTML = dados_
              modalFooter.innerHTML = "<button type='button' class='btn btn-primary' data-bs-dismiss='modal'>Entendido!</button>"
            }, 1500);
            
          })
        }, true);
        modalBody.innerHTML = "Deseja iniciar o processo de fabricação do produto \"<?php echo $dadosProduto[0]['s_nome_produto'] ?>\"?"
    })


  }
</script>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Fabricação</h5>
        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
      </div>
      <div class="modal-body" id="modalBody">
      </div>
      <div class="modal-footer" id="modalFooter">
      </div>
    </div>
  </div>
</div>

<div class="image-header"></div>
<div class="container-lg bg-light rounded shadow" style="margin-top: -100px">
  <div class="row">
    <div class="col-12 p-2 fst-italic">
      <a class="fw-semibold link-secondary" href="<?php echo SITE_ROOT ?>produtos">Voltar a lista de produtos</a> | Produtos > <?php echo $dadosProduto[0]['s_nome_produto'] ?>
    </div>
    <div class="col-lg-7 col-12 text-center row pb-4">
      <div id="carouselFotosProdutos" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
          <?php
            if (strlen($dadosProduto[0]['s_imagem1_produto'])>0) {
            ?>
              <button type="button" data-bs-target="#carouselFotosProdutos" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                <img class="img-thumbnail rounded mx-auto d-block" src="<?php echo $dadosProduto[0]['s_imagem1_produto'] ?>"/>
              </button>
            <?php
            }
          ?>
          <?php
            if (strlen($dadosProduto[0]['s_imagem2_produto'])>0) {
            ?>
              <button type="button" data-bs-target="#carouselFotosProdutos" data-bs-slide-to="1" aria-label="Slide 2">
                <img class="img-thumbnail rounded mx-auto d-block" src="<?php echo $dadosProduto[0]['s_imagem2_produto'] ?>"/>
              </button>
            <?php
            }
          ?>
          <?php
            if (strlen($dadosProduto[0]['s_imagem3_produto'])>0) {
            ?>
              <button type="button" data-bs-target="#carouselFotosProdutos" data-bs-slide-to="2" aria-label="Slide 3">
                <img class="img-thumbnail rounded mx-auto d-block" src="<?php echo $dadosProduto[0]['s_imagem3_produto'] ?>"/>
              </button>
            <?php
            }
          ?>
        </div>
        <div class="carousel-inner">
          <?php
            if (strlen($dadosProduto[0]['s_imagem1_produto'])>0) {
            ?>
              <div class="carousel-item active text-center">
                <img class="rounded" src="<?php echo $dadosProduto[0]['s_imagem1_produto'] ?>" class="d-block m-auto" alt="...">
              </div>
            <?php
            }
          ?>
          <?php
            if (strlen($dadosProduto[0]['s_imagem2_produto'])>0) {
            ?>
              <div class="carousel-item">
                <img class="rounded" src="<?php echo $dadosProduto[0]['s_imagem2_produto'] ?>" class="d-block m-auto" alt="...">
              </div>
            <?php
            }
          ?>
          <?php
            if (strlen($dadosProduto[0]['s_imagem3_produto'])>0) {
            ?>
              <div class="carousel-item ">
                <img class="rounded" src="<?php echo $dadosProduto[0]['s_imagem3_produto'] ?>" class="d-block m-auto" alt="...">
              </div>
            <?php
            }
          ?>
        </div>
      </div>
    </div>
    <div class="col-lg-5 col-12 row">
      <h1><?php echo $dadosProduto[0]['s_nome_produto'] ?></h1>
      <div class="col-12 row">
        <div class="col-sm-5 col-12 text-center mt-2 mb-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
          </svg>
        </div>
        <div class="col-sm col-12 text-center mt-2 mb-2">
          12 Avaliações
        </div>
      </div>
      <div class="col-12 text-justify">
        <?php echo str_replace('\n', '<br>', $dadosProduto[0]['s_chamada_produto']) ?>
      </div>
      <div class="col-12 row">
        <div class="col-12 mt-3 mb-3">
            <h5><?php echo ($personalizavel ? 'Item personalizável!' : 'Item não personalizável') ?></h5>
        </div>
        <div class="form-floating col-xl-12 col-12 mt-2 mb-2">
          <input type="text" placeholder="Nenhuma personalização de texto" value=" " <?php echo ($personalizavel ? '' : 'disabled') ?> maxlength="15" class="form-control" id="floatingTextoPersonalizacao">
          <label for="floatingTextoPersonalizacao">Texto de personalização</label>
        </div>
        <div class="form-floating col-xl-12 col-12 mt-2 mb-2">

          <input type="text" placeholder="Nenhuma personalização de texto" value=" " readonly <?php echo ($imagemPersonalizavel ? '' : 'disabled') ?> class="form-control" id="floatingImagemPersonalizacao" data-bs-toggle="dropdown" aria-expanded="false">
          <input type="hidden" id="floatingCodImagemPersonalizacao" value="<?php echo ($imagemPersonalizavel ? "99" : $dadosProduto[0]['n_personalizacaopadrao_itemproduto']) ?>">
          <script>
            $('#floatingImagemPersonalizacao').keydown(function(e) {
              e.stopPropagation();
            });
          </script>
          <div class="dropdown">
            <ul id="floatingImagemPersonalizacaoDropDown" class="dropdown-menu col-12" aria-labelledby="dropdownMenu2">
              <?php
                $sql = "SELECT * FROM lojafabrica_tb_personalizacao WHERE lojafabrica_tb_personalizacao.c_status_personalizacao = 'a'"; //Ativo
                //echo $sql;
                $query = getSelectBD($sql);
                foreach ($query as $key => $registro) {
                  array_push($dadosProduto, $registro);
                  ?>
                    <li class="row m-0 p-2" data-codImagem="<?php echo $registro['n_personalizacao_personalizacao'] ?>">
                      <div class="col-3 text-center">
                        <img class="img-fluid imagem-personalizacao" src="<?php echo $registro['s_imagem_personalizacao'] ?>"/>
                      </div>
                      <div class="col-9 mt-auto mb-auto fw-bolder">
                        <?php echo $registro['s_descricao_personalizacao'] ?>
                      </div>
                    </li>
                  <?php
                }
              ?>
            </ul>
          </div>
          <label for="floatingImagemPersonalizacao">Imagem de personalização</label>
        </div>

        <script>
          var inputImagemPersonalizacao = document.getElementById('floatingImagemPersonalizacao')
          var inputCodImagemPersonalizacao = document.getElementById('floatingCodImagemPersonalizacao')
          document.getElementById('floatingImagemPersonalizacaoDropDown').childNodes.forEach(element => {
            if(element.innerHTML){
              element.addEventListener('click', function() {
                inputImagemPersonalizacao.value = element.innerText
                inputCodImagemPersonalizacao.value = element.getAttribute('data-codImagem')
              })
            }
          });
          document.getElementById('floatingImagemPersonalizacao').addEventListener('keydown', function(event) {
            event.preventDefault()
          })

        </script>
      </div>
      <div class="col-12 row p-4">

          
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="flexSwitchPrioridade" disabled>
          <label class="form-check-label" for="flexSwitchPrioridade">Definir como prioridade</label>
        </div>

      </div>
      <div class="col-12 row p-4">
        <div class="col-3 row h5 p-0">
          <p class="mt-auto mb-auto text-left">Custo:</p>
        </div>
        <div class="col-9 row h3 pt-2 pb-2">
          <p class="mt-auto mb-auto pl-4">R$0,00</p>
        </div>
      </div>
      <div class="col-12 row mt-2 mb-4">
        <button class="btn btn-primary mb-2 mt-2 rounded-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Fabricar</button>
      </div>
    </div>
  </div>
</div>
<div class="container-lg mt-4">
  <div class="row">
    <div class="col-12 row">
      <h2 class="mb-3">Descrição</h2>
    </div>
    <div class="col-12 row">
      <div class="col-lg-4 col-12 text-center mb-3">
        <img class="img-fluid m-auto rounded-5 imagemCorpo" src="<?php echo $dadosProduto[0]['s_imagem1_produto'] ?>"/>
      </div>
      <div class="col-lg-8 col-12 text-justify mb-3">
        <p>
          <?php echo $dadosProduto[0]['s_desc_produto'] ?>
        </p>
      </div>
    </div>
  </div>
  
</div>
<div class="container-lg mt-4">
  <div class="row">
    <div class="col-12 row">
      <h2>Características do Produto</h2>
    </div>
    <div class="col-12 row">
      
      <table class="table table-hover">
        <tbody>
          <?php
            if($dadosProduto[0]['s_modelo_produto'] != ''){
              ?>
              <tr class="row col-12">
                <th scope="row" class="col-4">Modelo:</th>
                <td class="col-8"><?php echo $dadosProduto[0]['s_modelo_produto'] ?></td>
              </tr>
            <?php
            }
          ?>
          <?php
            if($dadosProduto[0]['s_material_produto'] != ''){
              ?>
              <tr class="row col-12">
                <th scope="row" class="col-4">Material:</th>
                <td class="col-8"><?php echo $dadosProduto[0]['s_material_produto'] ?></td>
              </tr>
            <?php
            }
          ?>
          <?php
            if($dadosProduto[0]['s_dimensoes_produto'] != ''){
              ?>
              <tr class="row col-12">
                <th scope="row" class="col-4">Dimensões:</th>
                <td class="col-8"><?php echo $dadosProduto[0]['s_dimensoes_produto'] ?></td>
              </tr>
            <?php
            }
          ?>
        </tbody>
      </table>
      
                
    </div>
  </div>
  
</div>
<div class="container-lg mt-4">
  <div class="row">
    <div class="col-12 row">
      <h2 class="mb-3">Processo de fabricação</h2>
    </div>
    <div class="col-12 row">
      <div class="col-lg-8 col-12 text-justify mb-3">
        <p>
          <?php echo $dadosProduto[0]['s_processofabricacao_produto'] ?>
        </p>
      </div>
      <div class="col-lg-4 col-12 text-center">
        <img class="img-fluid m-auto rounded-5 imagemCorpo" style="" src="<?php echo $dadosProduto[0]['s_imagem2_produto'] ?>"/>
      </div>
      
    </div>
  </div>
</div>


<style>
  .imagemCorpo {
    max-width: 30vh;
  }
  @media (max-width: 992px)
  {
    .imagemCorpo
    {
      max-width: 80%;
    }
  }
</style>

