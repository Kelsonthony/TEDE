<? session_start();
if(!session_is_registered("SprCod")) {
header("Location: login.php");
}else{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><!-- InstanceBegin template="/TemplatesTESTE/tde_pos_menu.dwt" codeOutsideHTMLIsLocked="false" -->
<?
require "../bibliotecas/diretorio_layout.inc";
require "../bibliotecas/idioma_sistema.bib";
?>
<head>
<!-- InstanceBeginEditable name="doctitle" --> 
<title>| Sistema de Publica&ccedil;&atilde;o Eletr&ocirc;nica de Teses e Disserta&ccedil;&otilde;es | P&oacute;s-Gradua&ccedil;&atilde;o | Teses Cadastradas</title>
<!-- InstanceEndEditable --> 
<link href="../tde_layout1/estilos/estilo_geral.css" rel="stylesheet" type="text/css">
<link href="../tde_layout1/estilos/estilo_validacao.css" rel="stylesheet" type="text/css">
<link href="../tde_layout1/estilos/estilo_pos.css" rel="stylesheet" type="text/css">
<script language="JavaScript1.2" type="text/javascript" src="../tde_layout1/scripts/menu.js"></script> 
<?
$script='<script language="JavaScript" src="../tde_i18n/mensagens_js_'.$idioma_sistema.'.js"></script>';
echo $script;
?> 
<!-- InstanceBeginEditable name="head" --> <!-- InstanceEndEditable -->
<meta name="Pragma" content="no-cache">
<meta name="Cache-Control" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="Expires" content="Mon, 06 Jan 1990 00:00:01 GMT">
</head>
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<table width="100%" height="100%"  border="0" align="left" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="78" align="left" valign="top"><table width="100%" height="78"  border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="139" height="80" align="center" valign="top" class="subMenuPos"><table width="100%" height="80"  border="0" align="left" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="139" height="60" align="center" valign="middle" bgcolor="#FFFFFF"><img src="../tde_layout1/imagens/logo_inst.jpg" alt="Logo da Institui&ccedil;&atilde;o" name="logoInst" width="139" height="60" hspace="0" vspace="0" border="0" id="logoInst"></td>
              </tr>
              <tr> 
                <td width="138" height="20" align="left" valign="top"><img src="../tde_layout1/imagens/subMenuarr.gif" width="139" height="20" hspace="0" vspace="0" border="0"></td>
              </tr>
          </table></td>
          <td width="31" height="80" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="menuPos"><img src="../tde_layout1/imagens/menuSep_pos.gif" name="menuSep" width="62" height="68" hspace="0" vspace="0" border="0" id="menuSep"></td>
            </tr>
            <tr>
              <td class="tdConteudo">&nbsp;</td>
            </tr>
          </table>
          </td>
          <td width="100%" height="80" align="left" valign="top"><table width="100%" height="78"  border="0" align="left" cellpadding="0" cellspacing="0">
              <tr> 
                <td height="44" align="left" valign="top"><table width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" class="tituloSistemaInterno">
                    <tr> 
                      <td align="center" valign="middle">SISTEMA DE PUBLICA&Ccedil;&Atilde;O 
                        ELETR&Ocirc;NICA DE TESES E DISSERTA&Ccedil;&Otilde;ES<span class="tituloPos"> 
                        | P&Oacute;S-GRADUA&Ccedil;&Atilde;O |</span></td>
                      <td width="25" height="44" align="left" valign="top" class="menuPos"><img src="../tde_layout1/imagens/titleSep.gif" width="25" height="44" hspace="0" vspace="0" border="0"></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="34" align="center" valign="top"><table width="100%" height="34" border="0" align="left" cellpadding="0" cellspacing="0" class="menuPos">
                    <tr> 
                      <td height="15" align="center" valign="middle">| <a href="javascript:changeMenu(0,'../');" target="_self" class="menu" onMouseOver="javascript:overMenu(0,'../');" onMouseOut="javascript:overMenu(3,'../');">IN&Iacute;CIO</a> 
                        | <a href="javascript:changeMenu(1,'../');" class="menu" onMouseOver="javascript:overMenu(1,'../');" onMouseOut="javascript:overMenu(3,'../');">BUSCA</a> 
                        | <a href="javascript:changeMenu(2,'../');" class="menu" onMouseOver="javascript:overMenu(2,'../');" onMouseOut="javascript:overMenu(3,'../');">AUTOR</a> 
                        | <a href="javascript:changeMenu(3,'../');" class="menu" onMouseOver="javascript:overMenu(3,'../');" onMouseOut="javascript:overMenu(3,'../');">P&Oacute;S-GRADUA&Ccedil;&Atilde;O</a> 
                        | <a href="javascript:changeMenu(4,'../');" class="menu" onMouseOver="javascript:overMenu(4,'../');" onMouseOut="javascript:overMenu(3,'../');">BIBLIOTECA</a> 
                        | <a href="javascript:changeMenu(5,'../');" class="menu" onMouseOver="javascript:overMenu(5,'../');" onMouseOut="javascript:overMenu(3,'../');">ADMINISTRA&Ccedil;&Atilde;O</a> 
                        | <a href="javascript:changeMenu(6,'../');" class="menu" onMouseOver="javascript:overMenu(6,'../');" onMouseOut="javascript:overMenu(3,'../');">CONTATO</a> 
                        |</td>
                    </tr>
                    <tr> 
                      <td height="9" align="left" valign="top"><img src="../tde_layout1/imagens/menuTile_pos.gif" name="menuBar" width="100%" height="9" hspace="0" vspace="0" border="0" id="menuBar"></td>
                    </tr>
                    <tr> 
                      <td height="10" align="left" valign="top" bgcolor="#ebebeb">&nbsp;</td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="100%" align="left" valign="top"><!-- InstanceBeginEditable name="Conteudo da Pagina" -->
      <table width="100%" height="100%" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="139" height="100%" align="left" valign="top" class="subMenuPos"> 
            <table width="139" border="0" align="left" cellpadding="0" cellspacing="0" class="txt">
              <tr> 
                <td class="td"> <span class="txtBold"> 
                  <?
				 
		  //Visualizar o PRograma dessa Conta
		  require "../conexao/conexao.inc";
		  $SEL_pr="SELECT * FROM Programa WHERE prCod=$SprCod";
          $SEL_pr_query=mysql_db_query($base,$SEL_pr,$conexao);
          $SEL_pr_RES=mysql_fetch_array($SEL_pr_query);
		  $prNome=$SEL_pr_RES["prNome"];
		  echo "Programa: ".$SprCod;
		  echo "<br>".$prNome."<br>"; 
		  mysql_close($conexao);
		  ?>
                  <br>
                  </span> </td>
              <tr> 
                <td height="14" class="td"><span class="txtBold">Cadastro</span></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='visualizar_alunos.php?v=Editar'"><a href="../Copy%20of%20tde_pos/visualizar_alunos.php?v=Editar" class="linkpreto">&raquo; 
                  Autor</a></td>
              </tr>
              <tr> 
                <td height="13" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='visualizar_contribuidores.php?v=Editar'"><a href="../Copy%20of%20tde_pos/visualizar_contribuidores.php?v=Editar" class="linkpreto">&raquo; 
                  Contribuidor</a></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onClick="location='visualizar_afiliacao.php?pag=VisCad'" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'"><a href="../Copy%20of%20tde_pos/visualizar_afiliacao.php?pag=VisCad" class="linkpreto">&raquo; 
                  Afilia&ccedil;&atilde;o</a></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onClick="location='visualizar_agfomento.php?pag=VisCad'" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'"><a href="../Copy%20of%20tde_pos/visualizar_agfomento.php?pag=VisCad" class="linkpreto">&raquo; 
                  Ag&ecirc;ncia Fomento</a></td>
              </tr>
              <tr> 
                <td height="14" class="td">&nbsp;</td>
              </tr>
              <tr> 
                <td height="14" class="td"><span class="txtBold">Submiss&atilde;o</span></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='visualizar_tde_iniciadas.php?pag=VisCad'"><a href="../Copy%20of%20tde_pos/visualizar_tde_iniciadas.php?pag=VisCad" class="linkpreto">&raquo; 
                  TDE </a></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='visualizar_contas.php?v=Editar'"><a href="../Copy%20of%20tde_pos/visualizar_contas.php?v=Editar" class="linkpreto">&raquo; 
                  Conta Autor</a></td>
              </tr>
              <tr> 
                <td height="14" class="td">&nbsp;</td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='logout.php'"><a href="../Copy%20of%20tde_pos/logout.php" class="linkpreto">&laquo; 
                  Sair</a></td>
              </tr>
              <tr> 
                <td class="td">&nbsp;</td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='javascript:aviso(0);'"><a href="javascript:aviso(0);" class="linkpreto">&raquo; 
                  Ajuda?</a></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
            </table></td>
          <td height="100%" valign="top" class="tdConteudo"><br>
		  <?
		  if ($sucesso!="" or $erro!="") {
		  ?>
		  <div>
		  <table width="90%" height="60" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                    <tr>
                      
                <td class="txtBold"><? if ($erro!="") { ?>A TDE de <span class="erro"><? echo $sspfNome; ?></span>&nbsp;est&aacute; bloqueada por: 
                  <? echo $erro; } if ($sucesso!="") { ?><span class="sucesso"><? echo $sucesso; ?></span><? } ?></td>
                    </tr>
            </table></div> <br>
				  <? } ?>
                  <div>
				  
              <table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                <tr> 
                  <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" class="txt">
                      <tr align="center" class="tdBiblioteca"> 
                        <td colspan="2" class="txtBold">
                          <? if ($pag=="VisRev") {
				   echo "Revisar TDE"; 
				   $StspfDisponivel="and tspfDisponivel=2"; 
				   } 
				   if ($pag=="VisCad") { 
				   echo "TDEs cadastradas que faltam Liberar ou criar a Conta do Aluno"; 
				   $StspfDisponivel="and (tspfDisponivel=0 or tspfDisponivel=1)"; 
				   } 
				   if ($pag=="") { 
				   echo"TDE"; 
				   } 
				   ?>
                        </td>
                      </tr>
					   <?
					 //Abre conexao com o banco
				   require "../conexao/conexao.inc";
				   $estiloTR="tr";
				   include "../bibliotecas/funcoes.bib";
				   
					$SEL_tspf="SELECT * FROM TSPF WHERE prCod='$SprCod' and tspfTipo='Autor' and tsIdentificador!='0' and tspfDisponivel!='9' $StspfDisponivel";
            		$SEL_tspf_query=mysql_db_query($base,$SEL_tspf,$conexao);
           			$SEL_tspf_RES=mysql_fetch_array($SEL_tspf_query);
                    
					if ($SEL_tspf_RES=="") {
					?>
                      <tr class="tdOperacoes"> 
                        <td colspan="2" class="txtBold">Nenhum registro cadastrado.</td>
                      </tr>
					  <? } else { ?>
                      <tr class="tdOperacoes"> 
                        <td width="474" class="txtBold">Nome do Autor</td>
                        <td width="133" class="txtBold">Status da TDE</td>
                        
                      </tr>
                      <?
					 					
					while ($SEL_tspf_RES!="") {
					
					mudaEstiloTR(&$estiloTR);
									
					$tsIdentificador=$SEL_tspf_RES["tsIdentificador"];
					$pfCod=$SEL_tspf_RES["pfCod"];
			        $tspfDisponivel=$SEL_tspf_RES["tspfDisponivel"];
					
					$SEL_pf="SELECT * FROM PessoaFisica WHERE pfCod='$pfCod'";
				
            		$SEL_pf_query=mysql_db_query($base,$SEL_pf,$conexao);
           			$SEL_pf_RES=mysql_fetch_array($SEL_pf_query);
					$pfNome=$SEL_pf_RES["pfNome"];

					$SEL_cn="SELECT * FROM Contas WHERE pfCod='$pfCod' and cnTipo='Autor'";
            		$SEL_cn_query=mysql_db_query($base,$SEL_cn,$conexao);
           			$SEL_cn_RES=mysql_fetch_array($SEL_cn_query);
					$naofaz="";
					if ($pag=="VisCad" and $SEL_cn_RES!="") {
					$naofaz="1";
					} if ($naofaz=="") {
					?>
                      <tr class=<? echo $estiloTR; ?>> 
                        <td height="12"> 
                          <? 
                        echo $pfNome;  ?>
                        </td>
                        <td> 
                          <? 
					  if ($tspfDisponivel=="0") { 
					  echo  "<A href='liberar_tde.php?tsIdentificador=$tsIdentificador&pfCod=$pfCod' class='linkvermelho'>liberar</A>"; 
					  } 
					  if ($tspfDisponivel=="1") { 
					  if ($SEL_cn_RES!="") {
					  echo "c/ autor";
					  } else {
					  echo "<A href='conta_aluno.php'  class='linkvermelho'>criar conta</A>";
					  } 
					  } 
					  if ($tspfDisponivel=="2") { 
					  echo "<A href='alterar_tde.php?VtsIdentificador=$tsIdentificador&VpfCod=$pfCod&VprCod=$SprCod'  class='linkvermelho'>revisar</A>"; 
					  }
					  if ($tspfDisponivel=="3") { 
					  echo "c/ catalogador"; 
					  }
					  ?>
                        </td>
                        
                      </tr>
                      <? }
					$SEL_tspf_RES=mysql_fetch_array($SEL_tspf_query);
					}
					}
					?>
                    </table></td>
                </tr>
              </table>
            </div><br>
          </td>
        </tr>
      </table>
      <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="50" align="left" valign="bottom"><table width="100%" height="50"  border="0" align="left" cellpadding="0" cellspacing="0">
        <tr align="right" valign="bottom"> 
          <td width="139" nowrap class="subMenuPos"><table width="139" height="50"  border="0" align="right" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="139" height="33" align="right" valign="middle" class="versao"><br>
                  vers&atilde;o 1.0 | COPYRIGHT &copy;<br>
                desenvolvido para IE 5.0+</td>
              </tr>
          </table></td>
          <td width="100%" valign="top"><table width="100%" height="50"  border="0" align="right" cellpadding="0" cellspacing="0" class="bttmBar">
              <tr align="center" valign="middle"> 
                <td width="30%" align="center"><a href="http://www.ibict.br" target="_blank" class="menu"><img src="../tde_layout1/imagens/ibict_logo_tede.jpg" alt="www.ibict.br" name="ibictLogo" width="90" height="33" hspace="20" vspace="0" border="0" id="ibictLogo"></a></td>
                <td width="32%" align="center"><a href="http://www.bdb.br" target="_blank" class="menu"><img src="../tde_layout1/imagens/bdb_logo_tede.jpg" alt="http://www.bdb.br" name="bdbLogo" width="77" height="33" hspace="20" vspace="0" border="0" id="bdbLogo"></a></td>
                <td width="38%" align="center" valign="middle"><a href="http://bdtd.bdb.br/" target="_blank" class="menu"><img src="../tde_layout1/imagens/teses_logo_tede.jpg" alt="http://bdtd.bdb.br" name="bdtdLogo" width="110" height="33" hspace="20" vspace="0" border="0" id="bdtdLogo"></a></td>
              </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html><? } ?>
