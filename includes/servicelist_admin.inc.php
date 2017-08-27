<table class="table table-striped service-list">
        <thead>
                <tr>
                        <th>Service name</th>
                        <th>Status</th>
                </tr>
        </thead>
        <tbody>
                <?php foreach($admin_services as $process) : ?>
                        <tr>
                                <td>
                                        <?php echo $process; ?>
                                </td>
                                <td>
                                        <?php if(check_process($process)): ?>
                                                <span style="color: #00af00;" class="glyphicon glyphicon-ok"> </span>
                                        <?php else: ?>
                                                 <span style="color: red;" class="glyphicon glyphicon-remove"> </span>
                                        <?php endif; ?>
                                </td>
                        </tr>
                <?php endforeach; ?>
        </tbody>
</table>
