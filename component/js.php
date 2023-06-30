<!-- jQuery -->
<script src="http://192.168.76.3/dss/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="http://192.168.76.3/dss/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="http://192.168.76.3/dss/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Datatable -->
<!-- <script src="http://192.168.76.3/dss/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script> -->
<!-- ChartJS -->
<!-- <script src="http://192.168.76.3/dss/plugins/chart.js/Chart.min.js"></script> -->
<!-- Sparkline -->
<!-- <script src="http://192.168.76.3/dss/plugins/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<!-- <script src="http://192.168.76.3/dss/plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="http://192.168.76.3/dss/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="http://192.168.76.3/dss/plugins/jquery-knob/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<script src="http://192.168.76.3/dss/plugins/moment/moment.min.js"></script>
<script src="http://192.168.76.3/dss/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="http://192.168.76.3/dss/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="http://192.168.76.3/dss/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="http://192.168.76.3/dss/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="http://192.168.76.3/dss/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="http://192.168.76.3/dss/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="http://192.168.76.3/dss/dist/js/pages/dashboard.js"></script> -->
<!-- sweetalert -->
<script src="http://192.168.76.3/dss/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- select2 -->
<script src="http://192.168.76.3/dss/plugins/select2/js/select2.min.js"></script>
<script>
  $(".select2").select2();
</script>
<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.23.0/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.23.0/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyDLRDvodZo5siaegOqABAjoVKhyk65PtZU",
    authDomain: "hosting-64f08.firebaseapp.com",
    projectId: "hosting-64f08",
    storageBucket: "hosting-64f08.appspot.com",
    messagingSenderId: "295132309248",
    appId: "1:295132309248:web:9b1cbd2141ec796780f5e5",
    measurementId: "G-888DWB09DR"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>