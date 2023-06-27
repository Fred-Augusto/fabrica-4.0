<div class="image-header"></div>
<div class="container bg-light rounded shadow" style="margin-top: -100px">
  <div class="row">
    <div class="col-12">
      <h1 class="display-4">
        Produtos
      </h1>
      <div class="row">
        
      </div>
      <div class="row">
        <?php
          // SELECT * FROM lojafabrica_tb_produto
          // LEFT JOIN lojafabrica_tb_itemproduto 
          // ON lojafabrica_tb_produto.n_produto_produto = lojafabrica_tb_itemproduto.n_produto_produto
          $query = getSelectBD("SELECT * FROM lojafabrica_tb_produto
                                LEFT JOIN lojafabrica_tb_itemproduto
                                ON lojafabrica_tb_produto.n_produto_produto = lojafabrica_tb_itemproduto.n_produto_produto
                                -- WHERE b_ativo_produto = '1'
                                ORDER BY b_ativo_produto DESC, n_ordemloja_produto ASC");

          $produtos = array();
          foreach ($query as $key => $registro) {
            $existe = false;
            foreach ($produtos as $key => $value) {
              if ($value['n_produto_produto'] == $registro['n_produto_produto']){
                $existe = true;
                break;
              }
            }
            if (!$existe){
              array_push($produtos, $registro);
            }
          }
          foreach ($produtos as $key => $value) {
            $personalizavel = false;
            foreach ($query as $key => $value_) {
              if ($value['n_produto_produto'] == $value_['n_produto_produto'] && $value_['c_personalizavel_itemproduto'] == 1)
                $personalizavel = true;
            }
            ?>
              <div class="col-xl-3 col-lg-4 col-md-6 col-12 ml-auto mr-auto p-2" <?php echo $value['b_ativo_produto'] != 1 ? 'style="opacity: 0.4;"' : '' ?>>
                <div class="card m-2 row" style="height: 100%">
                  <img src="<?php echo $value['s_imagem1_produto'] ?>" class="card-img-top mt-auto <?php echo $value['b_ativo_produto'] != 1 ? 'grayscale' : '' ?>">
                  <div class="card-body row">
                    <h5 class="card-title mt-2"><?php echo $value['s_nome_produto'] ?></h5>
                    <?php
                      if($value['b_ativo_produto']){
                        ?>
                        <?php echo ($personalizavel ? '<h6 style="color: darkgray">Item personalizável!</h6>' : '') ?>
                        <p class="card-text text-justify">
                          <?php echo $value['s_chamada_produto'] ?>
                        </p>
                        <a href="detalhesProduto/<?php echo $value['n_produto_produto'] ?>" class="btn btn-primary col-12 mt-auto" style="height: fit-content">Detalhes/Fabricar</a>
                        <?php
                      } else {
                        ?>
                        <br>
                        <p class="card-text text-justify" style="font-size: 1.3em">
                          Sem estoque
                        </p>


                        <?php
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
  </div>
</div>
