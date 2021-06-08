<?php
/**
 * Banner Slider Layout 3.[Pro version only]
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


?>
<section class="main__banner main__banner--grid">
	<div class="container">
		<div class="row">
			<div class="col">


				<div class="main__banner__hero carousel slide" id="mainHeroBanner" data-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active">
							<article class="post post--large">
								<a href="#" class="post__img loading-bg">
									<img src="https://picsum.photos/800" alt="">
								</a>
								<div class="post__cnt-box">
									<div class="post-container">
									<h2 class="post__cnt-box__title">
										<a href="#">It is during our darkest moments that we must focus to see the light</a>
									</h2>
									<div class="post__cnt-box__bottom flex">
										<div class="featured-label">Featured</div>
										<div class="tag-wrap">
											<a href="#">Lifestyle</a>
											<a href="#">Lifestyle</a>
										</div>
									</div>
									</div>
									
								</div>
							</article>

							<article class="post post--large">
								<a href="#" class="post__img loading-bg">
									<img src="https://picsum.photos/id/100/600/800" alt="">
								</a>
								<div class="post__cnt-box">
									<h2 class="post__cnt-box__title">
										<a href="#">It is during our darkest moments that we must focus to see the light</a>
									</h2>
									<div class="post__cnt-box__bottom flex">
										<div class="featured-label">Featured</div>
										<div class="tag-wrap">
											<a href="#">Lifestyle</a>
											<a href="#">Lifestyle</a>
										</div>
									</div>
								</div>
							</article>
						</div>
					</div>
					<a class="slide-btn slide-btn--prev" href="#mainHeroBanner" role="button" data-slide="prev">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
							<path fill-rule="evenodd" d="M15.28 5.22a.75.75 0 00-1.06 0l-6.25 6.25a.75.75 0 000 1.06l6.25 6.25a.75.75 0 101.06-1.06L9.56 12l5.72-5.72a.75.75 0 000-1.06z"></path>
						</svg>
					</a>
					<a class="slide-btn slide-btn--next" href="#mainHeroBanner" role="button" data-slide="next">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
							<path fill-rule="evenodd" d="M8.72 18.78a.75.75 0 001.06 0l6.25-6.25a.75.75 0 000-1.06L9.78 5.22a.75.75 0 00-1.06 1.06L14.44 12l-5.72 5.72a.75.75 0 000 1.06z"></path>
						</svg>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
