<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/quotes/list.css">
</head>

<body>
    <nav>
        <ul>
            <li>
                <p><?php echo $data['user']['full_name'] ?></p>
            </li>
            <li>
                <a href="<?php echo base_url() ?>index.php/Users/logout"><button id="logout">Log Out</button></a>
            </li>
        </ul>
    </nav><br><br>
    <form action="<?php base_url() ?>createQuote" method="post">
        <div class="add-button"><button id="createQuote"><i class='fas fa-plus-circle'></i>&nbsp;&nbsp;Add Quote</button></div>
    </form>

    <?php
    $quotes = $data['quotes'];
    foreach ($quotes as $quote) {
        echo "<div class='container'>
        <span class='quote_id'>Q-ID: {$quote['quote_id']}</span><br><br>
        <p class='quote_body'>{$quote['quote_body']}</p><br>
        <p class='quote_author'>- {$quote['quote_author']}</p><br>
        <p class='date'>Uploaded on: {$quote['created_at']}</p><br>
        <div id='buttons'>
        <a href='edit/{$quote['quote_id']}'><button id='edit'><i class='fas fa-edit'></i>&nbsp;&nbsp;Edit</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href='delete/{$quote['quote_id']}'><button id='delete'><i class='fas fa-trash'></i>&nbsp;&nbsp;Delete</button></a>
        </div>
        </div>";
    }
    ?>

</body>

</html>