<?php	
session_start();
// print_r($_SESSION);
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: index.php');

   
}

$logado = $_SESSION['email'];
	include_once("config.php");
	$html = '<table border=1';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>Aluno</th>';
	$html .= '<th>Matricula</th>';
	$html .= '<th>curso</th>';
	$html .= '<th>eixo da atividade</th>';
	$html .= '<th>tipo da atividade</th>';
	$html .= '<th>Numero de Horas</th>';
	$html .= '<th>status</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
	
	$result_horas = "SELECT * FROM horas WHERE user= '$logado'";
	$resultado_horas = mysqli_query($conexao, $result_horas);

	while($row_horas = mysqli_fetch_assoc($resultado_horas)){
		
		$html .= '<tr><td>'.$row_horas['aluno'] . "</td>";
		$html .= '<td>'.$row_horas['matricula'] . "</td>";
		$html .= '<td>'.$row_horas['curso'] . "</td>";
		$html .= '<td>'.$row_horas['eixo'] . "</td>";
		$html .= '<td>'.$row_horas['tipo'] . "</td>";
		$html .= '<td>'.$row_horas['numero_horas'] . "</td>";
		$html .= '<td>'.$row_horas['status']. "</td></tr>";		
	}
	
	$html .= '</tbody>';
	$html .= '</table';

   





	// include autoloader
	require_once ('dompdf/autoload.inc.php');
	
	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	

	$dompdf= new dompdf();


	// Carrega seu HTML
	$dompdf->load_html('
			<h2 style="text-align: center;">Relatório de Horas Complementares</h2>
			
			
			
			'. $html .'
			
		');


		$dompdf->setpaper('A4', 'portrait');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_horas.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>