@if (count($errors) > 0)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4>Error!</h4>
        <p>{{ trans('messages.error') }}</p>
    </div>
@endif