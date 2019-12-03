<?php 
/* Classe da Controller de Contato
 * Autor: Marcel Neves Teixeira
 * Data de criação: 26/11/2019
 * Modificações:
 *  Data:
 *  Nome:
 *  Modicações:
*/

class ContatoController
{
    
    private $contato;
    
    //Construtor
    public function __construct()
    {
        require_once('model/contatoClass.php');
        require_once('model/DAO/contatoDAO.php');
        
        // VALIDA SE A REQUISIÇÃO QUE ESTÁ CHEGANDO PELO METODO DO FORM É POST.
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
        
            //Instancia da classe Contato
            $this->contato = new Contato();

            //Criando o o bjeto com dados do FORM
            $this->contato->setNome($_POST['txtnome']);
            $this->contato->setTelefone($_POST['txttelefone']);
            $this->contato->setCelular($_POST['txtcelular']);
            $this->contato->setEmail($_POST['txtemail']);
        
        }
        
    }
    
    //Insere um novo Contato
    public function novoContato()
    {
        
        //Instancia da Classe Contato DAO
        $contatoDAO = new ContatoDAO();
        
        //Enviando o objeto para o metodo de insert no BD
        if($contatoDAO->insertContato($this->contato))
            header('location: index.php');
        else
            echo("Erro ao inserir registro no banco de dados");
        
    }
    
    //Atualiza um Contato
    public function atualizaContato($idContato)
    {
        
        $this->contato->setCodigo($idContato);
        
        //Instancia da Classe Contato DAO
        $contatoDAO = new ContatoDAO();
        
        //Enviando o objeto para o metodo de insert no BD
        if($contatoDAO->updateContato($this->contato))
            header('location: index.php');
        else
            echo("Não foi possível atualizar o registro no banco de dados!");
            
    }
    
    //Exclui um Contato
    public function deletaContato($idContato)
    {
        // Instancia da classe DAO do contato.
        $contatoDAO = new ContatoDAO();
        
        // Método para excluir no banco de dados o registro.
        if($contatoDAO->deleteContato($idContato))
            header('location: index.php');
        else
            echo('Erro ao excluir o registro no banco de dados');
            
            
    }
    
    //Lista Contato
    public function listaContato()
    {
        //Instancia da classe Contato DAO
        $contatoController = new ContatoDAO();
        
        //Metodo para selecionar todos os registros
        $listaContatos = $contatoController->selectAllContato();
        
        // verifica se existe conteúdo na variável
        if($listaContatos)
            return $listaContatos;
        else
            die(); // Para a execução do PHP.
        
    }
    
    //Busca Contato
    public function buscarContato($idContato)
    {
        // Istância da classe ContatoDAO.
        $contatoDAO = new ContatoDAO();
        
        // Busca no banco de dados um registro referente ao ID.
        $dadosContato = $contatoDAO->selectByIdContato($idContato);
        
        require_once('index.php');
        
    }
}











?>