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

<!-- accordion -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-accordion relative overflow-hidden -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">
		<div class="grid grid-cols-1 lg:grid-cols-[1.3fr_2fr] gap-8 lg:gap-20">
			@if (!empty($g_accordion['image']))
			<img data-gsap-element="img-left" class="__img object-cover order1 h-full radius-img" src="{{ $g_accordion['image']['url'] }}" alt="{{ $g_accordion['image']['alt'] ?? '' }}">
			@endif
			<div class="__content order2">
				<h2 data-gsap-element="header" class="">{{ $g_accordion['title'] }}</h2>
				<div data-gsap-element="txt" class="">{!! $g_accordion['txt'] !!}</div>
				@if (!empty($g_accordion['button']))
				<a class="main-btn m-btn" href="{{ $g_accordion['button']['url'] }}">{{ $g_accordion['button']['title'] }}</a>
				@endif
				<div data-gsap-element="accordion" class="accordion-wrapper grid mt-10">
					@foreach ($repeater as $item)
					<div class="accordion border-p-light bg-main rounded-2xl px-6 md:px-8 ">

						<input class="acc-check" type="radio" name="radio-a" id="check{{ $loop->index }}" {{ $loop->first ? 'checked' : '' }}>
						<div class="flex items-center gap-4">
							@if (!empty($item['icon']['url']))
							<img class="mb-1" src="{{ $item['icon']['url'] }}" alt="{{ $item['icon']['alt'] ?? '' }}" />
							@endif
							<label class="accordion-label text-dark w-full font-semibold text-md md:text-h5 gap-4" for="check{{ $loop->index }}">{{ $item['title'] }}</label>
						</div>
						<div class="accordion-content">
							<p>{!! $item['txt'] !!}</p>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>