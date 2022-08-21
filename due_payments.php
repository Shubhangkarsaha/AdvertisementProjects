<?php include"includes/header.php";?>
<section class="content-header"><h1>
        Due Payments Report
        <small>&nbsp;</small>
      </h1>
      
</section>
<br />

<table width="95%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr class="fnt">
    <td width="3%" rowspan="2" align="center">Sl No. </td>
    <td width="7%" rowspan="2" align="center">Due For F/Y </td>
    <td width="12%" rowspan="2" align="center">Ad Agency Name </td>
    <td width="7%" rowspan="2" align="center">Total</td>
    <td colspan="6" align="center">Interest For F/Y </td>
    <td width="7%" rowspan="2" align="center">Total Due </td>
    <td width="10%" rowspan="2" align="center">Received Amount </td>
    <td width="12%" rowspan="2" align="center">Latest Dues </td>
  </tr>
  <tr class="fnt">
<?php 
	list($sy,$ey) = explode("-", season(date('Y-m-d')));
	//echo $sy-5;
	for($i=($sy-4);$i<=$ey;$i++){
?>
    <td align="center"><?php echo $i."-".($i+1);?></td>
<?php }?>
	<!--<td align="center">2016-2017</td>
    <td align="center">2017-2018</td>
    <td align="center">2018-2019</td>
    <td align="center">2019-2020</td>
    <td align="center">2020-2021</td>
    <td align="center">2021-2022</td>-->
  </tr>
<?php 
	$sl = 1;
	$com_sql = "select * from company_master order by com_name asc";
	$com_rec = q($com_sql);
	while($com_res = f($com_rec))
	{
?>
  <tr>
    <td align="center"><?php echo $sl;?></td>
    <td align="center">&nbsp;</td>
    <td align="center"><?php echo $com_res['com_name'];?></td>
    <td align="center">&nbsp;</td>
    <td width="7%" align="center">&nbsp;</td>
    <td width="7%" align="center">&nbsp;</td>
    <td width="7%" align="center">&nbsp;</td>
    <td width="7%" align="center">&nbsp;</td>
    <td width="7%" align="center">&nbsp;</td>
    <td width="7%" align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
<?php 
	for($i=($sy-5);$i<=$sy;$i++){
		$fy = $i."-".($i+1);
		$check_sql = "select * from site_details_master where cat_id = '1' and paid_upto_season < '$fy' and com_id = '$com_res[com_id]'";
		//echo $check_sql;exit;
		if(row_count($check_sql) > 0)
		{
			$yearly_total = row_count($check_sql)*cat_rate(1);
?>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center"><?php echo $fy;?></td>
    <td align="center">&nbsp;</td>
    <td align="center"><?php echo number_format($yearly_total,2);?></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
<?php
		}
	}
?>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center"><strong>TOTAL</strong></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
<?php 
		$sl++;	
	}
?>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
</table>
<?php include"includes/footer.php";?>
