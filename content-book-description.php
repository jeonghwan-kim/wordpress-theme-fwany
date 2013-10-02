<?php
/**
 * 저자정보를 위키에서 가져온다.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<!-- Daum book api로 도서 설명 요청  -->
<?php $author = strip_tags(get_book_author($post->ID)); ?>
<?php $title = $post->post_title; ?>
<input type="hidden" id="author" value="<?php echo $author; ?>" />
<input type="hidden" id="title" value="<?php echo $title; ?>" />
<input type="hidden" id="theme-path" value="<?php echo get_template_directory_uri(); ?>" />
<div id="book-description" class="page-header"></div>

<script type="text/javascript">
	$(window).load(function() {
		var path = $("#theme-path").val();
		var author = $("#author").val();
		var title = $("#title").val(); // 여기 처리 
		
		// 로딩중 이미지를 표시한다.
		$("#book-description").append('<img src="'+path+'/images/loading.gif" />');
		$("#book-description").css("clear", "both");
		
		// 위키정보를 요청한다.
		path = path+"/ajax/get-book-description.php?author="+author+"&title="+title;
		console.log(path);
		$.get(path, function(data, status) {
			console.log(data);

			// 로딩중 이미지를 숨긴다.
			$("#book-description img").css("display", "none");

			// 데이터가 없는 경우 div를 숨긴다.
			if (data == "") {
				$("#book-description").parent().css("display", "none");
				return;
			}

			// 데이터를 출력하다.
			var daum_book_url = "http://daum.net";
			$("#book-description").append("<h3>"+ title +"</h3>");
			$("#book-description").append("<p>"+ data.description +
				' <a target="new" href="'+ data.link +
				'"><span class="label">Daum Book</span></a></p>');
		});
		
	});
</script>