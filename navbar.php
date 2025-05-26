<?php session_start(); ?>

 <nav class=" navbar navbar-expand-lg navbar-dark" style="background-color: #605678;">
  <div class="container">
<!-- Brand -->
        <a class="navbar-brand" href="UserInterface.php" style="align-content: left;"><font style="font-family: LT Saeada; font-size:25px">Repair Helper</font></a>

<!-- Toggle button for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

    <!-- Links and other items -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
             <a class="nav-link" aria-current="page" href="UserInterface.php">Home</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="#" id="findapro">Find a Pro</a>

             <div class="dropdown-menu" id="dropMenu1" style="position: absolute; center: 0;background-color: #605678;">
                      <form class="px-4 py-3">
                        <div class="form-group">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                                <table class="table-borderless" >
                                    <tr>
                                        <td>
                                            <li class="nav-item">
                                                 <a class="nav-link" href="#">Air Conditioning</a>
                                             </li>
                                         </td>
                                         <td>
                                             <li class="nav-item">
                                                 <a class="nav-link" href="#">Flooring</a>
                                             </li>
                                         </td>
                                         <td>
                                             <li class="nav-item">
                                                 <a class="nav-link" href="#">Painting</a>
                                             </li>
                                         </td>
                                     </tr>
                                     <tr>
                                        <td>
                                            <li class="nav-item">
                                                 <a class="nav-link" href="#">Carpentry</a>
                                             </li>
                                         </td>
                                         <td>
                                             <li class="nav-item">
                                                 <a class="nav-link" href="#">Garage Door Installation</a>
                                             </li>
                                         </td>
                                         <td>
                                             <li class="nav-item">
                                                 <a class="nav-link" href="#">Pest Control</a>
                                             </li>
                                         </td>
                                     </tr>
                                     <tr>
                                        <td>
                                            <li class="nav-item">
                                                 <a class="nav-link" href="#">Cleaning</a>
                                             </li>
                                         </td>
                                         <td>
                                             <li class="nav-item">
                                                 <a class="nav-link" href="#">Garage Door Repair</a>
                                             </li>
                                         </td>
                                         <td>
                                             <li class="nav-item">
                                                 <a class="nav-link" href="#">Plumbing</a>
                                             </li>
                                         </td>
                                     </tr>
                                     <tr>
                                        <td>
                                            <li class="nav-item">
                                                 <a class="nav-link" href="#">Concrete</a>
                                             </li>
                                         </td>
                                         <td>
                                             <li class="nav-item">
                                                 <a class="nav-link" href="#">Handyman</a>
                                             </li>
                                         </td>
                                         <td>
                                             <li class="nav-item">
                                                 <a class="nav-link" href="#">Remodling</a>
                                             </li>
                                         </td>
                                     </tr>
                                     <tr>
                                        <td>
                                            <li class="nav-item">
                                                 <a class="nav-link" href="#">Drywall</a>
                                             </li>
                                         </td>
                                         <td>
                                             <li class="nav-item">
                                                 <a class="nav-link" href="#">Heating & Furnace</a>
                                             </li>
                                         </td>
                                         <td>
                                             <li class="nav-item">
                                                 <a class="nav-link" href="#">Roofing</a>
                                             </li>
                                         </td>
                                     </tr>
                                     <tr>
                                        <td>
                                            <li class="nav-item">
                                                 <a class="nav-link" href="#">Electrician</a>
                                             </li>
                                         </td>
                                         <td>
                                             <li class="nav-item">
                                                 <a class="nav-link" href="#">Landscape</a>
                                             </li>
                                         </td>
                                         <td>
                                             <li class="nav-item">
                                                 <a class="nav-link" href="#">Welder</a>
                                             </li>
                                         </td>
                                     </tr>
                                     <tr>
                                        <td>
                                            <li class="nav-item">
                                                 <a class="nav-link" href="#">Fencing</a>
                                             </li>
                                         </td>
                                         <td>
                                             <li class="nav-item">
                                                 <a class="nav-link" href="#">Tile</a>
                                             </li>
                                         </td>
                                         <td>
                                             <li class="nav-item">
                                                 <a class="nav-link" href="#"></a>
                                             </li>
                                         </td>
                                     </tr>
                             </table>
                            </ul>
                        </div>
                      </form>
                    </div>
         </li>

         <li class="nav-item">
             <a class="nav-link" href="#">Services</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="#">Supplies</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="Aboutus.php">About us</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="ContactUs.php">Contact us</a>
         </li>
      </ul>

<!-- Search form ----------------------------------------------------------------------------------------------------------------------->
      
      <form class="d-flex me-3">
        <input class="form-control me-2" id="searchForm" type="search"  style="width:300px; height:auto; color: #ffffff; background-color: transparent;">
     <div class="input-group-text"><i class="bi bi-search" id="searchtop" style="color: #605678; "></i></div>
      </form>


<!-- Icons: User and Cart (<i class="bi bi-box-arrow-right"></i>)-->

<?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']): ?>

      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="bi bi-cart" style="font-size: 20px;color: #605678;"></i></a>
        </li>

