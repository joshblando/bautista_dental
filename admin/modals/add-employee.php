<div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="./controller/employeeControl.php" method="POST" enctype="multipart/form-data" class="form-container">
        <div class="modal-body">
          <div class="row">
            <!-- <div class="col-lg-12">
              <img class="img rounded img-fluid" src="https://images.pexels.com/photos/736842/pexels-photo-736842.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
            </div>
            <div class="col-lg-12">
              <div class="form-control">
                <input class="form-control" type="file" name="file" id="file">
              </div>
            </div> -->
            <div class="col-lg-12">
                <div class="form-group">
                  <label for="">EmployeeID</label>
                  <input type="text" class="form-control" name="employeeId" id="employeeId" autocomplete="off">
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                  <label for="">Title</label>
                  <select name="title" id="title" class="form-control">
                      <option disabled selected>Title</option>
                      <option value="Dr.">Dr.</option>
                      <option value="Ms.">Ms.</option>
                      <option value="Mr.">Mr.</option>
                  </select>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                  <label for="">Firstname</label>
                  <input type="text" class="form-control" name="firstName" id="employee_firstName" autocomplete="off">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                  <label for="">Lastname</label>
                  <input type="text" class="form-control" name="lastName" id="employee_lastName" autocomplete="off">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                  <label for="">Contact</label>
                  <input class="form-control" type="text" name="contact" id="employee_contact" autocomplete="off">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                  <label for="">Email</label>
                  <input class="form-control" type="email" name="email" id="employee_email" autocomplete="off">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                  <label for="">Role</label>
                  <select name="role" id="role" class="form-control">
                      <option disabled selected>Role</option>
                      <option value="DOCTOR">DOCTOR</option>
                      <option value="EMPLOYEE">EMPLOYEE</option>
                  </select>
                </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="addEmployee">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
