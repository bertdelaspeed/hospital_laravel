<!DOCTYPE html>
<html lang="en">

@include('admin.css')

<body>
    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.navbar')
            <div class="container-fluid page-body-wrapper">



                <div class="container" align="center" style="padding-top:100px">

                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <form action="{{ url('upload_doctor') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div style="padding:15px">
                            <label for="">Doctor Name</label>
                            <input required type="text" name='name' placeholder='Type name' style='color:black'>
                        </div>
                        <div style="padding:15px">
                            <label for="">Phone </label>
                            <input required type="number" name='number' placeholder='Type Number' style='color:black'>
                        </div>
                        <div style="padding:15px">
                            <label for="">Specialty</label>
                            <select required name="specialty" id="" style='color:black ; width:200px' ;>
                                <option value="">--select--</option>
                                <option value="Dermatology">Dermatology</option>
                                <option value="Cardiology">Cardiology</option>
                                <option value="Ophtalmology">Ophtalmology</option>
                                <option value="Traumatology">Traumatology</option>
                            </select>
                        </div>
                        <div style="padding:15px">
                            <label for="">Room No</label>
                            <input required type="number" name='room' placeholder='Type room number'
                                style='color:black'>
                        </div>
                        <div style="padding:15px">
                            <label for="">Doctor Image</label>
                            <input required type="file" name='file'>
                        </div>
                        <div style="padding:15px">

                            <input type="submit" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
</body>

</html>
