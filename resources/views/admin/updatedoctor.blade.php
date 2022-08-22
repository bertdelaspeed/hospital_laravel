<!DOCTYPE html>
<html lang="en">
<base href="/public">

@include('admin.css')

<body>
    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.navbar')
            <!-- partial -->


            <div class="container-fluid page-body-wrapper">



                <div align="center" style='padding-top:100px;'>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <form action="{{ url('editdoctor', $data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div style="padding:15px">
                            <label for="">Doctor Name</label>
                            <input style="color:black" type="text" name='name' value='{{ $data->name }}'>
                        </div>
                        <div style="padding:15px">
                            <label for="">Phone</label>
                            <input style="color:black" type="text" name='phone' value='{{ $data->phone }}'>
                        </div>
                        <div style="padding:15px">
                            <label for="">Specialty</label>
                            <input style="color:black" type="text" name='specialty' value='{{ $data->specialty }}'>
                        </div>
                        <div style="padding:15px">
                            <label for="">Room</label>
                            <input style="color:black" type="text" name='room' value='{{ $data->room }}'>
                        </div>
                        <div style="padding:15px">
                            <label for="">Old Image</label>
                            <img height="150" width="150" src="doctorimage/{{ $data->image }}" alt="">
                        </div>

                        <div style="padding:15px">
                            <label for="">Change Image</label>
                            <input type="file" name='file'>
                        </div>
                        <div style="padding:15px">

                            <input type="submit" class='btn btn-primary'>
                        </div>


                    </form>
                </div>
            </div>


            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
</body>

</html>
