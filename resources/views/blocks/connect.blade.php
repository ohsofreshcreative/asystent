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

<!--- connect --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-connect bg-gradient relative -smt pt-24 pb-30 {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative z-2">

		<div class="relative grid grid-cols-1 lg:grid-cols-2 items-center gap-10 z-10">
			<div class="__content w-full lg:w-11/12 flex flex-col justify-between">
				<div class="__data">
					<h2 data-gsap-element="header" class="text-white">{!! $g_connect_1['header'] !!}</h2>

					<div class="flex flex-col gap-2 mt-6">
						<p data-gsap-element="txt" class="text-white">{!! $g_connect_1['txt'] !!}</p>
						<p data-gsap-element="txt" class="text-p-lighter mt-3">{!! $g_connect_1['address'] !!}</p>
						<a data-gsap-element="txt" href="tel:{{ preg_replace('/\s+/', '', $g_connect_1['phone']) }}" class="__phone text-p-lighter">{{ $g_connect_1['phone'] }}</a>
						<a data-gsap-element="txt" href="mailto:{{ $g_connect_1['email'] }}" class="__mail text-p-lighter">{{ $g_connect_1['email'] }}</a>
					</div>

				</div>
			</div>

			<div data-gsap-element="form" class="__form radius overflow-hidden border-p-light p-6 md:p-10 mt-10">
				<h5 class="relative text-white mb-6 z-10">Formularz kontaktowy</h5>
				<div class="relative z-10">{!! do_shortcode($g_connect_2['shortcode']) !!}</div>
			</div>
		</div>
	</div>

	@if (!empty($g_connect_1['image']))
	<img data-gsap-element="img" class="absolute -top-10 left-1/2 -translate-x-1/2 mix-blend-overlay opacity-30 pointer-events-none" src="{{ $g_connect_1['image']['url'] }}" alt="{{ $g_connect_1['image']['alt'] ?? '' }}">
	@endif
</section>