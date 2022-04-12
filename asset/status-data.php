<?php
$sts_cnl = "SELECT COUNT(*) FROM tb_list_lop WHERE LAST_STATUS LIKE '%CANCEL%'";
$sts_lose = "SELECT COUNT(*) FROM tb_list_lop WHERE LAST_STATUS LIKE '%LOSE%'";
$sts_bdg = "SELECT COUNT(*) FROM tb_list_lop WHERE LAST_STATUS LIKE '%BIDDING%'";
$sts_prs = "SELECT COUNT(*) FROM tb_list_lop WHERE LAST_STATUS LIKE '%PROSPECT%'";
$sts_prss = "SELECT COUNT(*) FROM tb_list_lop WHERE LAST_STATUS LIKE '%PROPOSAL%'";
$cancel = query($sts_cnl);
$lose = query($sts_lose);
$bidding =query($sts_bdg);
$prospect =query($sts_prs);
$proposal =query($sts_prss);
// $data =$cancel.$lose.$bidding.$prospect.$proposal;
$jmlh ="SELECT SUM(NILAI_PROJECT) AS jumlahLOP FROM tb_list_lop";
$total ="SELECT COUNT(*) FROM tb_list_lop ";
$total =query($total);
$jumlah = query($jmlh);
?>