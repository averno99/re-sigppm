 <!-- Begin page -->
 <div id="wrapper">
     <!-- ========== Left Sidebar Start ========== -->
     <div class="left side-menu">
         <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
             <i class="ion-close"></i>
         </button>

         <!-- LOGO -->
         <div class="topbar-left">
             <div class="text-center">
                 <a href="<?= base_url() ?>#" class="logo">SIGPPM</a>
                 <!-- <a href="index.html" class="logo"><img src="assets/images/logo.png" height="24" alt="logo"></a> -->
             </div>
         </div>

         <div class="sidebar-inner slimscrollleft">

             <div id="sidebar-menu">
                 <ul>
                     <?php if ($this->session->userdata('levelUser') == 'Admin') : ?>
                         <?php include 'sb_admin.php'; ?>
                         <?php include 'sb_user.php'; ?>
                     <?php else : ?>
                         <div class="dropdown-divider"></div>
                         <li>
                             <a href="<?= site_url('dashboard') ?>" class="waves-effect">
                                 <i class="mdi mdi-airplay"></i>
                                 <span> Dashboard </span>
                             </a>
                         </li>

                         <?php include 'sb_user.php'; ?>
                     <?php endif; ?>
                 </ul>
             </div>
             <div class="clearfix"></div>
         </div> <!-- end sidebarinner -->
     </div>
     <!-- Left Sidebar End -->