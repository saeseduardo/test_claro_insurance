@extends('layouts.app')

@section('content')
    <email-list 
        :users= '{{ json_encode($email) }}'
        :users= '{{ json_encode($user) }}'
    />
@endsection