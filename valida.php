 <?php
        require_once "modelos/DBConnection.php";
        require_once "modelos/CrudUsuario.php";
        require_once "modelos/CrudSorvete.php";
        require_once "modelos/CrudFornecedor.php";
        if (isset($_POST['acao'])){
            $acao = $_POST['acao'];
        }elseif (isset($_GET['acao'])){
            $acao = $_GET['acao'];
        }else{
            $acao = 'sair';
        }
        if (isset($_POST['acao2'])) {
            $acao2 = $_POST['acao2'];
        }else{
            $acao2 = 0;
        }
        $crud  = new CrudUsuario();
        $crud2  = new CrudSorvete();
        $crud3  = new CrudFornecedor();
        switch ($acao){
            case 'logar':
                $resutado = $crud->validaUsuario($_POST['login'],$_POST['senha']);
                if ($resutado == null){
                    echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='view/senha.html'; </script>";
                    die();
                }elseif($resutado->getTipo_user() == 'gerente'){
                    $funcionarios = $crud->getUsuarios();
                    $sorvetes     = $crud2->getSorvetes();
                    $fornecedores = $crud3->getFornecedores();

                    include "view/gerenteSorvete.php";
                }elseif ($resutado->getTipo_user() == 'funcionario' ){

                    $sorvetes     = $crud2->getSorvetes();
                    $crudSor = new CrudSorvete();
                    include "view/funcionarioSorvete.php";

                }
                break;
            case 'sair':
                header("location:view/senha.html");
            case 'cad':
                include "view/cadastro.php";
                break;
            case 'cadastroFun':

                    $funcionario = new Usuario($_POST['cpf'],null,$_POST['email'],$_POST['name'],$_POST['login'],$_POST['senha'],$_POST['telefone']);
                    $crud->insertUsuario($funcionario);
                    echo"<script language='javascript' type='text/javascript'>alert('Cadastro Realizado');window.location.href='view/cadastro.php'; </script>";
                    include "view/cadastro.php";
                    break;

            case 'cadastroSor':

                     $cpf = $crud->achaUsuario($_POST['cpf']);
                    $cnpj = $crud3->achaFornecedor($_POST['cnpj']);

                    $sorvete = new Sorvete(null,$_POST['nome'],$_POST['sabor'],$_POST['qtd'],$_POST['validade'],$_POST['data_ent'],$cnpj,$cpf);
                    $crud2->insertSorvete($sorvete);
                    echo"<script language='javascript' type='text/javascript'>alert('Cadastro Realizado');window.location.href='view/cadastro.php'; </script>";
                    include "view/cadastro.php";
                    break;

            case 'cadastroFor':

                $fornecedore =new Fornecedor($_POST['cnpj'],$_POST['nome'],$_POST['email'],$_POST['telefone']);
                $crud3->insertFornecedor($fornecedore);
                echo"<script language='javascript' type='text/javascript'>alert('Cadastro Realizado');window.location.href='view/cadastro.php'; </script>";
                include "view/cadastro.php";
                break;

            case 'retira' :

                $aqui = $_GET['sorId'];
                echo $aqui;
        }
?>