<!-- js를 위해 현재 경로 저장 -->
<input type="hidden" id="current_path" value="<?php echo get_template_directory_uri(); ?>" />


<div class="analysis the-box the-white-box">

 	 <div id="by-author">
		<h1 class="page-header">저자별</h1>
		<div class="row-fluid">
			<div class="span6">
				<?php wp_tag_cloud(array('taxonomy'=>'book_author','format'=>'flat')); ?>
			</div>
			<div class="span6">
				<div id="google-chart-author"></div>
				<p class="graph-title text-center"><small><small class="muted">상위 5명 저자</small></small></p>
			</div> 
		</div>
	</div>

	<div id="recomment-books">
		<h1 class="page-header">도서추천</h1>
		<p class="alert">지금까지 읽은 도서의 <strong>저자</strong>를 기준으로 새로운 도서를 추천합니다.</p>
		<div>
			<div id="recommend" class=""></div> 
			<div class="pagination text-center">
				<ul>
					<li><a id="pre-recommend-books" href="#recomment-books">&laquo;이전</a></li>
					<li><a id="next-recommend-books" href="#recomment-books">&raquo;다음</a></li>
				</ul>
			</div>
		</div>
		<div style="clear:both;"></div>
	</div>

	<div>
		<h1 class="page-header">출판사별</h1>
		<div class="row-fluid">
			<div class="span6">
				<?php wp_tag_cloud(array('taxonomy'=>'publisher','format'=>'flat')); ?>
			</div>
			<div class="span6">
				<div id="google-chart-publisher"></div>
				<p class="text-center"><small><small class="muted">상위 5개 출판사</small></small></p>
			</div> 
		</div>
	</div>

	<div>
		<h1 class="page-header">월별</h1>
		<div>
			<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
	  		<option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option> 
			  <?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
			</select>
		</div>
		<div id="google-chart-month"></div> 
	</div>

	<div>
		<h1 class="page-header">연도별</h1>
		<div>
			<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
	  		<option value=""><?php echo esc_attr( __( 'Select Year' ) ); ?></option> 
			  <?php wp_get_archives( array( 'type' => 'yearly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
			</select>
		</div>				
		<div id="google-chart-year"></div> 
	</div>

</div> <!-- analysis -->


<!-- Google chart -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<!-- analysis.js -->
<?php $js_path = get_template_directory_uri() . '/js/analysis.js'; ?>
<script type="text/javascript" src="<?php echo $js_path; ?>"></script>
