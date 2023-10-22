@extends('layouts.test')

@section('content')
<h1>
    hello world
</h1>
<h4>names</h4>
<ul>
    @foreach ($users as $user )
    <li>{{ $user->name }} {{ $user->email }}</li>    
    @endforeach
    
</ul>
@endsection