@extends('layouts.app')

@section('content')

@php
$term = get_queried_object();
$categories = get_categories();

$category_header = get_field('category_header', $term);
$category_description = get_field('category_description', $term);
$category_image = get_field('category_image', $term);
@endphp

<section data-gsap-anim="section">
	<div class="hero category-header -spt mt-24 md:mt-0 mb-10">
		<div class="__wrapper c-main">
			<h2 class="primary text-center w-full md:w-3/4 mx-auto">
				{!! $category_header ?: get_the_archive_title() !!}
			</h2>
		</div>
	</div>
</section>

@php
$sticky_posts = get_option('sticky_posts');
$featured_post_id = null;

$featured_post_args = [
'posts_per_page' => 1,
'cat' => $term->term_id,
];

if (!empty($sticky_posts)) {
$featured_post_args['post__in'] = $sticky_posts;
$featured_post_args['ignore_sticky_posts'] = 1;
} else {

$featured_post_args['orderby'] = 'date';
$featured_post_args['order'] = 'DESC';
}

$featured_post_query = new WP_Query($featured_post_args);

if (!$featured_post_query->have_posts() && !empty($sticky_posts)) {
$featured_post_args = [
'posts_per_page' => 1,
'cat' => $term->term_id,
'orderby' => 'date',
'order' => 'DESC',
];
$featured_post_query = new WP_Query($featured_post_args);
}

if ($featured_post_query->have_posts()) {
$featured_post_id = $featured_post_query->posts[0]->ID;
}
@endphp

@if ($featured_post_query->have_posts())
@while ($featured_post_query->have_posts()) @php $featured_post_query->the_post() @endphp

<section data-gsap-anim="section">
	<div class="c-main relative featured-post">
		<div class="bg-white b-shadow rounded-4xl grid grid-cols-1 md:grid-cols-2 items-center gap-10 z-5 p-8">
			<div>
				@if (has_post_thumbnail())
				<a data-gsap-element="img" class="rounded-2xl overflow-hidden block" href="{{ get_permalink() }}">
					{!! get_the_post_thumbnail(get_the_ID(), 'large', ['class' => '__thumb img-m h-full object-cover featured-image ']) !!}
				</a>
				@endif
			</div>
			<div>
				<div data-gsap-element="title" class="flex gap-3 items-center text-brand font-semibold"><img class="h-5" src="/wp-content/uploads/2025/11/odzyskanie.svg" />Warto przeczytać</div>
				<h4 data-gsap-element="header" class="mt-4">
					<a href="{{ get_permalink() }}">{{ get_the_title() }}</a>
				</h4>
				<a data-gsap-element="btn" class="second-btn m-btn align-self-bottom" href="{{ get_permalink() }}">Przeczytaj</a>
			</div>
		</div>
	</div>
</section>
@endwhile
@php wp_reset_postdata() @endphp
@endif

@if (have_posts())
<section data-gsap-anim="section">
	<div data-gsap-element="posts" class="c-main pb-25 !mt-10 posts grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
		@while (have_posts()) @php(the_post())

		@includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
		@endwhile
	</div>
</section>

{!! get_the_posts_navigation() !!}
@else
<div class="mt-20 mb-20">
	<div class="c-main">
		<h3 class="">Brak wpisów w tej kategorii.</h3>
		<a class="main-btn m-btn" href="/kategorie/wszystkie-wpisy/">Sprawdź wszystkie wpisy</a>
	</div>
</div>
@endif
@endsection