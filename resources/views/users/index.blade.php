@extends('layouts.app')

@section('content')
    <users-list 
        :users= '{{ json_encode($users) }}'
    />
@endsection
