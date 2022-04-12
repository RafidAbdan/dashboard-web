<?php
require 'vendor/autoload.php';
$host ="localhost";
$user ="root";
$pass ="";
$db   ="list_lop";

$konek = mysqli_connect($host,$user,$pass,$db);


if(isset($_POST['submit'])){
        $err      = "";
        $ekstensi ="";
        $success  ="";

        $file_name = $_FILES['filexls']['name'];
        $file_data =$_FILES['filexls']['tmp_name'];

        if(empty($file_name)){
            $err .="<i>Silakan masukan data yang di inginkan</i>";
        }else{
            $ekstensi = pathinfo($file_name)['extension'];
        }

        $ekstensi_allowed = array("xls","xlsx");
        if(!in_array($ekstensi,$ekstensi_allowed)){
            $err .= "<li>Silakan masukan tipe file xls atau xlsx. 
            file yang kamu masukan <b>$file_name</b> mempunyai ekstensi <b>$ekstensi</b></li>";
        }
                        // Query
        if(empty($err)){
            $sql_hapus="DELETE FROM tb_list_lop";
            mysqli_query($konek,$sql_hapus);

            $sql_cek="SELECT ID_PROJECT FROM tb_list_lop";
            $cek=mysqli_query($konek,$sql_cek);

            if(mysqli_num_rows($cek) >0){
                echo"<b>gagal Import</b>";
            }else{
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file_data);
                $spreadsheet = $reader-> load($file_data);
                $sheetData = $spreadsheet -> getActiveSheet()->toArray();

                $jumlahData = 0;
                for($i=1;$i<count($sheetData);$i++){
                    $id_project = $sheetData[$i]['0'];
                    $project  = $sheetData[$i]['1'];
                    $nilai_project  = $sheetData[$i]['2'];
                    $nipnas  = $sheetData[$i]['3'];
                    $nama_cc  = $sheetData[$i]['4'];
                    $segment  = $sheetData[$i]['5'];
                    $wil_id  = $sheetData[$i]['6'];
                    $witel_ho = $sheetData[$i]['7'];
                    $divre_ho  = $sheetData[$i]['8'];
                    $estimasi_bulan_win  = $sheetData[$i]['9'];
                    $tipe_project  = $sheetData[$i]['10'];
                    $term_of_payment  = $sheetData[$i]['11'];
                    $progres_p1  = $sheetData[$i]['12'];
                    $parent  = $sheetData[$i]['13'];
                    $otc = $sheetData[$i]['14'];
                    $recc  = $sheetData[$i]['15'];
                    $termins  = $sheetData[$i]['16'];
                    $usage_based  = $sheetData[$i]['17'];
                    $menggunakan_mitra  = $sheetData[$i]['18'];
                    $tgl_submit_proposal  = $sheetData[$i]['19'];
                    $created_date  = $sheetData[$i]['20'];
                    $creatd_by = $sheetData[$i]['21'];
                    $last_update_date  = $sheetData[$i]['22'];
                    $last_update_by  = $sheetData[$i]['23'];
                    $last_status  = $sheetData[$i]['24'];
                    $status_quote  = $sheetData[$i]['25'];
                    $list_quote  = $sheetData[$i]['26'];
                    $estimasi_bc_pertama  = $sheetData[$i]['27'];
                    $lama_tahun_kontrak = $sheetData[$i]['28'];
                    $source_data  = $sheetData[$i]['29'];
                    $klasifikasi_layanan  = $sheetData[$i]['30'];
                    $nik_am  = $sheetData[$i]['31'];
                    $nama_am  = $sheetData[$i]['32'];
                    $email_am  = $sheetData[$i]['33'];
                    $kategori_produk  = $sheetData[$i]['34'];
                    $layanan_telkom = $sheetData[$i]['35'];
                    $progress_lesson_learned  = $sheetData[$i]['36'];
                    $kategori_lop  = $sheetData[$i]['37'];
                    $est_gros_profit  = $sheetData[$i]['38'];
                    $level_confidence  = $sheetData[$i]['39'];
                    $kategori_kontrak  = $sheetData[$i]['40'];
                    $estimasi_q1_currentyear  = $sheetData[$i]['41'];
                    $estimasi_q2_currentyear = $sheetData[$i]['42'];
                    $estimasi_q3_currentyear  = $sheetData[$i]['43'];
                    $estimasi_q4_currentyear  = $sheetData[$i]['44'];
                    $estimasi_curr_year  = $sheetData[$i]['45'];
                    $estimasi_curr_year_p1  = $sheetData[$i]['46'];
                    $estimasi_curr_year_p2  = $sheetData[$i]['47'];
                    $estimasi_curr_year_p3  = $sheetData[$i]['48'];
                    $estimasi_curr_year_p4 = $sheetData[$i]['49'];
                    $estimasi_curr_year_p5  = $sheetData[$i]['50'];
                    $justifikasi_p0_file  = $sheetData[$i]['51'];
                    $ba_kesepakatan_ngtma  = $sheetData[$i]['52'];
                    $kompetitor  = $sheetData[$i]['53'];
                    $jenis_pengadaan  = $sheetData[$i]['54'];
                    $source_order  = $sheetData[$i]['55'];
                    $shared_sustain = $sheetData[$i]['56'];
                    $input_by  = $sheetData[$i]['57'];
                    $list_mitra  = $sheetData[$i]['58'];
                    $layanan_mitra  = $sheetData[$i]['59'];
                    $list_am  = $sheetData[$i]['60'];
                    $progress_po  = $sheetData[$i]['61'];
                    $foto_evident  = $sheetData[$i]['62'];
                    $agent_principal = $sheetData[$i]['63'];
                    $umur_lop  = $sheetData[$i]['64'];  

                    $project_result = preg_replace('/[^a-zA-Z0-9_ -]/s','',$project); 

                    $sql ="INSERT INTO tb_list_lop(ID_PROJECT,PROJECT,NILAI_PROJECT,NIPNAS,NAMA_CC,SEGMENT,WIL_ID,WITEL_HO,DIVRE_HO,ESTIMASI_BULAN_WIN,TIPE_PROJECT,TERM_OF_PAYMENT,PROGRESS_P1,PARENT,OTC,RECC,TERMINS,USAGE_BASED,MENGGUNAKAN_MITRA,TGL_SUBMIT_PROPOSAL,CREATED_DATE,CREATED_BY,LAST_UPDATE_DATE,LAST_UPDATE_BY,LAST_STATUS,STATUS_QUOTE,LIST_QUOTE,ESTIMASI_BC_PERTAMA,LAMA_TAHUN_KONTRAK,SOURCE_DATA,KLASIFIKASI_LAYANAN,NIK_AM,NAMA_AM,EMAIL_AM,KATEGORI_PRODUK,LAYANAN_TELKOM,PROGRESS_LESSON_LEARNED,KATEGORI_LOP,EST_GROSS_PROFIT,LEVEL_CONFIDENCE,KATEGORI_KONTRAK,ESTIMASI_Q1_CURRENTYEAR,ESTIMASI_Q2_CURRENTYEAR,ESTIMASI_Q3_CURRENTYEAR,ESTIMASI_Q4_CURRENTYEAR,ESTIMASI_CURR_YEAR,ESTIMASI_CURR_YEAR_P1,ESTIMASI_CURR_YEAR_P2,ESTIMASI_CURR_YEAR_P3,ESTIMASI_CURR_YEAR_P4,ESTIMASI_CURR_YEAR_P5,JUSTIFIKASI_P0_FILE,BA_KESEPAKATAN_NGTMA,KOMPETITOR,JENIS_PENGADAAN,SOURCE_ORDER,SHARED_SUSTAIN,INPUT_BY,LIST_MITRA,LAYANAN_MITRA,LIST_AM,PROGRESS_P0,FOTO_EVIDENT,AGENT_PRINCIPAL,UMUR_LOP) VALUE
                    ('$id_project','$project_result','$nilai_project','$nipnas','$nama_cc','$segment','$wil_id',' $witel_ho','$divre_ho','$estimasi_bulan_win',' $tipe_project','$term_of_payment','$progres_p1','$parent','$otc','$recc','$termins','$usage_based','$menggunakan_mitra','$tgl_submit_proposal','$created_date ','$creatd_by',' $last_update_date','$last_update_by','$last_status','$status_quote','$list_quote','$estimasi_bc_pertama','$lama_tahun_kontrak','$source_data','$klasifikasi_layanan ','$nik_am','$nama_am',' $email_am','$kategori_produk','$layanan_telkom','$progress_lesson_learned','$kategori_lop','$est_gros_profit','$level_confidence','$kategori_kontrak','$estimasi_q1_currentyear','$estimasi_q2_currentyear','$estimasi_q3_currentyear','$estimasi_q4_currentyear','$estimasi_curr_year','$estimasi_curr_year_p1','$estimasi_curr_year_p2','$estimasi_curr_year_p3','$estimasi_curr_year_p4','$estimasi_curr_year_p5','$justifikasi_p0_file','$ba_kesepakatan_ngtma','$kompetitor','$jenis_pengadaan','$source_order','$shared_sustain','$input_by','$list_mitra','$layanan_mitra','$list_am','$progress_po','$foto_evident','$agent_principal','$umur_lop')";

                        mysqli_query($konek,$sql);

                        $jumlahData++;
                    
                        if($jumlahData > 0){
                            $success = "$jumlahData Berhasil dimasukan ke mysql";
                        }
                            
                        
                }
            }
        }
                
        if($err){
            ?>
            <div class="alert alert-danger">
                <ul><?php echo $err?></ul>
            </div>
            <?php
        }

        if($success){
            ?>
            <div class="alert alert-primary">
                <?php echo $success?>
            </div>
            <?php
        }
        if($berhasil){
            ?>
            <div class="alert alert-primary">
                <?php echo $berhasil?>
            </div>
            <?php
        }
}




