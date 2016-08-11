<a href="{!! route('profile_path', $user->name) !!}">
	<img class="media-object img-circle avatar" src="//www.gravatar.com/avatar//{{ md5($user->email) }}?s=30" alt="{{ $user->name }}">
</a>
 