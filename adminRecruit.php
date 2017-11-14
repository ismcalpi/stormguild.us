

<!DOCTYPE html>
<html lang="en">

    <?php include 'include/head.php' ?>

    <?php include 'include/db.php' ?>
    
    <?php

    $db = new db();

    if(!empty($_POST['activate']) && !empty($_POST['id'])) {
        $db-> query('UPDATE stormguild.recruitment SET is_active='.$_POST['activate'].' WHERE recruitment_id='.$_POST['id']);
    }
    ?>

    <body style="main-body">

        <main>

            <div class="row">
                <div class="col-sm-2 g-brd-right g-brd-black">
                    <?php include 'include/adminNav.php' ?>
                </div>
                <div class="col-sm-10 g-pa-20">
                    <div class="table-responsive">

                        <table class="table text-center">

                            <tbody>

                                <?php

    $db = new Db();	

    $classes = $db -> select("SELECT DISTINCT class_name FROM stormguild.recruitment order by class_name asc");

    foreach($classes as $class) {

        echo "<tr><td>".$class['class_name']."</td>";

        $specs = $db -> select("SELECT spec_name, recruitment_id, is_active FROM stormguild.recruitment WHERE class_name ='".$class['class_name']."' order by spec_name asc");

        foreach($specs as $spec) {

            if($spec['is_active'] == TRUE) {
                $btnStatus = "<form method=\"post\"><input type=\"hidden\" name=\"id\" value=\"".$spec['recruitment_id']."\"><input type=\"hidden\" name=\"activate\" value=\"FALSE\"><button type=\"submit\" class=\"btn btn-sm u-btn-outline-primary\">".$spec['spec_name']."</button></form>";
            }else{
                $btnStatus = "<form method=\"post\"><input type=\"hidden\" name=\"id\" value=\"".$spec['recruitment_id']."\"><input type=\"hidden\" name=\"activate\" value=\"TRUE\"><button type=\"submit\" class=\"btn btn-sm u-btn-outline-red\">".$spec['spec_name']."</button></form>";
            }

            echo "<td>".$btnStatus."</td>";

        }

        echo "</tr>";

    }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </body>

    <?php include 'include/scripts.php' ?>

</html>