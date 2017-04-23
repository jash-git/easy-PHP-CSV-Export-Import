   <?php
	//資料來源:https://vectus.wordpress.com/2010/10/12/%E7%94%A8-php-code-%E7%94%B1-mysql-%E5%8C%AF%E5%87%BA-csv-%E6%AA%94%E6%A1%88/
	
      $con = mysql_connect("localhost","<MYSQL LOGIN>", "<MYSQL PASSWORD>");
      if (!$con){
         die('Could not connect: ' . mysql_error());
      }
   
      mysql_select_db("test", $con);
      $file = fopen("1.csv","w");

      $result = mysql_query("SELECT * FROM staff");

      while($row = mysql_fetch_array($result)){
         fputcsv($file,split(',', $row['staff_id']. "," . $row['staff_name']));
      }

      fclose($file);
      mysql_close($con);

   ?>