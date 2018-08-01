@extends('layouts.front-end')

@section('title', 'Blog')

@section('articles')

    @foreach($notices as $notice)
        <div class="tc-ch">
            <div class="tch-img">
                <a href="{{ route('see_article', $notice->id) }}"><img src="{{ $notice->img }}" class="img-responsive" alt=""/></a>
            </div>
            <a class="blog blue" href="{{ route('see_article', $notice->id) }}">Noticias</a>
            <h3><a href="{{ route('see_article', $notice->id) }}">{{ $notice->titular }}</a></h3>
                <p>{{ $notice->descripcion }}</p>
        
            <div class="blog-poast-info">
                <ul>
                    <li><i class="glyphicon glyphicon-user"> </i><a class="admin" href="#"> C·A·S </a></li>
                    <li><i class="glyphicon glyphicon-calendar"> </i>{{ $notice->created_at }}</li>
                </ul>
            </div>
        </div>
        
        <div class="clearfix"></div>
    @endforeach

    {{ $notices->links() }}

@endsection