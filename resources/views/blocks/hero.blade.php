@php
$sectionClass = '';
$sectionClass .= !empty($flip) ? ' order-flip' : '';
$sectionClass .= !empty($wide) ? ' wide' : '';
$sectionClass .= !empty($nomt) ? ' !mt-0' : '';
$sectionClass .= !empty($gap) ? ' wider-gap' : '';

if (!empty($background) && $background !== 'none') {
$sectionClass .= ' ' . $background;
}
@endphp

<!-- hero --->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	class="b-hero bg-primary relative {{ $sectionClass }}">

	<div class="__wrapper c-wide h-screen grid grid-cols-1 lg:grid-cols-2 gap-40 items-center relative z-20">
		<div class="__content pt-20 pb-10 md:py-30">
			<h2 data-gsap-element="header" class=" text-white">
				{{ $g_hero['title'] ?? '' }}
			</h2>
			<div data-gsap-element="txt" class="text-white mt-2">
				{!! $g_hero['txt'] ?? '' !!}
			</div>
			@if (!empty($g_hero['button1']))
			<div class="inline-buttons m-btn">
				<a data-gsap-element="button" class="white-btn left-btn"
					href="{{ $g_hero['button1']['url'] }}"
					target="{{ $g_hero['button1']['target'] }}">
					{{ $g_hero['button1']['title'] }}
				</a>
				@if (!empty($g_hero['button2']))
				<a data-gsap-element="button" class="main-btn"
					href="{{ $g_hero['button2']['url'] }}"
					target="{{ $g_hero['button2']['target'] }}">
					{{ $g_hero['button2']['title'] }}
				</a>
				@endif
			</div>
			@endif
		</div>
		<div class="__forms">
			@if (!empty($header))
			<h5 class="text-white">{{ $header }}</h5>
			@endif

			@if (!empty($r_hero))
			<div x-data="{ activeTab: 0 }" class="tabs-container bg-white radius mt-6">
				{{-- Nawigacja zakładek --}}
				<div class="tabs-nav grid grid-cols-3">
					@foreach ($r_hero as $index => $item)
					<button
						@click="activeTab = {{ $index }}"
						:class="{ '': activeTab === {{ $index }}, 
						'bg-light border-bottom-p cursor-pointer': activeTab !== {{ $index }} }"
						class="__tab flex flex-col items-center justify-between gap-3 py-4 px-1 font-semibold text-body text-dark focus:outline-none transition-colors duration-150 ease-in-out border-right-p">
						@if (!empty($item['image']))
						<img src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] }}" class="w-8 h-8 object-contain">
						@endif
						<span>{{ $item['title'] }}</span>
					</button>
					@endforeach
				</div>

				{{-- Kontener na treść zakładek --}}
				<div class="tabs__content p-8">
					@foreach ($r_hero as $index => $item)
					<div x-show="activeTab === {{ $index }}" x-cloak class="tab-panel">
						@if (!empty($item['shortcode']))
						{!! do_shortcode($item['shortcode']) !!}
						@endif
					</div>
					@endforeach
				</div>
			</div>
			@endif
		</div>
	</div>

	@if (!empty($g_hero['image']))
	<div data-gsap-element="image" class="absolute -top-10 left-20 mix-blend-overlay opacity-30 pointer-events-none">
		<img src="{{ $g_hero['image']['url'] }}" alt="{{ $g_hero['image']['alt'] ?? '' }}">
	</div>
	@endif
</section>