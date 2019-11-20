@extends('events.layout')


@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left my-4">
                <h1>Das geht in der Umgebung!</h1>
            </div>
            <div class="pull-right mb-4">
                <a class="btn btn-success" href="{{ route('events.create') }}"> Veranstaltung hinzufügen</a>
                <a class="btn btn-success" id="ajax" > Ajax Button</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    @if (Route::has('login'))
    @auth
    <table class="table table-bordered">
        <tr>
            <th>Tag der Veranstaltung</th>
            <th>Veranstaltung</th>
            <th>Beschreibung</th>
            <th>Veranstaltungsort</th>
            <th width="280px">Aktion</th>
        </tr>
        @foreach ($events as $event)
        <tr>
            <td>{{ $event->date }}</td>
            <td>{{ $event->name }}</td>
            <td>{{ $event->detail }}</td>
            <td>{{ $event->ort}}</td>
  
            <td>
                <form action="{{ route('events.destroy',$event->id) }}" method="POST">

                    
                    <a class="btn btn-info" href="{{ route('events.show',$event->id) }}">Details</a>
                    
                    <a class="btn btn-primary" href="{{ route('events.edit',$event->id) }}">Bearbeiten</a>

                     @csrf
                     @method('DELETE')

                    <button type="submit" class="btn btn-danger">Löschen</button>
                
                </div>
            
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    @else
    <table class="table table-bordered">
        <tr>
            <th>Tag der Veranstaltung</th>
            <th>Veranstaltung</th>
            <th>Beschreibung</th>
            <th>Veranstaltungsort</th>
            <th width="280px">Aktion</th>
        </tr>
        @foreach ($events as $event)
        <tr>
            <td>{{ $event->date }}</td>
            <td>{{ $event->name }}</td>
            <td>{{ $event->detail }}</td>
            <td>{{ $event->ort}}</td>
  
            <td>
                <form action="{{ route('events.destroy',$event->id) }}" method="POST">

                    
                    <a class="btn btn-info" href="{{ route('events.show',$event->id) }}">Details</a>

                    
                    @auth
                        
                    
 
                    
                   
                    @endauth
                </div>
            
                </form>
            </td>
        </tr>
        @endforeach
        @endauth
    </table>
    @endif
    {!! $events->links() !!}
@endsection