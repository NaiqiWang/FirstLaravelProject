            
            @if($statuses->count())
                @foreach($statuses as $status)
                	@include ('partials.status')
                @endforeach
            @else
                <p>This user hasn't posted anything</p>
            @endif