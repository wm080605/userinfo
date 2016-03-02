<!DOCTYPE html>
<html>
<head>
    <title>管理中心</title>
    <script type="text/javascript" src="/resources/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/resources/bootstrap/css/bootstrap.min.css">
</head>
<body>
<center>
    <table border="1" class="table table-striped">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Password</td>
            <td>Email</td>
            <td>CreateTime</td>
            <td>UpdateTime</td>
        </tr>
        <?php foreach($list->result() as $item):?>
        <tr>
            <td><?=$item->id?></td>
            <td><?=$item->name?></td>
            <td><?=$item->password?></td>
            <td><?=$item->email?></td>
            <td><?=$item->createTS?></td>
            <td><?=$item->updateTS?></td>
        </tr>
    <?php endforeach;?>
    </table>
</center>
</body>
</html>