<div class="card bg-primary" style="width:170px">
    Total Shortened URL: {{$all_url->count()}} 
</div>
@if($all_url->isNotEmpty())
	<table class="table">
	  <thead class="thead-light">
	    <tr>
	      <th scope="col">Title</th>
	      <th scope="col">URL</th>
	      <th scope="col">Created Date</th>
	      <th scope="col">Copy</th>
	    </tr>
	  </thead>
	  <tbody>
	    	@foreach($all_url as $url)
	    		@php 
	    		$a = 'sdf';
	    		@endphp
				<tr>
			      <td>{{ $url->name }}</td>
			       <td><a href="{{route('shorten.link', $url->code)}}" target="_blank">{{ route('shorten.link', $url->code) }}</a></td>
			      <td>{{ $url->created_at }}</td>
			      <td> <button value="copy" id="{{ $url->id }}" class="copy-btn">Copy!</button><input type="hidden" name="copy-url" id="hidden-{{ $url->id }}" value="{{ route('shorten.link', $url->code) }}"></td>
			    </tr>
			@endforeach
			 
	  </tbody>
	</table>
	<br>
	{{ $all_url->links() }}
@else
	Add Short URL
@endif