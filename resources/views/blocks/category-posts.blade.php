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

<!--- category-posts -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="block-category-posts -smt layout-{{ $layout }} {{ $sectionClass }} {{ $section_class }}">
	<div class="c-main">
		<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-10">
			<h2 data-gsap-element="title" class="block-title">{{ $posts_settings['title'] }}</h2>

			@if($category_id)
			<div data-gsap-element="btn" class="view-all-container text-center">
				<a class="stroke-btn" href="{{ get_category_link($category_id) }}">
					Zobacz wszystkie wpisy
				</a>
			</div>
			@endif
		</div>

		@if(!empty($posts))
		<div class="posts-container grid grid-cols-1 md:grid-cols-3 gap-8">
			@foreach($posts as $post)
			<div data-gsap-element="card" class="__card">
				<div class="bg-white radius b-shadow h-full p-8 flex flex-col">
					@if($show_image && has_post_thumbnail($post->ID))
					<div class="__img">
						<a class="" href="{{ get_permalink($post->ID) }}">
							{!! get_the_post_thumbnail($post->ID, 'large', ['class' => 'img-s']) !!}
						</a>
					</div>
					@endif
					<div class="__content flex flex-col justify-between w-full mt-6 flex-grow">
						<h6 class="">
							<a href="{{ get_permalink($post->ID) }}">
								{{ get_the_title($post->ID) }}
							</a>
						</h6>
						<!-- 	@if($show_excerpt)
						<div class="">
							{{ get_the_excerpt($post->ID) }}
						</div>
						@endif -->
						<a href="{{ get_permalink($post->ID) }}" class="underline-btn m-btn">Zobacz więcej
						</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		@else
		<div class="no-posts">
			Brak postów w wybranej kategorii.
		</div>
		@endif
	</div>
</section>