<?php 

    $controller = (string) null;
    $modo = (string) null;


    $controller = $_GET['controller'];
    $modo = $_GET['modo'];

    switch (strtoupper($controller))
    {
        case 'CONTATOS':
            require('controller/contatoController.php');
            
            switch(strtoupper($modo))
            {
                case 'NOVO':
                    //Instancia da classe da controller
                    $contatoController = new ContatoController();
                    
                    //Metodo da controller que insere um novo contato
                    $contatoController->novoContato();
                    break;
                case 'EDITAR':
                    
                    $id = $_GET['id'];
                    
                    $contatoController = new ContatoController();
                    
                    $contatoController->atualizaContato($id);
                    
                    break;
                    
                case 'EXCLUIR':
                
                    // resgata o ID enviado pela view no clique do botão excluir.
                    $id = $_GET['id'];
                    $contatoController = new ContatoController();
                    // Método para excluir o registro.
                    $contatoController->deletaContato($id);
                    
                    break;
                    
                case 'BUSCAR':
                    
                    // resgata o ID enviado pela view no clique do botão editar.
                    $id = $_GET['id'];
                    // Instancia da classe contato controller.
                    $contatoController = new ContatoController();
                    // Método para buscar um registro pelo id.
                    $contatoController->buscarContato($id);
                    
                    break;
                
            }
            break;
        
        case 'USUARIOS':
            
            break;
            
        case 'PRODUTOS':
            
            break;
        
    }

?>