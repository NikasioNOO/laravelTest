@extends('layouts.master')

@section('title', 'Pulenta')

@section('sidebar')
  @parent

    <p>this is appended to the master sidebar</p>
@endsection

@section('content')
    <p> This is my body content.</p>
@endsection


