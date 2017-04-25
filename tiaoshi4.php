<!--< ?php 
//QRcode::png($data,$filename,$errorCorrectionLevel,$matrixPotintSize,$margin);
//$ data 数据
//$ filename 保存的图片名称
//$errorCorrectionLevel 错误处理级别
//$matrixPointSize 每个黑点的像素
//$margin 图片外围的白色边框像素
include"/phpqecode/phpqrcode/qrlib.php";
$content="http://ccnu.edu.cn";
QRcode::png($content);
//QRcode::png($codeContents,$tempDir.'006_L.png',QR_ECLEVEL_L)
QRcode::png("SMSTO:+8613100000000:签到;","myduanxin","Q",7,3);
QRcode::png("我爱你","love.png","M",7,3);
QRcode::png("GEO:39.91713,116.400838,1","dizhi","M",7,3);
QRcode::png("MATMSG:TO:1820166258@qq.com;SUB:请假条;BODY:因为今夜要看世界杯，明天请假半天;","mail.png","M",7,3);
 ?>
<div style="margin: 50px;text-align:center;">
<img src="mynumber.png" border="1"/>
<img src="myduanxin" border="1"/>
<img src="love.png" border="1"/> 
<img src="dizhi" border="1"/>
<img src="mail.png" border="1" />
</div>

 -->
 <?php
 include "/phpqecode/phpqrcode/qrlib.php";
 QRcode::png("BEGIN:VCARD
  VERSION:3.0 
  FN:孙悟空
  ORG:水帘洞科技有限公司
  TITLE:高级项目经济
  ROLE:高级工程师
  PHOTO;VALUE=URL;
  TYPE=GIF:http://static.mukewang.com/static/img/logo_index.png 
  TEL;TYPE=WORK,VOICE:010-12121121
  TEL;TYPE=HOME,VOICE:010-12345678
  TEL;TYPE=CELL,VOICE:13813810000
  ADR;TYPE=WORK,POSTAL:北京市朝阳区;100859
  ADR;TYPE=HOME;POSTAL:花果山;100851
  EMALL;TYPE=PRER,INTERNET:wukong@huaguoshan.com
  REV:2014-07-30"
  END:VCARD","pic1.png","M",7,3)
  ?>