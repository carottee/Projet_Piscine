<?php


$database = "projet_piscine";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {

    $id_coach_sup = $_POST['sup_coach'];
    $id_coach_edt = $_POST['rst_edt'];
    $id_coach_rdv = $_POST['rst_rdv'];


    if ($id_coach_edt != 0) {

        $sql = "UPDATE edt SET l='0',ld='0',ma='0',mad='0',me='0',med='0',j='0',jd='0',v='0',vd='0',s='0',sd='0' WHERE id_coach = '$id_coach_edt'";
        $result = mysqli_query($db_handle, $sql);

        $sql = "select Mail from coach where ID = '$id_coach_edt'";
        $result = mysqli_query($db_handle, $sql);
        $data = mysqli_fetch_assoc($result);
        $mail_coach_edt = $data['Mail'];

        $sql = "delete from rdv where mail_coach = '$mail_coach_edt'";
        $result = mysqli_query($db_handle, $sql);



        echo "<script>window.location.href='superPouvoir.html'; alert('modification successful');</script> ";

    }
    if ($id_coach_rdv != 0) {
        $sql = "select * from coach where ID = $id_coach_rdv";
        $result = mysqli_query($db_handle, $sql);
        $data = mysqli_fetch_assoc($result);
        $mail_coach_rdv = $data['Mail'];

        $sql = "DELETE FROM `rdv` WHERE mail_coach = '$mail_coach_rdv'";
        $result = mysqli_query($db_handle, $sql);

        $sql = "select l, ld, ma, mad, me, med, j, jd, v, vd, s, sd from edt where id_coach = '$id_coach_rdv'";
        $result = mysqli_query($db_handle, $sql);
        $data = mysqli_fetch_assoc($result);

        if ($data) {
            foreach ($data as $key => $value) {
                if ($value == 1) {
                    $data[$key] = 0;
                }
            }
        }

// Maintenant, vous pouvez mettre à jour la base de données avec les nouvelles valeurs
        $update_sql = "UPDATE edt SET 
    l = {$data['l']}, 
    ld = {$data['ld']}, 
    ma = {$data['ma']}, 
    mad = {$data['mad']}, 
    me = {$data['me']}, 
    med = {$data['med']}, 
    j = {$data['j']}, 
    jd = {$data['jd']}, 
    v = {$data['v']}, 
    vd = {$data['vd']}, 
    s = {$data['s']}, 
    sd = {$data['sd']} 
    WHERE id_coach = '$id_coach_rdv'";

        if (mysqli_query($db_handle, $update_sql)) {
            echo "<script>window.location.href='superPouvoir.html'; alert('modification successful');</script> ";
        } else {
            echo "Error updating record: " . mysqli_error($db_handle);
        }


    }


    if ($id_coach_sup != 0) {
        $sql = "DELETE FROM coach WHERE ID = '$id_coach_sup' ";
        $result = mysqli_query($db_handle, $sql);
        echo " <script>  window.location.href='superPouvoir.html'  </script> ";
    }


    if (isset($_POST['sup_all_coach'])) {
        $sql = "truncate table coach";
        $result = mysqli_query($db_handle, $sql);
        echo " <script>  window.location.href='superPouvoir.html'  </script> ";

    }

    if (isset($_POST['rst_all_edt'])) {
        $sql = "UPDATE `edt` SET `l`='0',`ld`='0',`ma`='0',`mad`='0',`me`='0',`med`='0',`j`='0',`jd`='0',`v`='0',`vd`='0',`s`='0',`sd`='0' where 1";
        $result = mysqli_query($db_handle, $sql);

        $sql = "truncate table rdv";
        $result = mysqli_query($db_handle, $sql);
        echo " <script>  window.location.href='superPouvoir.html'  </script> ";

    }

    if (isset($_POST['rst_all_rdv'])) {
        $sql = "truncate table rdv";
        $result = mysqli_query($db_handle, $sql);


        $sql = "select l, ld, ma, mad, me, med, j, jd, v, vd, s, sd from edt where 1";
        $result = mysqli_query($db_handle, $sql);


        while ($data = mysqli_fetch_assoc($result)) {

            foreach ($data as $key => $value) {
                if ($value == 1) {
                    $data[$key] = 0;
                }
            }


// Maintenant, vous pouvez mettre à jour la base de données avec les nouvelles valeurs
            $update_sql = "UPDATE edt SET 
        l = {$data['l']}, 
        ld = {$data['ld']}, 
        ma = {$data['ma']}, 
        mad = {$data['mad']}, 
        me = {$data['me']}, 
        med = {$data['med']}, 
        j = {$data['j']}, 
        jd = {$data['jd']}, 
        v = {$data['v']}, 
        vd = {$data['vd']}, 
        s = {$data['s']}, 
        sd = {$data['sd']}
        where 1";

            $result_chnok = mysqli_query($db_handle, $update_sql);


        }
        echo " <script>  window.location.href='superPouvoir.html'  </script> ";
    }

} else echo "<script> alert('datatbase not found');</script>";

?>