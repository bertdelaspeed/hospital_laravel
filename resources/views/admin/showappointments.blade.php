a
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
                            <th style="padding:10px;">Customer name</th>
                            <th style="padding:10px;">Email</th>
                            <th style="padding:10px;">Phone</th>
                            <th style="padding:10px;">Doctor name</th>
                            <th style="padding:10px;">Date</th>
                            <th style="padding:10px;">Message</th>
                            <th style="padding:10px;">Status</th>
                            <th style="padding:10px;">Approved</th>
                            <th style="padding:10px;">Canceled</th>
                        </tr>
                        @foreach ($data as $appointment)
                            <tr align="center" style='background-color:skyblue;'>
                                <td>{{ $appointment->name }}</td>
                                <td>{{ $appointment->email }}</td>
                                <td>{{ $appointment->phone }}</td>
                                <td>{{ $appointment->doctor }}</td>
                                <td>{{ $appointment->date }}</td>
                                <td>{{ $appointment->message }}</td>
                                <td>{{ $appointment->status }}</td>
                                <td><a href="{{ url('approve', $appointment->id) }}"
                                        class="btn btn-success">Approve</a>
                                </td>
                                <td><a href="{{ url('cancel', $appointment->id) }}" class="btn btn-danger">Cancel</a>
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
