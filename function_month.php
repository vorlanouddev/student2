<?php
    $month=date("m");

    if($month=='01'){
        echo "ມັງກອນ";
    }
    else if($month=='02'){
        echo "ກຸມພາ";
    }

    else if($month=='03'){
        echo "ມີນາ";
    }
    else if($month=='04'){
        echo "ເມສາ";
    }
    else if($month=='05'){
        echo "ພຶດສະພາ";
    }
    else if($month=='06'){
        echo "ມິຖຸນາ";
    }
    else if($month=='07'){
        echo "ກໍລະກົດ";
    }
    else if($month=='08'){
        echo "ສິງຫາ";
    }
    else if($month=='09'){
        echo "ກັນຍາ";
    }
    else if($month=='10'){
        echo "ຕຸລາ";
    }
    else if($month=='11'){
        echo "ພະຈິກ";
    }
    else if($month=='12'){
        echo "ທັນວາ";
    }
    else{
        echo date("M");
    }

?>