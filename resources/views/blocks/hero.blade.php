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
	class="b-hero bg-primary relative pt-12 pb-18 {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-20 items-center relative z-20">
		
		<div class="__content flex flex-col pt-4 lg:pt-0">
			
			<h2 data-gsap-element="header" class="text-white order-1">
				{{ $g_hero['title'] ?? '' }}
			</h2>
			
			<div class="order-3">
				<div data-gsap-element="txt" class="__txt text-white text-lg md:text-xl mt-6">
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

		<!--- MOBILE FORM --->
			<div class="lg:hidden order-2">
				<div data-gsap-element="form" class="__forms">

					@if (!empty($r_hero))
					<div x-data="{ activeTab: 0 }" class="tabs-container bg-white radius mt-6">
						<div class="tabs-nav grid grid-cols-3">
							@foreach ($r_hero as $index => $item)
							<button
								@click="activeTab = {{ $index }}"
								:class="{ '': activeTab === {{ $index }}, 'bg-p-lighter border-bottom-p cursor-pointer': activeTab !== {{ $index }} }"
								class="__tab flex flex-col items-center justify-between gap-3 py-4 px-1 font-semibold text-body text-dark focus:outline-none transition-colors duration-150 ease-in-out border-right-p">
								@if (!empty($item['image']))
								<img src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] }}" class="w-8 h-8 object-contain">
								@endif
								<span class="text-sm text-body">{{ $item['title'] }}</span>
							</button>
							@endforeach
						</div>
						<div class="tabs__content p-8">
							@foreach ($r_hero as $index => $item)
							<div x-show="activeTab === {{ $index }}" x-cloak class="tab-panel" data-tab-content="{{ $index }}">
								<div class="cf7-step-1-container">
									@if (!empty($item['shortcode']))
									{!! do_shortcode($item['shortcode']) !!}
									@endif
								</div>
								<div class="cf7-step-2-container" style="display:none;">
									<div class="flex flex-col md:flex-row gap-6">
										<div>
											<h6 class="primary">Dziękujemy za przesłanie formularza!</h6>
											<p>Otrzymaliśmy Twoje zgłoszenie i rozpoczniemy analizę tak szybko, jak to możliwe. Skontaktujemy się z Tobą w ciągu 24 godzin, aby przekazać kolejne kroki i wstępne wyniki.</p>
										</div>
										<img class="max-w-21" src="/wp-content/uploads/2025/12/logo.svg" />
									</div>
									<div class="my-6">
										<h6>Dołącz dokumenty</h6>
										<p>Jeśli chcesz przyspieszyć analizę</p>
									</div>
									@if (!empty($item['shortcode_2']))
									{!! do_shortcode($item['shortcode_2']) !!}
									@endif
								</div>
							</div>
							@endforeach
						</div>
					</div>
					@endif
				</div>
			</div>
		</div>

		<!--- DESKTOP FORM --->
		<div class="hidden lg:block">
			<div data-gsap-element="form" class="__forms">
				@if (!empty($header))
				<h5 class="text-white">{{ $header }}</h5>
				@endif

				@if (!empty($r_hero))
				<div x-data="{ activeTab: 0 }" class="tabs-container bg-white radius mt-6">
					<div class="tabs-nav grid grid-cols-3">
						@foreach ($r_hero as $index => $item)
						<button
							@click="activeTab = {{ $index }}"
							:class="{ '': activeTab === {{ $index }}, 'bg-p-lighter border-bottom-p cursor-pointer': activeTab !== {{ $index }} }"
							class="__tab flex flex-col items-center justify-between gap-3 py-4 px-1 font-semibold text-body text-dark focus:outline-none transition-colors duration-150 ease-in-out border-right-p">
							@if (!empty($item['image']))
							<img src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] }}" class="w-8 h-8 object-contain">
							@endif
							<span class="text-sm text-body">{{ $item['title'] }}</span>
						</button>
						@endforeach
					</div>
					<div class="tabs__content p-8">
						@foreach ($r_hero as $index => $item)
						<div x-show="activeTab === {{ $index }}" x-cloak class="tab-panel" data-tab-content="{{ $index }}">
							<div class="cf7-step-1-container">
								@if (!empty($item['shortcode']))
								{!! do_shortcode($item['shortcode']) !!}
								@endif
							</div>
							<div class="cf7-step-2-container" style="display:none;">
								<div class="flex flex-col md:flex-row gap-6">
									<div>
										<h6 class="primary">Dziękujemy za przesłanie formularza!</h6>
										<p>Otrzymaliśmy Twoje zgłoszenie i rozpoczniemy analizę tak szybko, jak to możliwe. Skontaktujemy się z Tobą w ciągu 24 godzin, aby przekazać kolejne kroki i wstępne wyniki.</p>
									</div>
									<img class="max-w-21" src="/wp-content/uploads/2025/12/logo.svg" />
								</div>
								<div class="my-6">
									<h6>Dołącz dokumenty</h6>
									<p>Jeśli chcesz przyspieszyć analizę</p>
								</div>
								@if (!empty($item['shortcode_2']))
								{!! do_shortcode($item['shortcode_2']) !!}
								@endif
							</div>
						</div>
						@endforeach
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>

	@if (!empty($g_hero['image']))
	<div data-gsap-element="image" class="absolute -top-10 left-20 mix-blend-overlay opacity-30 pointer-events-none">
		<img src="{{ $g_hero['image']['url'] }}" alt="{{ $g_hero['image']['alt'] ?? '' }}">
	</div>
	@endif
</section>