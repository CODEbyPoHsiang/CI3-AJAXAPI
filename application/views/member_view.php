<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>通訊錄 || PHP - AJAX - Codeigniter</title>
        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://bootswatch.com/3/darkly/bootstrap.css">

        <!-- 使用sweetalert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

        <style>
            body {
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
            }
            .topnav {
            overflow: hidden;
            }
            label.xrequired:after {
            content: '*(此欄位為必填) ';
            color: red;
            }
            .topnav-right {
            float: right;
            }
            .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            }
      </style>


    </head>
    <body>

        <nav class="navbar navbar-default">
            <div class="topnav">
                <a class="active" href="#home">通訊錄</a>
                <div class="topnav-right">
                    <a href="#about">Codigniter</a>
                </div>
            </div>
        </nav>
        
        <div class="container">
            <div class="pull-right">
                <button  type="button" onclick="add_member()" class="btn btn-default pull-right" style="border-Radius: 0px;">新增聯絡人</button>
            </div>          
            <br />
            <br />
            <br />
            <table table class="table table-striped table-hover" id="member_list" name="members-list">
                <thead>
                    <tr class="info">
                        <!-- <th>Book Id</th> -->
                        <th width="15%">姓名</th>
                        <th width="15%">電話</th>
                        <th width="25%">電子信箱</th>
                        <th width="40%">地址</th>
                        <th width="10%">操作</th>
                        <th width="10%">動作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($member as $members){?>
                        <tr id="member<?php echo $members->id;?>">
                            <td><?php echo $members->name;?></td>
                            <td><?php echo $members->phone;?></td>
                            <td><?php echo $members->email;?></td>
                            <td><?php echo $members->city;?><?php echo $members->postcode;?><?php echo $members->address;?></td>
                            <td>
                                <button class="btn btn-warning btn-detail open_modal" onclick="edit_member(<?php echo $members->id;?>)" style="border-Radius: 0px;">編輯</button>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-delete delete-member" onclick="delete_member(<?php echo $members->id;?>)" style="border-Radius: 0px;">刪除</button>    
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
                <!-- Bootstrap modal -->    
                <div class="modal fade" id="modal_form" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:800px">
                <div class="modal-content" style="border-Radius: 0px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Book Form</h4>
                    </div>
                    <div class="modal-body form">
                        <form action="#" method="POST" class="form-horizontal" role="form" id="form">
                            <input type="hidden" value="" name="id"/>
                            <div class="form-body">
                                <div class="row">
                                        <div class="col-xs-6">
                                            <label class="xrequired">姓名</label>
                                            <input name="name" id="name" class="form-control" type="text" style="border-Radius: 0px;" required="required">
                                        </div>
                                        <div class="col-xs-6">
                                            <label class="text-light">英文姓名</label>
                                            <input name="ename"  class="form-control" type="text" style="border-Radius: 0px;">
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-xs-4">
                                        <label class="text-light">電話</label>
                                        <input name="phone"  class="form-control" type="text" style="border-Radius: 0px;">
                                    </div>
                                    <div class="col-xs-4">
                                        <label class="text-light">電子信箱</label>
                                        <input name="email"  class="form-control" type="text" style="border-Radius: 0px;">
                                    </div>
                                    <div class="col-xs-4">
                                        <label class="text-light">性別</label>
                                        <input name="sex"  class="form-control" type="text" style="border-Radius: 0px;">
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-xs-4">
                                        <label class="text-light">居住城市</label>
                                        <input name="city"  class="form-control" type="text" style="border-Radius: 0px;">
                                    </div>
                                    <div class="col-xs-4">
                                        <label class="text-light">鄉鎮市區</label>
                                        <input name="township"  class="form-control" type="text" style="border-Radius: 0px;">
                                    </div>
                                    <div class="col-xs-4">
                                        <label class="text-light">郵遞區號</label>
                                        <input name="postcode" class="form-control" type="text" style="border-Radius: 0px;">
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label class="text-light">詳細地址</label>
                                        <input name="address" class="form-control" type="text" style="border-Radius: 0px;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label class="text-light">備註</label>
                                        <textarea name="notes" class="form-control" type="textarea" style="border-Radius: 0px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" onclick="save()" id="btnSave" name="btnSave" style="border-Radius: 0px;"/>
                        <input type="hidden" id="member_id" name="member_id" value="0">

                        <!-- <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button> -->
                        <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>     -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bootstrap modal -->

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script> -->

        <script type="text/javascript">
            $(document).ready(function(){
                $('#member_list');
            });
            var save_method; //for save method string
            var table;

            function add_member()
            {
                save_method = 'add';
                $('#form').trigger("reset"); //reset form on modals
                $('#modal_form').modal('show'); //show bootstrap modal
                $('#btnSave').val("新增");; //show bootstrap modal
                $('.modal-title') .text('新增聯絡人'); // Set Title to Bootstrap modal title
            }

            function edit_member(id) {
                save_method = 'update';
                $('#form').trigger("reset"); //reset form on modals

                //Ajax Load data from ajax
                $.ajax({
                    url : "<?php echo site_url('/member/ajax_edit/')?>/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data){
                        console.log(data);
                        
                        $('[name="id"]').val(data.id);
                        $('[name="name"]').val(data.name);
                        $('[name="ename"]').val(data.ename);
                        $('[name="phone"]').val(data.phone);
                        $('[name="email"]').val(data.email);
                        $('[name="sex"]').val(data.sex);
                        $('[name="city"]').val(data.city);
                        $('[name="township"]').val(data.township);
                        $('[name="postcode"]').val(data.postcode);
                        $('[name="address"]').val(data.address);
                        $('[name="notes"]').val(data.notes);
                        $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                        $('#btnSave').val("編輯");; //show bootstrap modal
                        $('.modal-title').text('編輯聯絡人'); // Set title to Bootstrap modal title
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error get data from ajax');
                    }
                });
            }


            function save()
            {
                var url;
                // var member_id = $(this).val();

                if(save_method == 'add')
                {
                    url = "<?php echo site_url('/member/add')?>";
                }
                else
                {
                    url = "<?php echo site_url('/member/update')?>";
                }
                // ajax adding data to database
                $.ajax({
                    url : url,
                    type : "POST",
                    data : $('#form').serialize(),
                    dataType : "JSON",
                    success: function(data)
                    {
                        //if success close modal and reload ajax table
                        // $('#modal_form').modal('hide');
                        location.reload(); // for reload a page
                        $('#form').trigger("reset");//jquery的函數
                        $('#modal_form').modal('hide')
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error adding / update data');
                    }
                });
            }

            
            function delete_member(id)
            {
                if(confirm('確定要刪除此筆聯絡人資料?'))
                {
                    // ajax delete data from database
                    $.ajax({
                        url : "<?php echo site_url('/member/delete')?>/" + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function(data)
                        {
                            location.reload();
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error deleting data');
                        }
                    });
                }
            }
        </script>


        
    </body>
</html>
