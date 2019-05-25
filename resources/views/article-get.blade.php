@extends ('layout')

@section ('title','Article')

@section('content')
{{--    @empty($article)--}}
{{--        <p>No such article</p>--}}
{{--    @else--}}
{{--        <ul>--}}
{{--            <li>{{$article -> id}}</li>--}}
{{--            <li>{{$article -> name}}</li>--}}
{{--            <li>{{$article -> content}}</li>--}}
{{--            <li>{{$article -> created_at}}</li>--}}
{{--            <li>{{$article -> updated_at}}</li>--}}

{{--            <li> Auther:{{$article -> user->first_name}}</li>--}}

{{--        </ul>--}}
{{--    @endempty--}}
    @foreach($user->articles as $article)
        <ul>
        <li>{{$article -> id}}</li>
        <li>{{$article -> name}}</li>
        <li>{{$article -> content}}</li>
        <li>{{$article -> created_at}}</li>
        <li>{{$article -> updated_at}}</li>
        </ul>

{{--        <p>Roles</p>--}}
{{--        <ul>--}}
{{--            @foreach($article->category)--}}
{{--        </ul>--}}
    @endforeach

@endsection