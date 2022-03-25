@extends('layouts.main')

@section('content')

        @if(session("invalidcodes"))
            <div class="alert--wrong">
                Nie znaleziono następujących kodów w bazie danych:
                @foreach(session("invalidcodes") as $invalidCode) {{$invalidCode, }} @endforeach
            </div>

        @endif

    <section class="remove-code">
        <p>Here you can remove your codes</p>
        <p>Codes should be in new lines or comma seperated</p>
        <form action="{{route('delete_codes')}}" method="POST">
            @csrf
            @method('delete')

            <textarea name="codes" required>{{old('codes')}}</textarea>
            @error('codes')
            <small class="error">{{$message}}</small>
            @enderror
            <input type="submit" value="Potwierdz">

        </form>
    </section>
@endsection
