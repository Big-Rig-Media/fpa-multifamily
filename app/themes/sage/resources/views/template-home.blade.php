{{--
  Template Name: Home Template
--}}

@extends('layouts.app')

@section('content')
  @include('partials.sections.section-acquisitions')
  @include('partials.sections.section-dispositions')
  @include('partials.sections.section-news')
@endsection
