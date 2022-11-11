<?php if (isset($_SESSION['Auth'])) { ?>
    <div class="modal fade" id="addpost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" style="display:none" id="post_img" class="w-100 rounded border">
                    <form method="post" action="assets/php/actions.php?addpost" enctype="multipart/form-data">
                        <div class="my-3">
                            <input class="form-control" name="post_img" type="file" id="select_post_img">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Say Something</label>
                            <textarea name="post_text" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>


<div class="offcanvas offcanvas-start" tabindex="-1" id="message_sidebar" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Messages</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body" id="chatlist">

   
  </div>
</div>

<div class="modal fade" id="chatbox" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <a href="" id="cplink" class="text-decoration-none text-dark"><h5 class="modal-title" id="exampleModalLabel"><img src="assets/images/profile/default_profile.jpg" id="chatter_pic" height="40" width="40" class="m-1 rounded-circle border"><span id="chatter_name"></span>(@<span id="chatter_username">loading..</span>)</h5></a>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column-reverse gap-2" id="user_chat">
      loading..
      </div>
      <div class="modal-footer">
         
          <p class="p-2 text-danger mx-auto" id="blerror" style="display:none"> 
          <i class="bi bi-x-octagon-fill"></i> you are not allowed to send msg to this user anymore

</div>
      <div class="input-group p-2 " id="msgsender">
                            <input type="text" class="form-control rounded-0 border-0" id="msginput" placeholder="say something.."
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-primary rounded-0 border-0" id="sendmsg" data-user-id="0" type="button"
                                >Send</button>
                        </div>
      </div>
    </div>
  </div>
</div>



<<<<<<< HEAD
<?php 
}
 ?>
=======
<?php } ?>
>>>>>>> ca295611c54fce32ffef43dbc9f85526ac722a21
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/JS/jquery-3.6.1.min.js?>"></script>
<script src="assets/js/jquery.timeago.js"></script>

<<<<<<< HEAD
<script src="assets/JS/custom.js?v=<?= time()?>"></script>
=======
<script src="assets/JS/custom.js?v=<?= time() ?>"></script>
>>>>>>> ca295611c54fce32ffef43dbc9f85526ac722a21

</body>

</html>