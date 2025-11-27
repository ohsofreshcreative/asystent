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
					@endif
				</div>
			</div>

			@if (!empty($r_gains))
			@php
			$itemCount = count($r_gains);
			$gridCols = 1;
			if ($itemCount == 2) $gridCols = 2;
			if ($itemCount == 3) $gridCols = 3;
			if ($itemCount >= 4) $gridCols = 4; // Twój dotychczasowy warunek
			$gridClass = $gridCols > 1 ? 'grid-cols-1 lg:grid-cols-' . $gridCols : 'grid-cols-1';
			@endphp

			<div class="relative z-10 grid {{ $gridClass }} gap-8 mt-10">
				@foreach ($r_gains as $item)
				<div data-gsap-element="stagger" class="__card relative">
					<div class="bg-white b-shadow rounded-3xl p-8">
						@if (!empty($item['image']['url']))
						<img class="h-80 lg:h-58 w-full object-cover rounded-2xl mb-6" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}" />
						@endif
						@if (!empty($item['title']))
						<h6 class="mb-4">{{ $item['title'] }}</h6>
						@endif
						@if (!empty($item['oc']))
						<p class="">Ubezpieczyciel wypłacił: <span class="font-semibold">{{ $item['oc'] }}</p>
						@endif
						@if (!empty($item['gain']))
						<p class="">Odzyskaliśmy dodatkowo: <span class="font-semibold text-green-500">{{ $item['gain'] }}</p>
						@endif
						@if (!empty($item['client']))
						<b class="block primary text-lg mt-6">Razem klient otrzymał: <span>{{ $item['client'] }}</b>
						@endif
					</div>
				</div>
				@endforeach
			</div>
			@endif

		</div>
		<img data-gsap-element="image" class="__bg absolute opacity-10 top-1/2 -translate-y-1/2 -left-40" src="/wp-content/uploads/2025/11/shield_dark.svg" />
	</div>
</section>