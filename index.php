<?php
//Cross site scripting
function crossSiteScripting($value){
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
} 
$pages = [
    'details'=> 'Profile',
    'profile' => 'Details',
    'report' => 'Status',
    'status' =>'reprt'
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Prevent cross site scripting and Secure Input Handeling</title>
</head>
<body>
        <div class="head1">
            <h1>Prevent cross site scripting and Secure Input Handeling</h1>
        </div>
 
    <form action="index.php" method="GET">
        <select name="page" >
            <option value="">Select a Page</option>
            <?php foreach($pages AS $key => $value): ?>
                <option value="<?php echo crossSiteScripting($key) ?>"
                    <?php if (!empty($_GET['page']) && $_GET['page'] == '$key') echo 'selected'; ?>
                    ><?php echo crossSiteScripting($value);?></option>
                <?php endforeach;?>
           
        </select>
        <input type="submit" value="SUBMIT">
    </form>
    <?php
        if(!empty($_GET['page'])){
            $page = $_GET['page'];
            if(!empty($pages[$page])){
                echo file_get_contents( "pages/{$_GET['page']}.php");
            }
    }
    ?>
</body>
</html>