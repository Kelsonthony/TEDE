<? session_start(SprCod ,ScnCod);
if(!session_is_registered("SprCod")) {
header("Location: login.php");
}else{

require "../conexao/conexao.inc";
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_pos/mensagens_".$idioma_sistema.".txt";

if ($cod=="Excluir") {

$total="DELETE FROM Contas WHERE cnCod='$cnCod'";

$exclusao=mysql_db_query($base, $total, $conexao);

$sucesso=$sg001;

header("Location: visualizar_contas.php?v=Editar&sucesso=$sucesso");
exit;
}

if ($cod=="Editar") {

$cnAtualizacao=date("Y-m-d");

$cnDataInicio=$cnAnoInicio."-".$cnMesInicio."-".$cnDiaInicio;
$cnDataTermino=$cnAnoTermino."-".$cnMesTermino."-".$cnDiaTermino;

// Edi��o de conta na tabela Contas
$inclusao_cn="cnNome='$cnNome',cnSenha='$cnSenha',cnEmail='$cnEmail',cnDataInicio='$cnDataInicio',cnDataTermino='$cnDataTermino',cnBloqueado='$cnBloqueado',cnAtualizacao='$cnAtualizacao'";
$total_cn="UPDATE Contas SET $inclusao_cn WHERE cnCod=$cnCod";
$inconteudo_cn=mysql_db_query($base, $total_cn, $conexao);

//Enviar e-mail com a senha e nome da conta para submiss�o da tese
$de="tde@ibict.br";
$to="$cnEmail";
$cnDataAtualizacao_split=split("-", $cnAtualizacao);
$dia=$cnDataAtualizacao_split[2];
$mes=$cnDataAtualizacao_split[1];
$ano=$cnDataAtualizacao_split[0];
$DataAtualizacao=$dia."/".$mes."/".$ano;
$LinkSubmissao="http://copaiba1.ibict.br/tede/tde_aluno/login.php";

$titulo="Altera��o na sua conta para submiss�o de Tese ou Disserta��o -".$DataAtualizacao."";
$mensagem= "No dia ".$DataAtualizacao." sua conta para submiss�o de sua Tese ou Disserta��o foi alterada. \n\n E-mail: ".$cnEmail."\n Senha:".$cnSenha."\n\n Acesse o Link : ".$LinkSubmissao."\n\n Qualquer d�vida procure o respons�vel pelo servi�o de p�s gradua��o de seu programa.\n\n";
mail($to,"$titulo",$mensagem,"From: $de");

$sucesso=$sg001;
$comunicacao=" Nome: ".$cnNome."<br>E-mail: ".$cnEmail."<br>Senha: ".$cnSenha."<br>Data in�cio: ".$cnDataInicio."<br>Data de expira��o: ".$cnDataTermino."<br>";
header("Location: visualizar_contas.php?EVcnCod=$cnCod&v=Editar&sucesso=$sucesso");
exit;
}
}

?>