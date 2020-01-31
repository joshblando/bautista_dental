<?php
include 'nav.php'
?>
       
    <button class="btn btn-primary float-right" id="addCategory"><i class="fas fa-plus"></i>&nbsp;Add new category</button>
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
                        <a href="./service.php?categoryId=<?php echo $categoryId ?>"><span class="icon"><i class="fas fa-eye view"></i></span></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <!-- The Modal -->
    <div id="addCategoryModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content modal-size_md">
            <div class="modal-header">
                <span class="close" id="closeModal">&times;</span>
                <h4>Add new admin</h4>
            </div>
            <div class="modal-body">

                <form action="./controller/categoryControl.php" method="POST" enctype="multipart/form-data" class="form-container">
                    <div class="form-avatar">
                        <div class="avatar-container">
                            <img src="https://images.pexels.com/photos/736842/pexels-photo-736842.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                        </div>
                        <input type="file" name="file" id="file">
                    </div>
                    <div class="form-details">


                        <div class="form-input">
                            <input type="text" name="name" id="name" autocomplete="off">
                            <label for="name" class="label-input">
                                <span class="content-input_name">Name</span>
                            </label>
                        </div>
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="10" rows="10"></textarea>
                        <!-- <label for="description" class="label-input">
                                <span class="content-input_name">Description</span>
                            </label> -->


                        <button type="submit" class="button" name="addCategory">Add</button>
                    </div>
                </form>

            </div>

        </div>

    </div>

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