<!DOCTYPE html>
<html>
    <body>
        <?php $val1="$25,000"; 
            $val2="$37,000";
            $val3="$45,000";
        ?>
        <table>
            <thead>
                <tr><th>Name</th>
                <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>David</td>
                <td><?php echo $val1; ?></td>
                </tr>
                <tr>
                <td>John</td>
                <td><?php echo $val2; ?></td>
                </tr>
                <tr>
                <td>Mark</td>
                <td><?php echo $val3; ?></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>