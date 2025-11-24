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

<!--- reviews --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-reviews -smt {{ $sectionClass }}">
	<div class="__wrapper c-main relative">
		<div class="__content">
			<div class="__wrapper c-main block">
				<h3 class="">{{ $g_reviews['title']}}</h3>
			</div>
			<div class="swiper reviews-swiper c-main !overflow-visible !mt-10">

				<div class="absolute flex gap-2 -top-1 right-0">
					<div class="swiper-button-prev rounded-full"></div>
					<div class="swiper-button-next rounded-full"></div>
				</div>
				<div class="swiper-wrapper">
					@foreach($r_reviews as $card)
					<div class="swiper-slide">
						<div class="__card relative">
							<div class=" radius bg-white border-p-light  min-h-80 p-8">
								<img class="mb-6" src="/wp-content/uploads/2025/11/quote.svg" />
								@if(!empty($card['txt']))
								<div class="__txt">{{ $card['txt'] }}</div>
								@endif
							</div>

							<div class="bg-white b-shadow radius flex flex-col md:flex-row gap-8 p-8 mx-8 -mt-10">
								<div class="flex items-center gap-2">
									<img src="/wp-content/uploads/2025/11/star.svg" />
									<p>{{ $card['rate'] }}</p>
								</div>
								<div>
									<b class="block">{{ $card['name'] }}</b>
									<p>{{ $card['case'] }}</p>
								</div>
							</div>

						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

</section>