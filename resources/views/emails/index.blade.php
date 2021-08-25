@extends('layouts.app')

@section('content')
    <email-list 
        :email= '{{ json_encode($email) }}'
    />
@endsection