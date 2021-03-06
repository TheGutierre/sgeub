@extends('layout.base')

@section('menu')

        <div class="sidebar-wrapper">
            <ul class="nav">
                <li>
                    <a href="/home">
                        <i class="material-icons">view_compact</i>
                        <p>Calendário de Eventos</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="material-icons">list</i>
                        <p>Gerenciar Eventos</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="material-icons">school</i>
                        <p>Gerenciar Certificados</p>
                    </a>
                </li>
                <li>
                    <a href="/lista/palestrante">
                        <i class="material-icons">person</i>
                        <p>Gerenciar Palestrantes</p>
                    </a>
                </li>
                <li>
                    <a href="/lista/adm">
                        <i class="material-icons">group_add</i>
                        <p>Gerência de Usuários</p>
                    </a>
                </li>
                <li class="active">
                    <a href="alunos">
                        <i class="material-icons">people</i>
                        <p>Gerencia de Alunos</p>
                    </a>
                </li>
            </ul>
        </div>

@endsection

@section('conteudo')

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

    <div id="abc">

    <div class="col-md-4 col-md-offset-7">

        <form class="navbar-form navbar-right" method="POST">
            {{ csrf_field() }}
            <div class="form-group  is-empty">
                <input id="search" type="text" class="form-control" name="search" value="{{ old('search') }}" placeholder="Pesquisar">

            </div>
            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                <i class="material-icons">search</i><div class="ripple-container"></div>
            </button>
        </form>
    </div>

            <div class="col-md-12 col-md-offset-0">

                <div class="panel panel-default">
                    <div class="panel-heading">Alunos Cadastrados

                    </div>

                    <div class="panel-body">
                        <div class="card-content table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Matricula</th>
                                <th>Opções</th>
                                </thead>
                                <tbody>
                                    @foreach($aluns as $aluno)
                                        <tr>
                                            <td>{{ $aluno->Nome }}</td>
                                            <td>{{ $aluno->Email }}</td>
                                            <td>{{ $aluno->Matricula }}</td>
                                            <td><a href="/alunos/edit/{{$aluno->ID}}">Editar</a> |
                                                <a href="/alunos/delete/{{$aluno->ID}}">Excluir</a> </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="col-md-offset-5">
                    {!! $aluns->links() !!}
                </div>

            </div>

</div>

@endsection