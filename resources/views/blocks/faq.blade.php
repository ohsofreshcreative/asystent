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

<!--- faq -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-faq relative -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main grid grid-cols-1 md:grid-cols-[1fr_2fr] gap-10">

		<div>
			@if (!empty($faq['image']))
			<img class="object-cover w-full __img img-xl order1" src="{{ $faq['image']['url'] }}" alt="{{ $faq['image']['alt'] ?? '' }}">
			@endif
			<div class="__content order2">
				<h3 data-gsap-element="header" class="">{{ $faq['title'] }}</h3>
				<div data-gsap-element="header" class="mt-2">
					{!! $faq['content'] !!}
				</div>
				@if (!empty($faq['button']))
				<a class="main-btn m-btn" href="{{ $faq['button']['url'] }}">{{ $faq['button']['title'] }}</a>
				@endif
			</div>
		</div>

		<div class="faq-wrapper grid">
			@foreach ($repeater as $item)
					<div class="faq bg-white b-shadow rounded-2xl px-6 md:px-8 ">
				<input
					class="acc-checkbox"
					type="radio"
					name="radio-b"
					id="faq-check{{ $loop->index }}"
					{{ $loop->first ? 'checked' : '' }}>
				<label class="faq-label text-dark font-semibold text-md md:text-h5" for="faq-check{{ $loop->index }}">{{ $item['title'] }}</label>
				<div class="faq-content">
					<p>{{ $item['txt'] }}</p>
				</div>
			</div>
			@endforeach
		</div>

	</div>

</section>