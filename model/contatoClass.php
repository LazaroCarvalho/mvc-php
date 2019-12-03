<?php 

/* Classe de Contato
 * Autor: Marcel Neves Teixeira
 * Data de criação: 26/11/2019
 * Modificações:
 *  Data:
 *  Nome:
 *  Modicações:
*/

class Contato
{
    private $codigo;
    private $nome;
    private $telefone;
    private $celular;
    private $email;
    
    //Construtor
    public function __construct()
    {
        
    }
    
    //Retorna o codigo
    public function getCodigo()
    {
        return $this->codigo;
    }
    
    //Recebe o codigo
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }
    
    //Retorna o nome
    public function getNome()
    {
        return $this->nome;
    }
    
    //Recebe o nome
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    
    //Retorna o telefone
    public function getTelefone()
    {
        return $this->telefone;
    }
    
    //Recebe o telefone
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
    
    //Retorna o celular
    public function getCelular()
    {
        return $this->celular;
    }
    
    //Recebe o celular
    public function setCelular($celular)
    {
        $this->celular = $celular;
    }
    
    //Retorna o email
    public function getEmail()
    {
        return $this->email;
    }
    
    //Recebe o email
    public function setEmail($email)
    {
        $this->email = $email;
    }
}

?>