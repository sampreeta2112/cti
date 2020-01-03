var data = [{"file_name":"460_Deed Of Sale.pdf","param1":"hey ","param2":"","param3":""}, {"file_name":"Krishay Report Cards and Certificates.pdf","param1":"","param2":"","param3":""}, {"file_name":"Oral Judgment.pdf","param1":"","param2":"hii","param3":""}, {"file_name":"Receipt.pdf","param1":"","param2":"","param3":""}, {"file_name":"Report 2.pdf","param1":"","param2":"","param3":""}, {"file_name":"Reports.pdf","param1":"","param2":"yh","param3":""}, {"file_name":"Sale Deed.pdf","param1":"","param2":"","param3":""}, {"file_name":"Undertaking.pdf","param1":"","param2":"sdsd","param3":""}, {"file_name":"deed of sale.pdf","param1":"","param2":"","param3":""}]
$(data)
    .filter(function (i,n){
        return n.file_name=='460_Deed Of Sale.pdf';
    });
//var s = "hello world!";
//if (s.match(/hello.*/)) {
  // do something
//}