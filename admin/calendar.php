
<?php
  include 'nav.php';
?>
  <link href='../assets/calendar/packages/core/main.css' rel='stylesheet' />
  <link href='../assets/calendar/packages/daygrid/main.css' rel='stylesheet' />
  <link href='../assets/calendar/packages/timegrid/main.css' rel='stylesheet' />
  <link href='../assets/calendar/packages/list/main.css' rel='stylesheet' />
  <div class="row">
    <div class="col-lg-3">
      <table class="table table-striped">
        <tr>
          <td class="text-center">
            <span class="badge" style="background:#ed6f14 ;color: #ed6f14;">...</span><small>&nbsp&nbspPENDING&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</small>
            <span class="badge" style="background:#860938 ;color: #860938;">...</span><small> &nbsp&nbspAPPROVED  </small>
          </td>
        </tr>
      </table>
    </div>
  </div>
  <br><br>
  <div id='calendar'></div>

  <script src='../assets/calendar/packages/core/main.js'></script>
  <script src='../assets/calendar/packages/interaction/main.js'></script>
  <script src='../assets/calendar/packages/daygrid/main.js'></script>
  <script src='../assets/calendar/packages/timegrid/main.js'></script>
  <script src='../assets/calendar/packages/list/main.js'></script>
  <script src='../js/calendar-dentist.js'></script>

<?php
  include 'footer.php';
?>   
        