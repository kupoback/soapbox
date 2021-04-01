@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="grid-container" style="display: grid; grid-template-columns: 1fr 0.3fr; grid-template-rows: 1fr; gap: 5px 5px;">
	<div style="padding: 56.25% 0 0 0; position: relative;">
		<iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" src="https://vimeo.com/event/830242/embed" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
	</div>
	<iframe src="https://vimeo.com/event/830242/chat/" width="100%" height="100%" frameborder="0"></iframe>
</div>
@endsection
