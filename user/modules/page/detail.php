<?php 
echo 'Page about us with ID in url is  ';

//get id from url
$id = (int)$_GET['id'];
echo $id;
//xay dung hanm lay du lieu
$item = get_page_by_id($id);

// show_array($item);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1><?php echo $item['page_title']?></h1>
        <h1><?php echo $item['post_content']?></h1>
    </div>
</body>
</html>
