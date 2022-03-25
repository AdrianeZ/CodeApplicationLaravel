@extends('layouts.main')

@section('content')
    <section class="generate-code">
        <p>Here you can generate your codes just enter a value in range (1-10)</p>
        <form action="{{route('add_codes')}}" method="POST">
            @csrf
            <input name="quantity" type="number" min="1" max="10" required>
            <input type="submit" value="Potwierdz">
            @error('quantity')
            <small class="input-error">{{$message}}</small>
            @enderror
        </form>
    </section>
@endsection

