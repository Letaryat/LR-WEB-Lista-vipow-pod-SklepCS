<?php


empty( $Db->db_data['Vips'] ) && get_iframe( '012','Не найден мод - Vips  : /storage/cache/sessions/db.php' );


$res_vips = $Db->queryAll('Vips', 0, 0, "SELECT * FROM sklepcs_vip ORDER BY sklepcs_vip.koniec ASC" );
//$res_vips = $Db->queryAll('Vips', 0, 0, "SELECT vip_users.group, vip_users.account_id, vip_users.lastvisit, vip_users.expires FROM vip_users ORDER BY vip_users.group" );


$Modules->set_page_title( $General->arr_general['short_name'] . ' : ' . $Translate->get_translate_phrase('_Vips') );

$Modules->set_page_description( $General->arr_general['short_name'] . ' : ' . $Translate->get_translate_phrase('_Vips') );

function grouptell($group){
    if($group === "p"){
        echo "VIP";
    }
}

function substractdates($koniec){
    $datavip = $koniec;
    $dzisiaj = date("Y-m-d");
    $date1 = strtotime($dzisiaj);
    $date2 = strtotime($datavip);
    $hourDiff=round(abs($date2 - $date1) / (60*60*24),0);
    return $hourDiff;
}