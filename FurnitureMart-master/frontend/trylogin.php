<script language="javascript" src="javascriptPage.js" type="text/javascript"></script>
<td align="center" valign="bottom"><hr />
		<div id="loginMessage" class="loginMessage"> </div><hr />
		<?php
		if(!isset($_SESSION['email']))
		{
		?><div id="BOX" onmousedown="document.onclick=function(){};" onmouseup="setTimeout('TOG()',1);"></div>
		<div style="width:auto;height:auto;" class="LOGIN" id="LOGIN" onmouseover="this.style.opacity=1;this.filters.alpha.opacity=100"
onmouseout="this.style.opacity=0.4;this.filters.alpha.opacity=40">
		[ LOGIN ]
		  <hr />
		<form  style="text-align:center" id="form1" name="form1" method="POST">
           E-mail <br/><input name="myemail" type="text" id="myemail" onclick="document.getElementById('loginMessage').innerHTML=''; document.form1.myemail.value=''; document.form1.mypassword.value='';"/>
		   Password <br/><input name="mypassword" type="password" id="mypassword" />
            <p>
              <label>
              <input name="btnlogin" type="submit" id="btnlogin" value="Login"  onclick="getLogin(); return false;" />
              </label>
              <label>
              <input name="btnreset" type="reset" id="btnreset" value="Clear" />
              </label>
            </p>
            </form>
<a href="forgotPassword.php">Forgot your Password</a><br/>
<a href="ClientRegistration.php">Register</a>
			</div>
			<?php
			}
			else
			{
			?>
			<h1 align="center" class="style9">Karibu (Welcome)			</h1>
            <p>Signed In as..<?php echo $_SESSION['name'];?>
            </p>
            <div id="message" align="center">
			  <h2></p></h2>
				  <p><a href="Logout.php">Logout</a></p>
				  <p><a href="cust_details.php">Account information </a></p>
            </div>
				<?php
				}
				?>
		  </td>