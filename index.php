<?php
include 'database.php';
$query = 'SELECT * FROM people';

$result = mysqli_query($conn, $query);
$people_array = array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    array_push($people_array, $row);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>User details</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>

<body>

        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Mail Id</th>
                    <th scope="col">Country</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                //display people table
                    echo "<tr id='first'>";
                    echo "<td> <input type='radio' name='select'></td>"; 
                    echo "<td>" . $people_array[0]['f_name'] . "</td>";
                    echo "<td>" . $people_array[0]['l_name'] . "</td>";
                    echo "<td>" . $people_array[0]['mail'] . "</td>";
                    echo "<td>" . $people_array[0]['country'] . "</td>";
                    echo "<td> <input type='button' name='edit' value='edit' disabled></td>";
                    echo "</tr>";

                for ($i = 1; $i < sizeof($people_array); $i++) {
                    echo "<tr>";
                    echo "<td> <input type='radio' name= 'select'></td>"; 
                    echo "<td>" . $people_array[$i]['f_name'] . "</td>";
                    echo "<td>" . $people_array[$i]['l_name'] . "</td>";
                    echo "<td>" . $people_array[$i]['mail'] . "</td>";
                    echo "<td>" . $people_array[$i]['country'] . "</td>";
                    echo "<td> <input type='button' name= 'edit' value='edit' disabled></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <script>
            
            function selectRow(){
        
                var radios = document.getElementsByName('select');
                for( var i = 0; i < radios.length; i++ )
                {
                    radios[i].onclick = function()
                    {
                        var el = document.getElementById("first");
                        
                        // go to the next sibing
                        do
                        {
                            if(el.tagName === "TR")
                            {
                                //grey out other buttons
                                el.lastChild.innerHTML="<td><input type='button' name= 'edit' value='edit' disabled></td>";
                            }
                        
                        }while(el = el.nextSibling);
                     // radio  -      td    -  tr 
                     this.parentElement.parentElement.lastChild.innerHTML="<td> <a href='edit.html' target='_blank'><input type='button' name= 'edit' value='edit'></a></td>";
                    };
                }
        
            }
            selectRow();
        </script>    
</body>

</html>