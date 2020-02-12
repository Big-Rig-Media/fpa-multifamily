<nav class="brm-nav brm-nav--mobile">
  @if (has_nav_menu('primary_navigation'))
    {!! wp_nav_menu(['menu_class' => 'brm-nav__list', 'container' => '', 'theme_location' => 'primary_navigation', ]) !!}
  @endif
</nav>
