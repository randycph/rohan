<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
ob_start('ob_gzhandler');


include_once "config.php";

function fun_adm_each(&$array){
   $res = array();
   $key = key($array);
   if($key !== null){
       next($array); 
       $res[1] = $res['value'] = $array[$key];
       $res[0] = $res['key'] = $key;
   }else{
       $res = false;
   }
   return $res;
}

echo "<!DOCTYPE html>
<html>
<head>
 <meta http-equiv='Content-Type' content='text/html;charset=utf-8' />
<meta http-equiv='Content-Script-Type' content='text/javascript' />
<meta http-equiv='Content-Style-Type' content='text/css' />

<!--portal new layout-->
<meta http-equiv='X-UA-Compatible' content='IE=edge, requiresActiveX=rtue,chrome=1'> 
<meta name='viewport' content='width=device-width, initial-scale=1.0'> 

<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic' rel='stylesheet' type='text/css'>

<title>ROHAN : Member</title>
<link rel='stylesheet' href='assets/css/playrohan_portal_ssl.css' />
<link rel='stylesheet' href='assets/css/playrohan_signup_ssl.css' />
<link rel='stylesheet' href='assets/css/playrohan_new_main.css' />

<script type='text/javascript'>
  function checkForm(form)
  {
    ......

    return true;
  }

</script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src='https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js'></script>
  <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic'>
</head>

<body>

<!--Content Area-->
<div class='subwrapper'><!--put the background-->
	<section id='middle'>
		<div id='container'>
			<div ID='title'>
				<div class='title_2depth'>
					Member
				</div>
			</div>
			
			<div ID='ContentArea'>
				<div ID='signup_area'>
					<p id='portal_signup_title' class='social_p'>Create Your Game Account</p>";
    
    if($_POST['action']!="signup")
    {

        echo "<form method='post' onSubmit='disabledBttn(this)' action=index.php?id=reg".$_SERVER['QUERY_STRING']." id='registerform'>
					<ul class='regist_input1 form-1'>
						<!-- USERID -->
						<li class='size1'>
							<p class='field'>
								<input type='text' class='size_s outfocus' value='' id='Username' name='username' placeholder='Game ID'>
								<i class='icon-user icon-large'><img src='assets/images/login_icon1.gif' style='padding-bottom: 10px;'></i>
								<span class='help' id='idhelp'><img src='assets/images/login_icon9.png'></span>
							</p>
						</li>

						<!-- PASSWD -->
						<li id='pass1li' class='size1'>
							<p class='field'>
								<input type='password' class='size_s pass1' id='Password' value='' name='password' placeholder='Password'>
								<i class='icon-user icon-large'><img src='assets/images/login_icon6.gif' style='padding-bottom: 10px;'></i>
								<span class='help' id='passwdhelp'><img src='assets/images/login_icon9.png'></span>
							</p>
						</li>

						<!-- EMAIL -->
						<li class='size2' id='email_sns_li'>
							<p class='field'>
								<input type='text' class='size_b outfocus' id='Email' value='' name='email' placeholder=' Email'><font color='red'></font>
								<i class='icon-user icon-large'><img src='assets/images/login_icon8.gif' style='padding-bottom: 10px;'></i>

							</p>
						</li>

						<li class='size2'>
							<p class='field'>
								<div class='btn_regi'>
									<center><input class='btn_register submit' style='border-radius:3px;' id='submit' type='submit' value='REGISTER'></center>
								</div>
							</p>
						</li>

					</ul>
					
					<input type='hidden' name='action' value='signup'>

				</form>

				</div>
			</div>
		</div>
	</section>
</div>";

    }
    else
    {
        $required=array(
            "Username"=>$_POST['username'],
            "Password"=>$_POST['password'],
        );



        for($i=0;$i<count($required);$i++)
        {
            list($key,$value)=fun_adm_each($required);

            if(!$value)
                echo "<P align='left'><b>Registration Failed !!</b><br><br></p><b>$key</b> is required<br>";
            else
                $chkArr[]=true;
        }

        if(count($chkArr)==count($required))
        {
            $connection = odbc_connect( $connection_string, $user, $pass );

            if(!$func->is_valid_string($_POST['username']) && !$func->is_valid_string($_POST['password']))
            {

                $usernameP=$_POST['username'];
                $query = "SELECT * FROM [RohanUser].[dbo].[TUser] WHERE [login_id]='$usernameP'";
                $q = odbc_exec($connection, $query);

                $qt = odbc_do($connection, $query);
                $i = 0;
                while(odbc_fetch_row($qt)) $i++;

                if($i>0)
                    echo"<P align='left'><b>Registration Failed !!</b><br><br></p>Username <b>$_POST[username]</b> Already Taken!";
                else
				{
					$query = "INSERT INTO [RohanUser].[dbo].[TUser] (login_id,login_pw) VALUES('".$_POST['username']."','".md5($_POST['password'])."')";

                    $q = odbc_exec($connection, $query);
                    if($q)
                    echo"<P align='left'><b>Registration Success !!</b><br><br></p>Your ID <b>$_POST[username]</b> Have Been Registered, Play Your Character!";
                }
            }
            else
                echo "<P align='left'><b>Registration Failed !!</b><br><br></p>System Not Accepted Your Username / Password, because their have special character!";

        }
        echo "<br><br><a href='".$_SERVER['PHP_SELF']."?id=back'><P align='left'>Return</p></a>";
}
echo "</body></html>";

    exit;

ob_end_flush();
?>