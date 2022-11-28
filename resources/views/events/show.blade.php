@extends('events.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Mostrar Evento</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('events.index') }}"> Voltar</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nome:</strong>
            {{ $event->name }}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detalhes:</strong>
                {{ $event->detail }}
            </div>
            <div class="form-group">
                <strong>Status</strong>
                {{ $event->status}}
            </div>
            <div class="form-group">
                <strong>Local</strong>
                {{ $event->local}}
            </div>
            <div class="form-group">
                <strong>Data:</strong>
                {{ $event->date}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detalhes:</strong>
                {{ $event->detail }}
            </div>
        </div>
    </div>
    @endsection
