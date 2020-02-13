<div class="modal fade" id="inquiryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inquiry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="./api/inquiry.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">

            <div class="col-lg-12">
            <div class="form-group">
              <label>Full Name</label>
              <input class="form-control"  type="text" name="fullName" id="fullName" required="" />
            </div>
            <div class="form-group">
              <label>Email Address</label>
              <input class="form-control" type="email" name="email" id="email" required="" />
            </div>
            <div class="form-group">
              <label>Mobile Number</label>
              <input class="form-control"  type="mobile" name="mobile" id="mobile" />
            </div>
            <div class="form-group text-area">
              <label>Message</label>
              <textarea class="form-control" placeholder="Write a message ......." name="message" id="messages" cols="30" rows="10"></textarea>
            </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="inquirybtn" id="inquirySubmit">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
