<div class="list-group-item list-group-item-action d-flex">
	<div class="agenda__card--right">
		<input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
	</div>
	<div class="agenda__card--left d-fill" aria-current="true" data-bs-toggle="modal" data-bs-target="#exampleModal">
		<div class="agenda__card--header d-flex justify-content-between">
			<p>{{$title}}</p>
			<p class="pull-right badge bg-secondary rounded-pill">
				{{$comment_count}}
				<i class="bi bi-chat-fill"></i>
			</p>
		</div>
	</div>
</div>
