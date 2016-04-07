@if (count($errors) > 0)
    <div class="alert alert-danger">
        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
            <div class="alert alert-{{ $msg }} alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-{{ getAlertIcon($msg) }}"></i> Alert!</h4>
                {{ Session::get("alert-$msg") }}
            </div>
        @endif
    @endforeach
</div> <!-- end .flash-message -->

