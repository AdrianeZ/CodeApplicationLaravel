@extends('layouts.main')

@section('content')
    @if(session("success"))
        <div class="alert-success">
            {{session("success")}}
        </div>
    @endif
@endsection
