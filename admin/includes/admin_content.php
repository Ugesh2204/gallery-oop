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
            $user->username = "student";
            $user->password = "stu22";
            $user->first_name = "Lisa";
            $user->last_name = "Monacorona";
            $user->create();

            /*Update */
           /*$user = User::find_users_by_id(8);
            $user->username = "David";
            $user->password = "david22";
            $user->first_name = "David";
            $user->last_name = "Beckham";
            $user->update();*/

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