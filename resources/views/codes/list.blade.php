@extends('layouts.main')

@section('content')
    @if(session("success"))
        <div class="alert--success">
            {{session("success")}}
        </div>
    @endif
    @if(session("error"))
        <div class="alert--wrong">
            {{session("error")}}
        </div>
    @endif
    <section class="listing">
        @if($codes->isNotEmpty())
            <table class>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Code</th>
                        <th>Generated By</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($codes as $code)
                        <tr>
                            <td>{{$code->id}}</td>
                            <td>{{$code->code}}</td>
                            <td>{{$code->user->name}}</td>
                            <td>{{$code->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            {{$codes->links()}}
        @else
            <div class="alert--wrong">There are no records in the database</div>
        @endif

    </section>

@endsection
