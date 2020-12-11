<tr>
    <td><?php echo htmlspecialchars($work['id']) ?></td>
    <td><?php echo htmlspecialchars($work['work_name']) ?></td>
    <td><?php echo htmlspecialchars($work['start_date']) ?></td>
    <td><?php echo htmlspecialchars($work['end_date']) ?></td>
    <td><?php if (htmlspecialchars($work['status']) == 0) {
            echo "Planning";
        } elseif (htmlspecialchars($work['status']) == 1) {
            echo "Doing";
        } else {
            echo "Complete";
        } ?></td>
    <td class="center-align action">
        <a href="/work/edit/<?php echo $work['id']?>">Edit</a>
        <a class="del" href="/work/remove/<?php echo $work['id']?>">Delete</a>
    </td>
</tr>