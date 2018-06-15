<?php

/**
 * Swiss Competition 2015 - Trade 17 - Web Design
 *
 * PHP Errors: Logical Error 1
 *
 * @todo There is a logical error within the checkTLS function.
 *       Fix the error by changing only one line.
 */

function checkTLS( $redirect = false ){

    if(isset($_SERVER['HTTPS'])) {
        return true;
    }
    elseif ($_SERVER['HTTPS'] == 'on') {
        return true;
    }
    elseif ($_SERVER['SERVER_PORT'] == 443) {
        return true;
    }
   else {
       if ($redirect) {
           $urlredirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
           echo '<!DOCTYPE html>
           <html>
               <head>
                   <meta charset="utf-8">
                   <title>Log-In</title>
               </head>
               <body>
                   <div>You are not using a secured connection. You will be redirected to a secure one.</div>
               </body>
           </html>';
           header("Location: " . $urlredirect);
           exit;
       }
       else {
           return false;
       }
   }

}

// check if the user has a secured connection and redirect if needed
checkTLS(true);
