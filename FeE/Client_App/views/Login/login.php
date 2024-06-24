<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="/FeE/Client_App/views/Login/stylesFor_Login.css">
    </head>
    <body>

        <div class="navbar">
            <div class="logo">
                <img src="/FeE/Client_App/views/logo.jpg" alt="Logo">
            </div>
            <div class="nav-links">
                <a href="/FeE/Client_App/project.php">Home</a>
                <a href="/FeE/Client_App/controllers/controller.php?page=viewproducts">View products</a>
            </div>
        </div>

        <div class="mainRec">
            
    
            <button  class="sIN" onclick="show('signIn')">Sign In</button><br><br>
            <button  class="sUP" onclick="show('signUp')">Sign Up</button>
            
            <div id="signUp" class="registration" style="display: none;">
              <form action="/FeE/Client_App/controllers/login_controller.php" method="post" class="fsignUp animation">
                <div class="container">
                  <h1>Sign Up</h1>
                  <p>Create an account.</p>
                  <hr>
                  <label for="username"><b>Username</b></label>
                  <input type="text" name="username" required>
        
                  <label for="password"><b>Password</b></label>
                  <input type="password" name="password" required>
        
                  <div class="actionsignUp">
                    
                    <button type="submit" name="register" class="submitsignUpbutton">Create account</button>
                    <button type="button" onclick="close_('signUp')" class="cancelbutton">Cancel</button>
                  </div>
                </div>
              </form>
            </div>
        
            <div id="signIn" class="registration" style="display: none;">
              <form action="/FeE/Client_App/controllers/login_controller.php" method="post" class="fsignIn animation">
                <div class="container">
                  <h1>Sign In</h1>
                  <hr>
                  <label for="username"><b>Username</b></label>
                  <input type="text" name="username" required>
        
                  <label for="password"><b>Password</b></label>
                  <input type="password" name="password" required>
        
                  <div class="actionsignIn">
                    
                    <button type="submit" name="signin" class="submitsignInbutton">Sign in</button>
                    <button type="button" onclick="close_('signIn')" class="cancelbutton">Cancel</button>
                  </div>
                </div>
              </form>
            </div>
        
            <script>
              function show(element) {
                document.getElementById(element).style.display = 'block';
              }
              function close_(element) {
                document.getElementById(element).style.display = "none";
              }
            </script>

        </div>
        <?php if(isset($problem) && $problem== 1) { ?>
          <div class="optionalRec">
           <h1>Username or password invalid!</h1>
          </div>
        <?php } ?>
        <?php if(isset($confirm_acount_created) && $confirm_acount_created== true) { ?>
          <div class="optionalRec">
           <h1>Account succesfully created! You can sign in.</h1>
          </div>
        <?php }else if(isset($confirm_acount_created) && $confirm_acount_created== false) {?>
          <div class="optionalRec">
           <h1>This account allready exists!</h1>
          </div>
        <?php } ?>
    </body>
</html>