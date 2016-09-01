<[extends file="../../layout/app.tpl"]>

<[block name="page-title"]><[Config::application('name')]> : : Users<[/block]>

<[block name="page-script"]>
    <script>
        $(document).ready(function () {

            $('#usersTable').dataTable({
                lengthMenu: [5, 10, 15],
                order: [1, "asc"],
                language: {
                    lengthMenu: "Display _MENU_ users per page"
                }
            });

        });
    </script>
<[/block]>

<[block name="page-content"]>

    <div class="animsition">

        <[include file="../layout/partials/navbar.tpl"]>

        <div class="container clear-nav">

            <[include file="../layout/partials/sweet-alerts.tpl"]>

            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-user"></span> All Users
                            <div class="pull-right">
                                <button type="button" class="btn btn-default btn-xs panel-heading-btn" data-toggle="modal" data-target="#addUserModal">
                                    <span class="glyphicon glyphicon-plus-sign"></span> Add User
                                </button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table id="usersTable" class="table table-striped table-responsive table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th style="width: 140px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <[foreach from=$users item=user]>
                                        <tr class="v-align">
                                            <td><[$user->first_name]></td>
                                            <td><[$user->last_name]></td>
                                            <td><[$user->email]></td>
                                            <td>
                                                <[foreach from=$user->roles item=role]>
                                                    <span class="label label-default">
                                                        <[$role->role]>
                                                    </span>
                                                <[/foreach]>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" rel="tooltip" title="View Profile" class="btn btn-info btn-simple btn-xs">
                                                    <i class="fa fa-user"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Edit Profile" class="btn btn-success btn-simple btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <[/foreach]>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>


        </div>

    </div>

    <!-- Add User Modal -->
    <div id="addUserModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


<[/block]>

