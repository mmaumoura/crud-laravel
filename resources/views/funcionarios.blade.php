<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
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
						<h3>Funcionários</h3>
						<p>Visualize abaixo os funcionários existentes:</p>
					</div>
			        <div class="col-sm-6">
                        <a href="#addFuncionarioModal" data-toggle="modal" type="button" class="btn btn-success pull-right" style="margin-top: 18px;">Adicionar</a>
                        {{-- <a href="#deletarFuncionarioModal" type="button" class="btn btn-danger">Deletar</a> --}}
						{{-- <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a> --}}
						{{-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 --}}
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Data de Cadastro</th>
						<th>Cargo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($funcionarios as $f)
                        <tr>
                            <td>{{ $f->id }}</td>
                            <td>{{ $f->nomefuncionario }}</td>
                            <td>{{ date('d/m/Y', strtotime($f->datacadastro)); }}</td>
                            <td>{{ $f->id_cargo }}</td>
                            <td>
                                <a href="#editarFuncionarioModal{{ $f->id }}" class="btn btn-success" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								<a href="#deleteFuncionariosModal{{$f->id}}" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
			<!-- <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div> -->
        </div>
    </div>

	<!-- Adicionar Funcionário Modal -->
	<div id="addFuncionarioModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="{{ route('add_funcionarios') }}">
                    @csrf
					<div class="modal-header">						
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title"><b>Adicionar funcionário</b></h4>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Nome</label>
							<input type="text" name="nomefuncionario" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Data</label>
							<input type="date" name="datacadastro" class="form-control" required>
						</div>
                        <div class="form-group">
							<label>Cargo</label>
                            <select id="id_cargo" name="id_cargo" class="form-control" required>
                                <option value=""></option>
                                @foreach ($cargos as $c)
                                    <option value="{{ $c->id }}">{{ $c->nomecargo }}</option>
                                @endforeach
                            </select>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Fechar">
						<input type="submit" class="btn btn-success" value="Confirmar">
					</div>
				</form>
			</div>
		</div>
	</div>

	@foreach ($funcionarios as $f)
			<!-- Editar Funcionário Modal -->
			<div id="editarFuncionarioModal{{ $f->id }}" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<form action="{{ route('funcionarios.update', $f->id)}}" method="POST">
							@csrf
							<div class="modal-header">						
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title"><b>Editar funcionário</b></h4>
							</div>
							<div class="modal-body">					
								<div class="form-group">
									<label>Nome</label>
									<input type="text" name="nomefuncionario" value="{{ $f->nomefuncionario }}" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Data</label>
									<input type="date" name="datacadastro" value="{{ $f->datacadastro }}" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Cargo</label>
									<select id="id_cargo" name="id_cargo" class="form-control" required>
										<option value=""></option>
										@foreach ($cargos as $c)
											<option value="{{ $c->id }}">{{ $c->nomecargo }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="modal-footer">
								<input type="button" class="btn btn-default" data-dismiss="modal" value="Fechar">
								<input type="submit" class="btn btn-success" value="Confirmar">
							</div>
						</form>
					</div>
				</div>
			</div>
	@endforeach
	
	@foreach ($funcionarios as $f)
	<!-- Delete Modal HTML -->
		<div id="deleteFuncionariosModal{{$f->id}}" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="{{ route('funcionarios.destroy', $f->id)}}" method="POST">
   						@csrf
						<div class="modal-header">						
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Excluir Funcionário</h4>
						</div>
						<div class="modal-body">					
							<p>Tem certeza que deseja <b>excluir</b> o seguinte funcionário?</p>

							<ul>
								<li>Nome: {{$f->nomefuncionario}}</li>
								<li>Data: {{date('d/m/Y', strtotime($f->datacadastro));}}</li>
								<li>Cargo: {{ $f->id_cargo }}</li>
							</ul>

							<p class="text-warning"><small>Esta ação não pode ser revertida!</small></p>

						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Fechar">
							<input type="submit" class="btn btn-danger" value="Excluir">
						</div>
					</form>
				</div>
			</div>
		</div>
	@endforeach
</body>
</html>