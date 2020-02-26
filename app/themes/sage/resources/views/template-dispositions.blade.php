{{--
  Template Name: Dispositions Template
--}}

@extends('layouts.app')

@section('content')
  <section class="brm-section brm-section--intro">
    <div class="brm-container brm-container--small">
      @while(have_posts()) @php the_post() @endphp
        @include('partials.content-page')
      @endwhile
    </div>
  </section>
  @if( get_field('dispositions_employee_spotlight') )
    <section class="brm-section brm-section--employee">
      <div class="brm-container brm-container--small">
        @include('partials.sections.section-employee', ['employee' => App::employee(get_field('dispositions_employee_spotlight'))])
      </div>
    </section>
  @endif
  <section class="brm-section brm-section--dispositions">
    <div class="brm-container brm-container--small">
      @include('partials.sections.section-map-dispositions')
      @php
        $colors = [
          'available'                             => [
            'color'    => '#a8ceb5',
            'gradient' => 'linear-gradient(135deg, #a8ceb5 0%, #82a393 100%)'
          ],
          'under-contract'                        => [
            'color'    => '#d7c3a3',
            'gradient' => 'linear-gradient(135deg, #d7c3a3 0%, #a0834d 100%)'
          ],
          'under-contract-non-refundable-deposit' => [
            'color'    => '#f6d6ca',
            'gradient' => 'linear-gradient(135deg, #f6d6ca 0%, #d7a898 100%)'
          ],
          'sold'                                  => [
            'color'    => '#335bc0',
            'gradient' => 'linear-gradient(135deg, #335bc0 0%, #121e32 100%)'
          ]
        ];
      @endphp
      @if( $terms )
        <div>
          <div id="dispositions" style="position:relative;top:-50px;"></div>
          @foreach( $terms as $term )
            <div id="{{ $term->slug }}" class="mb-5">
              <div class="py-1 text-white text-center" style="background-image:{{ $colors[$term->slug]['gradient'] }}">
                <h4 class="mb-0">{{ $term->name }}</h4>
              </div>
              <table class="w-full text-base text-left dispositions">
                <thead>
                  <tr>
                    <th class="w-1/2 py-2 font-mulilight font-normal align-text-top border-b border-solid border-black">Property</th>
                    <th class="w-1/6 py-2 font-mulilight font-normal align-text-top border-b border-solid border-black">Units</th>
                    <th class="w-1/6 py-2 font-mulilight font-normal align-text-top border-b border-solid border-black">Broker</th>
                    <th class="w-1/6 py-2 font-mulilight font-normal align-text-top border-b border-solid border-black"></th>
                  </tr>
                </thead>
                <tbody class="data">
                  @if( TemplateDispositions::dispositions($term) )
                    @foreach( TemplateDispositions::dispositions($term) as $disposition )
                      <tr data-state="{{ TemplateDispositions::state($disposition) ?? "#" }}">
                        <td class="w-1/2 py-2 align-text-top">
                          <h4 class="mb-1" style="color:{{ $colors[$term->slug]['color'] }}">{{ $disposition->post_title }}</h4>
                          @if( TemplateDispositions::city($disposition) && TemplateDispositions::state($disposition) )
                            <span>{{ TemplateDispositions::city($disposition) }}, {{ TemplateDispositions::state($disposition) }}</span>
                          @endif
                          @if( TemplateDispositions::website($disposition) )
                            <span class="block mt-4">
                              <a class="inline-flex flex-row flex-no-wrap items-end text-black" href="{{ TemplateDispositions::website($disposition) }}">
                                <svg class="w-icon h-icon mr-2" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg"><radialGradient id="a" cx="50.001%" cy="50%" gradientTransform="matrix(.99994 0 0 1 0 0)" r="50%"><stop offset="0" stop-color="#d9c3a0"/><stop offset="1" stop-color="#a38242"/></radialGradient><mask id="b" fill="#fff"><path d="M.166 8.715c0 4.411 3.59 8 8.001 8s8-3.589 8-8c0-4.412-3.589-8-8-8s-8.001 3.588-8.001 8m10.349-5.613a6.116 6.116 0 012.629 2.125c-1.635.844-2.149 2.297-2.228 3.117-.093.958-1.112.773-1.174 1.884-.062 1.113.71 1.762 1.822 1.483.59-.147 1.027.369 1.15 1.033A6.063 6.063 0 018.167 14.8c-.099 0-.197-.011-.296-.015a11.706 11.706 0 00-.075-1.004c-.186-1.715-1.389-1.819-2.641-1.9-1.074-.07-.927-1.012-.139-1.112 1.34-.171 0-1.622 1.807-3.244 1.807-1.621-.842-1.536-1.284-2.563-.372-.866.476-1.892 1.277-1.606 1.189.425.138 1.822 1.119 2.178a.97.97 0 00.33.056c.94 0 2.083-1.238 2.25-2.488" fill-rule="evenodd"/></mask><path d="M.166 8.715c0 4.411 3.59 8 8.001 8s8-3.589 8-8c0-4.412-3.589-8-8-8s-8.001 3.588-8.001 8m10.349-5.613a6.116 6.116 0 012.629 2.125c-1.635.844-2.149 2.297-2.228 3.117-.093.958-1.112.773-1.174 1.884-.062 1.113.71 1.762 1.822 1.483.59-.147 1.027.369 1.15 1.033A6.063 6.063 0 018.167 14.8c-.099 0-.197-.011-.296-.015a11.706 11.706 0 00-.075-1.004c-.186-1.715-1.389-1.819-2.641-1.9-1.074-.07-.927-1.012-.139-1.112 1.34-.171 0-1.622 1.807-3.244 1.807-1.621-.842-1.536-1.284-2.563-.372-.866.476-1.892 1.277-1.606 1.189.425.138 1.822 1.119 2.178a.97.97 0 00.33.056c.94 0 2.083-1.238 2.25-2.488" fill="url(#a)" fill-rule="evenodd" mask="url(#b)" transform="translate(0 -.418)"/></svg>
                                {{ preg_replace('/^http(s)?:\/\/www./', '', trim(TemplateDispositions::website($disposition), '/')) }}
                              </a>
                            </span>
                          @endif
                        </td>
                        <td class="w-1/6 py-2 align-text-top">
                          @if( TemplateDispositions::units($disposition) )
                            <span class="block">{{ TemplateDispositions::units($disposition) }}</span>
                          @endif
                        </td>
                        <td class="w-1/6 py-2 align-text-top">
                          @if( TemplateDispositions::broker($disposition) )
                            <span class="block"><strong>{{ TemplateDispositions::broker($disposition)->post_title }}</strong></span>
                            <span class="block">{{ TemplateDispositions::company(TemplateDispositions::broker($disposition)) }}</span>
                            <span class="block">
                              <a class="text-current no-underline" href="tel:{{ preg_replace('/[^0-9]/', '', TemplateDispositions::phone(TemplateDispositions::broker($disposition))) }}">{{ TemplateDispositions::phone(TemplateDispositions::broker($disposition)) }}</a>
                            </span>
                            <span class="block mt-5">
                              <a class="brm-btn brm-btn--primary" href="mailto:{{ TemplateDispositions::email(TemplateDispositions::broker($disposition)) }}?subject=Disposition Inquiry {{ $disposition->post_title }}&body=Please send me more information regarding the disposition offering for {{ $disposition->post_title }} in {{ TemplateDispositions::city($disposition) }}, {{ TemplateDispositions::state($disposition) }} - {{ TemplateDispositions::units($disposition) }} units">Email</a>
                            </span>
                          @endif
                        </td>
                        <td class="w-1/6 py-2 align-text-top">
                          <span class="block md:text-right">Date Sold</span>
                        </td>
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
