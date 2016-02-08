<?php include 'header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Users</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>admin"><i class="fa fa-dashboard"></i> Home</a>
            </li>
            <li class="active">Users</li>
        </ol>
    </section>
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header with-border">
                </div>
                <!-- /.box-header -->
                <!-- form start -->
               
                <form name="admin_entry" action="<?php echo base_url(); ?>admin/admin_entry" id="add_admin_entry" class="form-horizontal" method="post">
                    <div class="box-body">
                        <?php if($this->session->flashdata('msg')){ ?>
                        <div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong><?php echo $this->session->flashdata('msg'); ?></strong> </div>
                        <?php } ?>
                        
						<div class="form-group">
                            <label for="project_type" class="col-sm-2 control-label">Game Type</label>
								<div class="col-sm-10">
									<select id ="game_type" name="game_type" class="form-control" onchange="display_ball_4();" required >
										<option value="3pick">3 Pick</option>
										<option value="4pick">4 Pick</option>
									</select>
								</div>
                        </div>
						<div class="form-group">
                            <label for="project_type" class="col-sm-2 control-label">Date</label>
								<div class="col-sm-10">
									<div class="input-group">
										  <div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										  </div>
										  <input name="date" id="date" type="text" class="form-control required" >
									</div>
								</div>
                        </div>
						<div class="form-group">
                            <label for="project_type" class="col-sm-2 control-label">Ball 1</label>
								<div class="col-sm-10">
									
									  <input type="text" name="ball_1" class="form-control required number" placeholder="Enter ...">
									
								</div>
                        </div>
						<div class="form-group">
                            <label for="project_type" class="col-sm-2 control-label">Ball 2</label>
								<div class="col-sm-10">
									
									  <input type="text" name="ball_2" class="form-control required number" placeholder="Enter ...">
									
								</div>
                        </div>
						<div class="form-group">
                            <label for="project_type" class="col-sm-2 control-label">Ball 3</label>
								<div class="col-sm-10">
									
									  <input type="text" name="ball_3" class="form-control required number" placeholder="Enter ...">
									
								</div>
                        </div>	
						<div class="form-group" id="ball_4_container" style="display:none;">
                            <label for="project_type" class="col-sm-2 control-label">Ball 4</label>
								<div class="col-sm-10">
									
									  <input type="text" name="ball_4" class="form-control required number" placeholder="Enter ...">
									
								</div>
                        </div>
						
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
						<button type="reset"  class="btn btn-danger pull-right" >Cancel Changes</button>
						<button type="submit" id="submit" name="submit" class="btn btn-info pull-right">Add</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
               </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.content-wrapper -->

<?php include 'footer.php'; ?>
<script>
/*
$(document).ready(function(){
   var gametype_val=document.getElementById("game_type").value;
	if(gametype_val=='3pick')
	{
		$("#ball_4_container").css("display","none"); 
	}
	else{
		$("#ball_4_container").css("display","block"); 
	}
  
}); */

function display_ball_4()
{
//alert('test');
var gametype_val=document.getElementById("game_type").value
	if(gametype_val=='3pick')
	{
		$("#ball_4_container").removeClass("required"); 
		$("#ball_4_container").css("display","none"); 
	}
	else{
		$("#ball_4_container").addClass("required"); 
		$("#ball_4_container").css("display","block"); 
		
	}
  
} 

$(function() {
		/*Date picker*/
    $( "#date" ).datepicker({ dateFormat: 'dd/mm/yy' });
});


$("#submit").click(function () {
	
	/*jquery validation for date fomate dd/mm/yyyy */
	$.validator.addMethod('dateformat', function (value, element) {
    return this.optional(element) || /^(((0[1-9]|[12][0-9]|3[01])([/])(0[13578]|10|12)([/])([1-2][0,9][0-9][0-9]))|(([0][1-9]|[12][0-9]|30)([/])(0[469]|11)([/])([1-2][0,9][0-9][0-9]))|((0[1-9]|1[0-9]|2[0-8])([/])(02)([/])([1-2][0,9][0-9][0-9]))|((29)(\.|-|\/)(02)([/])([02468][048]00))|((29)([/])(02)([/])([13579][26]00))|((29)([/])(02)([/])([0-9][0-9][0][48]))|((29)([/])(02)([/])([0-9][0-9][2468][048]))|((29)([/])(02)([/])([0-9][0-9][13579][26])))$/.test(value);
}, "Enter a valid date");

	jQuery.validator.addMethod("greaterThan", 
	function(value, element, params) {

		if (!/Invalid|NaN/.test(new Date(value))) {
			return new Date(value) > new Date($(params).val());
		}

		return isNaN(value) && isNaN($(params).val()) 
			|| (Number(value) > Number($(params).val())); 
	},'Must be greater than {0}.');
	
	// validate tile specification form on keyup and submit
    var validator = $("#add_admin_entry").validate({
        rules: {
            date: {
			 dateformat: true,
			},
			/*ball_1: {
			 required: "required",
			}, 
			ball_2: {
			 required: "required",
			},
			ball_3: {
			 required: "required",
			},
			ball_4: {
			 required: "required",
			} */
			
		},
        messages: {
            date:{
				dateformat: "Select date",
			},
			/*ball_1: {
			 required: "Enter Ball 1 value",
			}, 
			ball_2: {
			 required: "Enter Ball 2 value",
			},
			ball_3: {
			 required: "Enter Ball 3 value",
			},
			ball_4: {
			 required: "Enter Ball 4 value",
			}*/
			
        },
        highlight: function (element) {
            $(element).addClass('has-error').removeClass('has-success')
                .closest('.form-group').addClass('has-error').removeClass('has-success');
        },
        unhighlight: function (element) {
            $(element).addClass('has-success').removeClass('has-error')
                .closest('.form-group').addClass('has-success').removeClass('has-error');
        },		
		 submitHandler: function(form) {
            form.submit();
        }
		
    });
});

</script>