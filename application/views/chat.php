<div class="row">
    <div class="col-lg-12">
        <div class="content-wrapper content-wrapper--with-bg">
            <div class="wrap-career " style="margin-top:63px;">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-comment"></span> Chat
                    </div>
                    <div class="panel-body" id="messagesBody">
                        <?php if($data) {
                            foreach($data as $value){ ?>
                                        <?php
                                        $date_expire = $value['date_time'];    
                                        $date = new DateTime($date_expire);
                                        $now = new DateTime();
                                        $date_string = "";
                                        $days = $date->diff($now)->format("%d");
                                        $hours = $date->diff($now)->format("%H");
                                        $minutes = $date->diff($now)->format("%i");
                                        $seconds = $date->diff($now)->format("%s");
                                        if($days>0) {
                                            $date_string = $days >= 1 ? "{$days}days ":'{$days}day ';
                                        }
                                        elseif($hours > 0 && $days < 1) {
                                            $date_string = $hours > 1 ? "{$hours}hours ":'{$hours}hour ';
                                        }
                                        elseif($minutes > 0 && $hours < 1) {
                                            $date_string = "{$minutes}min ";
                                        }
                                        elseif($seconds>0 && $minutes < 1) {
                                            $date_string = "{$seconds}sec ";
                                        } else {
                                            $date_string = "0sec";
                                        }
                                        ?>
                        <ul class="chat">
                            <?php if($value['type'] == 1){ ?>
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff&text=<?=strtoupper(ucwords($value['agent_name'][0]));?>" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font"><?=ucwords($value['agent_name']);?></strong> <small class="pull-right text-muted">

                                            <span class="glyphicon glyphicon-time"></span><?=$date_string?> ago</small>
                                        </div>
                                        <p><?=$value['message'];?></p>
                                    </div>
                                </li>
                            <?php } else { ?>
                                <li class="right clearfix"><span class="chat-img pull-right">
                                    <img src="http://placehold.it/50/FA6F57/fff&text=<?=strtoupper(ucwords($value['admin_name'][0]));?>" alt="User Avatar" class="img-circle" />
                                </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted"><span class="glyphicon glyphicon-time"></span><?=$date_string?> ago</small>
                                            <strong class="pull-right primary-font"><?=$value['admin_name'];?></strong>
                                        </div>
                                        <p> <?=$value['message'];?></p>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                        <?php } ?>
                    </div>

                    <div class="panel-footer">
                    <?=form_open(null,array('method'=>'post','novalidate'=>"novalidate", 'class'=>'needs-validation','enctype' => 'multipart/form-data')); ?>
                        <?=validation_errors(); ?>     
                        <div class="input-group">
                            <input id="btn-input" type="text" name="message" class="form-control input-lg" placeholder="Type your message here..." />
                            <span class="input-group-btn">
                                <button type="submit" class="btn  button-hor btn-lg btn-success" name="chat_button" id="btn-chat">Send</button>
                            </span>
                        </div>
                        <?=form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
  var action = true // defaul value
  setInterval(function() {

    /*$('#messagesBody').load("get-messages.php? 
    employee_id="+employee_id);*/

    if (action === true) { // if scroll is down, do this
      $("#messagesBody").scrollTop($("#messagesBody")[0].scrollHeight);
    }

    console.log(action);
  }, 1000);


  $("#messagesBody").scroll(function() {
    var height = $(this).height();

    if ($(this).scrollTop() < height) { // if user scrolled to top
      action = false; // disable your action
    } else {
      action = true; // else, re enable your aciton
    }
  });

});

</script>
<script>
    $("#messagesBody").animate({ scrollTop: 20000000 }, "slow");
</script>