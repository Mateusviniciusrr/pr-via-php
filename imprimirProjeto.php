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
	
	$html .= '<tbody>';
   
   


    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
    
    $sql = "SELECT * FROM extensao WHERE id='$id'";
    $result = $conexao->query($sql);
    
    if($result->num_rows > 0)
    {

	while($row_horas = mysqli_fetch_assoc($result)){
		
		$html .= '<thead>';
        $html.='<td>'. "Professor:"."<br>".$row_horas['professor']."</tr>";
        $html .= '</thead>';


        $html.= '<td>'. "Curso:"."<br>".$row_horas['curso']."</tr>";

        $html .= '<tr>';
        
        $html.= '<td>'. "Professores Colaboradores:"."<br>".$row_horas['prof_colaboradores']."</tr>";
        $html .= '</tr>';
        $html .= '<tr>';
         
        $html.= '<td>'. "Alunos colaboradores:"."<br>".$row_horas['alunos_colaboradores']."</tr>";
        $html .= '</tr>';

        $html .= '<tr>';

        $html.= '<td>'. "Tipo da atividade:"."<br>".$row_horas['tipo']."</tr>";
        $html .= '</tr>';
        $html .= '<tr>';

        $html.= '<td>'. "Inicio:"."<br>".$row_horas['inicio']."</tr>";

        $html .= '</tr>';
        $html .= '<tr>';
        $html.= '<td>'. "Fim:"."<br>".$row_horas['final']."</th>";
        $html .= '</tr>';
        $html .= '<tr>';
        $html.= '<td>'. "Título:"."<br>".$row_horas['titulo']."</th>";

        $html .= '</tr>';
        $html .= '<tr>';
        $html.='<td>'. "Tema:"."<br>".$row_horas['area']."</td>";
        $html .= '</tr>';
        $html .= '<tr>';
        $html.= '<td>'. "Temática:"."<br>".$row_horas['tematica']."</td>";
        $html .= '</tr>';
        $html .= '<tr>';
        $html.='<td>'. "Natureza da ação:"."<br>".$row_horas['natureza']."</td>";
        $html .= '</tr>';
        $html .= '<tr>';
        $html.= '<td>'. "Resumo:"."<br>".$row_horas['resumo']."</td>";
        
        $html .= '</tr>';

        $html .= '<tr>';
        $html.= '<td>'. "Tema:"."<br>".$row_horas['tema']."</td>";
        $html .= '</tr>';
        $html .= '<tr>';

        $html.= '<td>'. "Ojetivo geral:"."<br>".$row_horas['obj_geral']."</td>";
        $html .= '</tr>';
        $html .= '<tr>';
        $html.= '<td>'. "Objetivo específico:"."<br>".$row_horas['obj_especifico']."</td>";
        $html .= '</tr>';
        $html .= '<tr>';
        $html.= '<td>'. "Justificativa:"."<br>".$row_horas['justificativa']."</td>";
        
        $html .= '</tr>';
        $html .= '<tr>';
        $html.= '<td>'. "Metodologia:"."<br>".$row_horas['metodologia']."</td>";
        $html .= '</tr>';
        $html .= '<tr>';
        $html.= '<td>'. "Fundamentação teórica:"."<br>".$row_horas['fundamentacao']."</td>";

        $html .= '</tr>';
        $html .= '<tr>';
        $html.= '<td>'. "Cronograma:"."<br>".$row_horas['cronograma']."</td>";
        $html .= '</tr>';
        $html .= '<tr>';
        $html.= '<td>'. "Resultados esperados:"."<br>".$row_horas['resultados']."</td>";
        $html .= '</tr>';
        $html .= '<tr>';

        $html.= '<td>'. "Insumos:"."<br>".$row_horas['insumos']."</td>";

        $html .= '<tr>';
        $html.= '<td>'. "Carga semanal:"."<br>".$row_horas['carga_semanal']."</td>";

        $html .= '<tr>';
        $html.= '<td>'. "Carga total:"."<br>".$row_horas['carga_total']."</td>";

        $html .= '<tr>';
        $html.= '<td>'. "Apoio:"."<br>".$row_horas['apoio']."</td>";
        $html .= '</tr>';
        $html .= '<tr>';


        $html.= '<td>'. "Local:"."<br>".$row_horas['local']."</td>";
        
        $html .= '</tr>';
        $html .= '<tr>';

        $html.= '<td>'. "Observações:"."<br>".$row_horas['observacao']."</td>";	
        $html .= '</tr>';
	}
	
	$html .= '</tbody>';
	$html .= '</table';

}
}

       






	// include autoloader
	require_once ('dompdf/autoload.inc.php');
	
	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	

	$dompdf= new dompdf();


	// Carrega seu HTML
	$dompdf->load_html('
			<h2 style="text-align: center;">Relatório do projeto</h2>
           
            
			
			
			'. $html .'
			
		');


		$dompdf->setpaper('A4', 'portrait');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_projeto.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>