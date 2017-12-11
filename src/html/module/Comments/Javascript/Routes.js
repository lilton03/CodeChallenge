
/*Route to post a comment*/
function post_comment(commentData,level,parent) {
    $.post(base_url + 'server/Comments/Controller/CommentsController.php',
        {
            'function': 'insertCommentController',
            'comments':commentData,
            'level':level,
            'parent':parent,
            'user_id':parseInt(JSON.parse(localStorage.getItem('id'))),
            'user_name':JSON.parse(localStorage.getItem('name'))
        },
        function (data) {
        console.log(data);
        var comments=JSON.parse(data)['response'];
        if(comments['status']===200){
            comments=[comments['data']];
            console.log(comments);
            var parent_id=parseInt(comments[0]['parent_comment']);
            display_comments(parent_id,comments);
        }
        });
}

/*Route to get Comments*/
function get_comments() {

    $.get(base_url + 'server/Comments/Controller/CommentsController.php',
        {
            'function': 'getCommentsController'
        },
        function (data) {
            var comments = JSON.parse(data)['response'];
            if(comments['status']===200) {
                comments=comments['data'];
                console.log(comments);
                var parent_id = parseInt(comments[0]['parent_comment']);
                display_comments(parent_id, comments);
            }
        });
}

/*Route to get Comments within Comments*/
function get_child_comments(parentId) {
    $.get(base_url + 'server/Comments/Controller/CommentsController.php',
        {
            'function': 'getChildCommentsController',
            'parent_id':parentId
        },
        function (data) {
            var comments = JSON.parse(data)['response'];
            if(comments['status']===200) {
                comments=comments['data'];
                console.log(comments);
                var parent_id = parseInt(comments[0]['parent_comment']);
                display_comments(parent_id, comments);
            }
        });
}

/*Route to register a user name*/
function userNameSet(name){
        $.post(base_url + 'server/Users/Controller/UsersController.php',
            {
                'function': 'setOrGetNameController',
                'name': name
            },
            function (data) {
            console.log(data);
                var name = JSON.parse(data)['response'];
                if (name['status'] === 200) {
                    name = name['data'];
                    localStorage.setItem('id',JSON.stringify(name['id']));
                    localStorage.setItem('name',JSON.stringify(name['name']));
                    console.log(name);
                    alert('Your Hash Name is : '+name['hash_name']+' Use this to retrieve your Name by setting this in the input field below for your next session,' +
                        'Please remember your hash name it is the only way to retrieve your username');
                }
                else
                    alert('User Name is Already in use, or you have entered an incorrect hash name');
            })
}


