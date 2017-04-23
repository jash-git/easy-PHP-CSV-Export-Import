   <?php
	//資料來源:https://vectus.wordpress.com/2010/10/13/%E7%94%A8-php-code-%E7%94%B1-csv-%E6%AA%94%E6%A1%88%E5%8C%AF%E5%85%A5%E8%B3%87%E6%96%99%E8%87%B3-mysql/
      $con = mysql_connect("localhost","<MYSQL LOGIN>", "<MYSQL PASSWORD>");
   
      if (!$con){
         die('Could not connect: ' . mysql_error());
      }
   
      mysql_select_db("testing", $con);
   
      mysql_query("SET NAMES utf8;");
      mysql_query("SET CHARACTER_SET_CLIENT=utf8;");
      mysql_query("SET CHARACTER_SET_RESULTS=utf8;");
   
      $row = 1;
   
      if (($handle = fopen("1.csv", "r")) != FALSE) {
         while (($data = fgetcsv($handle, 1000, ",")) != FALSE) {
   
            mysql_query("INSERT INTO staff (staff_id, staff_name) VALUES ( " . $data[0] . ", \"" . $data[1] . "\")");
   
         }
   
         fclose($handle);
   
      }
   
      mysql_close($con);
   ?>