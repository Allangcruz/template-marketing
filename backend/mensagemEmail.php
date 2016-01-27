<?php 

//mudar referencia de url de imagens e pdf

$mensagem = '
		<table width="100%" cellspacing="0" cellpadding="0" border="0" style="border:solid 1px #ffffff;border-radius:0px;font-family:Helvetica,Arial,Verdana,sans-serif;font-size:14px">
		   <tbody>
		      <tr>
		         <td width="1%">&nbsp;</td>
		         <td width="98%" valign="top" align="center">
		            <table width="680" cellspacing="0" cellpadding="0" border="0">
		               <tbody>
		                  <tr>
		                     <td style="padding:0 35px 0 40px;background-color:#ffffff;">
		                        <table style="color:#424343;font-size:12px;border:0px" cellspacing="0" cellpadding="10">
		                           <tbody>
		                              <tr>
		                                 <td width="100%" style="padding-top:25px;font-size:18px;color:#4f4f4f;padding-bottom: 0;" align="center"> Obrigado por baixar nosso</td>
		                              </tr>

		                              <tr>
		                                 <td width="100%" style="font-size:24px;font-weight:bold;margin-top: 0;padding-top: 0;color:#5695e2;font-weight: bold;" align="center">eBook Gestão de Representantes Comerciais</td>
		                              </tr>
		                             
		                              <tr>
		                                 <td style="padding-bottom:25px;" align="center">
		                                 	<img style="margin-left:10%;" width="70%" src="http://allangcruz.com.br/ebook-de-marketing/assets/img/ebook.png" alt="eBook - Gestão de Representantes">
		                                 </td>
		                              </tr>                              

		                              <tr>
		                                 <td align="center">
		                                 	<a href="http://allangcruz.com.br/ebook-de-marketing/assets/pdf/ebook.pdf" style="display: inline-block;background-color: #f7a100;color: #ffffff;padding: 14px 80px;text-decoration: none;box-sizing: border-box;font-family: Helvetica, Arial, sans-serif;font-size: 24px;border: 0px;border-radius:4px;margin-bottom:30px;">ACESSAR EBOOK</a>
		                                 </td>
		                              </tr>

		                              <tr>
		                                 <td width="100%" align="left" style="background-color: #f3f3f3;">
		                                    <table width="100%" cellpadding="0" cellspacing="0" style="color:#8c8c8c;border-bottom:0px solid #cecece;padding:20px 5px;font-size:14px">
		                                       <tbody>
		                                          <tr>
		                                             <td align="left" width="100%">
		                                             	<a href="javascript:;"><img alt="Facebook" src="http://allangcruz.com.br/ebook-de-marketing/assets/img/facebook.png"></a>&nbsp;&nbsp;&nbsp;
														<a href="javascript:;"><img alt="Linkedin" src="http://allangcruz.com.br/ebook-de-marketing/assets/img/linkedin.png"></a>
		                                             </td>
		                                          </tr>
		                                       </tbody>
		                                    </table>
		                                 </td>
		                              </tr>
		                           </tbody>
		                        </table>

		                     </td>
		                  </tr>
		               </tbody>
		            </table>
		         </td>
		         <td width="1%">&nbsp;</td>
		      </tr>
		   </tbody>
		</table>';


//função que envia o dados para o dono do ebook com os do usuario que deseja baixa o eBook
function enviaDadosDoUsuario($nome, $email, $telefone)
{
	$mensagem = '<strong>Nome: '.$nome.'</strong><br>';
	$mensagem .= '<strong>E-mail: '.$email.'</strong><br>';
	$mensagem .= '<strong>Telefone: '.$telefone.'</strong><br>';

	$mail = new PHPMailer;
	$mail->isSMTP();                                      
	$mail->CharSet = "utf-8"; 
	$mail->Port = 25;                                    

	$mail->Host = 'mail.allangcruz.com.br';  
	$mail->SMTPAuth = true;                             
	$mail->Username = 'teste@allangcruz.com.br';              
	$mail->Password = 'teste123';    

	$mail->SMTPOptions = array(
	    'ssl' => array(
	        'verify_peer' => false,
	        'verify_peer_name' => false,
	        'allow_self_signed' => true
	    )
	);

	//dados de envid do formulario
	$mail->setFrom('teste@allangcruz.com.br', 'Allan Gonçalves da Cruz');
	$mail->addAddress('teste@allangcruz.com.br', 'Allan Gonçalves da Cruz');
	$mail->isHTML(true);
	$mail->Subject = 'Novo usuario';

	$mail->Body    = $mensagem;

	//enviar o e-mail
	if(!$mail->send()) {
		echo $mail->ErrorInfo;
	}

}