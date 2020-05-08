@if( have_rows('section_11_builder') )
  @while( have_rows('section_11_builder') ) @php the_row() @endphp
    @php
      $type = get_sub_field('section_11_builder_type');
    @endphp
    @if( $type === 'content' )
      {!! get_sub_field('section_11_builder_content') !!}
      @if( get_sub_field('section_11_builder_gallery') )
        <ul class="flex flex-row flex-wrap items-center justify-center mt-10 list-reset">
          @foreach( get_sub_field('section_11_builder_gallery') as $gallery_item )
            <li class="mb-5 mx-10 list-none">
              <img src="{{ $gallery_item['url'] }}" alt="{{ $gallery_item['alt'] }}" />
            </li>
          @endforeach
        </ul>
      @endif
    @elseif( $type === 'card' )
      @if( have_rows('section_11_builder_cards') )
        <p class="text-center"><strong class="text-primary-1">FPA is a proud Residential Property Management <span class="text-primary-2">Advisory Board Member</span> at:</strong></p>
        <div id="cards-11" class="w-full flex flex-col md:flex-row flex-wrap md:justify-center mb-5">
          @while( have_rows('section_11_builder_cards') ) @php the_row() @endphp
            @php
              $icon = get_sub_field('section_11_builder_card_icon');
              $number = get_sub_field('section_11_builder_card_number');
              $caption = get_sub_field('section_11_builder_card_caption');
            @endphp
            <div class="mb-5 md:mb-0 text-center">
              <div class="flex flex-col flex-wrap items-center justify-center w-full md:w-auto min-h-logo-card mb-4 md:mb-5 mx-3 py-5 px-5 bg-white shadow">
                @if( $icon )
                  <img class="block my-auto" src="{{ $icon['url'] }}" alt="{{ $icon['alt'] }}" height="81" />
                @endif
                @if( $number )
                  <span class="text-5xl text-md:5xl font-poynteroldstyledisplaysemibold leading-none text-primary-2">{!! $number !!}</span>
                @endif
              </div>
              @if( $caption )
                <span class="mt-auto mb-0 text-xl text-primary-1 text-center">{!! $caption !!}</span>
              @endif
            </div>
          @endwhile
        </div>
      @endif
      {!! get_sub_field('section_11_builder_content_more') !!}
    @endif
  @endwhile
  @if( get_field('section_11_call_to_action_text') && get_field('section_11_call_to_action_url') )
    <div class="my-8 text-center">
      <a class="brm-btn brm-btn--primary" href="{{ get_field('section_11_call_to_action_url') }}">
        {{ get_field('section_11_call_to_action_text') }}
      </a>
    </div>
  @endif
@endif
