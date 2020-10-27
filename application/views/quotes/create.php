<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUOTES | COLLECTION</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/quotes/list.css">
</head>

<body>

    <form action="" id="quoteCreateForm" method="post">
        <div class="container">
            <div class="quote_body">
                <label style="display: none;">Quote</label><textarea name="quote_body" id="quote_body" cols="50" rows="10" placeholder="write your quotes here!"><?php echo set_value('quote_body') ?></textarea><span class="error"><?php echo form_error('quote_body') ?></span>
            </div><br><br>
            <div class="quote_author">
                <label style="display: none;">Author</label><input type="text" value="<?php echo set_value('quote_author') ?>" name="quote_author" id="quote_author" placeholder="quote's author name"><span class="error"><?php echo form_error('quote_author') ?></span>
            </div>
        </div><br><br>
        <button type="submit" id="quote-post">POST</button>
    </form>
    <br>
    <button id="cancel">Cancel</button>
</body>

</html>