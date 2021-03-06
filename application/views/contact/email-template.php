<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title></title>
        <style type="text/css">
            #outlook a{padding:0;} /* Force Outlook to provide a "view in browser" button. */
            body{width:100% !important; margin:0;} 
            body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */
            body{margin:0; padding:0;}
            img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
            table td{border-collapse:collapse;}
            #backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}
            /*@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700);  Loading Open Sans Google font */ 
            body, #backgroundTable{ background-color:#FFF; }
            .TopbarLogo{
            padding:10px;
            text-align:left;
            vertical-align:middle;
            }
            h1, .h1{
            color:#444444;
            display:block;
            font-family:Open Sans;
            font-size:35px;
            font-weight: 400;
            line-height:100%;
            margin-top:2%;
            margin-right:0;
            margin-bottom:1%;
            margin-left:0;
            text-align:left;
            }
            h2, .h2{
            color:#444444;
            display:block;
            font-family:Open Sans;
            font-size:30px;
            font-weight: 400;
            line-height:100%;
            margin-top:2%;
            margin-right:0;
            margin-bottom:1%;
            margin-left:0;
            text-align:left;
            }
            h3, .h3{
            color:#444444;
            display:block;
            font-family:Open Sans;
            font-size:24px;
            font-weight:400;
            margin-top:2%;
            margin-right:0;
            margin-bottom:1%;
            margin-left:0;
            text-align:left;
            }
            h4, .h4{
            color:#444444;
            display:block;
            font-family:Open Sans;
            font-size:18px;
            font-weight:400;
            line-height:100%;
            margin-top:2%;
            margin-right:0;
            margin-bottom:1%;
            margin-left:0;
            text-align:left;
            }
            h5, .h5{
            color:#444444;
            display:block;
            font-family:Open Sans;
            font-size:14px;
            font-weight:400;
            line-height:100%;
            margin-top:2%;
            margin-right:0;
            margin-bottom:1%;
            margin-left:0;
            text-align:left;
            }
            .textdark { 
            color: #444444;
            font-family: Open Sans;
            font-size: 13px;
            line-height: 150%;
            text-align: left;
            }
            .textwhite { 
            color: #fff;
            font-family: Open Sans;
            font-size: 13px;
            line-height: 150%;
            text-align: left;
            }
            .fontwhite { color:#fff; }
            .btn {
            background-color: #e5e5e5;
            background-image: none;
            filter: none;
            border: 0;
            box-shadow: none;
            padding: 7px 14px; 
            text-shadow: none;
            font-family: "Segoe UI", Helvetica, Arial, sans-serif;
            font-size: 14px;  
            color: #333333;
            cursor: pointer;
            outline: none;
            -webkit-border-radius: 0 !important;
            -moz-border-radius: 0 !important;
            border-radius: 0 !important;
            }
            .btn:hover, 
            .btn:focus, 
            .btn:active,
            .btn.active,
            .btn[disabled],
            .btn.disabled {  
            font-family: "Segoe UI", Helvetica, Arial, sans-serif;
            color: #333333;
            box-shadow: none;
            background-color: #d8d8d8;
            }
            .btn.red {
            color: white;
            text-shadow: none;
            background-color: #d84a38;
            }
            .btn.red:hover, 
            .btn.red:focus, 
            .btn.red:active, 
            .btn.red.active,
            .btn.red[disabled], 
            .btn.red.disabled {    
            background-color: #bb2413 !important;
            color: #fff !important;
            }
            .btn.green {
            color: white;
            text-shadow: none; 
            background-color: #35aa47;
            }
            .btn.green:hover, 
            .btn.green:focus, 
            .btn.green:active, 
            .btn.green.active,
            .btn.green.disabled, 
            .btn.green[disabled]{ 
            background-color: #1d943b !important;
            color: #fff !important;
            }
        </style>
    </head>
    <?php
        $protocol = strpos($_SERVER['SERVER_PROTOCOL'],'http') === TRUE ? 'https://' : 'http://';
    ?>
	<body>
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td style="padding-bottom:20px;">
                        <center>
                            <table border="0" cellpadding="0" cellspacing="0" width="600px" style="height:100%;">
                                <tr>
                                    <td valign="top" class="bodyContent">
                                        <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                            <tr>
                                                <td valign="top">
                                                    <br />
                                                    <div class="textdark">
                                                        <strong>Contact Us</strong> <br />
                                                        <h3>New Email</h3><br/>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tr>
                                                                <td style="width:40%">First Name</td>
                                                                <td>: <?=$first_name?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width:40%">Last Name</td>
                                                                <td>: <?=$last_name?></td>
                                                            </tr>                                                            
                                                            <tr>
                                                                <td style="width:40%">Email</td>
                                                                <td>: <?=$email_from?></td>
                                                            </tr>  
                                                            <tr>
                                                                <td style="width:40%">Website</td>
                                                                <td>: <?=$website?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width:40%">Subject</td>
                                                                <td>: <?=$subject?></td>
                                                            </tr> 
                                                            
                                                            <tr>
                                                                <td>Message</td>
                                                                <td>: <?=$message?>></td>
                                                            </tr>
                                                        </table>
                                                        </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </center>
                    </td>
                </tr>
            </table>
	</body>
</html>