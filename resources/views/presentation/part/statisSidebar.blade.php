
<?php 
$user = $this->ion_auth->user()->row();
$id_group = $this->ion_auth->get_users_groups()->row()->id;

if($id_group =='2' && $user->verification_email == '0'){

}
else{
?>

<style>

@media screen and (max-width:600px) {
	#sdb-btn{
		display:none;
	}
}

</style>
<div class="be-left-sidebar">
    <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="#">Menu</a>
        <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
                <div class="left-sidebar-content" style="background:#ffffff">
					<ul class="sidebar-elements" id="sdb-el" style="background:#ffffff">
						<li title="Menu aplikasi" id="sdb-btn" class="divider">Menu</li>
						<?php
							$dataPermission  = group_permission(); 

							function getChildrenSidebar($dataPermission,$p) {
								$r = array();
								foreach($dataPermission as $row) {
								if ($row->parent_id ==$p) {
									$row->child = getChildrenSidebar($dataPermission,$row->perm_id);
									$r[$row->perm_id] = $row;
								}
								}
								return $r;
							}
							
							$nav = getChildrenSidebar($dataPermission,0);


							function myListSidebar($n){
								
								foreach($n as $row){
									$fontweight = count($row->child)>0? 'bold' : $row->parent_id==0? 'bold':'normal';
									$parent = count($row->child)>0? "parent":null;
									$active = (uri_string() == $row->url ? 'active' : '');
									

									

									if(count($row->child)>0){
										echo '<li title="'.$row->keterangan.'" class="'.$parent.' '.$active.' "> 
										<a href="javascript:;">
										'.$row->icon.' <span>'.$row->perm_name.' </span>
									</a> ';

										echo ' <ul title="'.$row->keterangan.'" class="sub-menu" >';
										myListSidebar($row->child);
										echo '</ul>';

										echo "</li>";
									}
									
									else{
										if(count($row->child)==0 && $row->parent_id ==0  ){
											echo '<li title="'.$row->keterangan.'" class="'.$parent.' '.$active.' "> 
											<a href="'.base_url(). $row->url.'">
											'.$row->icon.' <span>'.$row->perm_name.' </span>
										</a> </li>';
	
										}else{
											echo '<li title="'.$row->keterangan.'" class="'.$parent.' '.$active.' ">
											<a title="'.$row->keterangan.'" href="'.base_url(). $row->url.'">
											<div title="'.$row->keterangan.'">'.$row->icon.' '.$row->perm_name.'</div>
											</a>';
											echo "</li>";

										}
										

									
									}

									
								};
							}
					
							myListSidebar($nav);
						
						
						?>
					</ul>
					
                </div>
            </div>
        </div>

    </div>
</div>

<?php 
}
?>
