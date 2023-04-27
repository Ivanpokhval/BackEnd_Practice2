<?php
$apiKey = "AIzaSyDzrOzYuzEa5cSnCrR0exN_qAZIM04KJXk";
$cx = "97abb59697918446b";
$search = "backend";
if (isset($_GET['search'])){
    $search = $_GET['search'];
}
$url = "https://www.googleapis.com/customsearch/v1?key={$apiKey}&cx={$cx}&q={$search}";
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$resultJson = curl_exec($ch);
curl_close($ch);
$arr = json_decode($resultJson, true);
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
    </head>
    <body>
    <h2>My Browser</h2>
    <form method="GET" action="/index.php">
        <label for="url">Url:</label>
        <input type="text" id="url" name="url" value="">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search" value=""><br><br>
        <input type="submit" value="Submit">
        <h2>Search result</h2>
    </ form >
    <?php
    foreach ($arr['items'] as $item) {
        echo '<b>'.$item['displayLink'] . '</b>' . '<br>';
        echo '<br>' . '<b>' . "<a href='{$item['title']}'>".$item['title'] . '</a>' . '</b>' ;
        echo '<p>'.$item['snippet'] . '</p>';
    }
    ?>
    </body>
    </html>