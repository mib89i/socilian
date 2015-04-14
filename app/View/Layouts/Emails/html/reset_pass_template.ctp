<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html lang="pt-BR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="initial-scale=1.0">    <!-- So that mobile webkit will display zoomed in -->
    <meta name="format-detection" content="telephone=no"> <!-- disable auto telephone linking in iOS -->

    <title>Antwort - responsive Email Layout</title>
    <style type="text/css">

        /* Resets: see reset.css for details */
        .ReadMsgBody { width: 100%; background-color: #ebebeb;}
        .ExternalClass {width: 100%; background-color: #ebebeb;}
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height:100%;}
        body {-webkit-text-size-adjust:none; -ms-text-size-adjust:none;}
        body {margin:0; padding:0;}
        table {border-spacing:0;}
        table td {border-collapse:collapse;}
        .yshortcuts a {border-bottom: none !important;}


        /* Constrain email width for small screens */
        @media screen and (max-width: 600px) {
            table[class="container"] {
                width: 95% !important;
            }
        }

        /* Give content more room on mobile */
        @media screen and (max-width: 480px) {
            td[class="container-padding"] {
                padding-left: 12px !important;
                padding-right: 12px !important;
            }
        }


        /* Styles for forcing columns to rows */
        @media only screen and (max-width : 600px) {

            /* force container columns to (horizontal) blocks */
            td[class="force-col"] {
                display: block;
                padding-right: 0 !important;
            }
            table[class="col-3"] {
                /* unset table align="left/right" */
                float: none !important;
                width: 100% !important;

                /* change left/right padding and margins to top/bottom ones */
                margin-bottom: 12px;
                padding-bottom: 12px;
                border-bottom: 1px solid #eee;
            }

            /* remove bottom border for last column/row */
            table[id="last-col-3"] {
                border-bottom: none !important;
                margin-bottom: 0;
            }

            /* align images right and shrink them a bit */
            img[class="col-3-img"] {
                float: right;
                margin-left: 6px;
                max-width: 130px;
            }
        }

		.btn_clique {
			-moz-box-shadow:inset 0px 1px 0px 0px #97c4fe;
			-webkit-box-shadow:inset 0px 1px 0px 0px #97c4fe;
			box-shadow:inset 0px 1px 0px 0px #97c4fe;
			background-color:#3d94f6;
			-webkit-border-top-left-radius:5px;
			-moz-border-radius-topleft:5px;
			border-top-left-radius:5px;
			-webkit-border-top-right-radius:5px;
			-moz-border-radius-topright:5px;
			border-top-right-radius:5px;
			-webkit-border-bottom-right-radius:5px;
			-moz-border-radius-bottomright:5px;
			border-bottom-right-radius:5px;
			-webkit-border-bottom-left-radius:5px;
			-moz-border-radius-bottomleft:5px;
			border-bottom-left-radius:5px;
			text-indent:0;
			border:1px solid #337fed;
			display:inline-block;
			color:#ffffff;
			font-family:Arial;
			font-size:13px;
			font-weight:bold;
			font-style:normal;
			height:43px;
			line-height:43px;
			width:260px;
			text-decoration:none;
			text-align:center;
			text-shadow:1px 1px 0px #1570cd;
		}.btn_clique:hover {
			background-color:#1e62d0;
		}.btn_clique:active {
			position:relative;
			top:1px;
		}
    </style>
</head>
<body style="margin:0; padding:10px 0;" bgcolor="#ebebeb" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<br />

<!-- 100% wrapper (grey background) -->
<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#ebebeb">
  <tr>
    <td align="center" valign="top" bgcolor="#ebebeb" style="background-color: #ebebeb;">

      <!-- 600px container (white background) -->
      <table border="0" width="600" cellpadding="0" cellspacing="0" class="container" bgcolor="#ffffff">
        <tr>
          <td class="container-padding" bgcolor="#ffffff" style="background-color: #ffffff; padding-left: 30px; padding-right: 30px; font-size: 13px; line-height: 20px; font-family: Helvetica, sans-serif; color: #333;" align="left">
            <br />

            <!-- ### BEGIN CONTENT ### -->

            <div style="font-weight: bold; font-size: 18px; line-height: 24px; color: #D03C0F;">
            	Recuperação de senha
            </div>
            <br />
        </td>
    </tr>
    <tr>
        <td class="container-padding" bgcolor="#ffffff" style="background-color: #ffffff; padding-left: 30px; padding-right: 30px; font-size: 13px; line-height: 20px; font-family: Helvetica, sans-serif; color: #333;" align="left">
            Uma recuperação de senha foi solicitada ao site, caso não tenha sido você ignore esse email.
            <br /><br />

            <div style="font-weight: bold; font-size: 18px; line-height: 24px; color: #D03C0F; border-top: 1px solid #ddd;"><br />Para concluir a alteração</div>
            <br />

            <a href="<?php echo $v_confirm_reset; ?>" class="btn_clique">Clique aqui para confirmar a alteração</a>
            
            <br /><br />
          </td>
        </tr>
      </table>
      <!--/600px container -->
    </td>
  </tr>
</table>
<!--/100% wrapper-->
<br />
<br />
</body>
</html>