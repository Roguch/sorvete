<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gerente Pagina</title>
    <style>
        body{font-family:Calibri, Tahoma, Arial}
        .AbasControli{ width:100%;  height:400px}
        .AbasControli #abas{ width:100%; overflow:hidden; cursor:hand}
        .AbasControli #conteudos{ width:100%; border: solid 1px;overflow:hidden; height:100%; }
        .AbasControli .abas{display:inline;}
        .AbasControli .abas li{float:left}
        .aba{width:110px; height:30px; border:solid 1px; border-radius:5px 5px 0 0;
            text-align:center; padding-top:5px; background: #8a5454
        }
        .ativa{width:110px; height:30px; border:solid 1px; border-radius:5px 5px 0 0;
            text-align:center; padding-top:5px; background: #5a2929;}
        .ativa span, .selected span{color:#fff}
        .AbasControli #conteudos{background: #d09d70
        }
        .AbasControli .conteudo{background: #d09d70; display:none;color:#fff; width: 1885px; height: 925px;}
        .selected{width:110px; height:30px; border:solid 1px; border-radius:5px 5px 0 0;
            text-align:center; padding-top:5px; background: #5a2929
        }
        #sair{background: #d09d70;}
    </style>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
             $("#conteudos div:nth-child(1)").show();
             $(".abas li:first div").addClass("selected");
             $(".aba").click(function(){
                      $(".aba").removeClass("selected");
                      $(this).addClass("selected");
                      var indice = $(this).parent().index();
                      indice++;
                      $("#conteudos div").hide();
                      $("#conteudos div:nth-child("+indice+")").show();
             });

             $(".aba").hover(
                      function(){$(this).addClass("ativa")},
                  function(){$(this).removeClass("ativa")}
              );
        });
    </script>
</head>
<body>

    <div class="AbasControli">
        <div id="abas">
            <ul class="abas">
                <li>
                    <div class="aba">
                        <span>Funcionarios</span>
                    </div>
                </li>
                <li>
                    <div class="aba">
                        <span>Sorvete</span>
                    </div>
                </li>
                <li>
                    <div class="aba">
                        <span>Fornecedor</span>
                    </div>
                </li>
                <input type="button" onclick="window.location='valida.php';" value="sair" id="sair" style="background: #d09d70;">
                <input type="button" onclick="window.location='valida.php?acao=cad';" value="cadastrar" id="cadastro" style="background: #d09d70;">
            </ul>
        </div>

        <div id="conteudos" style="width: 1885px; height: 905px; padding-left: 10px">
        <div class="conteudo" >
            <?php foreach ($funcionarios as $funcionario):?>
                    <tr>
                        <br>
                        <?php echo "Nome:".$funcionario->getNome()." "?>
                        <br>
                        <?php echo "Funcao:".$funcionario->getTipo_user()." "?>
                        <br>
                        <?php echo "Email:".$funcionario->getEmail()." "?>
                        <br>
                        <?php echo "Login:".$funcionario->getLogin()." "?>
                        <br>
                        <?php echo "Telefone:".$funcionario->getTelefone()." "?>
                        <br>
                    </tr>
            <?php endforeach;?>
        </div>
        <div class="conteudo" style="padding-top: 20px">
            <?php foreach ($sorvetes as $sorvete):?>
                <tr>
                    <?php echo "Nome:".$sorvete->getNome()." "?>
                    <br>
                    <?php echo "Sabor:".$sorvete->getSabor()." "?>
                    <br>
                    <?php echo "Quantidade:".$sorvete->getQuant()." "?>
                    <br>
                    <?php echo "Validade:".$sorvete->getValidade()." "?>
                    <br>
                    <?php echo "Data de Entrada:".$sorvete->getdataEnt()." "?>
                </tr>
            <?php endforeach;?>
        </div>
        <div class="conteudo" style="padding-top: 20px">
            <?php foreach ($fornecedores as $fornecedor):?>
                <tr>
                    <?php echo "Nome:".$fornecedor->getNome()." "?>
                    <br>
                    <?php echo "Telefone:".$fornecedor->getTelefone()." "?>
                    <br>
                    <?php echo "Email:".$fornecedor->getEmail()." "?>
                    <br>
                </tr>
            <?php endforeach;?>
        </div>
    </div>



</div>
</body>
</html>