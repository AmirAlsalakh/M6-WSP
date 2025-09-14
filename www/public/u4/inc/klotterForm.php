<form action="inc/saveMsg.php" method="post">
        <label>Meddelande</label><br>
        <textarea name="message" cols="45" rows="5"></textarea><br />
        <input type="hidden" name="CSRFToken" value="<?php echo $_SESSION['CSRFToken']; ?>">
        <input type="submit" value="Skicka">
    </form>