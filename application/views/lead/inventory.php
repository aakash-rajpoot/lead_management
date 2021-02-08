<div class="mt-5 ex1" style="margin-top:110px;">
   <div class="container">
          <div class="row row-cols-3 row-cols-lg-5 g-2 g-lg-3">
            <div class="col">
              <div class="p-3 border bg-light">Row column</div>
            </div>
            <div class="col">
              <div class="p-3 border bg-light">Row column</div>
            </div>
            <div class="col">
              <div class="p-3 border bg-light">Row column</div>
            </div>
            <div class="col">
              <div class="p-3 border bg-light">Row column</div>
            </div>
            <div class="col">
              <div class="p-3 border bg-light">Row column</div>
            </div>
            <div class="col">
              <div class="p-3 border bg-light">Row column</div>
            </div>
            <div class="col">
              <div class="p-3 border bg-light">Row column</div>
            </div>
            <div class="col">
              <div class="p-3 border bg-light">Row column</div>
            </div>
            <div class="col">
              <div class="p-3 border bg-light">Row column</div>
            </div>
            <div class="col">
              <div class="p-3 border bg-light">Row column</div>
            </div>
          </div>
        </div>
</div>


<script>
    $(document).ready(function() {
       
    });

    function softDelete(leadId) {
        if(confirm('Are you sure to remove this record ?')) {
            window.location.replace('<?php echo base_url();?>index.php/lead/soft_delete_lead_data/'+leadId);
        }
    }

    function deAssignLead(leadId) {
        if(confirm('Are you sure to delete your assigned lead from records ?')) {
            window.location.replace('<?php echo base_url();?>index.php/lead/deassign_lead/'+leadId);
        }
    }

</script>
