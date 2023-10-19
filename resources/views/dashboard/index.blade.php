@extends('layout.index')


@section('container')
    <!-- Begin Page Content -->
    <h1 class="h3 mb-4 text-gray-800">Wellcome Back {{ auth()->user()->name }}</h1>
    <!-- /.container-fluid -->

    
@endsection
