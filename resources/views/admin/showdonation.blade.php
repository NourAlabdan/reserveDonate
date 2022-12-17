<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
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
        <div align="center" style="padding-top:100px;">
            <table>
                <tr style="background-color:black;">
                    <th style="padding:10px">Donor Name</th>
                    <th style="padding:10px">Email</th>
                    <th style="padding:10px">Phone</th>
                    <th style="padding:10px">Address</th>
                    <th style="padding:10px">Date</th>
                    <th style="padding:10px">blood group</th>
                    <th style="padding:10px">Message</th>
                    <th style="padding:10px">Notification</th>
                  
                </tr>
                @foreach($data as $donation)
                <tr align="center" style="background-color:skyblue;">
                    <td>{{$donation->name}}</td>
                    <td>{{$donation->email}}</td>
                    <td>{{$donation->phone}}</td>
                    <td>{{$donation->address}}</td>
                    <td>{{$donation->date}}</td>
                    <td>{{$donation->blood_group}}</td>
                    <td>{{$donation->message}}</td>
                    <td ><a class="btn btn-success"href="{{url('notification',$donation->id)}}">Send Notification</a></td>
              
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>