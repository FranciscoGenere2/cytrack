 <?php
    require_once('./constant/connect.php');


    ?>



 <div class="left-sidebar">

     <div class="scroll-sidebar">

         <nav class="sidebar-nav">
             <ul id="sidebarnav">
                 <li class="nav-devider"></li>
                 <li class="nav-label">Menú</li>
                 <li> <a href="dashboard.php?id=<?php  echo $_SESSION['userId']; ?>" aria-expanded="false"><i class="fa fa-tachometer"></i> Dashboard</a>
                 </li>





                 <!-- <?php if (isset($_SESSION['userId']) && $_SESSION['userId'] != 2) { ?>
                     <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-truck"></i><span class="hide-menu">Proveedores</span></a>
                         <ul aria-expanded="false" class="collapse">

                             <li><a href="add-brand.php">Agregar Proveedor</a></li>

                             <li><a href="brand.php">Gestionar Proveedor</a></li>
                         </ul>
                     </li>
                 <?php } ?>
                 <?php if (isset($_SESSION['userId']) && $_SESSION['userId'] != 2) { ?>
                     <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-list"></i><span class="hide-menu">Categorias</span></a>
                         <ul aria-expanded="false" class="collapse">

                             <li><a href="add-category.php">Agregar Categoría</a></li>

                             <li><a href="categories.php">Gestionar Categorías</a></li>
                         </ul>
                     </li> -->



                 <?php } ?>
                 <?php if (isset($_SESSION['userId']) && $_SESSION['userId'] != 2) { ?>
                     <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-medkit"></i><span class="hide-menu">Medicina</span></a>
                         <ul aria-expanded="false" class="collapse">

                             <li><a href="add-product.php">Agregar Medicina</a></li>

                             <li><a href="product.php">Gestionar Medicinas</a></li>
                         </ul>
                     </li>
                 <?php } ?>
                 <!-- <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-file"></i><span class="hide-menu">Facturas</span></a>
                     <ul aria-expanded="false" class="collapse">

                         <li><a href="add-order.php">Agregar Factura</a></li>

                         <li><a href="Order.php">Gestionar Facturas</a></li>
                     </ul>
                 </li> -->

                 <?php if (isset($_SESSION['userId']) && $_SESSION['userId'] != 2) { ?>
                     <!-- <li><a href="report.php" href="#" aria-expanded="false"><i class="fa fa-print"></i><span class="hide-menu">Reports</span></a></li> -->






                     <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-flag"></i><span class="hide-menu">Reportes</span></a>
                         <ul aria-expanded="false" class="collapse">

                             <!-- <li><a href="report.php">Order Report</a></li> -->
                             <li><a href="sales_report.php">Ventas</a></li>
                             <li><a href="productreport.php">Productos</a></li>
                             <li><a href="expreport.php">Productos Expirados</a></li>
                         </ul>
                     </li>
                     <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-users" aria-hidden="true"></i><span class="hide-menu">Usuarios</span></a>
                     <ul aria-expanded="false" class="collapse">

                         <li><a href="add-user.php">Agregar usuario</a></li>

                         <li><a href="users.php">Ver usuarios</a></li>
                     </ul>
                 </li>
                 <?php } ?>



             </ul>
         </nav>

     </div>

 </div>