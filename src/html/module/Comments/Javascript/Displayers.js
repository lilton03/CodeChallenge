/*Display Comments*/
function display_comments(parent_id,comment_data){
    var comment_node='';
    var children;
    var ul;
    var style;
    var comment_data_str;
    for(var i =0; i<comment_data.length;i++) {
        ul='';
        style='';
        comment_data_str='';

        for(var x=0;x<comment_data[i]['comment_data'].length;x++){
            comment_data_str+=comment_data[i]['comment_data'][x];
            if((x+1)%70===0)
                comment_data_str+='<br>';
        }
        console.log(comment_data_str);
        comment_node +=
            '<li class="li_comment_nodes"  id="comment_id_' + comment_data[i]['id'] + '">' +

            '<span>' + comment_data[i]['name'] + '</span>' +

            '<br>' +

            '<div  class="text_comment_nodes">' +

            comment_data_str +

            '</div>' +

            '<br>' + '<span class="time_view_replies">'+comment_data[i]['comment_time']+'</span>&nbsp;';

        children=comment_data[i]['children'];

        ul= '<ul id="ul_comment_id_' + comment_data[i]['id'] + '"></ul>';

        if (children < 1)
            style='none';

        comment_node +='<button style="display:'+style+';" id="reply_'+comment_data[i]['id']+'" class="time_view_replies" onclick="reply_actions(this,1)">View Replies '+children+'</button>&nbsp;';



        if(comment_data[i]['comment_level']<2)
            comment_node+='<button class="time_view_replies" id="do_reply_'+comment_data[i]['id']+'_'+comment_data[i]['comment_level']+'" onclick="show_reply_box(this)">Reply</button>&nbsp;';

        comment_node+=ul;
        comment_node+='</li>';
    }


    var id='comment_tree';

    if(parent_id!==0)

        id='ul_comment_id_'+parent_id;

    var tree=document.getElementById(id);

    tree.innerHTML=tree.innerHTML+' '+comment_node;

}

/*Get Replies or Hide replies of comments*/
function reply_actions(elem,toggle) {
    var text=elem.innerText.split(' ');
    var id=elem.id.split('_')[1];
    var style='';
    var children=document.getElementById('comment_id_'+id).getElementsByTagName('li');
        if(text[0]==='View'){
            if(children.length < parseInt(text[2])) {
                get_child_comments(id);
                style=0;
            }
            text[0]='Hide ';
        }

        else {
            if(toggle)
                style = 'none';
            text[0]='View ';
        }
        elem.innerText=text[0]+text[1]+' '+text[2];
        if(style!==0){
            children=document.getElementById('comment_id_'+id).getElementsByTagName('ul')[0];
            children.style.display=style;
        }
}

/*Display reply text area*/
function show_reply_box(elem) {
    var id=elem.id.split('_')[2]+'_'+elem.id.split('_')[3];
    var reply_box=document.getElementById('text_area_'+id);
    if(!reply_box) {
        reply_box = '<div id="text_area_' + id + '" ><textarea  class="text_comment_nodes"></textarea>' +

            '<br>' +

            '<span class="time_view_replies" onclick="save_reply(' + "'" + 'text_area_' + id +"'" + ',1)"><a href="#">Save</a></span> &nbsp;' +

            '</div>';
        elem.innerText='Cancel';
        elem.insertAdjacentHTML('afterend', reply_box);
    }
    else if(reply_box.style.display==='') {
        reply_box.style.display = 'none';
        elem.innerText='Reply';
    }
    else {
        elem.innerText='Cancel';
        reply_box.style.display = '';
    }
}

/*Display View Reply button for those who have children*/
function display_view_replies_button(id){
    var button=document.getElementById('reply_'+id);
    var data=button.innerText.split(' ');
    data[2]=parseInt(data[2])+1;
    button.innerText=data[0]+' '+data[1]+' '+data[2];
    button.style.display='';
}

/*Post character Counter*/
function remaining_characters(elem) {
    var length=elem.value.length;
    var counter = document.getElementById('post_counter');
    counter.innerText=1000-length;
}


