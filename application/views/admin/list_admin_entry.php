<?php include 'header.php'; ?>
<style>
div.dataTables_length {
    position: relative;
    top: -10px;
    width: 100px;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Admin Entries</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>admin"><i class="fa fa-dashboard"></i> Home</a>
            </li>
            <li><a href="#" class="active">Admin Entries</a>
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?php echo base_url(); ?>admin/admin_entry" class="btn btn-success btn-lg">Add Admin Entry</a> </div>
                    <!-- /.box-header -->
                    <div class="box-body">
						<?php
						if($pagename=='pick4_entries' || $pagename=='pick3_entries')
						{
						?>
						<div class="table-responsive">
							<table class="table-striped table" style="margin-bottom:20px;border: 2px solid #000;width:100%">
								<tbody>
									<tr>
										<form action="<?php echo base_url(); ?>admin/<?php echo $pagename; ?>" id="filter_form" name="filter" method="post" >
									<?php /*	<td style="padding-top:10px;width:200px;">Game type:
										<div style="margin-top:-24px;margin-left:70px">
										<select name="game_type" id="game_type" class="form-control">
											<option value="">Select</option>
											<option value="3pick" <?php if(@$_POST['game_type']=='3pick'){ echo 'selected'; }?>>3 Pick</option>
											<option style="display:none;" value="4pick"<?php if(@$_POST['game_type']=='4pick'){ echo 'selected'; }?>>4 Pick</option>
										</select>
										</div>
										</td> */ ?>
										<td style="width:30px;">
										
										<label>Search:</label>
										<div style="margin-top:-23px;margin-left:50px;">
										<input name="search_term_1" id="search_term_1"class="form-control" type="text" maxlength="1" style="width:36px" value="<?php echo @$_POST['search_term_1'] ?>" >
										</div>
										</td>
										<td style="width:30px;">
										<div style="margin-top:2px;margin-left:-156px;">
										<input name="search_term_2" id="search_term_2" type="text" class="form-control" maxlength="1" style="width:36px" value="<?php echo @$_POST['search_term_2'] ?>" maxlength="1" >
										</div>
										</td>
										<?php if($pagename=='pick4_entries') { ?> 
										<td style="width:30px;">
										<div style="margin-top:2px;margin-left:-187px;">
										<input name="search_term_3" id="search_term_3" type="text" class="form-control" maxlength="1" style="width:36px" value="<?php echo @$_POST['search_term_3'] ?>">
										</div>
										</td>
										<?php } ?>
										<td style="display:none;padding-top:10px;width:250px;">In :<div style="margin-top:-24px;margin-left:22px">
										<select name="ball_no" id="ball_no" class="form-control">
											<option value="">Select</option>
											<option value="ball1" <?php if(@$_POST['ball_no']=='ball1'){ echo 'selected'; }?>>Ball 1</option>
											<option value="ball2"<?php if(@$_POST['ball_no']=='ball2'){ echo 'selected'; }?>>Ball 2</option>
											<option value="ball3" <?php if(@$_POST['ball_no']=='ball3'){ echo 'selected'; }?>>Ball 3</option>
											<option value="ball4"<?php if(@$_POST['ball_no']=='ball4'){ echo 'selected'; }?>>Ball 4</option>
										</select></div>
										</td>
										<td style="padding-top:10px;width:250px;">
											<div style="margin-top:0px;margin-left:-190px">
											<span class="input-group-btn">
											<input class="btn btn-info btn-flat" name="submit" id="filter" type="submit" value="Go!" >
											</span>
											</div>
										</td>						
										</form>
									</tr>
								</tbody>
							</table>	
						</div>
						<?php } 
						?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
									<th>Game #</th>
                                    <th>Game type</th>
									<th>Date</th>
									<th>Ball 1</th>
									<th>Ball 2</th>
									<th>Ball 3</th>
									<?php if($pagename=='list_7_admin_entries_4_pick')
									{?>
									<th><?php echo $pagename; ?>Ball 4</th>
									<?php }elseif( $pagename=='pick4_entries' ){
									?>
									<th>Ball 4</th>
									<?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
								$sno = 0;
								$index_array = array();
								$index_array_3pick = array();
								$index_array_4pick = array();
								foreach($details as $row) {
									$sno++;
									$admin_entry_id = $row['admin_entry_id'];
									$game_type = $row['game_type'];
									$date = $row['date'];
									$explode = explode('-',$date);
									$date = $explode[2].'/'.$explode[1].'/'.$explode[0];
									
									$ball_1 = $row['ball_1'];
									$ball_2 = $row['ball_2'];
									$ball_3 = $row['ball_3'];
									$ball_4 = $row['ball_4'];
									
									$ball_1_split=str_split($ball_1);
									$ball_2_split=str_split($ball_2);
									$ball_3_split=str_split($ball_3);
									$ball_4_split=str_split($ball_4);
									
									if($game_type == '3pick')
									{
										array_push($index_array_3pick,$ball_1_split,$ball_2_split,$ball_3_split);
									}
									else
									{
										array_push($index_array_4pick,$ball_1_split,$ball_2_split,$ball_3_split,$ball_4_split);
									}
								?>
                                <tr>
                                    <td>
                                        <?php echo $admin_entry_id; ?>
                                    </td>
									<td>
                                        <?php echo $game_type; ?>
                                    </td>
                                    <td>
                                        <?php echo $date; ?>
                                    </td>
									<td>
                                        <?php echo $ball_1; ?>
                                    </td>
									<td>
                                        <?php echo $ball_2; ?>
                                    </td>
									<td>
                                        <?php echo $ball_3; ?>
                                    </td>
									<?php if($pagename=='list_7_admin_entries_4_pick')
									{?>
									<td>
                                        <?php echo $ball_4; ?>
                                    </td>
									<?php }elseif( $pagename=='pick4_entries' ){
									?>
									<td>
                                        <?php echo $ball_4; ?>
                                    </td>
									<?php } ?>
                                </tr>
                                <?php } /*print_r($index_array);print_r($index_array_4pick); */?>
								</tbody>
                        </table>
						<?php 
						if(($pagename=='list_7_admin_entries_4_pick') || ($pagename=='list_7_admin_entries_3_pick') )
						{ 
						?>
						<?php
						$index_array=$index_array_3pick;
						 if($pagename=='list_7_admin_entries_3_pick')
						 {
							$index_array=$index_array_3pick;
						 }
						 elseif($pagename=='list_7_admin_entries_4_pick')
						 {
							$index_array=$index_array_4pick;
						 }	 
						?>
						<h2>Indexes</h2>
						<table id="example2" class="table table-bordered table-striped">
                            <tbody>
                                <?php
								
							//	print_r($details);
							$result=array();
								$index_0=0;
								$index_1=0;
								$index_2=0;
								$index_3=0;
								$index_4=0;
								$index_5=0;
								$index_6=0;
								$index_7=0;
								$index_8=0;
								$index_9=0;
							//	$each_element_value='empty';
								foreach ($index_array as $value) 
								{
									foreach ($value as $new) 
									{
									
										 @$each_element_value=$new['0']; 
										
										if($each_element_value == '')
										{
										// echo 'null value'; echo "<br>";
										}
										else if($each_element_value == 0)
										{
										 $index_0=$index_0+1;
										}
										else if($each_element_value == 1)
										{
										 $index_1=$index_1+1;
										}
										else if($each_element_value == 2)
										{
										 $index_2=$index_2+1;
										}
										else if($each_element_value == 3)
										{
										 $index_3=$index_3+1;
										}
										else if($each_element_value == 4)
										{
										 $index_4=$index_4+1;
										}
										else if($each_element_value == 5)
										{
										 $index_5=$index_5+1;
										}
										else if($each_element_value == 6)
										{
										 $index_6=$index_6+1;
										}
										else if($each_element_value == 7)
										{
										 $index_7=$index_7+1;
										}
										else if($each_element_value == 8)
										{
										 $index_8=$index_8+1;
										}
										else if($each_element_value == 9)
										{
										 $index_9=$index_9+1;
										}
									}
								
								}
								$result[0]=$index_0;
								$result[1]=$index_1;
								$result[2]=$index_2;
								$result[3]=$index_3;
								$result[4]=$index_4;
								$result[5]=$index_5;
								$result[6]=$index_6;
								$result[7]=$index_7;
								$result[8]=$index_8;
								$result[9]=$index_9;
								
								
								?>
								<tr>
                                    <td>
                                       Number
                                    </td>
									<td>
                                        Count
                                    </td>
                                    
                                </tr>
								
								
								
								<?php
								$sno = 0;
								for($i=0;$i<=9;$i++)
								{
								/*foreach($details as $row) {
									$sno++;
									$admin_entry_id = $row['admin_entry_id'];
									$game_type = $row['game_type'];
									$date = $row['date'];
									$explode = explode('-',$date);
									$date = $explode[2].'/'.$explode[1].'/'.$explode[0];
									$ball_1 = $row['ball_1'];
									$ball_2 = $row['ball_2'];
									$ball_3 = $row['ball_3'];
									$ball_4 = $row['ball_4'];
									
									*/
									
								?>
                                <tr>
                                    <td>
                                        <?php echo $i; ?>
                                    </td>
									<td>
									
                                        <?php  
										echo $result[$i];
										?>
                                    </td>
                                    
                                </tr>
                                <?php // }
								}
								?>
								</tbody>
                        </table>	
					
						<?php 
						}
						?>
						
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'footer.php'; ?>
<script type="text/javascript">
    $(function() {
        $("#example1").DataTable({
        });
    }); 
/*function validate_field()
 {
	 
	var search_term = $('#search_term').val();
	var search_term = $('#search_term').val();
	var search_term = $('#search_term').val();

	var ball_no = $('#ball_no').val();
	
	
	if(game_type=='' && search_term=='' && ball_no=='')
	{
		window.location.reload();
	}	
	
	if(search_term!='')
	{
		if(ball_no=='')
		{
			alert('Select Ball value');
			$('#ball_no').focus();
			return false;		
		}
	}
	if(ball_no!='')
	{
		if(search_term=='')
		{
			alert('Enter search term');
			$('#search_term').focus();
		return false;		
		}
	}
 }	
*/
</script>