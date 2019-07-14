    @extends ('layout')

    @section ('title','Registration')
    @section('content')
            <form action = "" method ="post">

                @if($errors->has('email'))
                    <ul>
                    @foreach($errors->get('email') as $message)
                <li>{{$message}}</li>
                       @endforeach
                    </ul>
                @endif
                <input type="email" name="email" id="email" value="@isset($data['email']){{$data['email'] }} @endisset"/><br>
                    @if($errors->has('password'))
                        <ul>
                            @foreach($errors->get('password') as $message)
                                <li>{{$message}}</li>
                            @endforeach
                        </ul>
                    @endif
                <input type="password" name="password" id="password"/><br>
                    @if($errors->has('password_confirmation'))
                        <ul>
                            @foreach($errors->get('password_confirmation') as $message)
                                <li>{{$message}}</li>
                            @endforeach
                        </ul>
                    @endif
                <input type="password" name="password_confirmation" id="password_confirmation"/><br>
                <input type="submit" value="Sign-up"/><br>
           </form>
    @endsection