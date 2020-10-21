<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    
<?php
// Official installation method is via composer and its packagist package mpdf/mpdf.
// $iimage=$_FILES['forma']['tmp_name'];
// $real_img=$_FILES['forma']['name'];
// $ composer require mpdf/mpdf
// The simplest usage (since version 7.0) of the library would be as follows:
require_once __DIR__ . '/vendor/autoload.php';
// Store the variables

$cname=$_POST['cname'];
$cDate=$_POST['cdate'];
$cdate=date("d-m-Y", strtotime($cDate));
$ename=$_POST['ename'];
$jtitle=$_POST['jtitle'];
$actc=$_POST['actc'];
$mname=$_POST['mname'];
$sDate=$_POST['sdate'];
$sdate=date("d-m-Y", strtotime($sDate));
$aDate=$_POST['adate'];
$adate=date("d-m-Y", strtotime($aDate));
$hname=$_POST['hname'];
$manual=$_POST['annexures'];
$real=$_FILES['forma']['name'];
 move_uploaded_file($_FILES['forma']['tmp_name'],"images/$real");

// $image=$_FILES['p_image']['tmp_name'];
// $real=$_FILES['p_image']['name'];
// $value="Products/".$real;
// move_uploaded_file($image,"Products/$real");



$mpdf=new \Mpdf\Mpdf();
// When declaring an instance of \Mpdf\Mpdf class, you can specify the (default) page size and orientation for the document.
$mpdf->SetDisplayMode('fullpage');
// $mpdf = new \Mpdf\Mpdf([
// 	'default_font_size' => 14,
// 	'default_font' => 'dejavusans'
// ]);
$cabecera = file_get_contents('./cabecera.html');
$cuerpo = file_get_contents('./cuerpo.html');
$pie = file_get_contents('./pie.html');

$mpdf->SetHTMLHeader($cabecera);//Sets an HTML page header
$mpdf->SetHTMLFooter($pie);//Sets an HTML page footer
if($real==="")
{
$name="images/1.jpeg";
}
else{
 $name="images/$real";
}
$mpdf->SetDefaultBodyCSS('background', "url($name)");//apply background image

$mpdf->SetDefaultBodyCSS('background-image-resize',6);//resizes the background image

$mpdf->WriteHTML($cuerpo, 2);
$data='';
// Initially set $data to null 
// Strts to concatenate
// $data.="<div style='height:18px; width:100%; background:#1F275A;'></div>";

$data.="<br><br><p style='visibility:hidden';>not acceptable, please contact me immediately. in which you may be
</p><div><br><p style='text-align:right;'>
<strong><u>Date:</u></strong> ".$cdate."</p><h1 style='text-align:center;'><strong style='font-size:22px;'>Offer Letter</strong></h1></div>";


