<?php
    include 'servidor.php';
    $email = $_POST['email'];
    $codigo_recuperacao = $_POST['codigo_recuperacao'];
    $senha = $_POST['senha'];
    $repeteSenha = $_POST['repete_senha'];

    if($senha == $repeteSenha){

        $emailRetornadoAluno = false;
        $emailRetornadoEmpresa = false;
    
        $sqlEmail = "SELECT * FROM alunos WHERE email='". $email ."'";
        $resultadoEmail = mysqli_query($conexao, $sqlEmail);
        $nlEmail = mysqli_num_rows($resultadoEmail);
    
        if($nlEmail > 0){
            $emailRetornadoAluno = true;
    
        }else{
            $sqlEmailEmpresa = "SELECT * FROM empresas WHERE email='". $email ."'";
            $resultadoEmailEmpresa = mysqli_query($conexao, $sqlEmailEmpresa);
            $nlEmailEmpresa = mysqli_num_rows($resultadoEmailEmpresa);
    
            if($resultadoEmailEmpresa > 0){
                $emailRetornadoEmpresa = true;
            }
        }
    
        if($emailRetornadoAluno || $emailRetornadoEmpresa){
            if($emailRetornadoAluno){
                $emailRetornado = mysqli_fetch_array($resultadoEmail);
                $sqlUsuario = "SELECT * FROM usuarios WHERE alunos_id='". $emailRetornado['id'] ."'";
                $pagina = "loginAluno";
    
            }else{
                $emailRetornado = mysqli_fetch_array($resultadoEmailEmpresa);
                $sqlUsuario = "SELECT * FROM usuarios WHERE empresas_id='". $emailRetornado['id'] ."'";
                $pagina = "loginEmpresa";
            }
    
            $resultadoUsuario = mysqli_query($conexao,$sqlUsuario);
            $nlUsuario = mysqli_num_rows($resultadoUsuario);
    
            if($nlUsuario > 0){
    
                $Usuario = mysqli_fetch_array($resultadoUsuario);

                //CRIA UM HASH DE SEGURANÇA COM A SENHA DO USUARIO
                $hash = md5($Usuario['login'] . $senha);
                //CRIA UM LOOP COM 666 ENCRIPTAÇÕES DA SENHA DO USUARIO
                for ($i = 0; $i < 666; $i++){
                    $hash = md5($hash);
                }
                
                $sqlSalvaCodigoRecuperacao = "UPDATE usuarios SET codigo_recuperacao='0', senha='". $hash ."' WHERE id='". $Usuario['id'] ."'";
                $resultadoSalvaCodigoRecuperacao = mysqli_query($conexao,$sqlSalvaCodigoRecuperacao);
    
                if($resultadoSalvaCodigoRecuperacao){

                    echo "<script type='text/javascript' charset='utf-8'> alert('Sua senha foi alterada!'); window.location.href='../?pagina=$pagina'; </script>";
    
                }else{
                    echo "<script type='text/javascript' charset='utf-8'> alert('Erro ao gerar codigo de recuperacao.'); window.location.href='../?pagina=recuperaSenha'; </script>";
                }
    
    
    
            }else{
                echo "<script type='text/javascript' charset='utf-8'> alert('Usuario inexistente em nossa base de dados!'); window.location.href='../?pagina=recuperaSenha'; </script>";
            }
    
    
        }else{
            echo "<script type='text/javascript' charset='utf-8'> alert('E-mail inexistente em nossa base de dados!'); window.location.href='../?pagina=recuperaSenha'; </script>";
        }
        



    }else{
        echo "<script type='text/javascript' charset='utf-8'> alert('As senhas digitadas não são iguais.'); window.location.href='../?pagina=recuperaSenha'; </script>";
    }
?>