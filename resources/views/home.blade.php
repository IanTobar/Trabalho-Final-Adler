@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
					<!-- View da pagina que será acessada após o login -->
                    Você está logado
                    <div>
					<a href="{{'curso/create'}}" class="btn btn-primary">Cursos</a>
               </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
