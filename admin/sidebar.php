<!-- Sidebar -->
<div class="sidebar" id="mySidebar">
<div class="side-header">
    <img src="./assets/images/logo.png" width="100" height="100" alt="Swiss Collection"> 
    <h5 style="margin-top:10px;">Hello, <?php echo ucfirst($_SESSION["user_name"]);?></h5>
</div>

<hr style="border:1px solid; background-color:#ffffff; border-color:#ffffff;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="./dashboard.php" ><i class="fa fa-home"></i> Dashboard</a>
    <a href="#supplier"  onclick="showCompany()" ><i class="fa fa-users"></i> Company</a>
   
    
    <!--<a href="#productsizes"   onclick="showProductSizes()" ><i class="fa fa-th-list"></i> Product Sizes</a>    
    <a href="#products"   onclick="showProductItems()" ><i class="fa fa-th"></i> Products</a>
    <a href="#orders" onclick="showOrders()"><i class="fa fa-list"></i> Orders</a>-->
  
  <!---->
</div>
 
<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>


