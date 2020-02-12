@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-single-'.get_post_type())
  @endwhile
  @php comments_template('/partials/comments.blade.php') @endphp
@endsection
