<?php
session_start() ;
$_SESSION['user'] = "";
$_SESSION['mdp'] ="";
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>FX Network</title>
    <link href="style_login.css" rel="stylesheet" type="text/css" />
</head>
<body>


<br/>
<br/>
<br/>

<br/> 
    <div id="content-container">   
        <div id="login-container">
            <div id="login-sub-container">
                <div id="login-sub-header">
                    <img src="logo.png" alt="logo" />
                </div>
                <div id="login-sub">
                    <div id="forms">

                        
                        <form id="login_form" action="controleur.php" method="post" target="_top">
                            <div class="input-req-login">Nom d'utilisateur :</div>
                            <div class="input-field-login icon username-container">
                                <input name="user" id="user" autofocus="autofocus" value="" placeholder="Entrez votre nom d'utilisateur." class="std_textbox" type="text"  tabindex="1">
                            </div>
                            <div style="margin-top:20px;" class="input-req-login">Mot de passe :</div>
                            <div class="input-field-login icon password-container">
                                <input name="mdp" id="mdp" placeholder="Entrez votre mot de passe." class="std_textbox" type="password" tabindex="2>
                            </div>
                            <div style="width: 285px;">
                                <div class="login-btn">
                                    <button name="login" type="submit" id="login_submit">Connectez-vous</button>
                                </div>

                                                            </div>
                            <div class="clear" id="push"></div>
                        </form>

                    
                    </div>

             
                </div>
            
            </div>
      
        </div>
        
        
       
    </div>

</div>

    <div class="copyright">Copyright © 2013 Fabien PAYET</div>

</body>

</html>
