<?php
/**
 * 저자정보를 위키에서 가져온다.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<!-- 위키백과의 저자정보 출력 -->
<?php $author = strip_tags(get_book_author($post->ID)); ?>
<input type="hidden" id="author" value="<?php echo $author; ?>" />
<input type="hidden" id="theme-path" value="<?php echo get_template_directory_uri(); ?>" />
<div id="author-wiki" class="page-header"></div>

<script type="text/javascript">
	$(window).load(function() {
		var path = $("#theme-path").val();
		var author = $("#author").val();
		
		// 로딩중 이미지를 표시한다.
		$("#author-wiki").append('<img src="'+path+'/images/loading.gif" />');
		$("#author-wiki").addClass("author-info");
		$("#author-wiki").css("clear", "both");
		
		// 위키정보를 요청한다.
		path = path+"/ajax/get-wiki-content.php?keyword="+author;
		$.get(path, function(data, status) {

			// 로딩중 이미지를 숨긴다.
			$("#author-wiki img").css("display", "none");

			// 데이터가 없는 경우 div를 숨긴다.
			if (data == "") {
				$("#author-wiki").parent().css("display", "none");
				return;
			}

			// 데이터를 출력하다.
			var wiki_link = "http://ko.wikipedia.org/wiki/" + author;
			$("#author-wiki").append("<h3>"+ author +"</h3>");
			$("#author-wiki").append("<p>"+ data +
				' <a target="new" href="'+ wiki_link +
				'"><span class="label">위키백과</span></a></p>');
		});
		
	});
</script>