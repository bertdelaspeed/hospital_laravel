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
            <!-- partial -->


            <div class="container-fluid page-body-wrapper">
                <div align="center" style='padding-top:100px;'>
                    <table>
                        <tr style="background-color:black;">
                            <th style="padding:10px;">Doctor name</th>
                            <th style="padding:10px;">Phone</th>
                            <th style="padding:10px;">Specialty</th>
                            <th style="padding:10px;">Room No</th>
                            <th style="padding:10px;">Image</th>
                            <th style="padding:10px;">Delete</th>
                            <th style="padding:10px;">Update</th>

                        </tr>
                        @foreach ($data as $doctors)
                            <tr align="center" style='background-color:skyblue;'>
                                <td>{{ $doctors->name }}</td>
                                <td>{{ $doctors->phone }}</td>
                                <td>{{ $doctors->specialty }}</td>
                                <td>{{ $doctors->room }}</td>
                                <td><img src="doctorimage/{{ $doctors->image }}" alt="doctor" height="100"
                                        width="100" />
                                </td>
                                <td><a onclick="return confirm('Are you sure you want to delete ?')"
                                        href="{{ url('delete', $doctors->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                                <td><a href="{{ url('updatedoctor', $doctors->id) }}"
                                        class="btn btn-primary">Update</a>
                                </td>


                            </tr>
                        @endforeach

                    </table>
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
