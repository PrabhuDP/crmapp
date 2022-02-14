<div class="row">
    <div class="col-12" id="error">
    </div>
</div>
<form class="form-horizontal account_form" enctype="multipart/form-data" id="company_setting_form">
    <div class="row mb-3">
        <label for="inputname3" class="col-3 col-form-label">Smtp Host</label>
        <div class="col-9">
            <input type="text" name="smtp_host" value="{{ $info->company->smtp_host ?? '' }}" class="form-control" id="inputname3" placeholder="Smtp Host">
        </div>
        <input type="hidden" name="type" value="{{ $type ?? '' }}">
    </div>
    <div class="row mb-3">
        <label for="smtp_port" class="col-3 col-form-label">Smtp Port</label>
        <div class="col-9">
            <input type="number" name="smtp_port" class="form-control" value="{{ $info->company->smtp_port ?? '' }}" id="smtp_port" placeholder="Smtp Port">
        </div>
    </div>
    <div class="row mb-3">
        <label for="smtp_user" class="col-3 col-form-label">Smtp Username</label>
        <div class="col-9">
            <input type="text" name="smtp_user" class="form-control" value="{{ $info->company->smtp_user ?? '' }}" id="smtp_user" placeholder="Smtp User">
        </div>
    </div>
    <div class="row mb-3">
        <label for="smtp_password" class="col-3 col-form-label">Smtp Password</label>
        <div class="col-9">
            <input type="text" name="smtp_password" class="form-control" value="{{ $info->company->smtp_password ?? '' }}" id="smtp_password" placeholder="Smtp Password">
        </div>
    </div>
    
    <div class="justify-content-end row">
        <div class="col-9">
            <button type="submit" class="btn btn-info">Update</button>
        </div>
    </div>
</form> 
<script>
    $('#company_setting_form').submit(function(e) {
        e.preventDefault();
       
        let formData = new FormData(this);
        $('#error').removeClass("alert alert-danger");
        $('#error').removeClass("alert alert-success");
        $('#error').html('');
        $.ajax({
            type:'POST',
            url: '{{ route("account.company.save") }}',
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                if(response.error.length > 0 && response.status == "1" ) {
                    $('#error').addClass('alert alert-danger');
                    response.error.forEach(display_errors);
                } else {
                    $('#error').addClass('alert alert-success');
                    response.error.forEach(display_errors);
                    setTimeout(function(){
                        get_settings_tab('mail');
                    },100);
                }
            },
            
        });
        return false;
    });
</script>