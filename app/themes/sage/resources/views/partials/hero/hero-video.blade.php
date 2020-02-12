@if( get_field('hero_video_mp4') && get_field('hero_video_webm') )
  <section class="brm-hero brm-hero--video has-video">
    <video class="brm-hero__video" preload="auto" autoplay loop muted playsinline>
      <source src={{ get_field('hero_video_mp4') }} type="video/mp4"/>
      <source src={{ get_field('hero_video_webm') }} type="video/webm"/>
    </video>
  </section>
@endif
