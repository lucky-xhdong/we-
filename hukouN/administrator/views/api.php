<?
$data = array();
if(isset($articles)){
	 $i = 0;
	 foreach($articles as $article){
		 $channel_type = "";
		 if($article->chid == 17){
			$url = base_url().'article/scientist/'.$article->id;
			$channel_type = 'cover';
		 }else{
			$url = base_url().'article/index/'.$article->id;
		 }
		 if($article->chid == 5){
		   $channel_type = 'guess';
		 }
		$data[$i] = array(
			'picture_url' => pictureurlsize('',$article->urls),
			'title'	      => $article->title,
			'abstract'    =>$article->fulltext,
			'article_url' => $url,
			'tag'	=> $article->tags,
			'comments'=> $article->comments,
			'date'	=> $article->publishtime,
			'picturl_link_to_article_id' =>$article->id,
			'picturl_link_to_channel_id' =>$article->chid,
			'article_id'  => $article->id,
		);
		if($channel_type != ""){
			$data[$i]['channel_type'] =  $channel_type;
		}
		 $i++;
	  }
	  echo json_encode($data);
}else if(isset($channels)){
	 foreach($channels as $channel){
		$data[] = array(
			'channel_id'  =>  $channel->id,
			'channel_title'	  => $channel->name,
			'subtitle'	  =>  $channel->fulltext,
			'picture_url' =>  originpictureurl('',$channel->urls),
		);
	  }
	  echo json_encode($data);
}else if(isset($specialchannels)){
	 foreach($specialchannels as $channel){
		$data[] = array(
			'channel_id'  =>  $channel->id,
			'channel_title'	  => $channel->name,
			'subtitle'	  =>  $channel->fulltext,
			'picture_url' =>  originpictureurl('',$channel->urls),
			'bjpicture_url'=> originpictureurl('',$channel->background),
		);
	  }
	  echo json_encode($data);
}else if(isset($articlelists)){
	 foreach($articlelists as $article){
		 if($article->chid == 17){
		 	$url = base_url().'article/scientist/'.$article->id;
		 }else{
		 	$url = base_url().'article/index/'.$article->id;
		 }
		$data[] = array(
			'article_id'  => $article->id,
			'title'	      => $article->title,
			'abstract'    =>$article->fulltext,
			'picture_url' =>  pictureurlsize('',$article->urls,'square'),
			'tag'	=> $article->tags,
			'comments'=> $article->comments,
			'date'	=> $article->publishtime,
			'article_url' => $url,
		);
	  }
	  echo json_encode($data);
}else if(isset($article)){
	
		$data = array(
			'article_id'  => $article->id,
			'article_url' => base_url().'article/index/'.$article->id,
		);
	  echo json_encode($data);
}else if(isset($comments)){
	 foreach($comments as $comment){
		$data[] = array(
			'comment_id' 	=> $comment->id,
			'user_name'     => $comment->username,
			'user_header' 	=> $comment->avatar_url,
			'comment'    	=> $comment->body,
			'datetime' 		=> $comment->created_time,
		);
	  }
	  echo json_encode($data);
}else if(isset($specialarticle)){
		$data = array(
			'id'  => $specialarticle->id,
			'picture_url' =>  pictureurlsize('',$specialarticle->urls),
			'title'	      => $specialarticle->title,
			'tag'	      => $specialarticle->tags,
			'description' =>strip_tags($specialarticle->body),
			'rules'     =>strip_tags($specialarticle->rules),
			'comments'=> $specialarticle->comments,
			'answer'    =>strip_tags($specialarticle->answer),
			'date'		=> date('Y-m-d H:i',strtotime($specialarticle->gussdate)),
			'end_time'	=>strtotime($specialarticle->deadline),
			'scores'	=> $specialarticle->points,
		);
	  echo json_encode($data);
}
?>
