@extends ('layout')

@section ('title','User')

@section('content')
    @empty($user)
        <p>No user</p>
    @else
        <ul>
            <li>{{$user -> id}}</li>
            <li>{{$user -> first_name}}</li>
            <li>{{$user-> last_name}}</li>
            <li>{{$user-> email}}</li>
            <li>{{$user-> password}}</li>
            <li>{{$user-> created_at}}</li>
        </ul>
    @endempty
@endsection