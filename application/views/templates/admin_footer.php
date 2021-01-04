
<div class="content-wrapper content-wrapper--with-bg">
<div class="row">
<div class="col-lg-12">
    <div class="copyright text-center">
        <p title="Kritak Infra Pvt. Ltd">Copyright © 2020. <a href="http://www.kritak.com/" class="copiyright-link" target="blank">Kritak Infra Pvt. Ltd.</a>. All rights reserved.</p>
        <p title="Kanvan Business Solutions">Powered By <a href="http://kanvan.in/" class="copiyright-link" target="blank">Kanvan Business Solutions Pvt. Ltd.</a></p>
    </div>
</div>
</div>
</div>
<script>
 $('.site-menu li').removeClass('active');
                $(this).addClass('active');
                $(this).children('ul').slideDown();
            }
        });
    });
});
</script>
<script>
$(document).ready(function() {       
	$('#checkbox').multiselect({		
		nonSelectedText: 'Select Unit '				
	});
});
</script>   
<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>
</body>
</html>