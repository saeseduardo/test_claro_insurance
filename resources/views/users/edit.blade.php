@extends('layouts.app')

@section('content')
    <user-edit 
        :user = '{{json_encode($user)}}'
    />
@endsection
