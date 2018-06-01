<!DOCTYPE html>
<html>
  <head>
             <meta charset="utf-8">
             <title></title>
             <link rel="stylesheet" href="Style/Style.css"/>
             <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
             
             
  </head>
  <script>
function getWilaya(val) {
	$.ajax({
	type: "POST",
	url: "get_wilaya.php",
	data:'nom_region='+val,    
	success: function(data){
		$("#poo1").html(data);   //ou wilaya_list
	}
	});
}
  </script>
  <body>
   <?php
   
   
   $hostname = "localhost";
   $username = "root";
   $password = "";
   $databaseName = "entreprise";
   $connect = mysqli_connect($hostname, $username, $password, $databaseName);
   
   $query1 = "SELECT * FROM regions";
   $result1 = mysqli_query($connect, $query1);
   
   
   
   $query2 = "SELECT * FROM wilaya";
   $result2 = mysqli_query($connect, $query2);
   
   
             $query3 = "SELECT * FROM dates group by week ";
                
   $result3= mysqli_query($connect, $query3);
   
                $query4 = "SELECT * FROM dates group by month";
   $result4= mysqli_query($connect, $query4);
   
            
                $query5= "SELECT * FROM dates group by year";
   $result5= mysqli_query($connect, $query5);
   
   
?>
 <form id="combo" name="combo"  method="POST" action="PieDV.php">

 <input class="topcoat-combo-input" type="text" list="poo" placeholder="Region" name="reg" id="region-list">
  <datalist id="poo" class="demoInputBox"  onChange="getWilaya(this.value);">
    <option value="">Selectionnez région</option>
             
            <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
          <!--
          $sql1="SELECT * FROM regions";
         $results=$dbhandle->query($sql1); 
		while($rs=$results->fetch_assoc()) { -->

        </datalist >
  <input class="topcoat-combo-input" type="text" list="poo1" placeholder="Wilaya" name="wil" id="wilaya-list">
  <datalist id="poo1">
             
          <!-- <?php# while($row2 = mysqli_fetch_array($result2)):;?>

            <option value=" <?php #echo $row2[1];?>"><?php #echo $row2[1];?></option>

            <?php #endwhile;?>-->
              
              <option value="">Selectionnez wilaya</option>
              
        </datalist>
 
   <input class="topcoat-combo-input" type="text" list="poo2" placeholder="KPI" name="kp">
      <datalist id="poo2" >     
                 <option value="bparty">bparty</option>
                 <option value="terminated_prep">terminated_prep</option>
                 <option value="terminated_post">terminated_postp</option>
                 <option value="flexy">flexy</option>
                 <option value="revenue">revenue</option>
                  <option value="scratch">scratch</option>
                 <option value="tpe">tpe</option>
                 <option value="ms_subs">ms_subs</option>
                 <option value="ga_segmentation">ga_segmentation</option>
                 <option value="ga_marketshar">ga_marketshar</option>
             </datalist>
             
           
                
            <input class="topcoat-combo-input" type="text" list="poo3" placeholder="Periode" name="per">
          <datalist id="poo3">
               
                 <option value="Daily">Daily</option>
                 <option value="Weekly">Weekly</option>
                 <option value="Monthly">Monthly</option>
                 <option value="Yearly">Yearly</option>
             </datalist>
             
        <input class="topcoat-combo-input" type="text" list="poo4" placeholder="Week" name="week">
         <datalist id="poo4">
            <?php while($row3 = mysqli_fetch_array($result3)): echo $row3;?>
                    
            <option value="<?php echo $row3[1];?>"><?php echo $row3[1];?></option>

            <?php endwhile;?>

        </datalist>
            
     
   <input class="topcoat-combo-input" type="text" list="poo5" placeholder="Month" name="month">
  <datalist id="poo5">
             
            <?php while($row4 = mysqli_fetch_array($result4)):;?>

            <option value="<?php echo $row4[2];?>"><?php echo $row4[2];?></option>

            <?php endwhile;?>

        
    </datalist>
  <input class="topcoat-combo-input" type="text" list="poo6" placeholder="yearly" name="year">
  <datalist id="poo6">
             
            <?php while($row5 = mysqli_fetch_array($result5)):;?>

            <option value="<?php echo $row5[3];?>"><?php echo $row5[3];?></option>

            <?php endwhile;?>

        </datalist>
                     
             <input class="topcoat-combo-input" type="date" name="datea" placeholder="<?php echo $date = date("d/m/Y"); ?>">
            <input class="topcoat-combo-input" type="date" name="dateb" placeholder="<?php echo $date = date("d/m/Y"); ?>">
            
        
        <!--combo de wilaya -->
             
             <input class="topcoat-combo-input" type="submit" >
           </form>
       </nav>
       
       
    
  </body>
</html>
