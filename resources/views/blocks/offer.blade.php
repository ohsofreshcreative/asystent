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

<!--- offer --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-offer -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">

		<h2 class="text-center w-full md:w-3/4 m-auto">{{ strip_tags($g_offer['header']) }}</h2>

		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 mt-10">
			@if (!empty($g_offer['r_offer']))
			@foreach ($g_offer['r_offer'] as $item)
			<a class="" href="{{ $item['button']['url'] }}" target="{{ $item['button']['target'] ?? '_self' }}">
				<div class="__card relative flex flex-col img-xl rounded-3xl" style="background-image: url('{{ $item['image']['url'] }}'); background-size: cover; background-position: center; padding: 40px;">

					<div class="bg-white rounded-2xl mt-auto p-10">
						<h6 class="mb-4">{{ $item['header'] }}</h6>
						<p class="underline-btn" href="{{ $item['button']['url'] }}" target="{{ $item['button']['target'] ?? '_self' }}">
							{{ $item['button']['title'] }}
						</p>
					</div>
				</div>
			</a>
			@endforeach
			@endif
		</div>
	</div>
</section>