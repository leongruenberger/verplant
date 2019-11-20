@extends('events.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left my-4">
                <h2>Veranstaltung hinzufügen</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary mb-4"href="{{ url('/overview') }}"> Zurück</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Die ist bei der Eingabe ein Fehler unterlaufen.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.update',$event->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Veranstaltung:</strong>
                    <input type="text" name="name" value="{{ $event->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Beschreibung:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $event->detail }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Veranstaltungsort:</strong>
                    <textarea class="form-control" style="height:150px" name="ort" placeholder="Veranstaltungsort">{{ $event->ort }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Veranstaltungsdatum:</strong>
                    <textarea class="form-control" style="height:150px" name="date" placeholder="Datum">{{ $event->date }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary" href="{{ url('/overview') }}"> Speichern</button>
            </div>
        </div>

    </form>
@endsection