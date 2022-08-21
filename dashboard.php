<?php include "includes/header.php";
/*if(isset($_GET['clear']))
{
	 $clear = q("truncate table benificiary_master");
}*/
			//echo date('h:i A');exit;
			
			//echo $starting_season; exit;
			$season = season(date('Y-m-d'));
?>

<section class="content-header">
      <h1>
        Dashboard
        <small>Control Panel For SMC Advertise Management System</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo row_count("select * from site_details_master sdm, category_master cm where sdm.cat_id = cm.cat_id");?></h3>

              <p>Total Sites </p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="site_data.php?" class="small-box-footer">Click Here For Details <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		<div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo row_count("select * from category_master where cat_status = '0'");?></h3>

              <p>Active Category </p>
            </div>
            <div class="icon">
              <i class="fa fa-check-square-o "></i>
            </div>
            <a href="category_list.php?active" class="small-box-footer">Click Here For Details <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		<div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-violet">
            <div class="inner">
              <h3><?php echo row_count("select * from company_master where com_status = '0'");?></h3>

              <p>Active Company </p>
            </div>
            <div class="icon">
              <i class="fa fa-building-o  "></i>
            </div>
            <a href="company_list.php?active" class="small-box-footer">Click Here For Details <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo row_count("select * from site_details_master sdm, category_master cm where sdm.cat_id = cm.cat_id and sdm.paid_upto_season <> '$season' and sdm.site_status = '0' ");?></h3>

              <p>Pending Renewals </p>
            </div>
            <div class="icon">
              <i class="fa fa-inr"></i>
            </div>
            <a href="pending_renewals.php?" class="small-box-footer">Click Here For Details <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
		 <!-- ./col -->
        <!--<div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <!--<div class="small-box bg-red">
            <div class="inner">
              <h3><?php //echo row_count("select * from benificiary_master bm, scheme_master sm, bank_master bkm, branch_master bcm ,ward_master wm where bm.bank_id = bkm.bank_id and bm.branch_id = bcm.branch_id and wm.ward_id = bm.ben_ward and bm.ben_scheme_id=sm.scheme_id and bm.file_status='1' and bm.status = '0' ");?></h3>

              <p>Pending</p>
            </div>
            <div class="icon">
              <i class="fa fa-hourglass-end"></i>
            </div>
            <a href="application_list.php?FS=1" class="small-box-footer">Click Here For Details <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>-->
        <!-- ./col -->
        
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?php echo row_count("select * from site_details_master sdm, category_master cm where sdm.cat_id = cm.cat_id and sdm.site_latitude = '' and sdm.site_longitude = ''");?></h3>

              <p>Empty Location  </p>
            </div>
            <div class="icon">
              <i class="fa fa-map-marker"></i>
            </div>
            <a href="site_data.php?emptylocation" class="small-box-footer">Click Here For Details <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
		 <!-- ./col -->
        <!--<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <!--<div class="small-box bg-lgreen">
            <div class="inner">
              <h3><?php //echo row_count("select * from benificiary_master bm, scheme_master sm, bank_master bkm, branch_master bcm ,ward_master wm where bm.bank_id = bkm.bank_id and bm.branch_id = bcm.branch_id and wm.ward_id = bm.ben_ward and bm.ben_scheme_id=sm.scheme_id and bm.file_status='3' and bm.status = '0' ");?></h3>

              <p> Lying with Accounts</p>
            </div>
            <div class="icon">
              <i class="fa fa-calculator"></i>
            </div>
            <a href="application_list.php?FS=3" class="small-box-footer">Click Here For Details <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>-->
        <!-- ./col -->
		<div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo row_count("select * from site_details_master sdm, category_master cm where sdm.cat_id = cm.cat_id and sdm.site_status = '0'");?></h3>

              <p> Active Sites </p>
            </div>
            <div class="icon">
              <i class="fa fa-area-chart"></i>
            </div>
            <a href="site_data.php?active" class="small-box-footer">Click Here For Details <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
	     	  
	  
      <div class="row">
        <!-- Left col -->
         
      
        <div align="center">
        <section class="col-lg-9 connectedSortable" style="background:#fff;">
		 
		 			<?php include "chart/index.php"; ?>

		</section></div>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <!-- FULL UNDER TEST -->
        
               <!-- right col -->
        	
        
         <section class="col-lg-3 connectedSortable">
           
           <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendar</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-black">
              <div class="row">
                <div class="col-sm-6">
                  <!-- Progress bars -->
                  <div class="clearfix">
                    <span class="pull-left">C-LAD</span>
                    <small class="pull-right">90%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                  </div>

                  <div class="clearfix">
                    <span class="pull-left">Word Office</span>
                    <small class="pull-right">70%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                  <div class="clearfix">
                    <span class="pull-left">Word Utsav</span>
                    <small class="pull-right">60%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                  </div>

                  <div class="clearfix">
                    <span class="pull-left">Sports</span>
                    <small class="pull-right">40%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
           
         </section>	
               <!-- right col -->
  
     </div>
      <!-- /.row (main row) -->
	<div class="row" >
      
	  <?php 
	  	$csql = "select * from category_master where cat_status = '0' order by cat_name asc";
		$crec = q($csql);
		while($cres = f($crec))
		{
	  ?>
       <section class="col-lg-4 connectedSortable">
            
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?php echo $cres['cat_name'];?></h3>
              <h5 class="widget-user-desc">&nbsp;</h5>
            </div>
            <div class="widget-user-image"><img class="img-circle" src="user_images/17.png" height="512" width="512" alt="User Avatar" /></div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo row_count("select * from site_details_master where site_status = '0' and paid_upto_season <> '$season' and cat_id = '$cres[cat_id]'");?></h5>
                    <span class="description-text">RENEWAL</span></div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo "0";//row_count("select * from site_details_master where site_status = '0' and paid_upto_season <> '$current_season' and cat_id = '$cres[cat_id]'");?></h5>
                    <span class="description-text">PENDING</span></div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo "0";//scheme_balance(2);?></h5>
                    <span class="description-text">REJECTED</span></div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
                     
        </section>
        
       <?php
	   	}
	   ?>
	
      
      </div>
    
    </section>
	
    <!-- /.content -->
	<?php include "includes/footer.php";?>
 