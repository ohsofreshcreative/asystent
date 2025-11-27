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

<!--- quote -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-quote relative section-py -smt overflow-hidden {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative z-10">

		<div class="__content order2">

			@if (!empty($g_quote['header']))
			<h4 data-gsap-element="header" class="m-header">{{ $g_quote['header'] }}</h4>
			@endif

			<div data-gsap-element="txt" class="text-2xl md:text-4xl leading-normal text-body font-semibold">
				{!! $g_quote['txt'] !!}
			</div>

			<div data-gsap-element="txt" class="text-xl leading-normal text-body font-light">
				{!! $g_quote['added'] !!}
			</div>

			@if (!empty($g_quote['button']))
			<a data-gsap-element="btn" class="second-btn m-btn" href="{{ $g_quote['button']['url'] }}">{{ $g_quote['button']['title'] }}</a>
			@endif
		</div>

	</div>

	@if (!empty($g_quote['image']))
	<div data-gsap-element="img" class="__img absolute opacity-30 top-1/2 -translate-y-1/2 -left-20 pointer-events-none">
		<img class="blur-lg" src="{{ $g_quote['image']['url'] }}" alt="{{ $g_quote['image']['alt'] ?? '' }}">
	</div>
	@endif

</section>