<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Observações</title>
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
						<h3>Observações</h3>
						<p>Visualize abaixo as observações existentes:</p>
					</div>
			        <div class="col-sm-6">
                        <a href="#addObsModal" data-toggle="modal" type="button" class="btn btn-success pull-right" style="margin-top: 18px;">Adicionar</a>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Observação</th>
                        <th>Data observação</th>
						<th>Funcionário</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($observacoes as $ob)
                        <tr>
                            <td>{{ $ob->id }}</td>
                            <td>{{ $ob->observacao }}</td>
							<td>{{ date('d/m/Y', strtotime($ob->dataobservacao)); }}</td>
							<td>{{ $ob->id_funcionario }}</td>
                            <td>
                                <a href="#editarObsModal{{ $ob->id }}" class="btn btn-success" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								<a href="#deleteObsModal{{$ob->id}}" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

	<!-- Adicionar Observação Modal -->
	<div id="addObsModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="{{ route('obs.add') }}">
                    @csrf
					<div class="modal-header">						
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title"><b>Adicionar observação</b></h4>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Observação</label>
							<textarea type="text" name="observacao" class="form-control" rows="4" required></textarea>
						</div>
						<div class="form-group">
							<label>Data observação</label>
							<input type="date" name="dataobservacao" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Funcionário</label>
                            <select id="id_funcionario" name="id_funcionario" class="form-control" required>
                                <option value=""></option>
                                @foreach ($funcionarios as $f)
                                    <option value="{{ $f->id }}">{{ $f->nomefuncionario }}</option>
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

	@foreach ($observacoes as $ob)
			<!-- Editar Observação Modal -->
			<div id="editarObsModal{{ $ob->id }}" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<form action="{{ route('obs.update', $ob->id)}}" method="POST">
							@csrf
							<div class="modal-header">						
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title"><b>Editar observação</b></h4>
							</div>
							<div class="modal-body">					
								<div class="form-group">
									<label>Observação</label>
									<textarea type="text" name="observacao" class="form-control" rows="4" required>{{ $ob->observacao }}</textarea>
								</div>
								<div class="form-group">
									<label>Data observação</label>
									<input type="date" name="dataobservacao" value="{{ $ob->dataobservacao }}" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Funcionário</label>
									<select id="id_funcionario" name="id_funcionario" class="form-control" required>
										<option value=""></option>
										@foreach ($funcionarios as $f)
											<option value="{{ $f->id }}">{{ $f->nomefuncionario }}</option>
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
	
	@foreach ($observacoes as $ob)
	<!-- Destroy Observações HTML -->
		<div id="deleteObsModal{{$ob->id}}" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="{{ route('obs.destroy', $ob->id)}}" method="POST">
   						@csrf
						<div class="modal-header">						
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Excluir OBservações</h4>
						</div>
						<div class="modal-body">					
							<p>Tem certeza que deseja <b>excluir</b> a seguinte observação?</p>

							<ul>
								<li>Observação: {{$ob->observacao}}</li>
								<li>Data Observação: {{ date('d/m/Y', strtotime($ob->dataobservacao)); }}</li>
								<li>Funcionário: {{ $ob->id_funcionario }}</li>
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