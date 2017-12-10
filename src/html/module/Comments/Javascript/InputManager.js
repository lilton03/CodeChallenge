/*save comment reply*/
function save_reply(text_area_id,toggle) {
    var id = JSON.parse(localStorage.getItem('id'));
    if (id!==null) {
        console.log(id);
        var text_area = document.getElementById(text_area_id);
        var commentData = text_area.getElementsByTagName('textarea')[0].value;
        commentData = commentData.trim();
        if (commentData.length < 1 || commentData.length > 1000)
            alert('Comment or Post cannot be blank space or Greater than 1000 words');
        else {
            var parent = parseInt(text_area_id.split('_')[2]);
            var level = parseInt(text_area_id.split('_')[3]);
            if (toggle) {
                text_area.style.display = 'none';
                level += 1;
                show_reply_box(document.getElementById('do_reply_' + parent + '_' + (parseInt(level) - 1)));
                reply_actions(document.getElementById('reply_' + parent), 0);
                display_view_replies_button(parent);
            }
            post_comment(commentData, level, parent);
            alert('Successfully Posted a Comment');
        }

    }
    else {
        alert('You must set your username first');
    }
}


/*filter out user inputted username*/
function setName(id) {
    var name=document.getElementById(id).value;
    name=name.trim();
    if(name.length>0 && name.length<50 ) {
        userNameSet(name);
    }
    else
        alert('Username length must be greater than 0 or less than 50');
}