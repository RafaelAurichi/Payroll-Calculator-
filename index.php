<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CP1 - Cálculo Salário</title>
</head>
<body>
    <header class="py-5 bg-info bg-gradient">
        <h1 class="text-white font-weight-bold d-flex justify-content-center">
            Calcular Salário
        </h1>
    </header> 

    <form method="POST" class="py-4">
        <label class="input-group mb-3 mt-4 mx-auto" style="max-width:500px">
            <span class="input-group-text gb-info">$</span>
            <input class="form-control" type="number" id="salary" name="salary" >
        </label>

        <label class="input-group mb-3 mt-4 mx-auto" style="max-width:500px">
            <span class="input-group-text">Quant. Dependentes:</span>
            <input class="form-control" type="number" id="dependentes" name="dependentes">
        </label>

        <label class="input-group mb-4 mt-4 mx-auto" style="max-width:500px">
            <span class="input-group-text">Desconto variável:</span>
            <input class="form-control" type="number" id="descontoFolha" name="descontoFolha">
        </label>

        <div class="row gap-2 justify-content-center">
            <button type="submit" class="btn btn-primary col-4" style="max-width:250px">
                Enviar
            </button>
            <button type="reset" class="btn btn-secondary col-4" style="max-width:250px">
                Cancelar
            </button>
        </div>

        <hr class="mx-auto" style="max-width: 700px; height: 2px">
    </form>

    <?php 
    include "funcoes.php";

    if (isset($_POST['salary']) && isset($_POST['dependentes'])) {
        $bruto = $_POST['salary']; 
        $percapta = $_POST['dependentes'];
        $descontoFolha = $_POST['descontoFolha'];

        $inss = inss($bruto);
        $ir = ir($bruto, $percapta);
        $liquido = round($bruto, 2) - $inss - $ir - $descontoFolha;

        echo '
      <div>
        <h2 class="mb-3">Resultado do cálculo:</h2>
        <div class="row">
          <p>
            <strong>Seu salário bruto:</strong>
            R$ ' . number_format($bruto, 2, ',', '.') . '
          </p>
        </div>
        <div class="row">
          <p>
            <strong>INSS:</strong>
            R$ ' . number_format($inss, 2, ',', '.') . '
          </p>
        </div>
        <div class="row">
          <p>
            <strong>IRRF:</strong>
            R$ ' . number_format($ir, 2, ',', '.') . '
          </p>
        </div>
        <div class="row">
          <p>
            <strong>Salário Líquido:</strong>
            R$ ' . number_format($liquido, 2, ',', '.') . '
          </p>
        </div>
      </div>
    ';
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>
</body>
</html>