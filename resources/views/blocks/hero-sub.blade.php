@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';

if (!empty($background) && $background !== 'none') {
$sectionClass .= ' ' . $background;
}
@endphp

<!-- hero-sub -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-hero-sub relative overflow-hidden pt-10 {{ $sectionClass }} {{ $section_class }}" 

style="background-image:linear-gradient(90deg, rgba(0, 22, 114,1), rgba(0, 22, 114,0.6)), url('{{ $g_hero_sub['bg']['url'] }}'); background-size:cover; background-position:center;">

	<div class="__wrapper c-main relative grid grid-cols-1 md:grid-cols-2 items-center gap-10 z-10">

		<div class="__content relative py-20">
			<h3 data-gsap-element="header" class="m-header text-white">{{ $g_hero_sub['header'] }}</h3>

			@if (!empty($g_hero_sub['txt']))
			<p data-gsap-element="txt" class="text-white">{{ strip_tags($g_hero_sub['txt']) }}</p>
			@endif

			@if (!empty($g_hero_sub['button']))
			<a data-gsap-element="btn" class="second-btn m-btn" href="{{ $g_hero_sub['button']['url'] }}">{{ $g_hero_sub['button']['title'] }}</a>
			@endif

		</div>

		<div class="__img relative">
			<img class="relative z-10" src="{{ $g_hero_sub['image']['url'] }}" alt="{{ $g_hero_sub['image']['alt'] ?? '' }}">
			<img class="absolute top-0 left-0" src="/wp-content/uploads/2025/11/white-shield.svg" />
		</div>

	</div>
	<img class="absolute blur-xl -top-30 -left-10" src="/wp-content/uploads/2025/11/half_shield.svg" />
</section>