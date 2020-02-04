<?php
  include './nav.php';
?>
<link rel="stylesheet" type="text/css" href="../style/dropzone.css">
<link rel="stylesheet" type="text/css" href="../style/swiper.css">
<link rel="stylesheet" type="text/css" href="../style/home.css">

<div class="row">
  <div class="col-lg-12">
    <!-- <section> -->
       <div id="dropzone">
        <form class="dropzone needsclick" id="demo-upload" action="#">
          <div class="dz-message needsclick">
            Drop files here or click to upload.
          </div>
        </form>
      </div>
    <!-- </section> -->
  </div>
  <br><br>
  <div  class="col-lg-12 polygon">
    <div class="swiper-container">

      <div class="swiper-scrollbar"></div>
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img class="img img-fluid" src="../../assets/img/slide1.jpg"></div>
        <div class="swiper-slide">Slide 2</div>
        <div class="swiper-slide">Slide 3</div>
        <div class="swiper-slide">Slide 4</div>
        <div class="swiper-slide">Slide 5</div>
        <div class="swiper-slide">Slide 6</div>
        <div class="swiper-slide">Slide 7</div>
        <div class="swiper-slide">Slide 8</div>
        <div class="swiper-slide">Slide 9</div>
        <div class="swiper-slide">Slide 10</div>
      </div>

    </div>
  </div>
</div>

<!-- <script src="../js/dropzone-amd-module.min.js"></script> -->
<script src="../js/dropzone.js"></script>
<script src='../js/swiper.js'></script>
<script src='../js/home.js'></script>



<?php
  include './footer.php';
?>   
        