<?php
/**
 * 도서 정보를 가져온다.
 *
 * 입력: 도서명(저자 도서명)
 * 출력: 도서 설명
 */

header ("Content-Type: application/json");

// $author = 'C. S. 루이스';
// $title = $_GET['title'];

// 도서 정보 설명을 가져온다.
$result = get_book_description();

// 결과 반환 
echo json_encode($result);




// 불필요 문자 제거 
function trim_string($str)
{
	$str = str_replace('&lt;b&gt;', '', $str);
	$str = str_replace('&lt;/b&gt;', '', $str);
	return $str;
}


// 도서 정보를 가져온다. 
function get_book_description($author = 'c.s.루이스', $title='기적') {
	require_once ('api-key.php');

	$pageno = 1;
	$total_pages = 1;
	$result_per_page = 20;

	while($pageno <= $total_pages) { 
		$request = 'http://apis.daum.net/search/book?apikey='. $daum_api_key .
			   '&q='.urlencode($author. ' ' . $title).
			   '&output=json'. 
			   '&searchType=all'.
			   '&pageno='. $pageno .
			   '&result='. $result_per_page;

		$response = file_get_contents($request);echo'asdf';
		echo $response; exit();
		$book_info = json_decode($response, true); 

		// 총 결과수 저장 및 총 페이지 계산
		if (!isset($book_info['channel'])) continue;
		$total_count = $book_info['channel']['totalCount'];
		$total_pages = floor($total_count / $result_per_page + 1);

		// 결과 저장 
		foreach ($book_info['channel']['item'] as $key => $value) {
			// 결과가 비어있으면 무시 
			if ($value['title'] == "") continue;
			if ($value['author'] == "") continue;
			if ($value['description'] == "") continue;
			if ($value['link'] == "") continue;

			// 정보가져오기 
			$title_from_daum = trim_string($value['title']);
			$author_from_daum = trim_string($value['author']);

			// 필터를 통과하지 못하면 저장하지 않음. 
			if (!filter($title, $author, $title_from_daum, $author_from_daum))
				continue;
			
			return array( 
				'description' => trim_string($value['description']) ,
				'link' => $value['link'] );

		}

	    $pageno++;
	} // end while

	return "";
} 


/**
 * 도서검색결과 필터 함수
 *
 */
function filter($title, $author, $title_from_daum, $author_from_daum) 
{

	// 비교 문자의 빈칸 삭제
	$author = str_replace(' ', '', $author);
	$title = str_replace(' ', '', $title);
	$title_from_daum = str_replace(' ', '', $title_from_daum);
	$author_from_daum = str_replace(' ', '', $author_from_daum);

	// 1. 저가가 다르면 제외 
	if ($author_from_daum != $author) return false;

	// 2. 도서명이 다르면 제외
	if ($title_from_daum != $title) return false;

	return true;
}
?>

