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


<!--- cards --->

<section data-gsap-anim="section" class="b-cards -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">
		<div class="">

			<div class="__content w-full md:w-3/4">
				<h2 data-gsap-element="header" class="m-header">{{ strip_tags($g_cards['header']) }}</h2>
				@if (!empty($g_cards['text']))
				<p data-gsap-element="text">{{ $g_cards['text'] }}</p>
				@endif
			</div>

			@if (!empty($r_cards))
			@php
			$itemCount = count($r_cards);
			$gridCols = 1;
			if ($itemCount == 2) $gridCols = 2;
			if ($itemCount >= 3) $gridCols = 3;
			$gridClass = $gridCols > 1 ? 'grid-cols-1 md:grid-cols-2 lg:grid-cols-' . $gridCols : 'grid-cols-1';
			@endphp

			<div class="grid {{ $gridClass }} gap-8 mt-10">
				@foreach ($r_cards as $item)
				<a href="#form">
				<div data-gsap-element="card" class="__card h-full">
					<div class="relative bg-white radius b-shadow h-full p-6">
						@if (!empty($item['image']['url']))
						<div class="bg-main rounded-full w-max p-4 mb-6">
							<img class="" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}" />
						</div>
						@endif
						@if (!empty($item['title']))
						<h6 class="mb-4">{{ $item['title'] }}</h6>
						@endif
						@if (!empty($item['text']))
						<p class="">{{ $item['text'] }}</p>
						@endif
						<img class="__arrow mt-6" src="/wp-content/uploads/2025/11/blue-arrow.svg" />
					</div>
				</div>
				</a>
				@endforeach
			</div>
			@endif

		</div>
	</div>
</section>