<!--user form -------------------------------------------------------------------------------------------------------------------------------->
        <li class="nav-item">

              <a class="nav-link" href="#" id="userMenu"> <i class="bi bi-person-square" style="font-size: 25px;color: white;"> </i></a>

                    <ul class="dropdown-menu"  id="dropMenu2" style="right: 5px; background-color: white;">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-emoji-smile " style="font-size: 20px;color: Black;padding-right: 10px;"></i> Manage My Account</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-handbag" style="font-size: 20px;color: Black;padding-right: 10px;"></i>My Orders</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-cart"  style="font-size: 20px;color: Black;padding-right: 10px;"></i>My Cart</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person-workspace" style="font-size: 20px;color: Black;padding-right: 10px;"></i>My Works</a></li>
                        <li><a class="dropdown-item" href="loggingout.php"><i class="bi bi-box-arrow-right" style="font-size: 20px;color: Black;padding-right: 10px;"></i>Logout</a></li>
                    </ul>
                

        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="bi bi-cart" style="font-size: 20px;color: #605678;"></i></a>
        </li>
      </ul>

<?php else: ?>
     <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="bi bi-cart" id="signup"   style="font-size: 20px;color: #605678;"></i></a>
        </li>

        <li class="nav-item">

              <a class="nav-link" href="#"> <i class="bi bi-person-square" id="loginicon" style="font-size: 25px;color: white;"> </i></a>


<!--login form -------------------------------------------------------------------------------------------------------------------------------->
                 <div id="overlay"></div>

                        <div id="login-form-container">
   
                              <div class="text-center mb-4">
                               <font style="font-size:25px; ; color:#605678;">Log in</font><br>
                                
                              </div>
                              <form method="post" action="Sighin.php">
                              <div class="form-label-group">
                                <input type="email"  class="form-control" name="txtEmail" placeholder="Email address" required autofocus>
                                <label for="inputEmail">Email address</label>
                              </div>

                              <div class="form-label-group">
                                <input type="password" name="txtpass"  class="form-control" placeholder="Password" required>
                                <label for="inputPassword">Password</label>
                              </div>

                              <div class="checkbox mb-3">
                                <label>
                                  <input type="checkbox" value="remember-me"> Remember me
                                </label>
                              </div>
                              <button class="custom-btn" name="signin" style="width:100%" type="submit">Sign in</button>
                                    <a class="dropdown-item" id="toggle-btn" href="#">New around here? Sign up</a>
                                    <a class="dropdown-item" href="#">Forgot password?</a>
                            </form>
                        
                        </div>

<!-- end of the login popup------------------------------------------------------------------------------------------------------------------->
            
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#"><i class="bi bi-box-arrow-right" style="font-size: 20px;color: #605678;"></i></a>
        </li>

      </ul>

<?php endif; ?>  
    </div>
  </div>
 </nav>

 <!-- Pop-up container -->
        <div id="Register-overlay"></div>
            <div id="Register-popup">
                     <div class="row"  style="margin-top:10px ; margin-bottom: 10px;">
                          <div class="col-sm-12"  style="text-align: center; margin-bottom:20px; font-size:25px;color:#605678;">Sign up</div>
                          <div class="col-sm-1"></div>
                            <div class="col-sm-10">

                            <form class="form" method="post" action="AddRHUser.php">
                              <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" name="txtEmailAddress" placeholder="Email address" required >
                                  </div>
                                  <div class="col-sm-6">
                                       <div class="form-group">
                                        <label for="inputPassword">Password</label>
                                        <input type="password"  class="form-control" name="txtPassword" placeholder="Password" required>
                                      </div>
                                  </div>
                                </div><br>

                              <div class="form-group">
                                <label>Address 1</label>
                                <input type="textbox"  class="form-control" name="txtAddress1" placeholder="1234 Main Street" required >
                              </div><br>

                              <div class="form-group">
                                <label>Address 2</label>
                                <input type="textbox"  class="form-control" name="txtAddress2" placeholder="Apartment, studio, or floor">
                              </div><br>

                              <div class="row">
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>City</label>
                                        <input type="textbox"  class="form-control" name="txtCity" placeholder="City" required >
                                      </div>
                                  </div>

                                  <div class="col-sm-4">
                                          <div class="form-group">
                                              <label for="inputState">State</label>
                                              <select id="inputState" class="form-control" name="txtProvince">
                                                            <option selected>Choose...</option>
                                                            <option>Central Province </option>
                                                            <option>Eastern Province</option>
                                                            <option>Northern Province</option>
                                                            <option>North Western Province</option>
                                                            <option>North Central Province</option>
                                                            <option>Southern Province</option>
                                                            <option>Sabaragamuwa Province</option>
                                                            <option>Uva Province</option>
                                                            <option>Western Province</option>
                                              </select>
                                            </div>
                                        </div>

                                <div class="col-sm-4">
                                   <div class="form-group">
                                    <label for="inputEmail">Zip Code</label>
                                    <input type="textbox"  class="form-control" name="txtZipCode" placeholder="Zip Code" required autofocus>
                                  </div>
                              </div><br>
                                   
                            </form>
                           </div>

                            <div class="col-sm-1"></div><br>

                            <div class="col-sm-12">
                                <label>
                                     <input type="checkbox" required> By creating and/or using your account, you agree to our<a href="#"> Terms of Use</a>  and <a href="#">Privacy Policy</a>.
                                </label>
                            </div><br>

                             <button class="custom-btn" style="width:100%" type="submit" name="signup">Sign up</button>
                        </div>
                    </div>
                </div>
             </div>

            