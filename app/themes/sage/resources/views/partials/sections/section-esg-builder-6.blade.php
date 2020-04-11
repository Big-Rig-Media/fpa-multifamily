@if( have_rows('section_6_builder') )
  @while( have_rows('section_6_builder') ) @php the_row() @endphp
    @php
      $type = get_sub_field('section_6_builder_type');
    @endphp
    @if( $type === 'content' )
      {!! get_sub_field('section_6_builder_content') !!}
      @if( get_sub_field('section_6_builder_gallery') )
        <ul class="flex flex-row flex-wrap items-center justify-center mt-10 list-reset">
          @foreach( get_sub_field('section_6_builder_gallery') as $gallery_item )
            <li class="mb-5 mx-10 list-none">
              <img src="{{ $gallery_item['url'] }}"/>
            </li>
          @endforeach
        </ul>
      @endif
    @elseif( $type === 'card' )
      @if( have_rows('section_6_builder_cards') )
        <h4 class="mt-10 text-center">Food Collected</h4>
        <div id="cards-6" class="w-full flex flex-row flex-wrap md:justify-center mb-5">
          @while( have_rows('section_6_builder_cards') ) @php the_row() @endphp
            @php
              $icon = get_sub_field('section_6_builder_card_icon');
              $number_top = get_sub_field('section_6_builder_card_number_top');
              $number_bottom = get_sub_field('section_6_builder_card_number_bottom');
              $caption = get_sub_field('section_6_builder_card_caption');
            @endphp
            <div class="w-full md:w-auto mb-10 md:mb-0 text-center">
              <div class="flex flex-col flex-wrap items-center w-full md:w-auto mb-4 md:mb-5 md:mx-3 py-5 px-10 bg-primary-1 shadow">
                @if( $icon )
                @endif
                @if( $number_top )
                  <span class="block mb-2 text-xl">lbs.</span>
                  <span class="text-5xl text-md:5xl font-poynteroldstyledisplaysemibold leading-none text-white js-increment" data-num="{{ preg_replace('/[^0-9]/', '', strip_tags($number_top)) }}">
                    <span>{!! $number_top !!}</span>
                  </span>
                @endif
                <div class="w-full h-px my-3 bg-white"></div>
                @if( $number_bottom )
                  <span class="text-5xl text-md:5xl font-poynteroldstyledisplaysemibold leading-none text-white js-increment" data-num="{{ preg_replace('/[^0-9]/', '', strip_tags($number_bottom)) }}">
                    <span>{!! $number_bottom !!}</span>
                  </span>
                  <span class="block mt-2 text-xl">meals</span>
                @endif
              </div>
              @if( $caption )
                <span class="inline-block mt-1 text-base text-white uppercase">{{ $caption }}</span>
              @endif
            </div>
          @endwhile
        </div>
      @endif
    @endif
  @endwhile
  @if( get_field('section_6_call_to_action_text') && get_field('section_6_call_to_action_url') )
    <div class="my-8 md:my-16 text-center">
      <a class="brm-btn brm-btn--primary" href="{{ get_field('section_6_call_to_action_url') }}">
        {{ get_field('section_6_call_to_action_text') }}
      </a>
    </div>
    <hr>
  @else
    <hr>
  @endif
@endif
