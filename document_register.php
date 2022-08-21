<?php include "includes/header.php";

if(empty($_GET))
{
	echo "<script>
			alert('Kindly insert Site Details!!');
			location.replace('site_master.php?');
		</script>";
}
if(isset($_GET['SID']))
{
	$site_id = $_GET['SID'];
	if($site_id == "")
	{
		echo "<script>
				alert('Kindly insert Site Details!!');
				location.replace('site_master.php?');
			</script>";
	}
	
}

if(isset($_POST['Submit']))
{
	$site_id = $_GET['SID'];
	$doc_1 = $_FILES['doc_1']['name'];
	$doc_2 = $_FILES['doc_2']['name'];
	$doc_3 = $_FILES['doc_3']['name'];
	$doc_4 = $_FILES['doc_4']['name'];
	$doc_5 = $_FILES['doc_5']['name'];
	$doc_6 = $_FILES['doc_6']['name'];
	$doc_7 = $_FILES['doc_7']['name'];
	$doc_8 = $_FILES['doc_8']['name'];
	$doc_9 = $_FILES['doc_9']['name'];
	$doc_10 = $_FILES['doc_10']['name'];
	$doc_11 = $_FILES['doc_11']['name'];
	$doc_12 = $_FILES['doc_12']['name'];    
	$doc_13 = $_FILES['doc_13']['name'];
	$doc_14 = $_FILES['doc_14']['name'];
	$doc_15 = $_FILES['doc_15']['name'];
	$doc_16 = $_FILES['doc_16']['name'];

if($_POST['Submit']=="Submit")
		  {
		  
		   
			if($doc_1 != "")
			  {
			   list($n1,$e1) = explode(".",$doc_1);
			   $new_image1 = $site_id."_1.".$e1;
			  }
			  else
			  	$new_image1 = "";
			 if($doc_2 != "") 
			   {
			    list($n2,$e2) = explode(".",$doc_2);
				$new_image2 = $site_id."_2.".$e2;
			    }
				else
			  	$new_image2 = "";
			 if($doc_3 != "")
			   { 	
			    list($n3,$e3) = explode(".",$doc_3);
				$new_image3 = $site_id."_3.".$e3;
			   }
			   else
			  	$new_image3 = "";
			 if($doc_4 != "")
			    { 
			     list($n4,$e4) = explode(".",$doc_4);
				 $new_image4 = $site_id."_4.".$e4;
				}
				else
			  	$new_image4 = "";
			 if($doc_5 != "")
			   { 	 
			    list($n5,$e5) = explode(".",$doc_5);
				$new_image5 = $site_id."5.".$e5;
			   }
			   else
			  	$new_image5 = "";
			 if($doc_6 != "")
			   {  
			    list($n6,$e6) = explode(".",$doc_6);
				$new_image6 = $site_id."_6.".$e6;
			   }
			   else
			  	$new_image6 = "";
			 if($doc_7 != "")
			   {  	
			    list($n7,$e7) = explode(".",$doc_7);
				$new_image7 = $site_id."_7.".$e7;
			   }
			   else
			  	$new_image7 = "";
			 if($doc_8 != "") 
			    {	
			     list($n8,$e8) = explode(".",$doc_8);
				 $new_image8 = $site_id."_8.".$e8;
			    }
				else
			  	$new_image8 = "";
			 if($doc_9 != "")
			    { 	
			     list($n9,$e9) = explode(".",$doc_9);
				 $new_image9 = $site_id."_9.".$e9;
	            }
				else
			  	$new_image9 = "";
		     if($doc_10 != "")
			   {	 		
			    list($n10,$e10) = explode(".",$doc_10);
				$new_image10 = $site_id."_10.".$e10;
			   }
			   else
			  	$new_image10 = "";
			 if($doc_11 != "")
			   {  
			    list($n11,$e11) = explode(".",$doc_11);
				$new_image11 = $site_id."_11.".$e11;
			   }
			   else
			  	$new_image11 = "";
			 if($doc_12 != "")
			   {   
			    list($n12,$e12) = explode(".",$doc_12);
				$new_image12 = $site_id."_12.".$e12;
			   }
			   else
			  	$new_image12 = "";
			 if($doc_13 != "") 
			   { 
			    list($n13,$e13) = explode(".",$doc_13);
				$new_image13 = $site_id."_13.".$e13;
	           }
			   else
			  	$new_image13 = "";
			 if($doc_14 != "")
			   {  		
			    list($n14,$e14) = explode(".",$doc_14);
				$new_image14 = $site_id."_14.".$e14;
	           }
			   else
			  	$new_image14 = "";
			 if($doc_15 != "")
			   {  		
			    list($n15,$e15) = explode(".",$doc_15);
				$new_image15 = $site_id."_15.".$e15;
			   }
			   else
			  	$new_image15 = "";
			 if($doc_16 != "")
			   {  
			    list($n16,$e16) = explode(".",$doc_16);
				$new_image16 = $site_id."_16.".$e16;
			   }
			   else
			  	$new_image16 = "";
			   
			     $sql = "INSERT INTO `document_master`(`site_id`, `doc_1`, `doc_2`, `doc_3`, `doc_4`, `doc_5`, `doc_6`, `doc_7`, `doc_8`, `doc_9`, `doc_10`, `doc_11`, `doc_12`, `doc_13`, `doc_14`, `doc_15`, `doc_16`) VALUES ('$site_id','$new_image1','$new_image2','$new_image3','$new_image4','$new_image5','$new_image6','$new_image7','$new_image8','$new_image9','$new_image10','$new_image11','$new_image12','$new_image13','$new_image14','$new_image15','$new_image16')";
		   
		   $uprec = q($sql);
		   
		   if($uprec>0)
			{
				//exit;
				echo "<script>
					alert('Documents Submitted Successfully');
					location.replace('site_master.php?');
				</script>";
			}
			else
			{
				//exit;
				echo "<script>
					alert('Error ! Please enter the documents carefully');
					location.replace('document_register.php');
				</script>";
		     }
	
	       }

			//echo $new_image1,$new_image2,$new_image3,$new_image4;exit;
			if($site_id>0)
			  {
			   $title1 = move_uploaded_file($_FILES['doc_1']['tmp_name'],"doc_file/".$new_image1); 
			   $title2 = move_uploaded_file($_FILES['doc_2']['tmp_name'],"doc_file/".$new_image2);
			   $title3 = move_uploaded_file($_FILES['doc_3']['tmp_name'],"doc_file/".$new_image3);
			   $title4 = move_uploaded_file($_FILES['doc_4']['tmp_name'],"doc_file/".$new_image4);
			   $title5 = move_uploaded_file($_FILES['doc_5']['tmp_name'],"doc_file/".$new_image5);
			   $title6 = move_uploaded_file($_FILES['doc_6']['tmp_name'],"doc_file/".$new_image6);
			   $title7 = move_uploaded_file($_FILES['doc_7']['tmp_name'],"doc_file/".$new_image7); 
			   $title8 = move_uploaded_file($_FILES['doc_8']['tmp_name'],"doc_file/".$new_image8); 
			   $title9 = move_uploaded_file($_FILES['doc_9']['tmp_name'],"doc_file/".$new_image9);
			   $title10 = move_uploaded_file($_FILES['doc_10']['tmp_name'],"doc_file/".$new_image10);
			   $title11 = move_uploaded_file($_FILES['doc_11']['tmp_name'],"doc_file/".$new_image11);
			   $title12 = move_uploaded_file($_FILES['doc_12']['tmp_name'],"doc_file/".$new_image12);
			   $title13 = move_uploaded_file($_FILES['doc_13']['tmp_name'],"doc_file/".$new_image13);
			   $title14 = move_uploaded_file($_FILES['doc_14']['tmp_name'],"doc_file/".$new_image14);
			   $title15 = move_uploaded_file($_FILES['doc_15']['tmp_name'],"doc_file/".$new_image15);
			   $title16 = move_uploaded_file($_FILES['doc_16']['tmp_name'],"doc_file/".$new_image16);   
			  }
						
			
		 }
