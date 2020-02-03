<div class="modal fade" id="messagesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <input class="form-control" placeholder="Fullname" type="text" name="fullName" id="fullName" required="" />
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Email" type="email" name="email" id="user_email" required="" />
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Mobile No." type="mobile" name="mobile" id="mobile_no" />
            </div>
            <div class="form-group text-area">
              <textarea class="form-control" placeholder="Write a message ......." name="message" id="message_body" cols="30" rows="10"></textarea>
            </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- <button type="submit" class="btn btn-primary" name="inquirybtn" id="appointSubmit">Save</button> -->
        </div>
      </form>
    </div>
  </div>
</div>