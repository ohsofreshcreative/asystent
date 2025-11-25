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

<!--- duo -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-duo relative -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative">
		<div class="__col grid grid-cols-1 lg:grid-cols-[1fr_2fr] gap-8 lg:gap-30">
			<h3 data-gsap-element="header" class="">{{ $g_duo['title'] }}</h3>

			<div data-gsap-element="txt" class="__txt text-xl w-full md:w-3/4 mt-2">
				{!! $g_duo['txt'] !!}
			</div>

			@if (!empty($g_duo['button']))
			<a data-gsap-element="btn" class="main-btn m-btn" href="{{ $g_duo['button']['url'] }}">{{ $g_duo['button']['title'] }}</a>
			@endif
		</div>

		<div class="__img mt-20">
			<img class="object-cover radius img-2xl w-full " src="{{ $g_duo['image']['url'] }}" alt="{{ $g_duo['image']['alt'] ?? '' }}" />
		</div>
	</div>

</section>