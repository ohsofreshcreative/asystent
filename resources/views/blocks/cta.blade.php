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

<!--- cta -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-cta relative -smt {{ $sectionClass }} {{ $section_class }}">

	<div data-gsap-element="wrapper" class="__wrapper">
		<div class="grid grid-cols-1 md:grid-cols-2 items-center gap-10 rounded-xl bg-gradient-light border-p-light p-4">

			<div class="__content w-full md:w-10/12 mx-auto">
				@if ($g_cta['title'])
				<h6 data-gsap-element="header" class="text-white">{{ $g_cta['title'] }}</h6>
				@endif

				@if (!empty($g_cta['button']))
				<a data-gsap-element="btn" class="second-btn m-btn mt-6 inline-flex" href="{{ $g_cta['button']['url'] }}">
					{{ $g_cta['button']['title'] }}
				</a>
				@endif
			</div>

			<div class="__img">
				<img src="{{ $g_cta['image']['url'] }}" alt="{{ $g_cta['image']['alt'] ?? ($g_cta['title'] ?? '') }}" class="img-m w-full object-cover radius-img" loading="lazy">
			</div>

		</div>
	</div>

</section>