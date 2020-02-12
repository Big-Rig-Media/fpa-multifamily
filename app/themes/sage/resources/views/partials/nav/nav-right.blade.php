<nav class="brm-nav brm-nav--spread">
  @if (has_nav_menu('right_primary_navigation'))
    {!! wp_nav_menu(['menu_class' => 'brm-nav__list', 'container' => '', 'theme_location' => 'right_primary_navigation', ]) !!}
  @endif
</nav>
