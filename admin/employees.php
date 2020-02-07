
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
                        <button class="btn btn-success btn-sm btn-edit-employee" data-id="<?php  echo  $employee['employeeId'] ?>" data-email="<?php echo  $employee['email'] ?>" data-contact="<?php echo  $employee['contact'] ?>" data-lastname="<?php echo  $employee['lastName'] ?>" data-firstname="<?php echo  $employee['firstName'] ?>" data-title="<?php echo  $employee['title'] ?>" data-role="<?php echo  $employee['role'] ?>"  data-toggle="modal" data-target="#editEmployeeModal"><span class="icon"><i class="fas fa-edit view"></i></span></button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/0c5646b481.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/zf-6.4.3/dt-1.10.20/r-2.2.3/rg-1.1.1/sc-2.0.1/datatables.min.js"></script> -->
    <!-- <script src="./js/admin.js"></script> -->
    <script>

        $(document).ready(function() {
          $('button.btn-edit-employee').click(function(){
            $('#edi_employee_firstName').val($(this).data('firstname'));
            $('#edi_employeeId').val($(this).data('id'));
            $('#edi_employee_lastName').val($(this).data('lastname'));
            $('#edi_title').val($(this).data('title'));
            $('#edi_role').val($(this).data('role'));
            $('#edi_employee_contact').val($(this).data('contact'));
            $('#edi_employee_email').val($(this).data('email'));
          });
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
