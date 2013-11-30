<h1>Entries</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <?php foreach ($entries as $entry): ?>
    <tr>
        <td><?php echo $entry['Entry']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($entry['Entry']['title'],
array('controller' => 'entries', 'action' => 'view', $entry['Entry']['id'])); ?>
        </td>
        <td><?php echo $entry['Entry']['creation_date']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($entry); ?>
</table>