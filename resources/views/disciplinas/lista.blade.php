@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <a class= "pull-right btn btn-primary"   href = "{{url('disciplina/create')}}" >Nova Disciplina</a>



					<h1>Disciplinas:</h1>
          
				</div>

                <div class="panel-body">
					<!-- A variavel mensagem_sucesso foi criada no controller CursosController*/ -->
					@if(Session::has('mensagem_sucesso'))

						<!-- imprime o valor da variavel mensagem_sucesso -->
						<div class = "alert alert-success">{{Session::get('mensagem_sucesso')}}</div>

					@endif
				
				
                  @foreach($disciplinas as $disciplina)
              <h2>{{ $disciplina->nomeDisciplina }}</h2>
              <p> <b> Carga Horária:  </b> {{ $disciplina->cargaHoraria}} horas. </p>

              <p>
			  
				<table>
                  <tr>
				  
					<td>
					
						<a href="{{ route('disciplina.edit', $disciplina->id) }}" class="btn btn-warning">Editar</a>

						
						
						<!-- Botao para excluir o curso, pegara o metodo destroy do arquivo CursosController -->
						{!! Form::open(['method' => 'DELETE', 'url' => 'disciplina/'.$disciplina->id, 'style' => 'display:inline']) !!}
				
							<button type="submit" class="btn btn-danger">Excluir</button>

						{!! Form::close() !!}
						</td>
					</tr>
				</table>
    
	</p>
              <hr>
          @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
