<?php

    $nome = (string) null;
    $telefone = (string) null;
    $celular = (string) null;
    $email = (string) null;
    
    $action = (string) "router.php?controller=contatos&modo=novo";
    
    if(isset($_GET['modo']))
    {   
        if(strtoupper($_GET['modo']) == "BUSCAR")
        {
            $nome = $dadosContato->getNome();
            $telefone = $dadosContato->getTelefone();
            $celular = $dadosContato->getCelular();
            $email = $dadosContato->getEmail();
            $codigo = $dadosContato->getCodigo();
            
            $action = "router.php?controller=contatos&modo=editar&id=".$codigo;
            
        }
    }  

?>
    	<div id="cadastro">
        	
            <form name="frmcontatos" method="post" action="<?=$action?>">
            
                <table id="tblcadastro">
                  <tr>
                    <td colspan="2" class="titulo_tabela">Cadastro de Contatos</td>
                  </tr>
                  <tr>
                    <td class="tblcadastro_td">Nome:</td>
                    <td><input placeholder="Digite seu nome"  name="txtnome" type="text" value="<?=$nome?>" onkeypress="return validarEntrada(event,'numeric');" required   /></td>
                  </tr>
                  <tr>
                    <td class="tblcadastro_td">Telefone:</td>
                    <td><input id="telefone" placeholder="Ex:999 9999-9999"   name="txttelefone" type="text" value="<?=$telefone?>" onkeypress="return mascaraFone(this, event);" required  /></td>
                  </tr>
                  <tr>
                    <td class="tblcadastro_td">Celular:</td>
                    <td><input id="celular" name="txtcelular" type="text" value="<?=$celular?>" required /></td>
                  </tr>
                  <tr>
                    <td class="tblcadastro_td">Email:</td>
                    <td><input name="txtemail" type="email" value="<?=$email?>" required  /></td>
                  </tr>
                  <tr>
                    <td><input name="btnsalvar" type="submit" value="Salvar" /></td>
                    <td></td>
                  </tr>
                    
                    
                </table>
               
            
            </form>

        </div>
        
        <div id="consulta">
        	<table id="tblconsulta">
              <tr>
                <td class="titulo_tabela" colspan="6">Consulta de Contatos</td>
              </tr>
              <tr class="tblcadastro_td">
                <td>Nome</td>
                <td>Telefone</td>
                <td>Celular</td>
                <td>Email</td>
                <td>Opções</td>
              </tr>
                
                <?php 
                    require_once('controller/contatoController.php');
                    $contatoController = new contatoController();
                    
                    $listDados = $contatoController->listaContato();
                
                    for($i = 0; $i < count($listDados); $i++) 
                    {
                ?>
           
                      <tr class="tblconsulta_dados">
                        <td><?=$listDados[$i]->getNome()?></td>
                        <td><?=$listDados[$i]->getTelefone()?></td>
                        <td><?=$listDados[$i]->getCelular()?></td>
                        <td><?=$listDados[$i]->getEmail()?></td>

                        <td>
                            <a href="router.php?controller=contatos&modo=buscar&id=<?=$listDados[$i]->getCodigo()?>">
                                <img src="view/icones/Modify16.png">
                            </a>
                            <a href="router.php?controller=contatos&modo=excluir&id=<?=$listDados[$i]->getCodigo()?>">
                                <img src="view/icones/Delete16.png">
                            </a>
                          <img src="view/icones/consulta.png" width="24" height="24">
                        </td>
                      </tr>
                
                <?php } ?>
      
           
            </table>
        </div>    
        
           
    



	

