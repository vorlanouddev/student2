<?php
    $point=$_POST['point'];
    if($point>10){
     
        echo "<div id='show-point'>ປ້ອນຄະແນນເກີນກຳນົດ</div>";
    }
    else{
     echo "";
    }
?>
<style>
    #show-point{
            /* background-color:red; */
            color:red;
            margin-left:10px;
            padding:2px 2px 2px 2px;
            text-align:center;
            
                    }

</style>