@extends('layouts.main')

@section('content')
    @if(session("success"))
        <div class="alert-success">
            {{session("success")}}
        </div>
    @endif

    <table>
        <thead>
            <tr>Id</tr>
            <tr>Code</tr>
            <tr>Generated By</tr>
            <tr>Created At</tr>
        </thead>
        <tbody>
            @foreach($codes as $code)

            @endforeach
        </tbody>
    </table>

@endsection
