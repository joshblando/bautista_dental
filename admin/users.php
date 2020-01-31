<?php
include 'nav.php';
?>

    <table class="display dt-responsive nowrap table table-striped" id="table_id">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php


            $getUsers = $connect->prepare("SELECT * from user");
            $getUsers->execute();
            $users = $getUsers->fetchAll();

            foreach ($users as $user) {

                $userId = $user['userId'];
                $name = $user['firstName'] . " " . $user['lastName'];
                $contact = $user['contact'];
                $email = $user['email'];

            ?>
                <tr>
                    <td><?php echo $userId ?></td>
                    <td><?php echo $name ?></td>
                    <td><?php echo $contact ?></td>
                    <td><?php echo $email ?></td>
                    <td>
                        <a href="#"><span class="icon"><i class="fas fa-eye view"></i></span></a>
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