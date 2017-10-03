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
    <header class="header" style="height: auto;">
      <?php
      if (!empty($_SESSION['login'])) {
        ?>
        <div class="card sameheight-item stats" data-exclude="xs" style="height: 68px; width: 60%;">
          <div class="card-block" style="padding:10px;">
            <div class="d-flex stats-container">
              <div class="col-4 stat-col">
                <div class="stat-icon float-left"><i class="fa fa-2x fa-money"></i></div>
                <div class="ml-3">
                  <div style="font-size:18px;">$<?php echo $totalMoney['price']; ?></div>
                 <span style="font-size:14px;">Total Expense($)</span>
                </div>
              </div>
              <div class="col-4 stat-col">
                <div class="stat-icon float-left"><i class="fa fa-2x fa-list-alt"></i></div>
                <div class="ml-3">
                  <div style="font-size:18px;"><?php echo $totalRecords['records'];?></div>
                  <span style="font-size:14px;">Total Records of Expenses(s)</span>
                </div>
              </div>
                <div class="col-4 stat-col">
                    <div class="stat-icon float-left"><i class="fa fa-2x fa-user"></i></div>
                    <div class="ml-3">
                        <div style="font-size:18px;"><?php echo $_SESSION['login']['username'];?></div>
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
    </aside>
    <article class="content dashboard-page">
      <?php
      if(!empty($_SESSION['login'])) {
          $loader->addNamespace('\Report', $_SERVER['DOCUMENT_ROOT'].'/dist/app/phpapp');
          $loader->loadClass("Report\Report");
          $report = new \Report\Report($user_id, array('last'=>'This Month'));
          $r = $report->GetResults();
        ?>
        <ngb-tabset>
          <ngb-tab>
            <template ngbTabTitle><b>Manage Expense(s) Records and Category(s)</b></template>
            <template ngbTabContent>
              <div class="d-flex" style="background:white;">
              <div class="col-4" style="padding-left:1px;">
                <crudcategory categories='<?php echo json_encode($categories); ?>' usercategories='<?php echo json_encode($usercategories); ?>'></crudcategory>
                <crudSubcategory userSubCategories='<?php echo json_encode($usersubcategories); ?>'></crudSubcategory>
              </div>
              <div class="col-8">
                <expense Expenses='<?php echo json_encode($expenses); ?>'></expense>
              </div>
                </div>
            </template>
          </ngb-tab>
          <ngb-tab>
            <template ngbTabTitle><b>Report(s)</b></template>
            <template ngbTabContent>
            <div class="d-flex" style="margin-bottom: 125px;">
              <div class="col-12">
              <search parameters='<?php echo json_encode($userparameters); ?>' r='<?php echo json_encode($r); ?>'></search>
              </div>
            </div>
            </template>
          </ngb-tab>
        </ngb-tabset>
        <?php
      }
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
                    <div class="value"> <?php echo number_format((float)$nExpenses, 2, '.', '');; ?> </div>
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
        <div class="col-6">
          <div class="bg alert-info" style="padding:15px;">
          The project is builded based on Angular 4 to demonstrate my profound knowledge of how to deploy an application.
          It was developed based on Components, Directives, Services, Forms, Http Access, Authentication, Optimizing an Angular App with Modules.
            <br />       <br />
       <h3 class="title"> Why Angular 4? </h3>
            <p>
            This is the most popular Javacript framework in the industry. I am hoping that my demonstration of this project helps me find a suitable Software Engineering Position in the modern web development industry,
            and make  web software life easier.
          </p>

            Please use pre-populated     <span style="font-weight: bold;"> guest account</span>  to log in and play around.

          </div>


        </div>
        <?php
      }
      ?>
    </article>
    <!-- /.modal -->
  </div>
</div>
<script src="js/vendor.js"></script>
<script src="js/app.js"></script>



