<article @php(post_class(['__single-card', 'bg-white', 'rounded-2xl' , 'p-8', 'flex', 'flex-col', 'justify-between', 'h-full']))>
	<header>
		@if(has_post_thumbnail())
		<div class="overflow-hidden rounded-xl">
			<a class="" href="{{ get_permalink() }}">
				{!! get_the_post_thumbnail(null, 'large', ['class' => '__thumb featured-image img-xs rounded-xl object-cover']) !!}
			</a>
		</div>
		@endif

		<h6 class="entry-title mt-6 rounded">
			<a href="{{ get_permalink() }}">
				{!! get_the_title() !!}
			</a>
		</h6>
	</header>

	<a data-gsap-element="btn" class="underline-btn m-btn align-self-bottom" href="{{ get_permalink() }}">Przeczytaj</a>
</article>