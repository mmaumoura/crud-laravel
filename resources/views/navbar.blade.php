<nav class="navbar navbar-inverse">
    <div class="container-fluid">
    
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Crud Laravel</a>
        </div>
        
        <div class="collapse navbar-collapse" id="example-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('cargos') }}">Cargos</a></li>
                <li><a href="{{ route('funcionarios') }}">Funcionários</a></li>
                <li><a href="{{ route('observacoes') }}">Observações</a></li>
            </ul>
        </div>
    
    </div>
</nav>