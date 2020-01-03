<?php
include("dynamic.php");
$attach_id=$_GET['id'];
$filename=$_GET['filename'];
$query="delete from attachments where att_id=$attach_id";
$fileid=GetSingleValue("select file_id from attachments where att_id=$attach_id");
RunQry("delete from pdf where pdf_id='$fileid'");
RunQry($query);
unlink($filename);
?>