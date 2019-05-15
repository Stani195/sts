    @extends ('layout')

    @section ('title','Citie')

    @section('content')
{{--        @empty($citie)--}}
{{--        <p>Citie не существуют</p>--}}
{{--        @else--}}
{{--      <ul>--}}
{{--        <li>{{$citie -> id}}</li>--}}
{{--        <li>{{$citie -> name}}</li>--}}
{{--        <li>{{$citie-> created_at}}</li>--}}
{{--        <li>Country: {{$citie->country->name}}</li>--}}
{{--    </ul>--}}
{{--    @endempty--}}

    @foreach($countrie->cities as $citie)
    <ul>
        <li>{{$citie -> id}}</li>
        <li>{{$citie -> name}}</li>
        <li>{{$citie-> created_at}}</li>
         </ul>
    @endforeach
    @endsection