// bahan
// mereplace Database
                
            //     $cek = mysqli_query($konek, "SELECT ID_PROJECT FROM tb_list_lop WHERE ID_PROJECT");
            //     $jumlahupdate = 0;
            //     if(mysqli_num_rows($cek) > 0){
            //         $replace_sql = "UPDATE tb_list_lop SET 
            //         PROJECT='$project'
            //         NILAI_PROJECT='$nilai_project'
            //         NIPNAS='$nipnas'
            //         NAMA_CC='$nama_cc'
            //         SEGMENT='$segment'
            //         WIL_ID='$wil_id'
            //         WITEL_HO='$witel_ho'
            //         DIVRE_HO='$divre_ho'
            //         ESTIMASI_BULAN_WIN='$estimasi_bulan_win'
            //         TIPE_PROJECT='$tipe_project'
            //         TERM_OF_PAYMENT='$term_of_payment'
            //         PROGRESS_P1='$progres_p1'
            //         PARENT='$parent'
            //         OTC='$otc'
            //         RECC='$recc'
            //         TERMINS='$termins'
            //         USAGE_BASED='$usage_based'
            //         MENGGUNAKAN_MITRA='$menggunakan_mitra'
            //         TGL_SUBMIT_PROPOSAL='$tgl_submit_proposal'
            //         CREATED_DATE='$created_date'
            //         CREATED_BY='$creatd_by'
            //         LAST_UPDATE_DATE='$last_update_date'
            //         LAST_UPDATE_BY='$last_update_by'
            //         LAST_STATUS='$last_status'
            //         STATUS_QUOTE='$status_quote'
            //         LIST_QUOTE='$list_quote'
            //         ESTIMASI_BC_PERTAMA='$estimasi_bc_pertama'
            //         LAMA_TAHUN_KONTRAK='$lama_tahun_kontrak'
            //         SOURCE_DATA='$source_data'
            //         KLASIFIKASI_LAYANAN='$klasifikasi_layanan'
            //         NIK_AM,='$nik_am'
            //         NAMA_AM='$nama_am'
            //         EMAIL_AM='$email_am'
            //         KATEGORI_PRODUK='$kategori_produk'
            //         LAYANAN_TELKOM='$layanan_telkom'
            //         PROGRESS_LESSON_LEARNED='$progress_lesson_learned'
            //         KATEGORI_LOP='$kategori_lop'
            //         EST_GROSS_PROFIT='$est_gros_profit'
            //         LEVEL_CONFIDENCE='$level_confidence'
            //         KATEGORI_KONTRAK='$kategori_kontrak'
            //         ESTIMASI_Q1_CURRENTYEAR=$estimasi_q1_currentyear'
            //         ESTIMASI_Q2_CURRENTYEAR='$estimasi_q2_currentyear'
            //         ESTIMASI_Q3_CURRENTYEAR='$estimasi_q3_currentyear'
            //         ESTIMASI_Q4_CURRENTYEAR='$estimasi_q4_currentyear'
            //         ESTIMASI_CURR_YEAR='$estimasi_curr_year'
            //         ESTIMASI_CURR_YEAR_P1='$estimasi_curr_year_p1'
            //         ESTIMASI_CURR_YEAR_P2='$estimasi_curr_year_p2'
            //         ESTIMASI_CURR_YEAR_P3='$estimasi_curr_year_p3'
            //         ESTIMASI_CURR_YEAR_P4='$estimasi_curr_year_p4'
            //         ESTIMASI_CURR_YEAR_P5='$estimasi_curr_year_p5'
            //         JUSTIFIKASI_P0_FILE='$justifikasi_p0_file'
            //         BA_KESEPAKATAN_NGTMA='$ba_kesepakatan_ngtma'
            //         KOMPETITOR='$kompetitor'
            //         JENIS_PENGADAAN='$jenis_pengadaan'
            //         SOURCE_ORDER='$source_order'
            //         SHARED_SUSTAIN='$shared_sustain'
            //         INPUT_BY='$input_by'
            //         LIST_MITRA='$list_mitra'
            //         LAYANAN_MITRA='$layanan_mitra'
            //         LIST_AM='$list_am'
            //         PROGRESS_P0='$progress_po'
            //         FOTO_EVIDENT='$foto_evident'
            //         AGENT_PRINCIPAL='$agent_principal'
            //         UMUR_LOP='$umur_lop'
            //         WHERE ID_PROJECT='$id_project'
            //         ";
            //         mysqli_query($konek,$replace_sql);

            //         $jumlahupdate++;
            //         if($jumlahupdate > 0){
            //             $berhasil = "$jumlahupdate Berhasil dimasukan ke mysql";
            //         }
            //     }
            // }    
                
                // $gender = str_replace(array("Female","Male"),array("P","L") ,$gender);

                // $date_explode = explode("/",$date);
                // $date = $date_explode['2']."-".$date_explode['1']."-".$date_explode['0'];

            

        