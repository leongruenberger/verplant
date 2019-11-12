@extends('events.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left my-4">
                <h2> Detailansicht</h2>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p><strong>Name:</strong>
                {{ $event->name }}</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p><strong>Details:</strong>
                {{ $event->detail }}</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p><strong>Veranstaltungsort:</strong>
                {{ $event->ort }}</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p><strong>Datum:</strong>
                {{ $event->date }}</p>
            </div>
        </div>
        <div class="pull-right">
                <a class="btn btn-primary mb-4" href="{{ route('events.index') }}"> Zurück</a>
            </div>
    </div>
@endsection