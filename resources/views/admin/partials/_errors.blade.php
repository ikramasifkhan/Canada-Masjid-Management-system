@if($errors->any())
    <div class="alert alert-danger">
        @if(count($errors) >1)
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @else
            {{$errors->first()}}
        @endif
    </div>
@endif

@if(session()->has('message'))
    <b class="text-center text-{{session('type')}}">{{session('message')}}</b>
@endif

