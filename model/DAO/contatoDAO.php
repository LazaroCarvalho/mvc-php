<?php 
/* Classe de Contato (DAO) para inegração com BD 
 * Autor: Marcel Neves Teixeira
 * Data de criação: 26/11/2019
 * Modificações:
 *  Data:
 *  Nome:
 *  Modicações:
*/

class ContatoDAO
{
    private $conexaoMysql;
    private $conexao;
    
    //Construtor
    public function __construct()
    {
        //Import da classe de conexão
        require_once('conexaoMysql.php');
        require_once('model/contatoClass.php');
        
        //Instancia do objeto de conexão
        $this->conexaoMysql = new ConexaoMysql();
        
        //Abre a conexão com o BD
        $this->conexao = $this->conexaoMysql->conectDatabase();
        
    }
    
    //Insere um novo Contato
    public function insertContato(Contato $contato)
    {
         $sql = "insert into tblcontatos
                (nome, telefone, celular, email)
                values(?,?,?,?)
               "; 
        
        $statement = $this->conexao->prepare($sql);
        
        $statementDados = array(
            $contato->getNome(),
            $contato->getTelefone(),
            $contato->getCelular(),
            $contato->getEmail()
        );
        
        if($statement->execute($statementDados))
            return true;
        else
            return false;
    }
    
    //Altera um Contato
    public function updateContato(Contato $contato)
    {
        
        $sql = "UPDATE tblcontatos SET
                nome = ?,
                telefone = ?,
                celular = ?,
                email = ?
                WHERE codigo = ?";
        
        $statement = $this->conexao->prepare($sql);
        
        $statementDados = array(
            $nomeContato = $contato->getNome(),
            $telefoneContato = $contato->getTelefone(),
            $celularContato = $contato->getCelular(),
            $emailContato = $contato->getEmail(),
            $idContato = $contato->getCodigo()
        );
        
        if($statement->execute($statementDados))
            return true;
        else
            return false;
        
    }
    
    //Apaga um Contato
    public function deleteContato($idContato)
    {
        $sql = "delete from tblcontatos where codigo = ".$idContato;
        
        if($this->conexao->query($sql))
            return true;
        else
            return false;
        
    }
    
    //Lista Contato
    public function selectAllContato()
    {
        $sql = "select * from tblcontatos";
        $select = $this->conexao->query($sql);
        
        $cont = 0;
        while($rs = $select->fetch(PDO::FETCH_ASSOC))
        {
            //Instancia da classe Contato, criando 
            //uma coleção de objetos
            $listContato[] = new Contato();
            $listContato[$cont]->setCodigo($rs['codigo']);
            $listContato[$cont]->setNome($rs['nome']);
            $listContato[$cont]->setTelefone($rs['telefone']);
            $listContato[$cont]->setCelular($rs['celular']);
            $listContato[$cont]->setEmail($rs['email']);
            
            $cont++;
        }
        
        if(isset($listContato))
            return $listContato;
        else
            return false;
            
    }
    
    //Busca por ID em Contato
    public function selectByIdContato($idContato)
    {
        
        $sql = "select * from tblcontatos where codigo = ".$idContato;
        $select = $this->conexao->query($sql);
        
        if($rs = $select->fetch(PDO::FETCH_ASSOC))
        {
            //Instancia da classe Contato, criando
            $listContato = new Contato();
            $listContato->setCodigo($rs['codigo']);
            $listContato->setNome($rs['nome']);
            $listContato->setTelefone($rs['telefone']);
            $listContato->setCelular($rs['celular']);
            $listContato->setEmail($rs['email']);
        
        }
        
        return $listContato;
        
    }
    
}

?>