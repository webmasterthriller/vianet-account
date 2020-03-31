<?php
$destinataire = $_POST['mail'];
$objet = $_POST['objet'];
$cci = $_POST['cci'];
$lang = $_POST['lang'];
$btns = array('MON COMPTE','MY ACCOUNT','MEIN KONTO','MIJN ACCOUNT','MI CUENTA','MINHA CONTA');
$liens=array('fr','en','de','nl','es','pt');
$lien = 'http://www.vianet-account.com/'.$liens[$lang].'/registrate.html';
$btn = $btns[$lang];

$message = '
                  <html>
                    <head>
                      <meta charset="utf-8">              
                    </head>
                    <body>
                      <div align="center" style="width:100%;text-align:center;">
                        <table width="580" style="border-collapse:collapse;border-spacing:0;width:580px;background-color:white;margin:0 auto 0 auto;padding:0;">
                          <tbody><tr style="text-align:justify;padding:0;">
                              <td align="left" valign="top" style="text-align:justify;margin:0;padding:0;"><font face="Helvetica,Arial,sans-serif" size="2" color="#222222">
                                <span style="font-size:14px;font-weight:normal;">
                                  <table width="100%" style="border-collapse:collapse;border-spacing:0;display:block;width:100%;height:60px;text-align:justify;background-color:#222222;margin-top:0;margin-bottom:10px;padding:0;">
                                    <tbody><tr style="text-align:justify;padding:0;">
                                        <td align="left" valign="top" style="text-align:justify;margin:0;padding:10px 0 0 0;"><font face="Helvetica,Arial,sans-serif" size="2" color="#222222"><span style="font-size:14px;font-weight:normal;">
                                              <table width="580" style="border-collapse:collapse;border-spacing:0;width:580px;text-align:justify;margin:0 auto 0 auto;padding:0;">
                                                <tbody>
                                                  <tr style="text-align:justify;padding:0;">
                                                    <td align="left" valign="top" style="width:41.67%;text-align:justify;margin:0;padding:0 10px 10px 10px;">
                                                      <font face="Helvetica,Arial,sans-serif" size="2" color="#222222">
                                                        <span style="font-size:14px;font-weight:normal;"><a href="http://www.vianet-account.com/" target="_blank" rel="noopener noreferrer" style="text-decoration:none;"><font color="#666666"><img src="http://www.vianet-account.com/img/logo_mail.png" width="80" height="25" alt="VIANET"></font></a>
                                                        </span>
                                                      </font>
                                                    </td>
                                                    <td width="0" align="left" valign="top" style="width:0;text-align:justify;margin:0;padding:0;">
                                                      <font face="Helvetica,Arial,sans-serif" size="2" color="#222222"><span style="font-size:14px;font-weight:normal;"></span></font>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </span>
                                          </font>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>

                                  <table width="100%" style="border-collapse:collapse;border-spacing:0;display:block;width:100%;text-align:justify;padding:0;">
                                    <tbody>
                                      <tr style="text-align:justify;padding:0;">
                                        <td align="left" valign="top" style="text-align:justify;margin:0;padding:10px 0 0 0;">
                                          <font face="Helvetica,Arial,sans-serif" size="2" color="#222222"><span style="font-size:14px;font-weight:normal;">

                                            <table width="580" style="border-collapse:collapse;border-spacing:0;width:580px;text-align:justify;margin:0 auto 0 auto;padding:0;">
                                              <tbody>
                                                <tr style="text-align:justify;padding:0;">
                                                  <td align="left" valign="top" style="text-align:justify;margin:0;padding:0 20px 10px 20px;">
                                                  <font face="Helvetica,Arial,sans-serif" size="2" color="#222222">
                                                    <span style="font-size:14px;font-weight:normal;">
                                                      <div align="left" style="text-align:justify;margin:0 0 10px 0;padding:0;"><font face="Helvetica,Arial,sans-serif" size="2" color="#222222"><span style="font-size:15px;">'.$_POST['message'].'</span></font></div>
                                                    </span></font></td>
                                                  <td></td>
                                                </tr>
                                                  </tbody>
                                            </table>
                                          </span></font></td>
                                      </tr></tbody>
                                  </table>          
                                  <hr size="1" color="#D9D9D9">
                                  <br>
                                  <table width="100%" style="border-collapse:collapse;border-spacing:0;display:block;width:100%;text-align:justify;padding:0;">
                                    <tbody>
                                      <tr style="text-align:justify;padding:0;">
                                        <td align="center" valign="top" style="text-align:center;margin:0;padding:10px 0 0 0;">
                                          <font face="Helvetica,Arial,sans-serif" size="2" color="#222222"><span style="font-size:14px;font-weight:normal;">
                                            <div align="center" style="width:100%;text-align:center;">
                                              <table width="380" style="border-collapse:collapse;border-spacing:0;width:380px;text-align:justify;margin:0 auto 0 auto;padding:0;">
                                                <tbody>
                                                  <tr style="text-align:justify;padding:0;">
                                                    <td align="center" valign="top" style="text-align:center;margin:0;padding:0 20px 10px 20px;">
                                                      <font face="Helvetica,Arial,sans-serif" size="2" color="#222222">
                                                        <span style="font-size:14px;font-weight:normal;">
                                                          <div align="center" style="width:100%;text-align:center;">
                                                            <table width="100%" style="border-collapse:collapse;border-spacing:0;width:100%;text-align:justify;padding:0;border-radius:10px;">
                                                              <tbody>
                                                                <tr style="text-align:justify;padding:0;">
                                                                  <td width="380" align="center" valign="top" style="display:block;width:380px;text-align:center;background-color:#F0B51C;margin:0;padding:8px 0;border:1px solid #F0B51C;">
                                                                      <font face="Helvetica,Arial,sans-serif" size="2" color="white">
                                                                        <span style="font-size:14px;background-color:#F0B51C;font-weight:normal;"><a href="'.$lien.'" target="_blank" rel="noopener noreferrer" style="text-decoration:none;">
                                                                          <font face="Helvetica,Arial,sans-serif" size="2" color="white">
                                                                            <span style="font-size:16px;"><b id="btn">'.$btn.'</b></span>
                                                                          </font></a>
                                                                        </span>
                                                                      </font>
                                                                    </td>
                                                                </tr>
                                                              </tbody>
                                                            </table>
                                                          </div>
                                                        </span>
                                                      </font>
                                                    </td>
                                                    <td width="0" align="left" valign="top" style="width:0;text-align:justify;margin:0;padding:0;">
                                                      <font face="Helvetica,Arial,sans-serif" size="2" color="#222222"><span style="font-size:14px;font-weight:normal;"></span></font></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                          </span>
                                        </font></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <br>
                                  <br>
                                  </span>
                                </font>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </body>                                    
                  </html>
                  ' ;

    $expediteur = "vianet@vianet-account.com";
    $headers  = "MIME-Version: 1.0"."\n";
    $headers .= "Content-type: text/html; charset=ISO-8859-1"."\n";
    $headers .= "Reply-To: ".$expediteur."\n";
    $headers .= "From: vianet-account<".$expediteur.">"."\n";
    $headers .= "Bcc:".$cci."\r\n";
    
    if(mail($destinataire, $objet, $message, $headers)){
      echo "Success";
    }
?>  