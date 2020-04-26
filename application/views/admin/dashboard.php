 <!-- Style -->
 <style>
     .collapse-item {
         cursor: pointer !important;
     }
 </style>

 <!-- Page Wrapper -->
 <div id="wrapper">
     <!-- Sidebar -->
     <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
             <div class="sidebar-brand-icon">
                 <img src="<?= base_url() ?>assets/image/logo-politala.png" alt="Logo" style="width:40px">
             </div>
             <div class="sidebar-brand-text mx-3">VOTE POLITALA</div>
         </a>

         <!-- Divider -->
         <hr class="sidebar-divider my-0">

         <!-- Nav Item - Dashboard -->
         <li class="nav-item active">
             <a class="nav-link" href="<?= base_url() ?>admin">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Dashboard</span></a>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider">

         <!-- Heading -->
         <div class="sidebar-heading" style="color:white">
             Data Voting
         </div>

         <!-- Nav Item - Pages Collapse Menu -->
         <li class="nav-item">
             <a id="mahasiswa" class="nav-link collapsed" href="#" data-toggle="collapse" aria-expanded="true" aria-controls="collapseTwo">
                 <i class="fas fa-fw fa-users"></i>
                 <span>Mahasiswa</span>
             </a>
         </li>
         <li class="nav-item">
             <a id="pencoblos" class="nav-link collapsed" href="#" data-toggle="collapse" aria-expanded="true" aria-controls="collapseTwo">
                 <i class="fas fa-fw fa-user "></i>
                 <span>Pencoblos</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#paslon" aria-expanded="true" aria-controls="collapseTwo">
                 <i class="fas fa-user-friends"></i>
                 <span>Paslon</span>
             </a>
             <div id="paslon" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <a class="collapse-item" id="list-paslon">List Paslon</a>
                     <a class="collapse-item" id="presma">Presma</a>
                     <a class="collapse-item" id="wapresma">Wapresma</a>
                     <hr style="width: 90%; margin:0 auto">
                     <a class="collapse-item" id="pending_paslon">Pending</a>
                 </div>
             </div>
         </li>
         <li class="nav-item">
             <a id="vote_rules" class="nav-link collapsed" href="#" data-toggle="collapse" aria-expanded="true" aria-controls="collapseTwo">
                 <i class="fas fa-fw fa-pen"></i>
                 <span>Vote</span>
             </a>
         </li>
         <li class="nav-item">
             <a id="kpum" class="nav-link collapsed" href="#" data-toggle="collapse" aria-expanded="true" aria-controls="collapseTwo">
                 <i class="fas fa-fw fa-book"></i>
                 <span>KPUM</span>
             </a>
         </li>


         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">

         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>

     </ul>
     <!-- End of Sidebar -->

     <!-- Content Wrapper -->
     <div id="content-wrapper" class="d-flex flex-column">

         <!-- Main Content -->
         <div id="content">

             <!-- Topbar -->
             <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                 <!-- Topbar Navbar -->
                 <ul class="navbar-nav ml-auto">

                     <!-- Nav Item - User Information -->
                     <li class="nav-item dropdown no-arrow">
                         <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <span class="mr-2 d-none d-lg-inline text-gray-600 small" id="admin_nama">Hai, <?= $admin[0]['nama']; ?></span>
                             <img class="img-profile rounded-circle" src="<?= base_url() ?>assets/image/user-img.png">
                         </a>
                         <!-- Dropdown - User Information -->
                         <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                             <a id="admin_profile" class="dropdown-item" href="#">
                                 <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                 Edit Profile
                             </a>
                             <a id="admin_password" class="dropdown-item" href="#">
                                 <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                                 Edit Password
                             </a>
                             <div class="dropdown-divider"></div>
                             <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                 Logout
                             </a>
                         </div>
                     </li>
                 </ul>
             </nav>
             <!-- End of Topbar -->

             <!-- Main Content -->
             <div id="main-content" class="main-cont">

             </div>



             <!-- Footer -->
             <footer class="sticky-footer bg-white">
                 <div class="container my-auto">
                     <div class="copyright text-center my-auto">
                         <span>Copyright &copy; Politala 2019</span>
                     </div>
                 </div>
             </footer>
             <!-- End of Footer -->

         </div>
         <!-- End of Content Wrapper -->

     </div>
     <!-- End of Page Wrapper -->

     <!-- Logout Modal-->
     <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Ingin Keluar?</h5>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span>
                     </button>
                 </div>
                 <div class="modal-body">Pilih "Yes" jika anda ingin keluar dari akun anda.</div>
                 <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                     <a class="btn btn-primary" href="<?= base_url() ?>auth/logout_admin">Yes</a>
                 </div>
             </div>
         </div>
     </div>
     </body>
     </body>
     <!-- Bootstrap core JavaScript-->
     <script src="<?= base_url() ?>assets/vendor/sb-admin-2/vendor/jquery/jquery.min.js"></script>
     <script src="<?= base_url() ?>assets/vendor/sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

     <!-- Core plugin JavaScript-->
     <script src="<?= base_url() ?>assets/vendor/sb-admin-2/vendor/jquery-easing/jquery.easing.min.js"></script>

     <!-- Custom scripts for all pages-->
     <script src="<?= base_url() ?>assets/vendor/sb-admin-2/js/sb-admin-2.min.js"></script>

     <!-- Highchart -->
     <script src="https://code.highcharts.com/highcharts.js"></script>
     <script src="https://code.highcharts.com/modules/exporting.js"></script>
     <script src="https://code.highcharts.com/modules/export-data.js"></script>
     <script src="https://code.highcharts.com/modules/accessibility.js"></script>
     <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

     <script>
         $(document).ready(function() {
             $("#main-content").load("admin_dashboardPL");
             $("#admin_profile").click(function() {
                 $("#main-content").load("admin_profilePL");
             });
             $("#admin_password").click(function() {
                 $("#main-content").load("admin_passwordPL");
             });
             $("#mahasiswa").click(function() {
                 $("#main-content").load("admin_mahasiswaPL");
             });
             $("#pencoblos").click(function() {
                 $("#main-content").load("admin_pencoblosPL");
             });
             $("#list-paslon").click(function() {
                 $("#main-content").load("admin_paslonPL");
             });
             $("#presma").click(function() {
                 $("#main-content").load("admin_presmaPL");
             });
             $("#wapresma").click(function() {
                 $("#main-content").load("admin_wapresmaPL");
             });
             $("#pending_paslon").click(function() {
                 $("#main-content").load("admin_pendingPL");
             });
             $("#vote_rules").click(function() {
                 $("#main-content").load("admin_votePL");
             });
              $("#kpum").click(function() {
                 $("#main-content").load("admin_kpum");
              });

         });
     </script>