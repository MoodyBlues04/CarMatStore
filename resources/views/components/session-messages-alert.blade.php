<div class="row justify-content-center" style="margin-top: 100px">
    <div class="col-md-6">
        @if (session()->has('success'))
            <div class="alert alert-success">
                <strong>{{ session()->get('success') }}</strong>
                <a href="#" role="button" class="close" data-dismiss="alert" aria-label="Close"
                   style="text-decoration: none; position: absolute; right: 6px;">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-error">
                <strong>{{ session()->get('error') }}</strong>
                <a href="#" role="button" class="close" data-dismiss="alert" aria-label="Close"
                   style="text-decoration: none; position: absolute; right: 6px;">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
        @elseif ($errors->any())
            <div class="alert alert-error">
                @foreach ($errors->all() as $errorMessage)
                    <strong>{{ $errorMessage }}</strong>
                @endforeach
                <a href="#" role="button" class="close" data-dismiss="alert" aria-label="Close"
                   style="text-decoration: none; position: absolute; right: 6px;">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
        @endif
    </div>
</div>
