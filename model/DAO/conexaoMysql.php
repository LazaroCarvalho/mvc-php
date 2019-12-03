<?php 
/* Classe para conexão com o BD Mysql
 * Autor: Marcel Neves Teixeira
 * Data de criação: 26/11/2019
 * Modificações:
 *  Data:
 *  Nome:
 *  Modicações:
*/

class ConexaoMysql
{
    private $server;
    private $user;
    private $password;
    private $database;
    
    //Construtor
    public function __construct()
    {
        $this->server = "localhost";
        $this->user = "root";
        $this->password = "bcd127";
        $this->database = "dbcontatos20192tb";
    }
    
    //Abre a conexão com o BD Mysql
    public function conectDatabase()
    {
        try{
            //Instancia da classe do PDO
            $conexao = new PDO('mysql:host='.$this->server.';dbname='.$this->database, $this->user, $this->password);

            return $conexao;
            
        }catch(PDOException $erro)
        {
            echo("Erro de conexão com o BD
                 <br>Linha do Erro:".$erro->getLine()."
                 <br>Mensagem do Erro:".$erro.getMessage()
                );
            die();
        }
    }
    
    
    
    
    
    
    
    
    
}







?>