<?php
/*----------------- CODIGO PARA GERAR O PDF -----------------*/
	//error_reporting(0);

	include "servidor.php";
	
	$alunos_id = $_POST['alunos_id'];
	
	$sqlAluno = "SELECT * FROM alunos WHERE id='". $alunos_id ."'";
	$resultadoAluno = mysqli_query($conexao, $sqlAluno);
	$Aluno = mysqli_fetch_array($resultadoAluno);
	
	$date = new DateTime($Aluno['data_nascimento']);
	$interval = $date->diff( new DateTime( date('Y-m-d') ) );
	$idade = $interval->format( '%Y' );
	
	$endereco = $Aluno['rua'] . ", " . $Aluno['numero'];
	if($Aluno['complemento'] != ""){
		$endereco .= ", " . $Aluno['complemento'];
	}
	$endereco .= ", " . $Aluno['bairro'] . ", " . $Aluno['cidade'] . "/" . $Aluno['estado'] . " - " . $Aluno['cep'];
	$redesSociais = "";
	if($Aluno['github'] != ""){
		$redesSociais .= "<b>GitHub: </b>". $Aluno['github'] . "<br>";
	}
	if($Aluno['linkedin'] != ""){
		$redesSociais .= "<b>LinkedIn: </b>". $Aluno['linkedin'] . "<br>";
	}
	if($Aluno['instagram'] != ""){
		$redesSociais .= "<b>Instagram: </b>". $Aluno['instagram'] . "<br>";
	}
	if($Aluno['facebook'] != ""){
		$redesSociais .= "<b>Facebook: </b>". $Aluno['facebook'] . "<br>";
	}
	if($Aluno['site'] != ""){
		$redesSociais .= "<b>Site/Portifólio: </b>". $Aluno['site'] . "<br>";
	}
	
	
	$conteudo = "
		<style>
			body{
				font-family: verdana;
				font-size: 14px;
				line-height: 1.5;
			}
			.titulo{
				border: 0px solid #000;
				margin-right: 0;
			}
			.separador{
				border-bottom: 1px solid #000;
				font-weight: bold;
				font-size: 16px;
				padding-top: 20px;
			}
			.conteudo{
				border: 0px solid #000;
				margin-left: 0;
				text-align: justify;
				padding-left: 40px;
				padding-right: 40px;
			}
			.foto{
				border: 0px solid #000;
				margin-left: 0;
				text-align: right;
				vertical-align: text-top;
			}
			#minhaTabela { 
                border-collapse: collapse;
            }
			#minhaTabelaConteudo { 
                border-collapse: collapse; 
            }			
			.fim{
				border: 0px solid #000;
				margin-left: 0;
			}
			.fimTablea{
				border: 1px solid #000;
				margin-left: 0;
				background-color: #d1d1d1;
				font-weight: bold;
				text-align: center;
				padding: 15px;
			}
			.opcao{
				border: 1px solid #000;
				text-align: center;
				font-weight: bold;
			}
			.opcao-dado{
				border: 1px solid #000;
				text-align: center;
			}
			.center{
				text-align: center;
			}
		</style>
		<body>
			<table width='100%' id='minhaTabela'>
				<tr>
					<td colspan='8' class='titulo'>
						<p style='font-size: 16px'><b><u>". $Aluno['nome'] ."</u></b></p><br>
						". ucfirst($Aluno['nacionalidade']) .", ". ucfirst($Aluno['estado_civil']) .", nascido em ". date('d/m/Y', strtotime($Aluno['data_nascimento'])) .", ". $idade ." anos.<br>
						". $endereco ."<br>
						<b>Telefone: </b> ". $Aluno['celular'] ."<br>
						<b>Email: </b> ". $Aluno['email'] ."<br>
						". $redesSociais."
					</td>
					<td colspan='4' class='foto'>
	";
	if($Aluno['link_foto'] != ""){
		$conteudo .= "<img src='../lib/img/fotosPerfil/". $Aluno['link_foto'] ."' width='100px'></img>";
	}
	$conteudo .= "
					</td>
				</tr>
	";			
				
	$conteudo .= "			
				<tr>
					<td colspan='12' class='separador'>
						FORMAÇÃO
					</td>
				</tr>
				<tr>
					<td colspan='12' class='conteudo'>
						<ul>
	";

	$sqlEscolaridade = "SELECT * FROM escolaridade_alunos WHERE alunos_id='". $Aluno['id'] ."' AND tipo <> 'curso profissionalizante' ORDER BY ano ASC";
	$resultadoEscolaridade = mysqli_query($conexao, $sqlEscolaridade);
	while($Escolaridade = mysqli_fetch_array($resultadoEscolaridade)){
		$conteudo .= "
							<li>
								". ucfirst($Escolaridade['tipo']) ." (". $Escolaridade['ano'] .") - ". ucfirst($Escolaridade['local']) ."
							</li>
		";
	}
	$conteudo .= "	
						</ul>
					</td>
				</tr>
				<tr>
					<td colspan='12' class='separador'>
						OUTRAS FORMAÇÕES
					</td>
				</tr>
				<tr>
					<td colspan='12' class='conteudo'>
						<ul>
	";

	$sqlEscolaridade = "SELECT * FROM escolaridade_alunos WHERE alunos_id='". $Aluno['id'] ."' AND tipo='curso profissionalizante' ORDER BY ano ASC";
	$resultadoEscolaridade = mysqli_query($conexao, $sqlEscolaridade);
	while($Escolaridade = mysqli_fetch_array($resultadoEscolaridade)){
		$conteudo .= "
							<li>
								". ucfirst($Escolaridade['tipo']) ." (". $Escolaridade['ano'] .") - ". ucfirst($Escolaridade['local']) ."
							</li>
		";
	}
	$conteudo .= "	
						</ul>
					</td>
				</tr>
				<tr>
					<td colspan='12' class='separador'>
						EXPERIÊNCIA PROFISSIONAL
					</td>
				</tr>
				<tr>
					<td colspan='12' class='conteudo'>
						<ul>
	";

	$sqlExp = "SELECT * FROM experiencia_alunos WHERE alunos_id='". $Aluno['id'] ."' ORDER BY ano_inicio ASC";
	$resultadoExp = mysqli_query($conexao, $sqlExp);
	while($Exp = mysqli_fetch_array($resultadoExp)){
		$conteudo .= "
							<li>
								". $Exp['ano_inicio'] ." / ". ucfirst($Exp['ano_termino']) ." - <b>". $Exp['local'] ."</b> - ". $Exp['descricao'] ."
							</li>
		";
	}
	$conteudo .= "	
						</ul>
					</td>
				</tr>
				<tr>
					<td colspan='12' class='separador'>
						INFORMAÇÕES ADICIONAIS
					</td>
				</tr>
				<tr>
					<td colspan='12' class='conteudo'>
						<ul>
	";

	$sqlInfo = "SELECT * FROM informacoes_alunos WHERE alunos_id='". $Aluno['id'] ."'";
	$resultadoInfo = mysqli_query($conexao, $sqlInfo);
	while($Info = mysqli_fetch_array($resultadoInfo)){
		$conteudo .= "
							<li>
								". $Info['descricao'] ."
							</li>
		";
	}
	$conteudo .= "	
						</ul>
					</td>
				</tr>
			</table>
	";

		
	$cabecalho = "
		<table width='100%'>
			<tr>
				<th width='15%'>
					<img src='../lib/img/logo.png' alt='logoVaguinhas' height='50px'></img>
				</th>
				<th width='70%'>
					ESTE DOCUMENTO NÃO TEM VALOR PROFISSIONAL, FOI CRIADO APENAS PARA APRESENTAÇÃO DO TRABALHO DA FATEC
				</th>
				<th width='15%'>
					<img src='../lib/img/logo.png' alt='logoVaguinhas' height='50px'></img>
				</th>
			</tr>
		</table>
		<hr>
	";
	
	$rodape = "
		<hr>
		<table width='100%'>
			<tr>
				<th width='15%'>
					<img src='../lib/img/logo.png' alt='logoVaguinhas' height='50px'></img>
				</th>
				<th width='70%' style='text-align: center; font-size: 12px; color: #9f9f9f;'>
					Gerado em: ". date("d/m/Y") ." - Página <b>{PAGENO}</b> de <b>{nb}</b><br>
					DOCUMENTO SEM VALOR PROFISSIONAL
				</th>
				<th width='15%'>
					<img src='../lib/img/logo.png' alt='logoVaguinhas' height='50px'></img>
				</th>
			</tr>
		</table>
	";
	
	

	include "../lib/vendor/autoload.php";
	$mpdf = new \Mpdf\Mpdf([
		'mode' => 'utf-8', 
		'format' => 'A4',    // format - A4, for example, default ''
		'default_font_size' => 0,     // font size - default 0
		'default_font' => '',    // default font family
		'margin_top' => 20,
		'margin_bottom' => 30,
		'margin_left' => 10,    	// 15 margin_left
		'margin_right' => 10,    	// 15 margin right
		// 'mgt' => $headerTopMargin,     // 16 margin top
		// 'mgb' => $footerTopMargin,    	// margin bottom
		'margin_header' => 0,     // 9 margin header
		'margin_footer' => 0,     // 9 margin footer
		'orientation' => 'P'  	// L - landscape, P - portrait
	]);
	$mpdf->allow_charset_conversion=true;  // Set by default to TRUE
	$mpdf->SetHTMLHeader($cabecalho);
	$mpdf->SetHTMLFooter($rodape);
	utf8_encode($conteudo);
	// Escreve o conteúdo da variável $html
	$mpdf->WriteHTML($conteudo);
	// Exporta o resultado para PDF
	$mpdf->Output();















?>
