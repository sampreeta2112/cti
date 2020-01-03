<?php
include("dynamic.php");
$attach_id=$_GET['id'];
//$filename=$_GET['filename'];
$query="delete from attachments where att_id=$attach_id";
$fileid=GetSingleValue("select file_id from attachments where att_id=$attach_id");
$pageno=GetSingleValue("select page_no from attachments where att_id=$attach_id");
RunQry("UPDATE `attachments` set page_no=page_no-1 where file_id=$fileid and page_no>$pageno");
RunQry("delete from pdf where pdf_id='$fileid'");
RunQry($query);
unlink($filename);
?>