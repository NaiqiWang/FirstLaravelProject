<article class="comment_comment media status-media">
	<div class="pull-left">
		<img class"media-object" src="//www.gravatar.com/avatar//{{ md5($comment->commentable->email) }}?s=30" alt="{{ $comment->commentable->name }}">
	</div>

	<div class="media-body">
		<h4 class="media-heading">{{ $comment->commentable->name }}</h4>

		{{ $comment->body }}

		</div>

</article>

