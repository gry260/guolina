<?php
require_once('./init.php');
?>
<div class="main-wrapper">
  <div class="app" id="app">
    <!--
    <nav class="nav nav-tabs">
      <a class="nav-item nav-link">adf</a>
      <a class="nav-item nav-link">adf</a>
      <a class="nav-item nav-link">adf</a>
    </nav>
    -->
    <header class="header">
      <?php
      if (!empty($_SESSION['login'])) {
        ?>
        <div class="card sameheight-item stats" data-exclude="xs" style="height: 68px; width: 550px">
          <div class="card-block" style="padding:10px;">
            <div class="d-flex stats-container">
              <div class="col-5 stat-col">
                <div class="stat-icon float-left"><i class="fa fa-2x fa-money"></i></div>
                <div class="ml-3">
                  <div style="font-size:18px;">$<?php echo $totalMoney['price']; ?></div>
                 <span style="font-size:14px;">Total Expense($)</span>
                </div>
              </div>
              <div class="col-7 stat-col">
                <div class="stat-icon float-left"><i class="fa fa-2x fa-list-alt"></i></div>
                <div class="ml-3">
                  <div style="font-size:18px;"><?php echo $totalRecords['records'];?></div>
                  <span style="font-size:14px;">Total Records of Expenses(s)</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <logout></logout>

        <?php
      } else {
        ?>
        <login></login>
        <register></register>
        <?php
      }

      ?>
    </header>
    <aside class="sidebar">
      <div class="sidebar-container">
        <div class="sidebar-header">
          <div class="brand">
            <div class="logo"><span class="l l1"></span> <span class="l l2"></span> <span
                class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span></div>
            Modular Admin
          </div>
        </div>
        <nav class="menu">
          <ul class="nav metismenu" id="sidebar-menu">
            <li class="active"><a href="index.html">
                <i class="fa fa-home"></i> Dashboard
              </a></li>
            <li><a href="">
                <i class="fa fa-th-large"></i> Items Manager
                <i class="fa arrow"></i>
              </a>
              <ul>
                <li><a href="items-list.html">
                    Items List
                  </a></li>
                <li><a href="item-editor.html">
                    Item Editor
                  </a></li>
              </ul>
            </li>
            <li><a href="">
                <i class="fa fa-bar-chart"></i> Charts
                <i class="fa arrow"></i>
              </a>
              <ul>
                <li><a href="charts-flot.html">
                    Flot Charts
                  </a></li>
                <li><a href="charts-morris.html">
                    Morris Charts
                  </a></li>
              </ul>
            </li>
            <li><a href="">
                <i class="fa fa-table"></i> Tables
                <i class="fa arrow"></i>
              </a>
              <ul>
                <li><a href="static-tables.html">
                    Static Tables
                  </a></li>
                <li><a href="responsive-tables.html">
                    Responsive Tables
                  </a></li>
              </ul>
            </li>
            <li><a href="forms.html">
                <i class="fa fa-pencil-square-o"></i> Forms
              </a></li>
            <li><a href="">
                <i class="fa fa-desktop"></i> UI Elements
                <i class="fa arrow"></i>
              </a>
              <ul>
                <li><a href="buttons.html">
                    Buttons
                  </a></li>
                <li><a href="cards.html">
                    Cards
                  </a></li>
                <li><a href="typography.html">
                    Typography
                  </a></li>
                <li><a href="icons.html">
                    Icons
                  </a></li>
                <li><a href="grid.html">
                    Grid
                  </a></li>
              </ul>
            </li>
            <li><a href="">
                <i class="fa fa-file-text-o"></i> Pages
                <i class="fa arrow"></i>
              </a>
              <ul>
                <li><a href="login.html">
                    Login
                  </a></li>
                <li><a href="signup.html">
                    Sign Up
                  </a></li>
                <li><a href="reset.html">
                    Reset
                  </a></li>
                <li><a href="error-404.html">
                    Error 404 App
                  </a></li>
                <li><a href="error-404-alt.html">
                    Error 404 Global
                  </a></li>
                <li><a href="error-500.html">
                    Error 500 App
                  </a></li>
                <li><a href="error-500-alt.html">
                    Error 500 Global
                  </a></li>
              </ul>
            </li>
            <li><a href="https://github.com/modularcode/modular-admin-html">
                <i class="fa fa-github-alt"></i> Theme Docs
              </a></li>
          </ul>
        </nav>
      </div>
      <footer class="sidebar-footer">
        <ul class="nav metismenu" id="customize-menu">
          <li>
            <ul>
              <li class="customize">
                <div class="customize-item">
                  <div class="row customize-header">
                    <div class="col-xs-4"></div>
                    <div class="col-xs-4"><label class="title">fixed</label></div>
                    <div class="col-xs-4"><label class="title">static</label></div>
                  </div>
                  <div class="row hidden-md-down">
                    <div class="col-xs-4"><label class="title">Sidebar:</label></div>
                    <div class="col-xs-4"><label>
                        <input class="radio" type="radio" name="sidebarPosition"
                               value="sidebar-fixed">
                        <span></span>
                      </label></div>
                    <div class="col-xs-4"><label>
                        <input class="radio" type="radio" name="sidebarPosition" value="">
                        <span></span>
                      </label></div>
                  </div>
                  <div class="row">
                    <div class="col-xs-4"><label class="title">Header:</label></div>
                    <div class="col-xs-4"><label>
                        <input class="radio" type="radio" name="headerPosition"
                               value="header-fixed">
                        <span></span>
                      </label></div>
                    <div class="col-xs-4"><label>
                        <input class="radio" type="radio" name="headerPosition" value="">
                        <span></span>
                      </label></div>
                  </div>
                  <div class="row">
                    <div class="col-xs-4"><label class="title">Footer:</label></div>
                    <div class="col-xs-4"><label>
                        <input class="radio" type="radio" name="footerPosition"
                               value="footer-fixed">
                        <span></span>
                      </label></div>
                    <div class="col-xs-4"><label>
                        <input class="radio" type="radio" name="footerPosition" value="">
                        <span></span>
                      </label></div>
                  </div>
                </div>
                <div class="customize-item">
                  <ul class="customize-colors">
                    <li><span class="color-item color-red" data-theme="red"></span></li>
                    <li><span class="color-item color-orange" data-theme="orange"></span></li>
                    <li><span class="color-item color-green active" data-theme=""></span></li>
                    <li><span class="color-item color-seagreen" data-theme="seagreen"></span></li>
                    <li><span class="color-item color-blue" data-theme="blue"></span></li>
                    <li><span class="color-item color-purple" data-theme="purple"></span></li>
                  </ul>
                </div>
              </li>
            </ul>
            <a href="">
              <i class="fa fa-cog"></i> Customize
            </a></li>
        </ul>
      </footer>
    </aside>
    <article class="content dashboard-page">

      <ngb-tabset>
        <ngb-tab title="Simple">
          <template ngbTabContent>
            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth
              master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh
              dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum
              iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
          </template>
        </ngb-tab>
        <ngb-tab>
          <template ngbTabTitle><b>Fancy</b> title</template>
          <template ngbTabContent>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
            <p>Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
              craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl
              cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia
              yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean
              shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero
              sint qui sapiente accusamus tattooed echo park.</p>
          </template>
        </ngb-tab>
      </ngb-tabset>


      <form id="signup-form" action="/index.html" method="GET" novalidate="novalidate">
        <div class="form-group">
          <label for="firstname">Username</label>
          <div class="row">
            <div class="col-sm-12"> <input type="text" class="form-control underlined" name="username" id="username" placeholder="Enter username" required="" aria-required="true"> </div>
          </div>
        </div>
        <div class="form-group"> <label for="firstname">Name</label>
          <div class="row">
            <div class="col-sm-6"> <input type="text" class="form-control underlined" name="firstname" id="firstname" placeholder="Enter firstname" required="" aria-required="true"> </div>
            <div class="col-sm-6"> <input type="text" class="form-control underlined" name="lastname" id="lastname" placeholder="Enter lastname" required="" aria-required="true"> </div>
          </div>
        </div>
        <div class="form-group"> <label for="password">Password</label>
          <div class="row">
            <div class="col-sm-6"> <input type="password" class="form-control underlined" name="password" id="password" placeholder="Enter password" required="" aria-required="true"> </div>
            <div class="col-sm-6"> <input type="password" class="form-control underlined" name="retype_password" id="retype_password" placeholder="Re-type password" required="" aria-required="true"> </div>
          </div>
        </div>
        <div class="form-group"> <button type="submit" class="btn btn-block btn-primary">Sign Up</button> </div>
      </form>
      <?php
      if (empty($_SESSION['login'])) {
        ?>
        <div class="col-6">
          <div class="card sameheight-item stats" data-exclude="xs" style="height: 228px;">
            <div class="card-block">
              <div class="title-block">
                <h4 class="title"> STATS AND COUNTING </h4>
              </div>
              <div class="row row-sm stats-container">
                <div class="col-xs-12 col-sm-6  stat-col">
                  <div class="stat-icon"> <i class="fa fa-text-height"></i> </div>
                  <div class="stat">
                    <div class="value"> <?php echo $nTags; ?> </div>
                    <div class="name"> Total Number of Tags </div>
                  </div> <progress class="progress stat-progress" value="60" max="100">
                    <div class="progress">
                      <span class="progress-bar" style="width: 60%;"></span>
                    </div>
                  </progress> </div>
                <div class="col-xs-12 col-sm-6  stat-col">
                  <div class="stat-icon"> <i class="fa fa-users"></i> </div>
                  <div class="stat">
                    <div class="value"> <?php echo $nUsers;?> </div>
                    <div class="name"> Total users </div>
                  </div> <progress class="progress stat-progress" value="34" max="100">
                    <div class="progress">
                      <span class="progress-bar" style="width: 34%;"></span>
                    </div>
                  </progress> </div>
                <div class="col-xs-12 col-sm-6  stat-col">
                  <div class="stat-icon"> <i class="fa fa-list-alt"></i> </div>
                  <div class="stat">
                    <div class="value"> <?php echo $nRecords; ?> </div>
                    <div class="name"> Total Number of Records </div>
                  </div> <progress class="progress stat-progress" value="49" max="100">
                    <div class="progress">
                      <span class="progress-bar" style="width: 49%;"></span>
                    </div>
                  </progress> </div>
                <div class="col-xs-12 col-sm-6 stat-col">
                  <div class="stat-icon"> <i class="fa fa-dollar"></i> </div>
                  <div class="stat">
                    <div class="value"> <?php echo $nExpenses; ?> </div>
                    <div class="name"> Total Expenses Spent </div>
                  </div> <progress class="progress stat-progress" value="15" max="100">
                    <div class="progress">
                      <span class="progress-bar" style="width: 15%;"></span>
                    </div>
                  </progress> </div>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
      ?>

      <div class="col-md-5">
        <search parameters='<?php echo json_encode($userparameters); ?>'></search>
        <crudcategory categories='<?php echo json_encode($categories); ?>'
                      usercategories='<?php echo json_encode($usercategories); ?>'></crudcategory>
        <crudSubcategory userSubCategories='<?php echo json_encode($usersubcategories); ?>'></crudSubcategory>
      </div>
      <div class="col-md-7">
        <expense Expenses='<?php echo json_encode($expenses); ?>'></expense>
      </div>
    </article>
    <!-- /.modal -->
  </div>
</div>
<script src="js/vendor.js"></script>
<script src="js/app.js"></script>



