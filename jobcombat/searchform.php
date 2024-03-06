		<form role="search" method="get" id="searchform" class="" action="<?php echo esc_url(the_permalink()); ?>">
			<div class="row">
				<div class="col-8">
					<input type="" name="s" id="s" placeholder="Your Query<?php the_search_query(); ?>" class="form-control" required />
				</div>
				<button class="col-4 btn btn-outline-warning" type="submit" id="searchsubmit" value="">Search</button>
			</div>
		</form>