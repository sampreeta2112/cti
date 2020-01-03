<?php
include('dynamic.php');
$sth = RunQry("select * from files");
$rows = array();
while($r = mysqli_fetch_assoc($sth)) {
    $rows[] = $r;
}
$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($rows));
fclose($fp);
 $name='files.json';
    download($name);

    function download($name) {
        $file = $name;

        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
        }
    }
?>
