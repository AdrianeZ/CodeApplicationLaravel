@extends('layouts.main')

@section('content')

    @if(session("invalidcodes"))
        <div class="alert--wrong">
            These codes was not found in the database:
            @foreach(session("invalidcodes") as $invalidCode) {{$invalidCode, }} @endforeach
        </div>

    @endif

    <section class="remove-code">
        <label for="codes">Here you can remove your codes <br/>
            Codes should be in new lines or comma seperated
        </label>

        <form action="{{route('delete_codes')}}" method="POST">
            @csrf
            @method('delete')

            <textarea name="codes" id="codes" rows="8" required>{{old('codes')}}</textarea>
            @error('codes')
            <small class="error">{{$message}}</small>
            @enderror
            <input type="submit" value="Submit">

        </form>
    </section>
@endsection
