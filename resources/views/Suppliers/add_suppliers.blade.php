@extends('layouts.app')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
          <div class="col-md-8">
              <form action="{{ url('Suppliers.store_data') }}" method="post" enctype="multipart/form-data">
    @csrf

      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Name</label>
          <input type="text" name="name" class="form-control" placeholder="Name" id="title" required data-validation-required-message="Please product name.">
          <p class="help-block text-danger"></p>
        </div>
      </div>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Email</label>
          <input type="text" name="email" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Please product name.">
          <p class="help-block text-danger"></p>
        </div>
      </div>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Phone</label>
          <input type="text" name="phone" class="form-control" placeholder="Phone" id="phone" required data-validation-required-message="Please product name.">
          <p class="help-block text-danger"></p>
        </div>
      </div>
      
      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Address</label>
          <textarea name="address" rows="5" class="form-control" placeholder="Address" id="address" required data-validation-required-message="Please enter a product details."></textarea>
          <p class="help-block text-danger"></p>
        </div>
      </div>
      
      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
            <img id="photo" src="#" />
          <label>Photo</label>
          <input type="file" name="photo" accept="image/*" class="form-control upload" required onchange="readURL(this);">
        </div>
      </div>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Account Holder</label>
          <input type="text" name="account_holder" class="form-control" placeholder="Account Holder" id="account_holder" required data-validation-required-message="Please product name.">
          <p class="help-block text-danger"></p>
        </div>
      </div>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Account Number</label>
          <input type="text" name="account_number" class="form-control" placeholder="Account Number" id="account_number" required data-validation-required-message="Please product name.">
          <p class="help-block text-danger"></p>
        </div>
      </div>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Bank Name</label>
          <input type="text" name="bank_name" class="form-control" placeholder="Bank name" id="bank_name" required data-validation-required-message="Please product name.">
          <p class="help-block text-danger"></p>
        </div>
      </div>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Bank Branch</label>
          <input type="text" name="bank_branch" class="form-control" placeholder="Bank Branch" id="bank_branch" required data-validation-required-message="Please product name.">
          <p class="help-block text-danger"></p>
        </div>
      </div>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Shop Name</label>
          <input type="text" name="shopname" class="form-control" placeholder="Bank name" id="shopname" required data-validation-required-message="Please product name.">
          <p class="help-block text-danger"></p>
        </div>
      </div>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Area</label>
          <input type="text" name="area" class="form-control" placeholder="Area" id="area" required data-validation-required-message="Please product name.">
          <p class="help-block text-danger"></p>
        </div>
      </div>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>City</label>
          <input type="text" name="city" class="form-control" placeholder="City" id="city" required data-validation-required-message="Please product name.">
          <p class="help-block text-danger"></p>
        </div>
      </div>

      <br>
      <div id="success"></div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
      </div>
    </form>
</div>
</div>
</div>
</div>

<script type="text/javascript">
function readURL(input)
{
    if(input.files && input.files[0])
    {
        var reader = new FileReader();
        reader.onload =  function(e)
        {
            $('#photo')
            .attr('src', e.target.result)
            .width(80)
            .height(80);
        };
        reader.readAsDataURL(intput.files[0]);
    }
}
</script>

@endsection()