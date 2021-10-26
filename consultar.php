<?php
require_once("controller/ControllerCadastro.php");
?>

<!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="format-detection" content="telephone=no"> <meta name="msapplication-tap-highlight" content="no">
	        <meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover"> <meta name="color-scheme" content="light dark">
            <title>Sistema de agendamento - consulta</title>
            <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="css/consultar.css">
            <!--<script src="js/jquery.js"></script>-->
            <script>
                function confirmDelete(delUrl){
                    if(confirm("Deseja apagar o registro?")){
                        document.location = delUrl;
                    }
                }
            </script>
			<script src="bootstrap/js/bootstrap.js"></script>
            
        </head>
        <body>
            <div class="container">
                <div class="row">                        
                    <nav class="navbar navbar-dark bg-dark col-12">
                        <a class="navbar-brand" href="index.php">WEB - CLIENTES</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" 
                        data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" 
                        aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button> 
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">                                    
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Cadastrar<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="consultar.php">Consultar</a>
                                </li>
                            </ul>
                        </div>    
                    </nav>    
                </div>
                <div class="row">
                    <div class="card mb-3 col-12">
                        <div class="card-body" style="margin: auto;">
                            <h5 class="card-title" style="padding-bottom: 30px;">Consultar - Contatos Agendados</h5>
                            <table class="table table-responsive table-hover col-12" style="width: auto;">
                                <thead class="table-active bg-primary">
                                    <tr style="color: white;">
                                      <th scope="col">Nome</th>
                                      <th scope="col">Telefone</th>
                                      <th scope="col">Origem</th>
                                      <th scope="col">Contato</th>
                                      <th scope="col">Observação</th>
                                      <th scope="col">Ação</th>
                                    </tr>
                                </thead> 
                                <tbody id="TableData">
                                    <?php
                                        $controller = new ControllerCadastro();
                                        $resultado = $controller->listar(0);
                                        //print_r($resultado);
                                        for($i=0;$i<count($resultado);$i++){
                                    ?>      
                                            <tr>
                                                <td scope="col"><?php echo $resultado[$i]['nome'];?></td>
                                                <td scope="col"><?php echo $resultado[$i]['telefone'];?></td>
                                                <td scope="col"><?php echo $resultado[$i]['origem'];?></td>
                                                <td scope="col"><?php echo $resultado[$i]['data_contato'];?></td>
                                                <td scope="col"><?php echo $resultado[$i]['observacao'];?></td>
                                                <td scope="col">
                                                    <button type="button" class="btn btn-outline-primary" style="width: 75px;" onclick="location.href='editar.php?id=<?php echo $resultado[$i]['id']; ?>'">Editar</button>
                                                    <button type="button" class="btn btn-outline-primary" style="width: 75px;" onclick="javascript:confirmDelete('excluir.php?id=<?php echo $resultado[$i]['id']; ?>')" style="width: 72px;">Excluir</button>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>       
                    </div>
                </div>
            </div>
        </body>
    </html>