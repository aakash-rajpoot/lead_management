<div class="row">
    <div class="col-lg-12">
        <div class="content-wrapper content-wrapper--with-bg">
            <div class="wrap-career " style="margin-top:110px;">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-comment"></span> Chat
                    </div>
                    <div class="panel-body">
                        <?php if($data) {
                            foreach($data as $value){ ?>
                                        <?php
                                            // $date1 = date("Y-m-d h:i:sa");
                                            // $date2 = $value['date_time'];
                                            // $date1 = date("Y-m-d",strtotime($_POST['customer_birth']));
                                            // $date2 = date("Y-m-d",strtotime($_POST['customer_marriage']));
                                            // echo timespan($date2, $date1); die;
                                            // $diff = abs($date2, $date1);
                                            // echo $diff; die;

                                            // $years = floor($diff / (365*60*60*24));
                                            // $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                                            // $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
                                            // print_r($days);die;
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

                                            <span class="glyphicon glyphicon-time"></span><?=$value['date_time'];?></small>
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
                                            <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
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
                            <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="Type your message here..." />
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-warning btn-sm" name="chat_button" id="btn-chat">Send</button>
                            </span>
                        </div>
                        <?=form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
