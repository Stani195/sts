    @extends ('layout')

    @section ('title','Language')
    @section('content')
    @empty($limba)
        <p>Пользователя не существуют</p>
        @else
      <ul>
        <li>{{$limba -> id}}</li>
        <li>{{$limba -> name}}</li>
        <li>{{$limba-> created_at}}</li>
    </ul>
    @endempty
    @endsection