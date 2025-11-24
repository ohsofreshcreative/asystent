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

<!--- proces --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-proces -smt {{ $sectionClass }}">
	<div class="__wrapper c-main">
		@if (!empty($g_proces['title']))
		<h2 data-gsap-element="header" class="w-full md:w-1/2">{{ strip_tags($g_proces['title']) }}</h2>
		@endif

		@if (!empty($r_proces))
		<div class="__repeater gap-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mt-16">

			@foreach ($r_proces as $item)
			<div data-gsap-element="stagger" class="flex flex-col justify-between rounded-3xl border-p-lighter px-6 py-6 md:px-18 md:py-10">
				<h4 class="mt-4">{{ $item['title'] }}</h4>
				<h6 class="mt-4">{{ $item['header'] }}</h6>
				<p class="mt-30">{{ $item['txt'] }}</p>
			</div>
			@endforeach
		</div>
		<div class="__line absolute bg-primary z-0 origin-left scale-x-0"></div>
		@endif
	</div>

</section>