<?php

include "config.php";
include "header.php";
?>

<table class="frame">
<tr>
<th> # </th>
<th> title </th>
<th> imageurl </th>
<th> users </th>
<th> rating </th>
<th> category </th>
<th> location </th>
<th> city </th>
<th> upvotes </th>
<th> downvote </th>
<th> flags </th>
<th> flagip </th>
<th> ip </th>
<th> notes </th>
<th> date </th>
</tr>
<?php 
$get=mysql_query("select * from reports ORDER BY id DESC");
while($row=mysql_fetch_array($get)){

echo "";?>
<tr>
<td><?php echo $row['id'];?></td>
<td><?php echo $row['title'];?></td>
<td><?php echo $row['imageurl'];?></td>
<td><?php echo $row['users'];?></td>
<td><?php echo $row['rating'];?></td>
<td><?php echo $row['category'];?></td>
<td><?php echo $row['location'];?></td>
<td><?php echo $row['city'];?></td>
<td><?php echo $row['upvotes'];?></td>
<td><?php echo $row['downvote'];?></td>
<td><?php echo $row['flags'];?></td>
<td><?php echo $row['flagip'];?></td>
<td><?php echo $row['ip'];?></td>
<td><?php echo $row['notes'];?></td>
<td><?php echo $row['date'];?></td>
</tr>
<?php
}
?>
</table>



</body>
</html>

