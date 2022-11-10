<?php
require_once 'functions.php';

if (isset($_GET['getmessages'])) {
    $chats = getAllMessages();
    $chatlist = "";
    foreach ($chats as $chat) {
        $ch_user = getUser($chat['user_id']);
        $seen = false;
        if ($chat['messages'][0]['read_status'] == 1) {
            $seen = true;
        }
        $chatlist .= '
        <div class="d-flex justify-content-between border-bottom chatlist_item" data-bs-toggle="modal" data-bs-target="#chatbox" onlick="popchat(' . $chat['user_id'] . ')">
        <div class="d-flex align-items-center p-2">
            <div><img src="assets/images/profile/' . $ch_user['profile_pic'] . '" alt="" height="40" width="40" class="rounded-circle border">
            </div>
            <div>&nbsp;&nbsp;</div>
            <div class="d-flex flex-column justify-content-center">
                <a href="#" class="text-decoration-none text-dark">
                    <h6 style="margin: 0px;font-size: small;">' . $ch_user['first_name'] . ' ' . $ch_user['last_name'] . '</h6>
                </a>
                <p style="margin:0px;font-size:small" class="">- ' . $chat['messages'][0]['msg'] . '</p>
                <time style="font-size:small" class="timeago text-small" datetime="' . $chat['messages'][0]['created_at'] . '">' . gettime($chat['messages'][0]['created_at']) . '</time>
            </div>
        </div>
        <div class="d-flex align-items-center">

            <div class="p-1 bg-primary rounded-circle ' . ($seen ? 'd-none' : '') . '"></div> 

        </div>
    </div>';
    }

    $json['chatlist'] = $chatlist;

    if (isset($_POST['chatter_id']) && $_POST['chatter_id'] != 0) {
        $messages = getMessages($_POST['chatter_id']);
        $chatmsg = "";

        foreach ($messages as $cm) {
            if ($cm['from_user_id'] == $_SESSION['userdata']['id']) {
                $cl1 = 'align-self-end bg-primary text-light';
                $cl2 = 'text-light';
            } else {
                $cl1 = '';
                $cl2 = 'text-muted';
            }

            $chatmsg .= '<div class="py-2 px-3 border rounded shadow-sm col-8 d-inline-block ' . $cl1 . '">' . $cm['msg'] . '<br>
                <span style="font-size:small" class="' . $cl2 . '">' . gettime($cm['created_at']) . '</span> </div>';
        }
        $json['chat']['msgs'] = $chatmsg;
        $json['chat']['userdata'] = getUser($_POST['chatter_id']);
    } else {
        $json['chat']['msgs'] = '<div class="spinner-border text-center" role="status">
            </div>';
    }


    echo json_encode($json);
}

if (isset($_GET['follow'])) {
    $user_id = $_POST['user_id'];
    if (followUser($user_id)) {
        $response['status'] = true;
    } else {
        $response['status'] = false;
    }
    echo json_encode($response);
}

if (isset($_GET['unfollow'])) {
    $user_id = $_POST['user_id'];
    if (unfollowUser($user_id)) {
        $response['status'] = true;
    } else {
        $response['status'] = false;
    }
    echo json_encode($response);
}


if (isset($_GET['like'])) {
    $post_id = $_POST['post_id'];

    if (!checkLikeStatus($post_id)) {
        if (like($post_id)) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
        }

        echo json_encode($response);
    }
}

if (isset($_GET['unlike'])) {
    $post_id = $_POST['post_id'];

    if (checkLikeStatus($post_id)) {
        if (unlike($post_id)) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
        }

        echo json_encode($response);
    }
}

if (isset($_GET['addcomment'])) {
    $cuser = getUser($_SESSION['userdata']['id']);
    $post_id = $_POST['post_id'];
    $comment = $_POST['comment'];

    if (addComment($post_id, $comment)) {
        $response['status'] = true;
        $response['comment'] = '<div class="d-flex align-items-center p-2">
            <div><img src="assets/images/profile/' . $cuser['profile_pic'] . '" alt="" height="40" class="rounded-circle border">
            </div>
            <div>&nbsp;&nbsp;&nbsp;</div>
            <div class="d-flex flex-column justify-content-start align-items-start">
                <h6 style="margin: 0px;"><a href="?u=' . $cuser['username'] . '" class="text-decoration-none text-dark">@' . $cuser['username'] . '</a></h6>
                <p style="margin:0px;" class="text-muted">' . $_POST['comment'] . '</p>
            </div>
        </div>';
    } else {
        $response['status'] = false;
    }

    echo json_encode($response);
}