if (isset($_GET['Edit']))
 {
  $Edit = $_GET['Edit'];
  $esql= "select * from document_master where doc_id='$Edit'";
  $erec = q($esql);
  $eres = f($erec);
  }
  
 if (isset($_GET['Del']))
 {
  $D = $_GET['Del'];
  $dsql= "update document_master set doc_status = '1' where doc_id='$D'";
  $drec = q($dsql);
  echo "<script>
		alert('Documents removed successfully');
		location.replace('document_list.php?')
		</script>";
  }
?>
<section class="content-header">
      <h1>DOCUMENT REGISTER </h1>
</section>
<br>








<form name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="98%" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr background="images\1by25.jpg">
      <td height="31" colspan="6" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td width="2%" align="right">&nbsp;</td>
      <td width="32%" align="right">&nbsp;</td>
      <td width="23%" align="right">&nbsp;</td>
      <td width="1%" align="center">&nbsp;</td>
      <td width="27%" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td width="15%" align="right">Document 1  </td>
      <td align="center">:</td>
      <td align="left"><input name="doc_1" type="file" id="doc_1" value="<?php echo @$eres['doc_1'];?>"/> 
	  <?php if(isset($_GET['Edit'])){?><img src="doc_file/<?php echo @$fres2['doc_1'];?>" width="75"
			  height="75" />			  <?php }?></td>
      <td align="right">Document 2 </td>
      <td align="center">:</td>
      <td align="left"><input name="doc_2" type="file" id="doc_2" value="<?php echo @$eres['doc_2'];?>"/>
	   <?php if(isset($_GET['Edit'])){?><img src="doc_file/<?php echo @$fres2['doc_2'];?>" width="75"
			  height="75" />			  <?php }?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right">Document 3 </td>
      <td align="center">:</td>
      <td align="left"><input name="doc_3" type="file" id="doc_3" value="<?php echo @$eres['doc_3'];?>" />
	  <?php if(isset($_GET['Edit'])){?><img src="doc_file/<?php echo @$fres2['doc_3'];?>" width="75"
			  height="75" />			  <?php }?></td>
      <td align="right">Document 4 </td>
      <td align="center">:</td>
      <td align="left"><input name="doc_4" type="file" id="doc_4" value="<?php echo @$eres['doc_4'];?>" />
	  <?php if(isset($_GET['Edit'])){?><img src="doc_file/<?php echo @$fres2['doc_4'];?>" width="75"
			  height="75" />			  <?php }?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right">Document 5 </td>
      <td align="center">:</td>
      <td align="left"><input name="doc_5" type="file" id="doc_5" value="<?php echo @$eres['doc_5'];?>" />
	  <?php if(isset($_GET['Edit'])){?><img src="doc_file/<?php echo @$fres2['doc_5'];?>" width="75"
			  height="75" />			  <?php }?></td>
      <td align="right">Document 6 </td>
      <td align="center">:</td>
      <td align="left"><input name="doc_6" type="file" id="doc_6" value="<?php echo @$eres['doc_6'];?>" />
	  <?php if(isset($_GET['Edit'])){?><img src="doc_file/<?php echo @$fres2['doc_6'];?>" width="75"
			  height="75" />			  <?php }?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right">Document 7 </td>
      <td align="center">:</td>
      <td align="left"><input name="doc_7" type="file" id="doc_7" value="<?php echo @$eres['doc_7'];?>"  />
	  <?php if(isset($_GET['Edit'])){?><img src="doc_file/<?php echo @$fres2['doc_7'];?>" width="75"
			  height="75" />			  <?php }?></td>
      <td align="right">Document 8 </td>
      <td align="center">:</td>
      <td align="left"><input name="doc_8" type="file" id="doc_8" value="<?php echo @$eres['doc_8'];?>" />
	  <?php if(isset($_GET['Edit'])){?><img src="doc_file/<?php echo @$fres2['doc_8'];?>" width="75"
			  height="75" />			  <?php }?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right">Document 9 </td>
      <td align="center">:</td>
      <td align="left"><input name="doc_9" type="file" id="doc_9" value="<?php echo @$eres['doc_9'];?>" />
	  <?php if(isset($_GET['Edit'])){?><img src="doc_file/<?php echo @$fres2['doc_9'];?>" width="75"
			  height="75" />			  <?php }?></td>
      <td align="right">Document 10 </td>
      <td align="center">:</td>
      <td align="left"><input name="doc_10" type="file" id="doc_10" value="<?php echo @$eres['doc_10'];?>"  />
	  <?php if(isset($_GET['Edit'])){?><img src="doc_file/<?php echo @$fres2['doc_10'];?>" width="75"
			  height="75" />			  <?php }?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right">Document 11 </td>
      <td align="center">:</td>
      <td align="left"><input name="doc_11" type="file" id="doc_11" value="<?php echo @$eres['doc_11'];?>"  />
	  <?php if(isset($_GET['Edit'])){?><img src="doc_file/<?php echo @$fres2['doc_11'];?>" width="75"
			  height="75" />			  <?php }?></td>
      <td align="right">Document 12 </td>
      <td align="center">:</td>
      <td align="left"><input name="doc_12" type="file" id="doc_12" value="<?php echo @$eres['doc_12'];?>"  />
	  <?php if(isset($_GET['Edit'])){?><img src="doc_file/<?php echo @$fres2['doc_12'];?>" width="75"
			  height="75" />			  <?php }?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right">Document 13 </td>
      <td align="center">:</td>
      <td align="left"><input name="doc_13" type="file" id="doc_13" value="<?php echo @$eres['doc_13'];?>"  />
	  <?php if(isset($_GET['Edit'])){?><img src="doc_file/<?php echo @$fres2['doc_13'];?>" width="75"
			  height="75" />			  <?php }?></td>
      <td align="right">Document 14 </td>
      <td align="center">:</td>
      <td align="left"><input name="doc_14" type="file" id="doc_14" value="<?php echo @$eres['doc_14'];?>"  />
	  <?php if(isset($_GET['Edit'])){?><img src="doc_file/<?php echo @$fres2['doc_14'];?>" width="75"
			  height="75" />			  <?php }?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right">Document 15 </td>
      <td align="center">:</td>
      <td align="left"><input name="doc_15" type="file" id="doc_15" value="<?php echo @$eres['doc_15'];?>"  />
	  <?php if(isset($_GET['Edit'])){?><img src="doc_file/<?php echo @$fres2['doc_15'];?>" width="75"
			  height="75" />			  <?php }?></td>
      <td align="right">Document 16 </td>
      <td align="center">:</td>
      <td align="left"><input name="doc_16" type="file" id="doc_16" value="<?php echo @$eres['doc_16'];?>"  />
	  <?php if(isset($_GET['Edit'])){?><img src="doc_file/<?php echo @$fres2['doc_16'];?>" width="75"
			  height="75" />			  <?php }?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="6" align="center"><input type="submit" name="Submit" <?php if(isset($_GET['Edit'])){echo "value='Edit'";}else{?>value="Submit"<?php }?> />
      <input name="pk" type="hidden" id="pk" value="<?php echo $eres['doc_id'];?>" /></td>
    </tr>
    <tr background="images\1by25.jpg">
      <td colspan="6">&nbsp;</td>
    </tr>
  </table>
</form>










	<?php include "includes/footer.php";?>
 