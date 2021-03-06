<?php
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_aluno/mensagens_".$idioma_sistema.".txt";
require "../bibliotecas/bloqueio_arquivo.bib";

if ($cod=="Excluir") {
if ($arCod!="") {
if ($arURL!="") {
unlink ($arURL);
}

$total="DELETE FROM Arquivos WHERE arCod='$arCod'";
$exclusao=mysql_db_query($base, $total, $conexao);

$total_la="DELETE FROM LegendaArquivo WHERE arCod='$arCod'";
$exclusao_la=mysql_db_query($base, $total_la, $conexao);

header("Location: inserir_arquivo.php?tsIdentificador=$tsIdentificador&pfCod=$pfCod");
}
}

if ($cod=="Inserir") {
$erro="";
$erro1="";
$sucesso="";

//Verificar extensao do Arquivo
//Se for PHP n�o enviar� o arquivo
$arquivo_name_split=split("\.",$arquivo_name);
$extensao=strtoupper($arquivo_name_split[1]);
$nome_arquivo=$arquivo_name_split[0];
//Variavel verifica a exist�ncia de ponto no nome do arquivo
$verificaponto=$arquivo_name_split[2];
if ($extensao=="PHP") {
$erro=$e011;
header("Location: inserir_arquivo.php?tsIdentificador=$tsIdentificador&pfCod=$pfCod&erro=$erro");
exit;
}

// Verifica acento no nome do arquivo
function temAcento($string) 
{ 
    $regExp = "[�������������������������������������������������.]";
    return  ereg($regExp,$string); 
} 

if(temAcento($nome_arquivo)) unset($nao); 
else $nao = "n";

if ($verificaponto!="") {
$nao="";
}
if ($nao=="n") {

$SEL_ts="SELECT * FROM Teses WHERE tsIdentificador=$VtsIdentificador";
$SEL_ts_query=mysql_db_query($base,$SEL_ts,$conexao);
$SEL_ts_RES=mysql_fetch_array($SEL_ts_query);

$tsDataAtualizacao=$SEL_ts_RES["tsDataAtualizacao"];
$tsDataAtualizacao_split=split(" ",$tsDataAtualizacao);
$tsDataAtualizacao=$tsDataAtualizacao_split[0]."T".$tsDataAtualizacao_split[1]."Z";
$tsDataAtualizacao=str_replace(":","",$tsDataAtualizacao);

if ($arquivo!="none") {

$ArquivoDir="../tde_arquivos/".$VprCod."/TDE-".$tsDataAtualizacao."-".$VtsIdentificador."/".$arDireitos."/";

if (!is_writeable($ArquivoDir)){
mkdir ("../tde_arquivos/".$VprCod,0775);
mkdir ("../tde_arquivos/".$VprCod."/TDE-".$tsDataAtualizacao."-".$VtsIdentificador,0775);
mkdir ("../tde_arquivos/".$VprCod."/TDE-".$tsDataAtualizacao."-".$VtsIdentificador."/Retido",0770);
mkdir ("../tde_arquivos/".$VprCod."/TDE-".$tsDataAtualizacao."-".$VtsIdentificador."/Restrito",0775);
mkdir ("../tde_arquivos/".$VprCod."/TDE-".$tsDataAtualizacao."-".$VtsIdentificador."/Publico",0775);
if (!is_writeable($ArquivoDir)){
$erro=$e012;
header("Location: inserir_arquivo.php?tsIdentificador=$tsIdentificador&pfCod=$pfCod&erro=$erro");
exit;
}
} 
	if (copy($arquivo,"$ArquivoDir".$arquivo_name)){
	$arURL=$ArquivoDir.$arquivo_name;
	$arFormato_split=split("\.",$arquivo_name);
	$arFormato=$arFormato_split[1];
	$arFormato=strtoupper($arFormato);
	}else{
	$erro=$e003;
	header("Location: inserir_arquivo.php?tsIdentificador=$tsIdentificador&pfCod=$pfCod&erro=$erro");
exit;
	} 
}
//Verifica se arquivo PDF est� protegido com senha

$extencao_arquivo_split=split("\.",$arquivo_name);
$extencao_arquivo=$extencao_arquivo_split[1];
$extencao_arquivo=strtolower($extencao_arquivo);

if ($extencao_arquivo=="pdf" and $arBloqueioNecessario=="Sim"){

$variavel=file("$arURL");
$qtd=count($variavel);

for ($i=0; $qtd>=$i; $i++) {

$verifica=preg_match('/\/Encrypt/',$variavel[$i]);

if ($verifica!="") {

$protegido="Sim";

}
}

if ($protegido!="Sim") {

$erro=$e002;
unlink($arURL);

header("Location: inserir_arquivo.php?tsIdentificador=$tsIdentificador&pfCod=$pfCod&erro=$erro");

exit;

}
}

$SEL_ar="SELECT arURL FROM Arquivos WHERE tsIdentificador=$VtsIdentificador and arURL='$arURL'";
$SEL_ar_query=mysql_db_query($base,$SEL_ar,$conexao);
$SEL_ar_RES=mysql_fetch_array($SEL_ar_query);

if ($SEL_ar_RES=="") {

$campos="tsIdentificador,arFormato,arURL,arDireitos";
$inclusao="'$VtsIdentificador','$arFormato','$arURL','$arDireitos'";
$total="insert into Arquivos ($campos) values ($inclusao)";
$inconteudo=mysql_db_query($base, $total, $conexao);

$SEL_ar_cod="SELECT arCod FROM Arquivos WHERE tsIdentificador=$VtsIdentificador and arURL='$arURL'";
$SEL_ar_codquery=mysql_db_query($base,$SEL_ar_cod,$conexao);
$SEL_ar_codRES=mysql_fetch_array($SEL_ar_codquery);
$arCod=$SEL_ar_codRES['arCod'];

//Insere a Legenda do arquivo na Tabela LegendaArquivo

$campos_la="arCod,laLegenda,laIdioma";
$inclusao_la="'$arCod','$laLegenda','$laIdioma'";
$total_la="insert into LegendaArquivo ($campos_la) values ($inclusao_la)";
$inconteudo_la=mysql_db_query($base, $total_la, $conexao);

}

$sucesso=$sg001;
} else{

$erro=$e010;
header("Location: inserir_arquivo.php?tsIdentificador=$tsIdentificador&pfCod=$pfCod&erro=$erro");

exit;
}
}
?>