<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: ../index.php");
}else{
			 require "../conexao/conexao.inc"; 
			 if ($VtsIdentificador==""){
 $VtsIdentificador=$tsIdentificador;
 }
 if ($VpfCod=="") {
  $VpfCod=$pfCod;
  }
			$SEL_ts="SELECT * FROM Teses WHERE tsIdentificador=$tsIdentificador";
			$SEL_ts_query=mysql_db_query($base,$SEL_ts,$conexao);
            $SEL_ts_RES=mysql_fetch_array($SEL_ts_query);

			$tsNumeroChamada=$SEL_ts_RES["tsNumeroChamada"];
			$tsIdioma=$SEL_ts_RES["tsIdioma"];
			$tsGrau=$SEL_ts_RES["tsGrau"];
			$tsTitulacao=$SEL_ts_RES["tsTitulacao"];
			$tsDataAtualizacao=$SEL_ts_RES["tsDataAtualizacao"];
			$tsCidadeLocalDefesa=$SEL_ts_RES["tsCidadeLocalDefesa"];
			$tsUFLocalDefesa=$SEL_ts_RES["tsUFLocalDefesa"];
			$tsPaisLocalDefesa=$SEL_ts_RES["tsPaisLocalDefesa"];
            $tsDataDefesa=$SEL_ts_RES["tsDataDefesa"];
			$tsDataFinalizacao=$SEL_ts_RES["tsDataFinalizacao"];
			
			//Pega o nome do Idioma
			$SEL_id="SELECT * FROM Idiomas WHERE idSigla='$tsIdioma'";
	        $SEL_id_query=mysql_db_query($base,$SEL_id,$conexao);
            $SEL_id_RES=mysql_fetch_array($SEL_id_query);

			$tsNomeIdioma=$SEL_id_RES['idIdioma'];
			
			$tsOBS=$SEL_ts_RES["tsOBS"];
			$tsOBSDestino2=$SEL_ts_RES["tsOBSDestino"];
			$tsCampo1=$SEL_ts_RES["tsCampo1"];
			$tsCampo2=$SEL_ts_RES["tsCampo2"];

            $SEL_pf="SELECT * FROM PessoaFisica WHERE pfCod=$pfCod";
	        $SEL_pf_query=mysql_db_query($base,$SEL_pf,$conexao);
            $SEL_pf_RES=mysql_fetch_array($SEL_pf_query);

			$pfCod=$SEL_pf_RES["pfCod"];
			$pfNome=$SEL_pf_RES["pfNome"];
			$pfEmail=$SEL_pf_RES["pfEmail"];
			$pfCitacao=$SEL_pf_RES["pfCitacao"];
			$pfLattes=$SEL_pf_RES["pfLattes"];
			$pfCPF=$SEL_pf_RES["pfCPF"];

			$SEL_tspf="SELECT * FROM TSPF WHERE tsIdentificador=$tsIdentificador and tspfTipo='Autor'";
            $SEL_tspf_query=mysql_db_query($base,$SEL_tspf,$conexao);
            $SEL_tspf_RES=mysql_fetch_array($SEL_tspf_query);

			$tspfDispEmail=$SEL_tspf_RES["tspfDispEmail"];
			$VprCod=$SEL_tspf_RES["prCod"];


			$SEL_pfpj="SELECT * FROM PFPJ WHERE pfCod=$pfCod and pfpjTipo<>'AgenciaFomento'";
            $SEL_pfpj_query=mysql_db_query($base,$SEL_pfpj,$conexao);
            $SEL_pfpj_RES=mysql_fetch_array($SEL_pfpj_query);

			$pjCod=$SEL_pfpj_RES["pjCod"];

			if ($pjCod!="") {

			$SEL_pj="SELECT * FROM PessoaJuridica WHERE pjCod=$pjCod";
			$SEL_pj_query=mysql_db_query($base,$SEL_pj,$conexao);
            $SEL_pj_RES=mysql_fetch_array($SEL_pj_query);

			$pjNome=$SEL_pj_RES["pjNome"];
			$pjSigla=$SEL_pj_RES["pjSigla"];
			$pjPais=$SEL_pj_RES["pjPais"];
			$pjUF=$SEL_pj_RES["pjUF"];
			$pjCNPJ=$SEL_pj_RES["pjCNPJ"];
			$pjURL=$SEL_pj_RES["pjURL"];

			}

			$SEL_pr="SELECT * FROM Programa WHERE prCod=$VprCod";
            $SEL_pr_query=mysql_db_query($base,$SEL_pr,$conexao);
            $SEL_pr_RES=mysql_fetch_array($SEL_pr_query);

			$prNome=$SEL_pr_RES["prNome"];
			$prArea=$SEL_pr_RES["prArea"];

			$SEL_tt="SELECT * FROM Titulo WHERE tsIdentificador=$tsIdentificador ORDER BY ttCod";
            $SEL_tt_query=mysql_db_query($base,$SEL_tt,$conexao);
            $SEL_tt_RES=mysql_fetch_array($SEL_tt_query);

			$i_tt=0;

			while ($SEL_tt_RES!="") {

			$ttTitulo[$i_tt]=$SEL_tt_RES["ttTitulo"];
			if ($SEL_tt_RES["ttIdioma"]!=$tsIdioma) {
			$tsIdiomaALT=$SEL_tt_RES["ttIdioma"];
			}
			$i_tt=$i_tt+1;

			$SEL_tt_RES=mysql_fetch_array($SEL_tt_query);

			}
/*
			//Seleciona Area/Sub-area do CNPQ

			$SEL_as1="SELECT * FROM Assunto WHERE tsIdentificador=$tsIdentificador and asEsquema='Tabela CNPQ' ORDER BY asCod";
            $SEL_as1_query=mysql_db_query($base,$SEL_as1,$conexao);
            $SEL_as1_RES=mysql_fetch_array($SEL_as1_query);

			$asAssunto=$SEL_as1_RES["asAssunto"];
*/
			//Seleciona Palavras-chave

			$SEL_as2="SELECT * FROM Assunto WHERE tsIdentificador=$tsIdentificador and asEsquema='Palavra-chave' and asIdioma='$tsIdioma' ORDER BY asCod";
            $SEL_as2_query=mysql_db_query($base,$SEL_as2,$conexao);
            $SEL_as2_RES=mysql_fetch_array($SEL_as2_query);

			$i_as=0;

			while ($SEL_as2_RES!="") {

			$asAssunto2[$i_as]=$SEL_as2_RES["asAssunto"];
			
			$i_as=$i_as+1;

			$SEL_as2_RES=mysql_fetch_array($SEL_as2_query);

			}

			//Seleciona Palavras-chave em outro idioma

			$SEL_as3="SELECT * FROM Assunto WHERE tsIdentificador=$tsIdentificador and asEsquema='Palavra-chave' and asIdioma!='$tsIdioma' ORDER BY asCod";
            $SEL_as3_query=mysql_db_query($base,$SEL_as3,$conexao);
            $SEL_as3_RES=mysql_fetch_array($SEL_as3_query);

			$i_as=0;

			while ($SEL_as3_RES!="") {

			$asAssunto3[$i_as]=$SEL_as3_RES["asAssunto"];
			$i_as=$i_as+1;
			
			if ($tsIdiomaALT=="") {
			$tsIdiomaALT=$SEL_as3_RES["asIdioma"];
			}
			
			$SEL_as3_RES=mysql_fetch_array($SEL_as3_query);
			}

			$SEL_rs="SELECT * FROM Resumo WHERE tsIdentificador=$tsIdentificador  ORDER BY rsCod";
            $SEL_rs_query=mysql_db_query($base,$SEL_rs,$conexao);
            $SEL_rs_RES=mysql_fetch_array($SEL_rs_query);

			$i_rs=0;

			while ($SEL_rs_RES!="") {

			$rsResumo[$i_rs]=$SEL_rs_RES["rsResumo"];
			$i_rs=$i_rs+1;
            
			if ($tsIdiomaALT=="") {
			$tsIdiomaALT=$SEL_rs_RES["rsIdioma"];
			}
			
			$SEL_rs_RES=mysql_fetch_array($SEL_rs_query);
			}

			$SEL_dr="SELECT * FROM Direitos WHERE tsIdentificador=$tsIdentificador";
            $SEL_dr_query=mysql_db_query($base,$SEL_dr,$conexao);
            $SEL_dr_RES=mysql_fetch_array($SEL_dr_query);

			$drDireito=$SEL_dr_RES["drDireito"];

			

}
?>
