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

<!--- text -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-text relative -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative">
		<div class="__content order2">
			<h4 data-gsap-element="header" class="m-header">{{ $g_text['title'] }}</h4>

			<div data-gsap-element="txt" class="__txt mt-2">
				{!! $g_text['txt'] !!}
			</div>

			@if (!empty($g_text['button']))
			<a data-gsap-element="btn" class="main-btn m-btn" href="{{ $g_text['button']['url'] }}">{{ $g_text['button']['title'] }}</a>
			@endif

		</div>
	</div>

</section>