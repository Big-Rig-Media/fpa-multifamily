@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="brm-alert brm-alert--error">
      <p>{{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}</p>
    </div>
  @endif
@endsection
