<div class="row">
    <div class="col-md-12">
        <div class="content-wrapper content-wrapper--with-bg">
            <div class="wrap-career">
                <div class="row">
                    <div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <span class="glyphicon glyphicon-user"></span> Members
                            </div>
                            <div class="panel-body" id="messagesBody">
                            <?php if($members) {?>
                                <ul class="chat">
                                   <?php foreach($members as $member){ ?>
                                    <li><a href="#" onClick="chat_with(<?=$member['id'];?>)"><?=$member['fname'].' '.$member['lname'];?></a></li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <span class="glyphicon glyphicon-comment"></span> Chat
                            </div>
                            <div class="panel-body" id="messagesBody">
                                <ul class="chat">
                                <?php if($data) {?>                                
                                    <?php foreach($data as $value){ ?>
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
                                
                                    <?php if($value['user_from'] == $this->session->userdata('chat_with')){ ?>
                                        <li class="left clearfix">
                                            <span class="chat-img pull-left">
                                                <img src="http://placehold.it/50/55C1E7/fff&text=<?=strtoupper(ucwords($value['sender_fname'])[0]);?><?=strtoupper(ucwords($value['sender_lname'])[0]);?>" alt="User Avatar" class="img-circle" />
                                            </span>
                                            <div class="chat-body clearfix">
                                                <div class="header">
                                                    <strong class="primary-font"><?=ucwords($value['sender_fname']);?></strong> 
                                                    <small class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span><?=$date_string?> ago</small>
                                                </div>
                                                <p><?=$value['message'];?></p>
                                            </div>
                                        </li>
                                    <?php } else { ?>
                                        <li class="right clearfix">
                                            <span class="chat-img pull-right">
                                                <img src="http://placehold.it/50/FA6F57/fff&text=<?=strtoupper(ucwords($value['sender_fname'])[0]);?><?=strtoupper(ucwords($value['sender_lname'])[0]);?>" alt="User Avatar" class="img-circle" />
                                            </span>
                                            <div class="chat-body clearfix">
                                                <div class="header">
                                                    <!-- <strong class="pull-right primary-font"><?=$value['sender_fname'];?></strong> -->
                                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span><?=$date_string?> ago</small>
                                                    
                                                </div>
                                                <p> <?=$value['message'];?></p>
                                            </div>
                                        </li>
                                    <?php } ?>                                
                                <?php } ?>                                
                                <?php } else { ?>
                                    <li class="left clearfix">No conversation. Say Hello!</li>
                                <?php } ?>
                                </ul>
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
    </div>
</div>
<script>
$(document).ready(function() {
  var action = true // defaul value
  setInterval(function() {
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
function chat_with(memberId) {
    window.location.replace('<?=base_url();?>chat/set_session/'+memberId); 
}
$("#messagesBody").animate({ scrollTop: 20000000 }, "slow");
</script>