<form name = "queue" method="post" action="test2.php" >

            <h2>Pick a Queue To DELETE</h2>

            <?php include("connectDB.php");


            $s = "select * from queue " ;
            ($t = mysqli_query($db, $s)) or die(mysqli_error($db));

            //MENU
            echo "<select  name=\"queue\">";
            //OPTIONS
            while ($r = mysqli_fetch_array($t,MYSQLI_ASSOC)){
//    $merchantid = $r["merchant"];
                $queueid = $r["queueid"];

                echo "<option value = \"$queueid\">";
//        echo  "$merchantid || ";
                echo  "$queueid ";
                echo "</option>";
                echo "<br>";
            }
            ////End Option Wrapper
            echo "</select>";
            ?>

            <button  type="submit">Next</button>

</form>