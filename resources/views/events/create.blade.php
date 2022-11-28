@extends('events.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Adcione o Evento</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('events.index') }}"> Voltar</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Ocorreu alguns problemas com a sua entrada.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('events.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome do evento:</strong>
                <input type="text" name="name" class="form-control" placeholder="Nome do evento">
            </div>
            <div class="form-group">
                <strong>Local:</strong>
                <input type="text" name="local" class="form-control" placeholder="Digite o Endereço">
            </div>
            <div class="form-group">
                <strong>Data:</strong>
                <input type="date" name="date" class="form-control" placeholder="00/00/0000">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detalhes:</strong>
                <textarea class="form-control" style="height:150px" name="detail" placeholder="Detalhes"></textarea>
            </div>
            <strong>Status:</strong>
            <input type="text" name="status" class="form-control" placeholder="Status">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
    </div>

</form>
@endsection
