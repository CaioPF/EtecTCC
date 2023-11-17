
<?php
   
    include'conexao.php';

    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM  pessoa_juridica WHERE id_pj LIKE '%$data%' or nome_fantasia_pj LIKE '%$data%'  ORDER BY id_pj DESC";
    }
    else
    {
    $sql = "SELECT * FROM  pessoa_juridica ORDER BY id_pj DESC";
    }
    
    $result = $mysqli->query($sql);

  
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Protect King</title>
    <style>
        .table-bg{
            background: rgba(0,0,0,0.3);
            border-radius: 15px 15px 0 0;
        }
        .custom-btn{
            background-color: #daa520;
            border: none;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
        }
        .btn-edit
        {
            background-color: #daa520;  
        }
        /* Estilo para remover o ponto da frente de um link com a classe .no-bullet */
         li.no-bullet
        {
            list-style-type: none;
        }

        .custom-btn:hover
        {
            background-color: #222; /* Cor um pouco mais escura quando hover */
        }
        .box-search
        {
            display: flex;
            justify-content: right;
            gap: .1%;
            margin-top: -45px; /* Mover 10 pixels para cima */
            margin-left: 80px;
        }
        
    </style>
</head>
<body>
   <div class="m-5" height: 20px >    
    <h1>Lista de Clientes PJ</h1>
    <li class="no-bullet"><a href="index.php" class="custom-btn"><span class="glyphicon glyphicon-log-out"></span> Início</a></li>
    <div class="box-search">
                <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
                <button onclick="searchData()" class="btn btn-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>
   </div>
    <?php include'conexao.php'; ?>
    <div class="m-5" table-bg >
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome Fantasia</th>
                <th scope="col">Razão Social</th>
                <th scope="col">Cnpj</th>
                <th scope="col">Data de Abertura</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($consulta_usuario = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td>" .$consulta_usuario["id_pj"]."</td>";
                    echo "<td>" .$consulta_usuario["nome_fantasia_pj"]."</td>";
                    echo "<td>" .$consulta_usuario["razao_social_pj"]."</td>";
                    echo "<td>" .$consulta_usuario["cnpj_pj"]."</td>";
                    echo "<td>" .$consulta_usuario["abertura_pj"]."</td>";
                    echo "<td>
                    <a  class='btn-edit btn btn-sm btn-warning' href='editaPJ.php?id_pj=$consulta_usuario[id_pj]'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>

                    </svg>
                    </a>
                    </td>";
                    echo "<td>
                    <a  class='btn  btn-sm btn-dark' href='deletePj.php?id_pj=$consulta_usuario[id_pj]'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/>
                    <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/>
                    </svg>
                    </a>
                    </td>";
           
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event){
        if(event.key === "Enter")
        {
            searchData();
        }
    });
    function searchData()
    {
        window.location = 'listaClientePj.php?search='+search.value;
    }
</script>
</html>