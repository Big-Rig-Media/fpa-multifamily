@if( get_field('core_plus_content') )
  <section class="brm-section brm-section--core-plus has-shadow js-background" data-mobile="/app/uploads/2020/02/investment-background-1920x579" data-desktop="/app/uploads/2020/02/investment-background.jpg">
    <div class="text-black text-center brm-container brm-container--small">
      {!! get_field('core_plus_content') !!}
      @include('partials.sections.section-tabbed-data', ['default' => false])
      @if( get_field('core_plus_employee_shortcode') )
        {!! do_shortcode('[employee id='.get_field('core_plus_employee_shortcode').']') !!}
      @endif
      @if( get_field('core_plus_employee_additional_shortcode') )
        {!! do_shortcode('[employee id='.get_field('core_plus_employee_additional_shortcode').']') !!}
      @endif
    </div>
  </section>
@endif
