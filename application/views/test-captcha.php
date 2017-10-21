<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<h1>Hi this is test Captcha</h1>


<?= form_open('')?>
<?= $image ?>
<input type="text" name="userCaptchValue" placeholder="Enter the captcha" />
<?= $result ?>
<button type="submit" name="submit">Submit</button>
</form>

