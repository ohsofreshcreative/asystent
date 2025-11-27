@php
$sectionClass = '';
$sectionClass .= $container ? ' c-main' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';

if (!empty($background) && $background !== 'none') {
    $sectionClass .= ' ' . $background;
}
@endphp

<!--- image -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-image relative -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper">

		@if (!empty($g_image['image']))
		<img class="object-cover w-full __img img-xl order1" src="{{ $g_image['image']['url'] }}" alt="{{ $g_image['image']['alt'] ?? '' }}">
		@endif

	</div>

</section>