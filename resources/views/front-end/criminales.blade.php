@extends('layouts.front-end')

@section('title', 'Criminales Buscados')

@section('articles')
	@foreach($all_danger_person as $person)
		<div class="tc-ch">
            <div class="tch-img">
                <img src="{{ asset('images/'.$person->person->id) }}.jpg" class="img-responsive" alt=""/>
            </div>
            <a class="blog" style="background: #b50202;">{{ ucfirst($person->status) }}</a>
            <h3><a>{{ $person->titular }}</a></h3>
                <p>
                    - Nombre: <strong>{{ $person->person->nombres }} {{ $person->person->apellidos }}</strong> <br>
                    - Ciudadano(a) con número de identifiación: <strong>{{ $person->person->identificacion }}</strong> <br>
                    - Alias: <strong>{{ $person->person->alias }}</strong> <br>
                    - Edad: <strong>{{ $person->person->edad }}</strong> <br>
                </p>

                <hr>

                <p>
                    {{ ucfirst($person->descripcion) }}
                </p>
        
            <div class="blog-poast-info">
                <ul>
                    <li><i class="glyphicon glyphicon-user"> </i><a class="admin" href="#"> C·A·S </a></li>
                    <li><i class="glyphicon glyphicon-calendar"> </i>{{ $person->created_at }}</li>
                </ul>
            </div>
        </div>
    
    	<div class="clearfix"></div>
	@endforeach

	{{ $all_danger_person->links() }}
@endsection