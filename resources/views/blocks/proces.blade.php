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

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-proces relative -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main relative z-10">
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

		<div data-gsap-element="cta" class="__cta flex flex-col md:flex-row items-center justify-between rounded-3xl border-p-lighter p-8 mt-10">
			<div class="__content flex flex-col md:flex-row items-center gap-8">
				@if (!empty($g_proces_2['image']))
				<div class="__img order1">
					<img class="" src="{{ $g_proces_2['image']['url'] }}" alt="{{ $g_proces_2['image']['alt'] ?? '' }}">
				</div>
				@endif
				<p class="text-xl w-full md:w-1/2">{{ $g_proces_2['title'] }}</p>
			</div>
			@if (!empty($g_proces_2['button']))
			<a class="white-btn" href="{{ $g_proces_2['button']['url'] }}">{{ $g_proces_2['button']['title'] }}</a>
			@endif
		</div>
	</div>


	<img class="__bg absolute top-20 right-0 blur-xl opacity-50 pointer-events-none" src="/wp-content/uploads/2025/11/shield.svg" />
</section>