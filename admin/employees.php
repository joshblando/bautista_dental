
<?php
include 'nav.php'
?>

    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addEmployeeModal"><i class="fas fa-plus"></i>&nbsp;Add new employee</button>
    <br><br>
    <table class="display dt-responsive nowrap table table-striped" id="table_id" data-plugin="dataTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once "../config/control.php";

            $getEmployees = $connect->prepare("SELECT * from employee");
            $getEmployees->execute();
            $employees = $getEmployees->fetchAll();

            foreach ($employees as $employee) {
                $employeeId = $employee['employeeId'];
                $photo = $employee['photo'];
                $name = $employee['title'] . " " . $employee['firstName'] . " " . $employee['lastName'];
                $role = $employee['role'];

            ?>
                <tr>
                    <td><?php echo $employeeId ?></td>
                    <td><?php echo $photo ?></td>
                    <td><?php echo $name ?></td>
                    <td><?php echo $role ?></td>
                    <td>
                        <a href="./employee.php?employeeId=<?php echo $employeeId ?>"><span class="icon"><i class="fas fa-eye view"></i></span></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>


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
<?php
include 'footer.php'
?>
