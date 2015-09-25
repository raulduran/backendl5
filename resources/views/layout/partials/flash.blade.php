@if (session('status') && session('title'))
<script type="text/javascript">
    swal({
        title: "{!! session('title') !!}",
        text: "{!! session('status') !!}",
        html: true,
        showConfirmButton: false,
        timer: 1500,
        type: "{{ session('type-status', 'success') }}"
    });
</script>
@elseif (session('status'))
    <div id="message-status">
        <div class="alert alert-{{ session('type-status', 'success') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('status') }}
        </div>
    </div>
@endif