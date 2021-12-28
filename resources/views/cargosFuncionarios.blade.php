<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Funcionários por Cargo</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <body>
      
    @include('navbar')

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        @foreach ($cargo as $c)
						    <h3>Funcionários - {{ $c->nomecargo }}</h3>
                        @endforeach
						<p>Visualize abaixo as observações existentes:</p>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Data Cadastro</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($funcionarios as $f)
                        <tr>
                            <td>{{ $f->id }}</td>
                            <td>{{ $f->nomefuncionario }}</td>
							<td>{{ date('d/m/Y', strtotime($f->datacadastro)); }}</td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>