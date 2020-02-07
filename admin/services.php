<?php
include 'nav.php'
?>

    <button class="btn btn-primary float-right" id="addServiceModal" data-toggle="modal" data-target="#addServiceModal"><i class="fas fa-plus"></i>&nbsp;Add new category</button>
    <br><br>
    <table class="display dt-responsive nowrap table table-striped" id="table_id">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once "../config/control.php";

            $getCategories = $connect->prepare("SELECT * from category");
            $getCategories->execute();
            $categories = $getCategories->fetchAll();

            foreach ($categories as $category) {
                $categoryId = $category['categoryId'];
                $photo = $category['photo'];
                $name = $category['name'];
                $description = $category['description'];

            ?>
                <tr>
                    <td><?php echo $categoryId ?></td>
                    <td><?php echo $photo ?></td>
                    <td><?php echo $name ?></td>
                    <td><?php echo $description ?></td>
                    <td>
                       <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editServiceModal"><span class="icon"><i class="fas fa-edit view"></i></span></button>
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
    <script src="./js/service.js"></script>

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


<?php include 'footer.php' ?>
