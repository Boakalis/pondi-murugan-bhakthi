@extends('website.layouts.master')
@section('content')
         <!-- Navigation-->
         @include('website.layouts.header')
         <!-- Masthead-->
             @include('website.include.banner')
         <!-- Services-->
             @include('website.include.service')

         <!-- Post Grid-->
             @include('website.include.post')
         <!-- Team-->
             @include('website.include.team')
         <!-- Other Website-->
         @include('website.include.other-website')

         <!-- Contact-->
         @include('website.include.contact')
@endsection
