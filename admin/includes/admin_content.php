<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Blank Page
            <small>Subheading</small>
        </h1>

        <?php

            $user = new User();
            $user->username = "Rita";
            $user->password = "rit123";
            $user->first_name = "Mona";
            $user->last_name = "Darling";
            $user->create();

            /*Update */
           //$user = User::find_users_by_id(7);
            //$user->last_name = "Roopchand";
            //$user->save();

            //$user = User::find_users_by_id(4);
            //$user->delete();

            /*update user */
           /* $user = User::find_users_by_id(6);
            $user->password = "justpassword";
            $user->save();*/

            /*Create user */
            //$user = new User();
            //$user->username = "ugesh";
            //$user->save();

        ?>

        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->