<div>
	@include('partials.header')
	@include('partials.cart')
	<!-- Slider -->
	@include('partials.slider')
	<!-- Banner -->
	@include('partials.banner')
	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Product Overview
				</h3>
			</div>
			@include('partials.filter')

			@include('partials.product')

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</section>

	@include('partials.footer')
	<!-- Back to top -->
	<x-backtop></x-backtop>
	<!-- Modal1 -->
	@include('partials.modal')

</div>