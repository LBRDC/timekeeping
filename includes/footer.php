
<!-- &&& FOOTER &&&-->
        </div> <!-- #END# Container Fluid -->
      </div> <!-- #END# Content -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://lbpresources.com" target="_blank">LBP Resources and Development Corp.</a></b>
            </span>
          </div>
        </div>
      </footer>
    </div> 
  </div> 

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- forms -->
  <!--<script src="vendor/select2/dist/js/select2.min.js"></script>-->
  <script src="vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
  <script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <script src="vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js"></script>
  <script src="vendor/clock-picker/clockpicker.js"></script>
  <!-- template js -->
  <script src="js/ruang-admin.min.js"></script>
  <script src="js/ruang-forms.js"></script>
  <!-- dashboard -->
  <!--<script src="vendor/chart.js/Chart.min.js"></script>-->
  <!--<script src="js/demo/chart-area-demo.js"></script>-->
  <!-- chart -->
  <!--<script src="js/demo/chart-pie-demo.js"></script>-->
  <!--<script src="js/demo/chart-bar-demo.js"></script>-->
  <!-- datatables -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- MAPS -->
  <?php $api_key = "AIzaSyDyYdjZdfx2Fwu5g04kxXuxL5jO5DnNbKk" ?>
  <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "AIzaSyDyYdjZdfx2Fwu5g04kxXuxL5jO5DnNbKk", v: "weekly", libraries: "places"});</script>
  <?php
    if($page=="fields-location"){ ?>
  <script src="js/maps.js"></script>
  <?php
    } else if ($page=="fields-location-add") { ?>
  <script src="js/maps-add.js"></script>
  <?php } ?>
  <!-- Custom JS -->
  <script src="js/intervals.js"></script>
  <script src="js/custom.js"></script>
</body>

</html> <!-- ### END FOOTER ### -->