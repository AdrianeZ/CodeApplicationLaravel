@extends('layouts.main')

@section('content')
    <section class="generate-code">
        <label for="quantity">Here you can generate your codes just enter a value in range (1-10)</label>
        <form action="{{route('add_codes')}}" method="POST">
            @csrf
            <input name="quantity" id="quantity" type="number" min="1" max="10" required>
            <input type="submit" value="Potwierdz">
            @error('quantity')
            <small class="input-error">{{$message}}</small>
            @enderror
        </form>
    </section>
@endsection

