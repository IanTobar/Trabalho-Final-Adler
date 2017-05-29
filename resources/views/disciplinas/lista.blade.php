@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <table class = "pull-right">
                    <tr>
                      <td>
                  <a class= "pull-right btn btn-primary"   href = "{{url('disciplina/create')}}" >Nova Disciplina</a>
                  </td>
                  <tr>
                  <td>

                  <p style = "margin-top: 10px"> <a class= "pull-right btn btn-primary"   href = "{{url('disciplina/show')}}" >Listar Disciplina</a> </p>
                  </td>
                  </tr>
                  </tr>
                  </table>


					<h1>Disciplinas:</h1>
          <form action = "{{route('pesquisaDisciplina')}}" method="GET"> <!-- FORMULÁRIO DE PESQUISA -->
            <input name ='nomeDisciplina' type="text">
            <input type="submit" value ="Pesquisar" class ="btn btn-primary">
        </form>
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
