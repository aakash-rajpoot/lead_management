<div class="row">
<div class="col-lg-12">
    <div class="content-wrapper content-wrapper--with-bg">
        <div class="wrap-career " style="margin-top:110px;">
            <h2 class="font-weight-medium mt-2 mb-5">Your Lead</h2>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="label-input" for="name">Lead Name: </label> <?=$data['name'];?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="label-input" for="email">Email Id: </label> <?=$data['email'];?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="label-input" for="phone">Phone: </label> <?=$data['phone'];?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="label-input" for="alt_phone">Alternate Phone Number: </label> <?=$data['alt_phone'];?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="label-input" for="property_address">Project Name: </label> <?=$data['property_address'];?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="label-input" for="client_address">Client Address: </label> <?=$data['client_address'];?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="label-input">Available units: </label> 
                        <?php 
                        $i = 1;
                        foreach ($units as $key => $unit) {
                            echo $unit['unit_type']." ".$unit['unit_type']. " ".$unit['size_measure'];
                            if($i < count($units)) echo " , ";
                            $i++;
                        } ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="label-input" for="remark">Color Code: </label> <?=$data['color_code'];?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="label-input" for="assign_date">Create Date: </label> <?=$data['lead_date'];?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="label-input" for="assign_date">Assigned Date: </label> <?=$data['assign_date'];?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="label-input" for="remark">Status: </label> <?=$data['status'];?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="label-input" for="assign_date">Status Name: </label> <?=$data['status_name'];?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="label-input" for="remark">Remark: </label> <?=$data['remark'];?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="label-input" for="reference">Lead Source By: </label> <?=$data['reference'];?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

