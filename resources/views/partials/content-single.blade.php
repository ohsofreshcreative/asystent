@php
$categories = get_the_category();
$category = !empty($categories) ? $categories[0] : null;
@endphp

<section data-gsap-anim="section" class="hero-blog relative bg-gradient-light overflow-hidden">
	<div class="__wrapper c-main relative z-10 -spt pb-44">
		<div class="__content w-full sm:w-3/4 mt-24 md:mt-0">
			@if ($category)
			<a data-gsap-element="header" href="{{ get_category_link($category->term_id) }}" class="text-white mb-2">{{ $category->name }}</a>
			@endif
			<h1 data-gsap-element="header" class="text-h2 text-white mt-6">{{ get_the_title() }}</h1>
			@if(has_excerpt())
			<div data-gsap-element="content" class="">
				{!! get_the_excerpt() !!}
			</div>
			@endif
		</div>
	</div>
</section>

<section data-gsap-anim="section">
	<div id="tresc" class="__entry relative z-10 -mt-30">
		<div class="c-main grid grid-cols-1 lg:grid-cols-[3fr_1fr] gap-8">

			<div class="__content">
				@if(has_post_thumbnail())
				<div data-gsap-element="img" class="img-2xl rounded-xl overflow-hidden mb-16">
					{!! get_the_post_thumbnail(get_the_ID(), 'large') !!}
				</div>
				@endif
				<div data-gsap-element="header">
				{!! the_content() !!}
				</div>
			</div>
			<div data-gsap-element="sidebar" class="__sidebar bg-brand sticky radius overflow-hidden h-max top-10 p-8 hidden lg:block">
				<div class="relative z-10">
					<h6 class="text-white">Sprawdź, ile możesz odzyskać</h6>

					<p class="text-white mt-20">Wypełnij formularz i umów się na bezpłatną konsultację</p>
					<a class="second-btn align-self-bottom mt-4" href="/kontakt">Prześlij formularz</a>
				</div>

				<img data-gsap-element="image" class="absolute -top-4 left-20 mix-blend-overlay opacity-30 pointer-events-none" src="/wp-content/uploads/2025/11/white-logo.svg" />
			</div>
		</div>
	</div>
</section>

@php
$current_id = get_the_ID();
$categories = wp_get_post_categories($current_id);
$related_args = [
'category__in' => $categories,
'post__not_in' => [$current_id],
'posts_per_page' => 3,
'ignore_sticky_posts' => 1,
];
$related_query = new WP_Query($related_args);
@endphp

@if($related_query->have_posts())
<section data-gsap-anim="section" class="related-posts -smt pb-26">
	<div class="c-main border-top-p pt-20">
		<h3 data-gsap-element="header" class="text-center">Podobne wpisy</h3>
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-14">
			@while($related_query->have_posts())
			@php($related_query->the_post())
			<div data-gsap-element="card">
				<article @php(post_class(['__single-card', 'bg-white' , 'radius' , 'b-shadow' , 'h-full' , 'p-8' , 'flex' , 'flex-col' ]))>
					<div class="flex flex-col justify-between flex-grow">
						<header>
							@if(has_post_thumbnail())
							<div class="overflow-hidden rounded-xl mb-6">
								<a href="{{ get_permalink() }}">
									{!! get_the_post_thumbnail(null, 'large', ['class' => '__thumb __featured-image img-s rounded-xl object-cover w-full']) !!}
								</a>
							</div>
							@endif
							<h6 class="">
								<a href="{{ get_permalink() }}">
									{!! get_the_title() !!}
								</a>
							</h6>
						</header>
						<a href="{{ get_permalink() }}" class="underline-btn m-btn mt-6">
							Zobacz więcej
						</a>
					</div>
				</article>
			</div>
			@endwhile
			@php(wp_reset_postdata())
		</div>
	</div>
</section>
@endif