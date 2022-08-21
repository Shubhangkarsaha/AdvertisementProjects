<?php include "includes/header.php";
/*for($i=1;$i<5;$i++){
	$path = "site_qr/site-".$i.".png";
	
			$url = $qr_url."site_record/site_details.php?SID=$i";
			QRcode::png($url, $path,'H',8,14);
}*/



/*if(isset($_GET['Del']))
{
	$D = $_GET['Del'];
	$gsql= "update bank_master set bank_status = '1' where bank_id='$D'";
	$grec= q($gsql);
	
	
	if($grec)
	{ 
		echo "<script>
				alert('Bank Details Deleted Successfully');
				location.replace('bank_list.php?')
				</script>";
	}
}*/


?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         All <?php if(isset($_GET['active'])){echo "Active ";}?>Site List
        <small>&nbsp;</small>
      </h1>
      
	</section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->
<div class="box">
           <!-- <div class="box-header">
              <h3 class="box-title">&nbsp;</h3>
            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr align="center">
                  <th>SL. No.</th>
                  <th>Add ID </th>
                  <th>Landlord Details</th>
                  <th>Address</th>
                  <th>Site Details</th>
				  <th>Item Details</th>
				  <th>Dates</th>
				  <th>Status</th>
				  <th>Options</th>
                </tr>
                </thead>
                <tbody>
		<?php
			if(isset($_GET['active']))
			{
				  $fsql = "select * from site_details_master sdm, category_master cm where sdm.cat_id = cm.cat_id and sdm.site_status = '0' order by sdm.site_id desc";
			}
			else if(isset($_GET['emptylocation']))
				{
				   $fsql = "select * from site_details_master sdm, category_master cm where sdm.cat_id = cm.cat_id and sdm.site_latitude = '' and sdm.site_longitude = '' order by sdm.site_id desc";
				 } 
			else
			{	
				  $fsql = "select * from site_details_master sdm, category_master cm where sdm.cat_id = cm.cat_id order by sdm.site_id desc";
			}
				  $frec = q($fsql);
				  $i = 1;
				  while($fres = f($frec))
				  {
					if($i % 2 == 0)
					$col = "bgcolor='#E5E5E5'";
					else
					$col = "bgcolor='#D5D5D5'";
					
					if($fres['site_status'] == '0')
					{
						$status = "Active";
						$clr = "#00FF00";
					}
					else
					{
						$status = "Inactive";
						$clr = "#FF0000";
					}
	  ?>
                <tr align="center">
                  <td><?php echo $i;?></td>
                  <td><?php echo @$fres['site_id']+1000;?></td>
                  <td>
				  	<table class="">
						<tr align="center">
						  <td width="44%" align="left"><strong> Landlord :</strong></td>
						</tr>
						<tr>
						  <td width="48%" align="left"><?php echo @$fres['site_landlord'];?></td>
						</tr>
						<tr align="center">
						  <td align="left"><strong>Landlord Fname :</strong></td>
						</tr>
						<tr>
						  <td align="left"><?php echo @$fres['landlord_fname'];?></td>
						</tr>
						<tr align="center">
						  <td align="left"><strong>Mobile No :</strong></td>
						</tr>
						<tr>
						  <td align="left"><?php echo @$fres['landlord_mobile'];?></td>
						</tr>
				    </table>
				  </td>
                  <td> 
				  	<table class="">
						<tr align="center">
						  <td width="44%" align="left"><strong>Ward :</strong></td>
						</tr>
						<tr>
						  <td width="43%" align="left"><?php echo @$fres['site_ward_no'];?></td>
						</tr>
						<tr align="center">
						  <td align="left"><strong> Area :</strong></td>
						</tr>
						<tr>
						  <td align="left"><?php echo @$fres['site_area'];?></td>
						</tr>
						<tr align="center">
						  <td align="left"><strong> PIN :</strong></td>
						</tr>
						<tr>
						  <td align="left"><?php echo @$fres['site_pin'];?></td>
						</tr>
				    </table>
				  </td>
                  <td>
					  <table class=" ">
						<tr align="center">
						  <td width="44%" align="left"><strong> Location :</strong></td>
						</tr>
						<tr>
						  <td width="48%" align="left"><?php echo @$fres['site_location'];?></td>
						</tr>
						<tr align="center">
						  <td align="left"><strong> Type :</strong></td>
						 </tr>
						 <tr>
						  <td align="left"><?php echo @$fres['site_type'];?></td>
						</tr>
						<tr align="center">
						  <td align="left"><strong>Company :</strong></td>
						</tr>
						<tr>
						  <td align="left"><?php echo com_name(@$fres['com_id']);?></td>
						</tr>
						<tr align="center">
						  <td align="left"><strong>Category :</strong></td>
						</tr>
						<tr>
						  <td align="left"><?php echo cat_name(@$fres['cat_id']);?></td>
						</tr>
					  </table>
				  </td>
				  <td>
					  <table width="100%" class="">
						<tr align="center">
						  <td width="47%" align="left"><strong>Size :</strong></td>
						</tr>
						<tr>
						  <td align="left"><?php echo @$fres['item_length']." X ".$fres['item_width'];?></td>
						</tr>
						<tr align="center">
						  <td align="left"><strong>Total Size :</strong></td>
						</tr>
						<tr>
						  <td align="left"><?php echo @$fres['item_total_size']." ".size_type($fres['cat_id']);?></td>
						</tr>
					  </table>
				  </td>
				  <td>
					  <table class="">
						<tr>
						  <td width="46%" height="21" align="left"><strong>Contract :</strong></td>
						</tr>
						<tr>
						  <td width="47%"><?php echo date_reverse(@$fres['contract_date']);?></td>
						</tr>
						<tr>
						  <td height="21" align="left"><strong>Installation :</strong></td>
						</tr>
						<tr>
						  <td><?php echo date_reverse(@$fres['installation_date']);?></td>
						</tr>
					  </table>
				  </td>
				  <td>
				  		<strong><a href="change_status.php?SID=<?php echo @$fres['site_id'];?>" style="color:<?php echo $clr;?>"><?php echo $status;?></a></strong>
				  </td>
				  <td>
					  <table class="">
						<tr>
						  
						  <td width="22%" align="center"><a href="geolocation.php?SID=<?php echo $fres['site_id'];?>">
							<input type="image" name="imageField2" src="allicons/66.png" width="35" height="35" title="Geolocation"/>
						  </a></td>
						  <td width="21%" align="center"><a href="map.php?MAP=<?php echo @$fres['site_id'];?>" target="_blank">
							<input type="image" name="imageField23" src="allicons/65.png" width="35" height="35" title="Map"/>
						  </a></td>
						  <td width="20%" align="center"><a href="whatsapp://send?text=<?php echo "http://maps.google.com/?q=".$fres['site_latitude'].",".$fres['site_longitude'];?>" data-action="share/whatsapp/share" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on whatsapp">
							 <input type="image" name="imageField3" src="allicons/64.png" title="Whatsapp" height="30" width="35"/>
						  </a></td>
						  
						</tr>
						<tr>
						  
						  <td width="18%" align="center"><a href="site_qr/site-<?php echo @$fres['site_id'];?>.png" download>
							<input type="image" name="imageField22" src="allicons/63.png" width="35" height="35" title="Download QR Code" />
						  </a></td>
						  <td align="center"><a href="site_master.php?Edit=<?php echo @$fres['site_id'];?>">
						    <input type="image" name="imageField" src="allicons/68.gif" title="Edit Record" height="30" width="35"/>
						  </a></td>
						  <td width="18%" align="center"><a href="site_master.php?Del=<?php echo @$fres['site_id'];?>" >
							<input type="image" name="imageField22" src="allicons/70.gif" title="Delete Record" />
						  </a></td>
						</tr>
					  </table>
				  </td>
                </tr>
                <?php $i++; }?>
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include"includes/footer.php";?>