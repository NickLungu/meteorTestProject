
<form method="post" action="">
    <img src="data:image/jpg;base64, <?=base64_encode($row['img'])?>"/>
    <input type="submit" name=<?="remove_".$row['id']?> value=""/>
</form>
