<?php
       include('mysql.php');
       $s_id=$_POST['s_id'];
       $maxrank=mysqli_query($con,"select sub_id from tb_point where p_id=(select max(p_id)from tb_point where s_id='$s_id')");
       $maxID=mysqli_fetch_array($maxrank);
         $max=$maxID[0]+1;
         $sel_last_sub=mysqli_query($con,"select sub_id,sub_name from subject where sub_id='$max'");
         $last_sub=mysqli_fetch_array($sel_last_sub);
         $sub1=$last_sub['sub_id'];
         $sub2=$last_sub['sub_name'];
       
?>
      <option value="<?php echo $sub1;?>">
      <?php 
      if($sub1>=1){
          echo $sub2;
    
      }elseif($sub1<=0){
          echo "<option>ເລືອກວິຊາໃໝ່</option>";
        $st=mysqli_query($con,"select*from subject");
        while($sts=mysqli_fetch_array($st)){
            echo "
            <option value='$sts[0]'>$sts[1] </option>
            ";
        }
      }else{
        
        echo "ນັກຮຽນຄົນນີ້ ໄດ້ມີຄະແນນຄົບທຸກວິຊາແລ້ວ";
         
      }
      ?>
      </option>