@extends('member.layout.index')

@section('title', 'Selamat Datang')

@section('container')
    <!-- Begin Page Content -->
    <h1 class="h3 mb-4 text-gray-800">@yield('title') {{ Auth::guard('webmember')->user()->nama_member }}</h1>
    <!-- /.container-fluid -->

@endsection