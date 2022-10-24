<?php
    include "servidor.php";
    $email = $_POST['email'];
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

        }else{
            $emailRetornado = mysqli_fetch_array($resultadoEmailEmpresa);
            $sqlUsuario = "SELECT * FROM usuarios WHERE empresas_id='". $emailRetornado['id'] ."'";
        }

        $resultadoUsuario = mysqli_query($conexao,$sqlUsuario);
        $nlUsuario = mysqli_num_rows($resultadoUsuario);

        if($nlUsuario > 0){

            $Usuario = mysqli_fetch_array($resultadoUsuario);
            $codigoRecuperacao = rand(10000000,99999999);
            $sqlSalvaCodigoRecuperacao = "UPDATE usuarios SET codigo_recuperacao='". $codigoRecuperacao ."' WHERE id='". $Usuario['id'] ."'";
            $resultadoSalvaCodigoRecuperacao = mysqli_query($conexao,$sqlSalvaCodigoRecuperacao);

            if($resultadoSalvaCodigoRecuperacao){
                
                $destinatario = $emailRetornado['email'];
                $assunto = "Código de recuperação de senha do portal Vaguinhas.com.br";
                $mensagem = 
                "
                    Olá ". $emailRetornado['nome'] .", conforme solicitação de recuperação de senha no portal de vagas vaguinhas.com.br, seu código de recuperação de senha é: <b>". $codigoRecuperacao ."</b><br>
                    Para realizar a alteração de senha, acesse o link: <a href='http://vaguinhas.com.br/?pagina=recuperaSenha'>http://vaguinhas.com.br/?pagina=recuperaSenha</a> e insira o código de recuperação.<br>
                    Equipe Vaguinhas
                ";
                $headers[] = "MIME-Version: 1.0";
                $headers[] = "Content-type: text/html; charset=utf-8";

                $enviar = mail($destinatario,$assunto,$mensagem, implode("\r\n", $headers));
            
                if($enviar){
                    echo "<script type='text/javascript' charset='utf-8'> alert('Um e-mail foi enviado com o codigo de recuperacao.'); window.location.href='../?pagina=recuperaSenha'; </script>";
                    
                }else{
                    echo "<script type='text/javascript' charset='utf-8'> alert('Erro ao enviar o codigo de recuperacao.'); window.location.href='../?pagina=principal'; </script>";
                }



            }else{
                echo "<script type='text/javascript' charset='utf-8'> alert('Erro ao gerar codigo de recuperacao.'); window.location.href='../?pagina=principal'; </script>";
            }



        }else{
            echo "<script type='text/javascript' charset='utf-8'> alert('Usuario inexistente em nossa base de dados!'); window.location.href='../?pagina=principal'; </script>";
        }


    }else{
        echo "<script type='text/javascript' charset='utf-8'> alert('E-mail inexistente em nossa base de dados!'); window.location.href='../?pagina=principal'; </script>";
    }
    

?>