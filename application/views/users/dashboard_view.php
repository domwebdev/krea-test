
<div class="main ">
        <?php echo form_open(base_url().'dashboard/',array('id'=>'save_form','method'=>'post')) ?>
        <div class="panel panel-default">
            <div class="panel-heading"><span class="glyphicon glyphicon-filter"></span>&nbsp;Filter contacts</div>
            <?php
            //data of filter
            if( isset($this->session->userdata['s_filters_data'])){foreach( $this->session->userdata['s_filters_data'] as $value ){ ?>
                <div class="panel-body form-inline" >
                    &nbsp;&nbsp;
                    <div class="input-group">
                        <input class="form-control" placeholder="keyword..." type="text" name="f_keyword_<?php echo $value->id; ?>"  required  value="<?php echo $value->keyword; ?> ">
                    </div>
                    &nbsp;&nbsp;
                    <div class="input-group">
                        <select class="form-control"  name="f_type_filter_<?php echo $value->id; ?>" required >
                            <option  value="all" >search in...</option>
                            <option  <?php if ($value->typefilter == 'all'){echo 'selected ';} ?> value="email" >All</option>
                            <option  <?php if ($value->typefilter == 'email'){echo 'selected ';} ?> value="email" >email</option>
                            <option  <?php if ($value->typefilter == 'address'){echo 'selected ';} ?> value="address">address</option>
                            <option  <?php if ($value->typefilter == 'phone'){echo 'selected ';} ?> value="phone" >phone</option>
                            <option  <?php if ($value->typefilter == 'web'){echo 'selected ';} ?> value="web">web</option>
                        </select>
                    </div>
                    &nbsp;
                    <div class="input-group ">
                        <a class="btn btn-sm btn-danger" style="color:#ffffff!important;" href="Javascript:deleteFilter('<?php echo $value->id; ?>')">X</a>
                    </div>
                </div>
            <?php }}?>

            <div class="panel-body form-inline" >
                &nbsp;&nbsp;
                <div class="input-group">
                    <input class="form-control" placeholder="keyword..." type="text" name="f_keyword"  >
                </div>
                &nbsp;&nbsp;
                <div class="input-group">
                    <select class="form-control"  name="f_type_filter"  >
                        <option  value="all"  >search in...</option>
                        <option  value="all"  >All</option>
                        <option  value="email" >email</option>
                        <option  value="address">address</option>
                        <option  value="phone" >phone</option>
                        <option  value="web">web</option>
                    </select>
                </div>
                &nbsp;
                <div class="input-group ">
                    <button class="btn btn-sm btn-warning" onclick="Javascript:addToFilter('<?php echo uniqid();?>')">Add to filter</button>
                </div>
                <div class="input-group ">

                    <button class="btn btn-sm btn-success" onclick="Javascript:searchData()">Search</button>
                </div>
            </div>
            <input type="hidden" name="ids" id="ids" value="">
            <input type="hidden" name="do" id="do" value="">

        </div>
        <table  cellspacing="0" class='table table-bordered table-hover table-striped table-responsive' cellpadding="0">
            <thead>
            <tr>
                <th class="AGSTableHeadTd">User</th>
                <th class="AGSTableHeadTd">Contact type</th>
                <th class="AGSTableHeadTd">Contact</th>
            </tr>
            </thead>
            <tbody>
            <?php if($contacts != NULL){foreach($contacts as $value){ ?>
                <tr class="AGSTableTr1" id="AGSTableTrID1" >
                    <td class="AGSTableTd"><?php echo $value->login ;?></td>
                    <td class="AGSTableTd"><?php echo $value->contact_type ;?></td>
                    <td class="AGSTableTd"><?php echo $value->contact_value ;?></td>
                </tr>
            <?php }} ; ?>
            </tbody>
        </table>
        <script type="text/javascript">

            function addToFilter(ids){
                $("#ids").val(ids);
                $("#do").val("add_to_filter");
                $("#save_form").submit();
            }

            function deleteFilter(ids) {

                $("#ids").val(ids);
                $("#do").val("delete");
                $("#save_form").submit();
            }

            function searchData() {

                $("#do").val("search");
                $("#save_form").submit();
            }
        </script>
</div>
