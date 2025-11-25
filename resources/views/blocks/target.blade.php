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

<!--- target -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-target relative -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative">
		<h2 data-gsap-element="header" class="text-center">{{ $g_target['title'] }}</h2>

		<div class="__col grid grid-cols-1 lg:grid-cols-2 items-center gap-10 mt-8">
			@if (!empty($g_target['gallery']))
			<div class="grid grid-cols-2 md:grid-cols-3 gap-4 order1">
				@foreach ($g_target['gallery'] as $image)
				<div class="bg-white radius b-shadow p-4 flex items-center justify-center">
					<img class="max-h-12" src="{{ $image['url'] }}" alt="{{ $image['alt'] }}">
				</div>
				@endforeach
			</div>
			@endif

			<div data-gsap-element="txt" class="__txt order2">
				{!! $g_target['txt'] !!}
			</div>

		</div>

		@if (!empty($g_target['button']))
		<a data-gsap-element="btn" class="second-btn !flex mx-auto mt-10" href="{{ $g_target['button']['url'] }}">{{ $g_target['button']['title'] }}</a>
		@endif
	</div>

</section>