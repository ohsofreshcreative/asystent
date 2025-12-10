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

<!--- gains --->

<section data-gsap-anim="section" class="b-gains -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main relative">
		<div class="">

			<div class="relative flex flex-col md:flex-row justify-between items-start md:items-center gap-4 z-10">
				<h2 data-gsap-element="header" class="order-2 md:order-1">{{ strip_tags($g_gains['header']) }}</h2>
				@if (!empty($g_gains['image']))
				<div data-gsap-element="image" class="__img order-1 md:order-2">
					<img class="" src="{{ $g_gains['image']['url'] }}" alt="{{ $g_gains['image']['alt'] ?? '' }}">
				</div>
				@endif
			</div>

			@if (!empty($r_gains))
			@php
			$itemCount = count($r_gains);
			@endphp

			{{-- WARUNEK: Jeśli więcej niż 3 elementy -> SWIPER --}}
			@if ($itemCount > 3)

			<div data-gsap-element="swiper" class="swiper gains-swiper !overflow-visible mt-10">

				<div class="swiper-wrapper">
					@foreach ($r_gains as $item)
					<div class="swiper-slide h-auto">
						<div class="__card relative h-full">
							<div class="bg-white flex flex-col justify-between b-shadow rounded-3xl h-full p-8">
								<div>
									@if (!empty($item['image']['url']))
									<img class="h-80 lg:h-58 w-full object-cover rounded-2xl mb-6" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}" />
									@endif
									@if (!empty($item['title']))
									<h6 class="min-h-16 line-clamp-2 overflow-hidden mb-4" title="{{ $item['title'] }}">{{ $item['title'] }}</h6>
									@endif
									@if (!empty($item['oc']))
									<p class="">Ubezpieczyciel wypłacił: <span class="font-semibold">{{ $item['oc'] }}</span></p>
									@endif
									@if (!empty($item['gain']))
									<p class="">Odzyskaliśmy dodatkowo: <span class="font-semibold text-green-500">{{ $item['gain'] }}</span></p>
									@endif
								</div>
								@if (!empty($item['client']))
								<b class="block primary text-lg mt-6">Razem klient otrzymał: <span>{{ $item['client'] }}</span></b>
								@endif
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<div data-gsap-element="arrows" class="absolute top-1/2 left-0 w-full -translate-y-1/2 z-10 flex justify-between items-center pointer-events-none">
					<div class="__prev rounded-full bg-p-bright h-14 w-14 flex items-center justify-center pointer-events-auto -translate-x-1/2 cursor-pointer transition-all duration-400">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="11" viewBox="0 0 20 11" fill="none">
							<path d="M20 5.51782C20 5.06299 19.6182 4.69429 19.1472 4.69429H5.3247C4.8537 4.69429 4.4719 5.06299 4.4719 5.51782C4.4719 5.97264 4.8537 6.34135 5.3247 6.34135H19.1472C19.6182 6.34135 20 5.97264 20 5.51782Z" fill="#1D1EE3" />
							<path d="M6.28 0.241207C5.947 -0.0804023 5.407 -0.0804023 5.074 0.241207L0.2498 4.8998C-0.0833003 5.22141 -0.0833003 5.74284 0.2498 6.06445C0.5828 6.38606 1.1228 6.38606 1.4558 6.06445L6.28 1.40586C6.6131 1.08425 6.6131 0.562815 6.28 0.241207Z" fill="#1D1EE3" />
							<path d="M6.28 10.7588C5.947 11.0804 5.407 11.0804 5.074 10.7588L0.2498 6.1002C-0.0833003 5.77859 -0.0833003 5.25716 0.2498 4.93555C0.5828 4.61394 1.1228 4.61394 1.4558 4.93555L6.28 9.59414C6.6131 9.91575 6.6131 10.4372 6.28 10.7588Z" fill="#1D1EE3" />
						</svg>
					</div>
					<div class="__next rounded-full bg-p-bright h-14 w-14 flex items-center justify-center pointer-events-auto translate-x-1/2 cursor-pointer transition-all duration-300">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="11" viewBox="0 0 20 11" fill="none">
							<path d="M0 5.51782C0 5.06299 0.381815 4.69429 0.852808 4.69429H14.6753C15.1463 4.69429 15.5281 5.06299 15.5281 5.51782C15.5281 5.97264 15.1463 6.34135 14.6753 6.34135H0.852808C0.381815 6.34135 0 5.97264 0 5.51782Z" fill="#1D1EE3" />
							<path d="M13.72 0.241207C14.053 -0.0804023 14.593 -0.0804023 14.926 0.241207L19.7502 4.8998C20.0833 5.22141 20.0833 5.74284 19.7502 6.06445C19.4172 6.38606 18.8772 6.38606 18.5442 6.06445L13.72 1.40586C13.3869 1.08425 13.3869 0.562815 13.72 0.241207Z" fill="#1D1EE3" />
							<path d="M13.72 10.7588C14.053 11.0804 14.593 11.0804 14.926 10.7588L19.7502 6.1002C20.0833 5.77859 20.0833 5.25716 19.7502 4.93555C19.4172 4.61394 18.8772 4.61394 18.5442 4.93555L13.72 9.59414C13.3869 9.91575 13.3869 10.4372 13.72 10.7588Z" fill="#1D1EE3" />
						</svg>
					</div>
				</div>
			</div>


			{{-- WARUNEK: Jeśli 3 lub mniej elementów -> GRID (stara logika) --}}
			@else
			@php
			$gridCols = 1;
			if ($itemCount == 2) $gridCols = 2;
			if ($itemCount == 3) $gridCols = 3;
			$gridClass = $gridCols > 1 ? 'grid-cols-1 lg:grid-cols-' . $gridCols : 'grid-cols-1';
			@endphp

			<div class="relative z-10 grid {{ $gridClass }} gap-8 mt-10">
				@foreach ($r_gains as $item)
				<div data-gsap-element="stagger" class="__card relative h-full">
					<div class="bg-white flex flex-col justify-between b-shadow rounded-3xl h-full p-8">
						<div>
							@if (!empty($item['image']['url']))
							<img class="h-80 lg:h-58 w-full object-cover rounded-2xl mb-6" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}" />
							@endif
							@if (!empty($item['title']))
							<h6 class="mb-4">{{ $item['title'] }}</h6>
							@endif
							@if (!empty($item['oc']))
							<p class="">Ubezpieczyciel wypłacił: <span class="font-semibold">{{ $item['oc'] }}</span></p>
							@endif
							@if (!empty($item['gain']))
							<p class="">Odzyskaliśmy dodatkowo: <span class="font-semibold text-green-500">{{ $item['gain'] }}</span></p>
							@endif
						</div>
						@if (!empty($item['client']))
						<b class="block primary text-lg mt-6">Razem klient otrzymał: <span>{{ $item['client'] }}</span></b>
						@endif
					</div>
				</div>
				@endforeach
			</div>
			@endif
			@endif

		</div>
		<img data-gsap-element="image" class="__bg absolute opacity-10 top-1/2 -translate-y-1/2 -left-40" src="/wp-content/uploads/2025/11/shield_dark.svg" />
	</div>
</section>