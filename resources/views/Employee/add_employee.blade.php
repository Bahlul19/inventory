@extends('layouts.app')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
          <div class="col-md-8">
              <form action="{{ url('Employee.store_data') }}" method="post" enctype="multipart/form-data">
    @csrf

      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Name</label>
          <input type="text" name="name" class="form-control" placeholder="Post name" id="title" required data-validation-required-message="Please product name.">
          <p class="help-block text-danger"></p>
        </div>
      </div>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Email</label>
          <input type="text" name="email" class="form-control" placeholder="Post name" id="email" required data-validation-required-message="Please product name.">
          <p class="help-block text-danger"></p>
        </div>
      </div>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Phone</label>
          <input type="text" name="phone" class="form-control" placeholder="Post name" id="phone" required data-validation-required-message="Please product name.">
          <p class="help-block text-danger"></p>
        </div>
      </div>
      
      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Address</label>
          <textarea name="address" rows="5" class="form-control" placeholder="Post Details" id="address" required data-validation-required-message="Please enter a product details."></textarea>
          <p class="help-block text-danger"></p>
        </div>
      </div>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Experience</label>
          <input type="text" name="experience" class="form-control" placeholder="Post name" id="experience" required data-validation-required-message="Please product name.">
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
          <label>Salary</label>
          <input type="text" name="salary" class="form-control" placeholder="Post name" id="salary" required data-validation-required-message="Please product name.">
          <p class="help-block text-danger"></p>
        </div>
      </div>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Vacation</label>
          <input type="text" name="vacation" class="form-control" placeholder="Post name" id="vacation" required data-validation-required-message="Please product name.">
          <p class="help-block text-danger"></p>
        </div>
      </div>

      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>City</label>
          <input type="text" name="city" class="form-control" placeholder="Post name" id="city" required data-validation-required-message="Please product name.">
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