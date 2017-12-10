<!DOCTYPE html>
<html lang="en">
<?php include_once('header.php')?>
<body>
<div id="comment_tree" style="width:auto;height:900px;overflow-y:scroll">

</div>
<div id="text_area_0_0">
    <span>Posting as:</span>
    <input id="name" title="posting_name" type="text">
    <button onclick="setName('name')">SetName</button>
    <br>
    <textarea autofocus title="Post A Comment" maxlength="1000" oninput="remaining_characters(this)" style="width: 350px"> </textarea>
    <br>
    <button onclick="save_reply('text_area_0_0',0)">Post Comment</button>
    <span style="color: red" id="post_counter">1000</span>
</div>
</body>
</html>
<script type="text/javascript">
    get_comments();
</script>

