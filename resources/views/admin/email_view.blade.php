
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
    <style type="text/css">
      label{
        display:inline-block;
        width:200px;
      }
    </style>
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
  
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

       
        <div class="container" align="center" style="padding-top:100px">
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">
            x
          </button>
          {{session()->get('message')}}

        </div>
        @endif

 <form  action="{{url('sendemail',$data->id)}}" method="POST" >
  @csrf

<div style="padding:15px">

<label for="">Greeting</label>

<input type="text" style="color:black;" name="greeting"  required="">

</div>
<div style="padding:15px">

<label for="">Body</label>

<input type="text" style="color:black;" name="body"  required="">

</div>


<div style="padding:15px">

<label for="">Action Text</label>

<input type="text" style="color:black;" name="actiontext">

</div>


<div style="padding:15px">

<label for="">Action Url</label>

<input type="text" style="color:black;" name="actionurl">

</div>
<div style="padding:15px">

<label for="">End Part</label>

<input type="text" style="color:black;" name="endpart">

</div>
<div style="padding:15px">


<input type="submit" class="btn btn-success" >

</div>

</form>
 </div>
</div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>