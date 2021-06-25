<?php //frmRmvCompetidor.php
include 'menu.php';

//recuperar o id pelo método GET
$id = trim($_GET['id']);

//recuperar os dados do banco de dados
include 'conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM curso WHERE id=?;"; //o ? indica um argumento para o sql
$query = $pdo->prepare($sql);
$query->execute(array($id)); // o array($id) é um parâmetro passado para o argumento 

$turma = $query->fetch(PDO::FETCH_ASSOC);
$qtd =  $turma['qtd_vagas'] - $turma['vagas_disp'];
Conexao::desconectar();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="CSS/materialize01.min.css">

    <title>Removeção Curso</title>
</head>

<body>
    <h3 class="grey-text text-darken-3">Remover Cursos</h3>
    <div class="container  indigo lighten-5">
        <form action="CLASSES/remCurso.php" method="POST" id='frmRmvCurso' class="col s12">
            <div class="row">
                <div class="col s10">
                    <label for="lblId">
                        <h4>
                            <blockquote>ID: <?php echo $id ?></blockquote>
                        </h4>
                    </label>
                    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">

                    <label for="lblNome">
                        <h4>Nome do Curso: <?php echo $turma['nome_c'] ?> </h4><label>
                            <label for="lblVagas">
                                <h4>Vagas: <?php echo $turma['qtd_vagas'] ?> </h4><label>
                                    <label for="lblVagas">
                                        <h4>Qtd. de alunos inscrito: <?php echo $qtd ?> </h4><label>
                </div>
            </div>
            <div class="input-field col s8">
                <button class="btn waves-effect waves-light red" type="submit" name="btnRemover">
                    Remover <i class="material-icons">delete</i>
                </button>

                <button class="btn waves-effect waves-light indigo" type="button" name="btnVoltar" onclick="JavaScript:location.href='listarCurso.php'">
                    Voltar <i class="material-icons">arrow_back</i>
                </button>
            </div>
            <br />
        </form>
    </div>
</body>

</html>