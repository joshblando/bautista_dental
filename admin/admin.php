<?php
include 'nav.php';
?>
        
    <button class="btn btn-primary float-right" id="addAdmin"><i class="fas fa-plus"></i>&nbsp;Add new admin</button><br><br>
    <table class="display dt-responsive nowrap table table-striped" id="table_id">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once "../config/control.php";

            $getAdmins = $connect->prepare("SELECT * from admin");
            $getAdmins->execute();
            $admins = $getAdmins->fetchAll();

            foreach ($admins as $admin) {
                $employeeId = $admin['employeeId'];
                $photo = $admin['photo'];
                $name = $admin['firstName'] . " " . $admin['lastName'];

            ?>
                <tr>
                    <td><?php echo $employeeId ?></td>
                    <td><?php echo $employeeId ?></td>
                    <td><?php echo $name ?></td>
                    <td>
                        <span><i class="fas fa-eye"></i></span>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
            
    <!-- The Modal -->
    <div id="addAdminModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content modal-size_md">
            <div class="modal-header">
                <span class="close" id="closeModal">&times;</span>
                <h4>Add new admin</h4>
            </div>
            <div class="modal-body">

                <form action="./controller/adminControl.php" method="POST" enctype="multipart/form-data" class="form-container">
                    <div class="form-avatar">
                        <div class="avatar-container">
                            <img src="https://images.pexels.com/photos/736842/pexels-photo-736842.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                        </div>
                        <input type="file" name="file" id="file">
                    </div>
                    <div class="form-details">
                        <div class="form-input">
                            <input type="text" name="employeeId" id="employeeId" autocomplete="off">
                            <label for="employeeId" class="label-input">
                                <span class="content-input_name">EmployeeID</span>
                            </label>
                        </div>
                        <div class="form-input">
                            <input type="text" name="firstName" id="firstName" autocomplete="off">
                            <label for="firstName" class="label-input">
                                <span class="content-input_name">First Name</span>
                            </label>
                        </div>
                        <div class="form-input">
                            <input type="text" name="lastName" id="lastName" autocomplete="off">
                            <label for="lastName" class="label-input">
                                <span class="content-input_name">Last Name</span>
                            </label>
                        </div>
                        <div class="form-input">
                            <input type="password" name="password" id="password" autocomplete="off">
                            <label for="password" class="label-input">
                                <span class="content-input_name">Password</span>
                            </label>
                        </div>
                        <button type="submit" class="button" name="addAdmin">Add</button>
                    </div>
                </form>

            </div>

        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/0c5646b481.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/zf-6.4.3/dt-1.10.20/r-2.2.3/rg-1.1.1/sc-2.0.1/datatables.min.js"></script>
    <script src="./js/admin.js"></script>
    <script>
        $(document).ready(function() {
            // dataTable
            $('#table_id').DataTable({
                responsive: true,
                pageLength: 5,
                "aaSorting": [],
                "lengthChange": false,
                "language": {
                    search: '<i class="fas fa-search" aria-hidden="true"></i>',
                    searchPlaceholder: 'Search...'
                }
            });
            // end dataTable
        });
    </script>


<?php include 'footer.php'; ?>