$data.="<p style='font-size:15.5px;'>Dear <strong style='font-size:15.5px;'>".$ename."</strong>,<br><br><strong style='font-size:15.5px;'>Congratulations!</strong> We are pleased to confirm that you have been selected to work for <strong style='font-size:15.5px;'>".$cname.".</strong> We are
delighted to make you the following job offer:
<br><br>The position we are offering you is that of <strong style='font-size:15.5px;'>".$jtitle." </strong>with an annual cost to company of  <strong style='font-size:15.5px;'>".$actc."</strong>. This position
reports to  <strong style='font-size:15.5px;'>".$mname."</strong>.<br><br>
We would like you to start work on  <strong style='font-size:15.5px;'>".$sdate."</strong>. Please report to  <strong style='font-size:15.5px;'>".$mname."</strong> for documentation and orientation. If this date is
not acceptable, please contact me immediately. On joining, you will be invited to our HR tool (Opfin) in which you may be
required to upload your documents.<br><br>
Please sign the enclosed copy of this letter and return it to me by  <strong style='font-size:15.5px;'>".$adate."</strong> to indicate your acceptance of this offer.<br><br>
We are confident you will be able to make a significant contribution to the success of  <strong style='font-size:15.5px;'>".$cname.".</strong> and look
forward to working with you.
<br><br>
Sincerely,
<br>
<br>
<br>
<br> <strong style='font-size:15.5px;'>
".$hname."</strong><br> <strong style='font-size:15.5px;'>"
.$cname."</strong>.<br>
<br>
<br>
Accepted by,<br> <strong style='font-size:15.5px;'>
".$ename."</strong></p><br><br><br style='height:90px; visibility:hidden; '>";
if($jtitle==='Intern' && $manual==="" )//if employment type is intern
{
$data.="<p style='line-height:90px;'><br><br></p><br><br><br><br style='height:30px;'><br><p><strong><h2 style='text-align:center;'>Annexure A</h2></strong>
<strong style='font-size:18px; '><br>1. Posting & Transfer</strong><br>
<p style='font-size:15.5px;'>Your services are liable to be transferred, at the sole discretion of Management, in such other capacity as the company may
determine, to any department / section, location, associate, sister concern or subsidiary, at any place in India or abroad,
whether existing today or which may come up in future. In such a case, you will be governed by the terms and conditions of the
service applicable at the new placement location.</p>
<strong style='font-size:18px;'>2. Probation</strong><br>
<p style='font-size:15.5px;'>That you will be on probation for a period of six months. The period of probation can be extended at the discretion of the
Management and you will continue to be on probation till an order of confirmation has been issued in writing.</p>
<strong style='font-size:18px;'>3. Full time employment</strong>
<p style='font-size:15.5px;'>Your position is a whole time employment with the Company and you shall devote yourself exclusively to the business and
interests of the company. You will not take up any other work for remuneration (part time or otherwise) or work in an advisory
capacity, or be interested directly or indirectly (except as shareholder / debenture holder), in any other trade or business during
your employment with the company, without permission in writing of the Management of the Company. You will also not seek
membership of any local or public bodies without first obtaining specific permission from the Management.</p>
<strong style='font-size:18px;'>4. Confidentiality</strong>
<p style='font-size:15.5px;'>You will not, at any time, during the employment or after, without the consent of the Management disclose or divulge or make
public, except on legal obligations, any information regarding the Company’s affairs or administration or research carried out,
whether the same is confided to you or becomes known to you in the course of your service or otherwise.</p>
<strong style='font-size:18px;'>5. Intellectual Property</strong>
<p style='font-size:15.5px;'>If you conceive any new or advanced method of improving designs/ processes/ formulae/ </p>
<p style='visibility:hidden;'>You will not, at any time, during the employment or after, without the consent of the Management disclose or divulge or make
public, except on legal obligations, any information regarding the Company’s affairs or administration or research carried out,
whether the same is confided to you or becomes known to you in the course of your You will not, at any time, during the employment or after, without the consent of the Management disclose or divulge or make
public, except on legal obligations, any  any information regarding the Company’s affairs or administration or research carried out,
whether the same is confided to you or becomes knownany  any information regarding the Company’s affairs or administration or research carried out,
whether whether the same is confided to you or becomes knownany  any information regarding the Com</p><br>
<p style='font-size:15.5px;'>systems, etc. in relation to the
business/ operations of the Company, such developments will be fully communicated to the company and will be, and remain,
the sole right/ property of the Company. </p></p>";

$data.="<p>
<strong style='font-size:18px;'>6. Responsibilities & Duties</strong>
<p style='font-size:15.5px;'>Your work in the organization will be subject to the rules and regulations of the organization as laid down in relation to conduct,
discipline and other matters. You will always be alive to responsibilities and duties attached to your office and conduct yourself
accordingly. You must effectively perform to ensure results.</p>
<strong style='font-size:18px;'>7. Past Records</strong>
<p style='font-size:15.5px;'>This letter of appointment is based on the information furnished in your application for employment and during the interviews
you had with us. If any declaration given, or information furnished by you, to the company proves to be false, or if you are found
to have willfully suppressed any material information, in such cases, you will be liable to removal from services without any
notice.</p>
<strong style='font-size:18px;'>8. Termination of employment</strong><p style='font-size:15.5px;'>
During the probationary period and any extension thereof, your services may be terminated without giving any notice or salary in
lieu thereof. However, on confirmation the services can be terminated from either side by giving one month (30 days) notice or
salary in lieu thereof.
Upon resignation/termination of employment, you will immediately hand over to the Company all correspondence,
specifications, formulae, books, documents, market data, cost data, drawings, affects or records belonging to the Company or
relating to its business and shall not retain or make copies of these items.</p>
<p style='font-size:15.5px;'>Upon resignation/termination of employment, you will also return all company property, which may be in your possession.<br><br>
Notwithstanding the above condition, the contract of service may also be terminated because of under mentioned stipulations.<br>
This will be without payment of any compensation.</p>
<ul style='font-size:15.5px;'>
<li>If you fail, refuse or neglect to carry out and perform your duties assigned to you by the company.</li>
";
// To jump to next page added some junk statements and made visibility as hidden.
$data.="<p style='visibility:hidden';>ating to its business and shall not retain or make copies of these items.<br><br>
Upon resignation/termination of employment, you will also return all company property, which may be in your possession.<br><br>
rmination of employment, you will also rmination of employment, you will also Upon resignation/termination of employment, you will also return all company property, which may be in your possession.
.</p>

<li>For loss of confidence in you by the company for any of the act committed by you.</li>
<li>If you are found to be guilty of fraud, insubordination or misconduct whether in course of performance of duties entrusted
to you or otherwise.</li>
<li>If you are found unfit for being entrusted with the responsible work commensurate with your position in consequences of
any misconduct, moral turpitude. * If you commit any act prejudicial to the continuing good relationship between you and
the company.</li>
<li>If you commit breach of any of the terms of this letter of appointment.</li>

</ul>

<strong style='font-size:18px;'>9. Authority</strong>
<p style='font-size:15.5px;'>No authority is vested upon you to make any financial commitment and enter into agreements/contracts/understandings of any
nature with any second party and third party without seeking the prior permission/approval of the management. Any violation to
exceed your specified authority as mentioned will be seriously viewed and disciplinary/appropriate legal action will be taken.</p></p>";
}
else if($jtitle==='Part Time' && $manual==="")//else if employment type is 
{
    $data.="<p style='line-height:90px;'><br><br></p><br><br><br><br><br><p>
    <strong style='font-size:18px;'>Part time<br>Annexure A<br>1. Posting & Transfer</strong><br><br></p>";

}//else  employment type is fulltime
else if($jtitle==='Full Time' && $manual===""){
   
    $data.="<p style='line-height:90px;'><br><br></p><br><br><br><br><br><p>
    <strong style='font-size:18px;'>Full time<br>Annexure A<br>1. Posting & Transfer</strong><br><br></p>";
}
else
{
    
    $data.="<p style='visibility:hidden;'>nature with any second party and third party without seeking the prior permission/approval of the management. Any violation to
    exceed your specified authority as mentioned will be seriously viewed and disciplinary/appropriate legal action will be taken
    nature with any second party  as mentioned will be seriously viewed and disciplinary/appropriate legal action will be taken
    exceed your  action will be taken
    any second party and third party without seeking the prior permission/approval of the management. Any violation to
    legal action will be taken
    nature </p><br>";
    $data.="<p style='font-size:30px;'>$manual</p>";
    
}
$mpdf->WriteHTML($data);
// Write HTML code to the document
$employee_name=$ename." Offer letter";
$mpdf->Output("$employee_name.pdf","D");
// Name of the pdf
?>

</body>
</html>
