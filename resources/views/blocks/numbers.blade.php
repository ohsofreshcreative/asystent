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

<!--- numbers --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-numbers relative -smt {{ $sectionClass }}">

	<div class="__wrapper c-main relative z-10">
		<div class="grid grid-cols-1 md:grid-cols-2 items-center gap-16">

			<div class="__content">
				<h3 data-gsap-element="header" class="__header m-header">
					{!! $g_numbers['header'] !!}
				</h3>
				<div data-gsap-element="txt" class="mt-2">
					{!! $g_numbers['txt'] !!}
				</div>
			</div>
			@if (!empty($g_numbers['image']))
			<div data-gsap-element="image" class="__img order1">
				<img class="object-cover w-full __img img-s radius-img" src="{{ $g_numbers['image']['url'] }}" alt="{{ $g_numbers['image']['alt'] ?? '' }}">
			</div>
			@endif
		</div>

		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 pt-10">
			@foreach ($r_numbers as $item)
			<div data-gsap-element="stagger" class="__card relative border-p-lighter radius p-8">
				@if (!empty($item['icon']['url']))
				<img class="mb-6" src="{{ $item['icon']['url'] }}" alt="{{ $item['icon']['alt'] ?? '' }}" />
				@endif
				<p class="text-h5">{{ $item['title'] }}</p>
				<p class="">{{ $item['txt'] }}</p>
			</div>
			@endforeach
		</div>
	</div>

	<img class="__bg absolute top-20 right-0 blur-xl opacity-50 pointer-events-none" src="/wp-content/uploads/2025/11/half-shield.svg" />
</section>