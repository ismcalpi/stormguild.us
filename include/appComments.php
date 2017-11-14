<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(!empty($_POST['commentBody'])) {
        
        if(empty($_SESSION['username'])) {
            $comUID = $db -> quote($app_uid);
        } else {
            $comUID = $db -> quote($_SESSION['username']);
        }
        
        if(!empty($_POST['reply_id'])) {
            $replyID = $db -> quote($_POST['reply_id']);
        } else {
            $replyID = "NULL";
        }

        $comBody = $db -> quote($_POST['commentBody']);
        

        $db -> query("INSERT INTO stormguild.app_comment (comment_id,reply_id,application_id,user,body,create_datetime)
                            VALUE (NULL,".$replyID.",".$app_id.",".$comUID.",".$comBody.",now())");

    }

}
?>
<div class="row">
    <div class="col-sm-12">
        <div class="u-heading-v3-1 g-my-20">
            <h2 class="h3 u-heading-v3__title">Comments</h2>
        </div>
    </div>
    <div class="col-sm-12">
        <?php
        $comments = $db -> select("SELECT *, date_format(create_datetime,'%b %D, %Y') as formDate FROM stormguild.app_comment WHERE application_id =".$app_id." and reply_id is null order by create_datetime asc");
        if(!empty($comments)) {
            foreach ($comments as $comment) {
        ?>

        <div class="media g-mb-20" id="<?php echo "head-".$comment['comment_id']; ?>">
            <div class="media-body u-shadow-v22 g-bg-secondary g-pa-15">

                <div class="g-mb-15">
                    <h5 class="h5"><?php echo $comment['user']; ?></h5>
                    <span class="g-color-gray-dark-v4 g-font-size-12"><?php echo $comment['formDate']; ?></span>
                </div>

                <p><?php echo $comment['body']; ?></p>

                <ul class="list-inline d-sm-flex my-0">
                    <li class="list-inline-item ml-auto">
                        <a 
                           class="collapsed u-link-v5 g-color-main g-color-primary--hover" 
                           href="#<?php echo "body-".$comment['comment_id']; ?>" 
                           data-toggle="collapse"
                           aria-expanded="false" 
                           aria-controls="<?php echo "body-".$comment['comment_id']; ?>">
                            <i class="icon-note g-pos-rel g-top-1 g-mr-3"></i>
                            Reply
                        </a>
                    </li>
                </ul>

            </div>

        </div>


        <?php

                $replies = $db -> select("SELECT *, date_format(create_datetime,'%b %D, %Y') as formDate FROM stormguild.app_comment WHERE reply_id =".$comment['comment_id']." order by create_datetime asc");

                if(!empty($replies)){

                    foreach($replies as $reply) {
        ?>

        <div class="media g-ml-40 g-mb-20">
            <div class="media-body u-shadow-v22 g-bg-secondary g-pa-15">

                <div class="g-mb-15">
                    <h5 class="h5"><?php echo $reply['user']; ?></h5>
                    <span class="g-color-gray-dark-v4 g-font-size-12"><?php echo $reply['formDate']; ?></span>
                </div>

                <p><?php echo $reply['body']; ?></p>

            </div>
        </div>

        <?php  
                    }

                }                                 

        ?>

        <div id="<?php echo "body-".$comment['comment_id']; ?>" class="collapse" role="tabpanel" aria-labelledby="<?php echo "head-".$comment['comment_id']; ?>">
            <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>#comForm">
                <div class="form-group g-mb-20">
                    <input type="hidden" name="reply_id" value="<?php echo $comment['comment_id']; ?>" />
                    <textarea class="form-control form-control-md g-resize-none rounded-0" rows="3" name="commentBody" placeholder="Add a Comment..."></textarea>
                    <button type="submit" class="btn btn-md u-btn-inset u-btn-outline-blue g-mr-10 g-my-15">
                        Post Reply
                    </button>
                    <a 
                       class="collapsed u-link-v5 g-color-main g-color-primary--hover" 
                       href="#<?php echo "body-".$comment['comment_id']; ?>" 
                       data-toggle="collapse"
                       aria-expanded="false" 
                       aria-controls="<?php echo "body-".$comment['comment_id']; ?>">
                        <span class="g-color-red">Cancel</span>
                    </a>
                </div>
            </form>
        </div>

        <?php
            }
        }

        if (!empty($app_id)) {
        ?>

        <form id="comForm" method="post" action="<?php echo $_SERVER['REQUEST_URI']."#comForm"; ?>">

            <div class="form-group g-mb-20">

                <textarea class="form-control form-control-md g-resize-none rounded-0" rows="3" name="commentBody" placeholder="Add a Comment..."></textarea>
                <button type="submit" class="btn btn-md u-btn-inset u-btn-outline-blue g-mr-10 g-my-15">
                    Post Comment
                </button>

            </div>

        </form>

        <?php
        }
        ?>

    </div>
</div>
