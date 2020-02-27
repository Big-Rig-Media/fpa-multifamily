@if( have_rows('hero_stats') )
  @php
    $i = 0;
  @endphp
  <div class="w-full flex flex-row flex-wrap md:flex-no-wrap md:items-start md:justify-center">
    @while( have_rows('hero_stats') ) @php the_row() @endphp
      <div class="flex flex-col flex-wrap items-center w-full md:w-auto mb-4 md:mb-0 mx-3 py-5 px-5 bg-accent-6 shadow">
        <span class="text-5xl text-md:5xl font-poynteroldstyledisplaysemibold leading-none">{!! get_sub_field('hero_stat_number') !!}</span>
        <span class="mt-5 text-xl text-center">{!! get_sub_field('hero_stat_text') !!}</span>
      </div>
      @php $i++ @endphp
    @endwhile
  </div>
@endif
