@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $smt ? ' -smt' : '';
$sectionClass .= $gap ? ' wider-gap' : '';

if (!empty($background) && $background !== 'none') {
$sectionClass .= ' ' . $background;
}
@endphp


<!--- values --->

<section data-gsap-anim="section" class="b-values bg-gradient {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">

		<div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-8 lg:gap-16">

			<div class="__content w-full md:w-3/4">
				<h2 data-gsap-element="header" class="m-header text-white">{{ strip_tags($g_values['header']) }}</h2>
				@if (!empty($g_values['text']))
				<div data-gsap-element="text" class="__txt text-white">{!! $g_values['text'] !!}</div>
				@endif
			</div>

			<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
				@foreach ($r_values as $item)
				<div data-gsap-element="card" class="__card radius border-p-lighter h-full">
					<div class="relative radius b-shadow h-full p-6">
						@if (!empty($item['image']['url']))
						<div class="bg-main rounded-full w-max p-4 mb-6">
							<img class="" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}" />
						</div>
						@endif
						@if (!empty($item['title']))
						<h6 class="mb-4 text-white">{{ $item['title'] }}</h6>
						@endif
						@if (!empty($item['text']))
						<p class="text-white">{{ $item['text'] }}</p>
						@endif
					</div>
				</div>
				@endforeach
			</div>
		</div>
		
	</div>
</section>