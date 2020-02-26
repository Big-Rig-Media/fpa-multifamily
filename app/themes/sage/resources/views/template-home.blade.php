{{--
  Template Name: Home Template
--}}

@extends('layouts.app')

@section('content')
  @include('partials.sections.section-acquisitions')
  <hr class="max-w-small my-5">
  @include('partials.sections.section-dispositions')
  @include('partials.sections.section-news')
@endsection
