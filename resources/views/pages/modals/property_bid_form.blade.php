<form action="" id="bidForm" method="post">
    @csrf
    <div class="form-group">
        <label for="">Proposal Description</label>
        <textarea name="proposal_description" class="form-control" id="" cols="30" rows="10"></textarea>
        <input type="hidden" name="property_id" value="{{ $arguments['id'] }}">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>

<script>
     $("#bidForm").on('submit',function(e){
        e.preventDefault();
        $.ajax({
            url:"{{ route('proposal_submit') }}",
            type : 'POST',
            data:new FormData(this),
            dataType: 'json',
            contentType: false,  
            cache: false,  
            processData:false,
            success:function(data) {
                // $('#form-wizard1')[0].reset();
                Swal.fire({
                    position: 'top-mid',
                    icon: 'success',
                    title: 'Proposal Submitted Successfully',
                    showConfirmButton: false,
                    timer: 2500
                });
                $('#showPropertyImages').modal('close');
                // setTimeout(function() { 
                //     location.reload();
                // }, 2000);
            },error:function(err)
            {
                // $("#companyNameErr").text(err.responseJSON.errors.company_name);
                // $("#assessorNameErr").text(err.responseJSON.errors.assessor_name);
                // $("#assessorCredErr").text(err.responseJSON.errors.assessor_creds);
                // $("#assessorPhoneErr").text(err.responseJSON.errors.assessor_phone);
                // $("#assessorEmailErr").text(err.responseJSON.errors.email);
                
            }
        });
    });
</script>