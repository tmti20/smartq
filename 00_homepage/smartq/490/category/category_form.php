<form name = "queue" method="post" action="category.php" >

            <h2>Pick a Category</h2>

            <?php include("connectDB.php");


            $s = "select distinct category from business " ;
            ($t = mysqli_query($db, $s)) or die(mysqli_error($db));

            //MENU
            echo "<select  name=\"category\">";
            //OPTIONS
            while ($r = mysqli_fetch_array($t,MYSQLI_ASSOC)){
//    $merchantid = $r["merchant"];
                $cateory = $r["category"];

                echo "<option value = \"$cateory\">";
//        echo  "$merchantid || ";
                echo  "$cateory";
                echo "</option>";
                echo "<br>";
            }
            ////End Option Wrapper
            echo "</select>";
            ?>

            <button  type="submit">Select</button>

</form>