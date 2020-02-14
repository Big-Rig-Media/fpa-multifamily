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
      @include('partials.sections.section-map')
      @php
        $colors = [
          'available'                             => 'linear-gradient(135deg, #a8ceb5 0%, #82a393 100%)',
          'under-contract'                        => 'linear-gradient(135deg, #d7c3a3 0%, #a0834d 100%)',
          'under-contract-non-refundable-deposit' => 'linear-gradient(135deg, #f6d6ca 0%, #d7a898 100%)',
          'sold'                                  => 'linear-gradient(135deg, #335bc0 0%, #121e32 100%)'
        ];
      @endphp
      @if( $terms )
        <div>
          <div id="dispositions" style="position:relative;top:-50px;"></div>
          @foreach( $terms as $term )
            <div id="{{ $term->slug }}" class="mb-5">
              <div class="py-1 text-white text-center" style="background-image:{{ $colors[$term->slug] }}">
                <h4 class="mb-0">{{ $term->name }}</h4>
              </div>
              <table class="w-full text-left">
                <thead>
                  <tr>
                    <th class="w-1/2 py-4">Property</th>
                    <th class="w-1/6 py-4">Units</th>
                    <th class="w-1/6 py-4">Broker</th>
                    <th class="w-1/6 py-4"></th>
                  </tr>
                </thead>
                <tbody class="data">
                  @if( TemplateDispositions::dispositions($term) )
                    @foreach( TemplateDispositions::dispositions($term) as $disposition )
                      <tr data-state="{{ TemplateDispositions::state($disposition) ?? "#" }}">
                        <td class="w-1/2 py-2">
                          <h4>{{ $disposition->post_title }}</h4>
                          @if( TemplateDispositions::city($disposition) && TemplateDispositions::state($disposition) )
                            <span>{{ TemplateDispositions::city($disposition) }}, {{ TemplateDispositions::state($disposition) }}</span>
                          @endif
                        </td>
                        <td class="w-1/6 py-2"></td>
                        <td class="w-1/6 py-2">
                          @if( TemplateDispositions::broker($disposition) )
                            <span>{{ TemplateDispositions::broker($disposition)->post_title }}</span>
                          @endif
                        </td>
                        <td class="w-1/6 py-2"></td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          @endforeach
        </div>
      @endif
    </div>
  </section>
@endsection
