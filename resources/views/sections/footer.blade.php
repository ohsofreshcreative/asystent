<footer class="footer">
    @php
  $active_sidebars = 0;
  for ($i = 1; $i <= 4; $i++) {
      if (is_active_sidebar('sidebar-footer-' . $i)) {
          $active_sidebars++;
      }
  }
@endphp

@if ($active_sidebars > 0)
  <div class="__wrap bg-dark relative overflow-hidden">
    <div class="__wrapper c-main relative z-10 py-36">

      <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-10 border-bottom-p pb-14">
        @if ($footer_image)
          <img src="{{ $footer_image['url'] }}" alt="{{ $footer_image['alt'] }}" />
        @endif
        @if ($footer_button)
          <a data-gsap-element="btn" class="second-btn" href="{{ $footer_button['url'] }}" target="{{ $footer_button['target'] ? $footer_button['target'] : '_self' }}">{{ $footer_button['title'] }}</a>
        @endif
      </div>
                
      <div class="__widgets grid gap-1 md:gap-6 md:grid-cols-{{ $active_sidebars }} mt-14">

        @for ($i = 1; $i <= 4; $i++)
          @if (is_active_sidebar('sidebar-footer-' . $i))
            <div>@php(dynamic_sidebar('sidebar-footer-' . $i))</div>
          @endif
        @endfor
      </div>
    </div>
	<img class="__bg1 absolute -top-40 -left-40 mix-blend-overlay opacity-30" src="/wp-content/uploads/2025/11/white-logo.svg" />
	<img class="__bg2 absolute -bottom-120 -right-40 blur-2xl" src="/wp-content/uploads/2025/11/shield.svg" />
  </div>
@endif

	<div class="c-main flex flex-col md:flex-row justify-between gap-6 py-10 footer-bottom">
		<p class="">Copyright ©2025 <?php echo get_bloginfo('name'); ?>. All Rights Reserved</p>
		<p class="flex gap-2">Designed &amp; Developed by
			<a target="_blank" href="https://www.ohsofresh.pl" title="OhSoFresh"><img class="oh" src="/wp-content/themes/asystent/resources/images/ohsofresh.svg"></a>
		</p>
	</div>
	</div>

</footer>