<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Blank Page
            <small>Subheading</small>
        </h1>

        <?php

           /* $user = new User();
            $user->username = "test";
            $user->password = "test";
            $user->first_name = "test";
            $user->last_name = "test";
            $user->create();*/

            /*Update */
           /*$user = User::find_by_id(8);
            $user->username = "David";
            $user->password = "david22";
            $user->first_name = "David";
            $user->last_name = "Beckham";
            $user->update();*/

            /*$user = User::find_by_id(25);
            $user->delete();*/

            /*update user */
           /* $user = User::find_by_id(6);
            $user->password = "justpassword";
            $user->save();*/

            /*Create user */
            //$user = new User();
            //$user->username = "Megaman";
            //$user->save();


            /*$users = User::find_all();
            foreach ($users as $user) {
                echo $user->username;
            }*/

             
            /*$photos = Photo::find_all();
            foreach ($photos as $photo) {
                echo $photo->title;
            }*/


            $photo = new Photo();
            $photo->title = "New photo";
            $photo->size = "23";
            $photo->create();

            /*$photo = new Photo();
            $photo->title = "New photo";
            $photo->size = "22";
            $photo->create();*/

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