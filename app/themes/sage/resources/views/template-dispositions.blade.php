{{--
  Template Name: Dispositions Template
--}}

@extends('layouts.app')

@section('content')
  <section class="brm-section brm-section--dispositions">
    <div class="brm-container">
      @while(have_posts()) @php the_post() @endphp
        @include('partials.content-page')
      @endwhile
      @php
        $colors = [
          'available'                             => 'bg-accent-1',
          'under-contract'                        => 'bg-accent-2',
          'under-contract-non-refundable-deposit' => 'bg-accent-3',
          'sold'                                  => 'bg-accent-4'
        ];
      @endphp
      @if( $terms )
        @foreach( $terms as $term )
          <div id="{{ $term->slug }}">
            <div class="py-2 text-white text-center {{ $colors[$term->slug] }}">
              <h4 class="mb-0">{{ $term->name }}</h4>
            </div>
            <table class="w-full text-left">
              <thead>
                <tr>
                  <th class="py-4">Property</th>
                  <th class="py-4">Units</th>
                  <th class="py-4">Broker</th>
                  <th class="py-4">Date Sold</th>
                </tr>
              </thead>
              <tbody>
                @if( TemplateDispositions::dispositions($term) )
                  @foreach( TemplateDispositions::dispositions($term) as $disposition )
                    <tr data-state="{{ TemplateDispositions::state($disposition) ?? "#" }}">
                      <td class="py-2">
                        <h4>{{ $disposition->post_title }}</h4>
                        @if( TemplateDispositions::city($disposition) && TemplateDispositions::state($disposition) )
                          <span>{{ TemplateDispositions::city($disposition) }}, {{ TemplateDispositions::state($disposition) }}</span>
                        @endif
                      </td>
                      <td class="py-2"></td>
                      <td class="py-2">
                        @if( TemplateDispositions::broker($disposition) )
                          <span>{{ TemplateDispositions::broker($disposition)->post_title }}</span>
                        @endif
                      </td>
                      <td class="py-2"></td>
                    </tr>
                  @endforeach
                @endif
              </tbody>
            </table>
          </div>
        @endforeach
      @endif
    </div>
  </section>
@endsection
